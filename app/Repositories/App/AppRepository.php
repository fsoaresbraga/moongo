<?php

namespace App\Repositories\App;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Http\Controllers\Passenger\Pix\PayloadController;

class AppRepository {

    private $repo_user;

    public function __construct(User $model_user) {
        $this->repo_user = $model_user;
    }

    public function getUser($hash) {
        $user = $this->repo_user->where('hash', $hash)->first();

        if($user) {
            return $user;
        }

        return false;
    }

    public function getProductsByMotorist($hash, $req) {
        $user = $this->repo_user::where('hash', $hash)->where('status', 1)->first();

        $products =[];

        if(isset($user)) {
            $products =
                DB::select("
                    SELECT
                    prod.id as id,
                    prod.title as title,
                    prod.sale_price as price,
                    prod.image as image,
                    mov.bar_code,
                    SUM(IF(tp_mov.name='Entrada', mov.quantity, 0)) - SUM(IF(tp_mov.name='Saída', mov.quantity, 0)) as quantity

                    FROM products as prod

                        INNER JOIN movements as mov
                        ON prod.id = mov.product_id

                        INNER JOIN origins as origin
                        ON origin.id = mov.origin_id

                        INNER JOIN destinations as destination
                        ON destination.id = mov.destination_id

                        INNER JOIN type_movements as tp_mov
                        ON tp_mov.id = mov.type_movement_id

                        INNER JOIN users as user
                        ON user.id = mov.user_id

                    WHERE
                        user.id = '".$user->id."'
                    AND
                        ((origin.name = 'Carro' && destination.name = 'Estoque' && tp_mov.name = 'Entrada')
                    OR
                        (origin.name = 'Carro' && destination.name = 'Venda' && tp_mov.name = 'Saída'))
                    group by prod.id;
                ");

            return ['user'=> $user, 'products' => $products];
        }
        return ['user'=> $user, 'products' => $products];


    }

    public function getProductById($req) {
        
        $user_id = $req['user'];
        $product_id = $req['product'];

       
        $product =
            collect(DB::select("
                SELECT
                prod.id as id,
                prod.title as title,
                prod.sale_price as price,
                prod.image as image,
                mov.bar_code,
                SUM(IF(tp_mov.name='Entrada', mov.quantity, 0)) - SUM(IF(tp_mov.name='Saída', mov.quantity, 0)) as quantity

                FROM products as prod

                    INNER JOIN movements as mov
                    ON prod.id = mov.product_id

                    INNER JOIN origins as origin
                    ON origin.id = mov.origin_id

                    INNER JOIN destinations as destination
                    ON destination.id = mov.destination_id

                    INNER JOIN type_movements as tp_mov
                    ON tp_mov.id = mov.type_movement_id

                    INNER JOIN users as user
                    ON user.id = mov.user_id

                WHERE
                    user.id = '".$user_id."'
                AND
                    prod.id = '".$product_id."'
                AND
                    ((origin.name = 'Carro' && destination.name = 'Estoque' && tp_mov.name = 'Entrada')
                OR
                    (origin.name = 'Carro' && destination.name = 'Venda' && tp_mov.name = 'Saída'))
                group by prod.id;
            "))->first();

        return$product;

    }

    public function getProductsVerifyStock($user_id) {
            $products =
                DB::select("
                    SELECT
                    prod.id as id,
                    prod.title as title,
                    prod.sale_price as price,
                    prod.image as image,
                    mov.bar_code,
                    SUM(IF(tp_mov.name='Entrada', mov.quantity, 0)) - SUM(IF(tp_mov.name='Saída', mov.quantity, 0)) as quantity

                    FROM products as prod

                        INNER JOIN movements as mov
                        ON prod.id = mov.product_id

                        INNER JOIN origins as origin
                        ON origin.id = mov.origin_id

                        INNER JOIN destinations as destination
                        ON destination.id = mov.destination_id

                        INNER JOIN type_movements as tp_mov
                        ON tp_mov.id = mov.type_movement_id

                        INNER JOIN users as user
                        ON user.id = mov.user_id

                    WHERE
                        user.id = '".$user_id."'
                    AND
                        ((origin.name = 'Carro' && destination.name = 'Estoque' && tp_mov.name = 'Entrada')
                    OR
                        (origin.name = 'Carro' && destination.name = 'Venda' && tp_mov.name = 'Saída'))
                    group by prod.id;
                ");

            return $products;

    }

    private function generatePix($request, $amount) {

        $txId = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 15);
        $pixController = new PayloadController();

        $px[00]="01"; //Payload Format Indicator, Obrigatório, valor fixo: 01
        // Se o QR Code for para pagamento único (só puder ser utilizado uma vez), descomente a linha a seguir.
        //$px[01]="12"; //Se o valor 12 estiver presente, significa que o BR Code só pode ser utilizado uma vez.
        $px[26][00]="BR.GOV.BCB.PIX"; //Indica arranjo específico; “00” (GUI) obrigatório e valor fixo: br.gov.bcb.pix
        $px[26][01]="web.carneiro@gmail.com"; //Chave do destinatário do pix, pode ser EVP, e-mail, CPF ou CNPJ.
        //$px[26][02]="Descricao"; // Descrição da transação, opcional.


        $px[52]="0000"; //Merchant Category Code “0000” ou MCC ISO18245
        $px[53]="986"; //Moeda, “986” = BRL: real brasileiro - ISO4217
        $px[54]=$amount; //Valor da transação, se comentado o cliente especifica o valor da transação no próprio app. Utilizar o . como separador decimal. Máximo: 13 caracteres.
        $px[58]="BR"; //“BR” – Código de país ISO3166-1 alpha 2
        $px[59]="MOONGO"; //Nome do beneficiário/recebedor. Máximo: 25 caracteres.
        $px[60]="SAO PAULO"; //Nome cidade onde é efetuada a transação. Máximo 15 caracteres.
        $px[62][05]="147258"; //Identificador de transação, quando gerado automaticamente usar ***. Limite 25 caracteres. Vide nota abaixo.


        $pix = $pixController->montaPix($px);


        $pix.="6304"; //Adiciona o campo do CRC no fim da linha do pix.
        $pix.=$pixController->crcChecksum($pix); //Calcula o checksum CRC16 e acrescenta ao final.

        $name = uniqid().'.svg';
        //$saveQr = __DIR__.'/../../../../public_html/homologa/images/qrcodes/'.$name;
        $saveQr = public_path('images/qrcodes/'.$name);
        $urlQr = $pix;
        QrCode::generate($urlQr, $saveQr);

        $movement = $this->entityMovement::create([
            'txId' => $txId,
            'link' => $urlQr,
            'image' => $name,
            'total' => $amount,
            'PixPaid' => null,
            'status' => '1'
        ]);

        $this->entityUserAgent::create([
            'movement_id' => $movement->id,
            'ip' => $request->ip(),
            'url' => $request->fullUrl(),
            'user_agent' => $request->userAgent()
        ]);

        if($movement) {
            return $movement;
        }

        return 404;

    }
}
