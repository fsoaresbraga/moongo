<?php

namespace App\Http\Controllers\Passenger;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\App\AppRepository;

class AppController extends Controller
{

    private $repo_app;

    public function __construct(AppRepository $appRepository) {
            $this->repo_app = $appRepository;

    }

    public function index($hash, Request $request) {

         //if (strpos($request->userAgent(), 'Mobile') !== false) {
            $response = $this->repo_app->getProductsByMotorist($hash, $request->all());

            if(isset($response['user'])) {

                return view('App.home', compact('response'));
             //}
             //return view('notFound');
            }

         $users = $this->entityUser::orderBy('ranking', 'asc')->get();
         return view('desktop', compact('users'));
    }


    public function addCart(Request $request) {

        try {

            $response = $this->repo_app->getProductById($request->all());


             if($response) {
                 $data = [
                     'id' => $response->id,
                     'title' => $response->title,
                     'price' => $response->price,
                     'stock' => $response->quantity,
                     'image' => $response->image,
                     'bar_code' => $response->bar_code,

                 ];
                 return response()->json(['type' => 'success', 'data' => $data]);
             }

             return abort('404');

         } catch(Exception $e) {

             return abort('404');
         }

    }


    public function cartView($hash, Request $request) {

         //if (strpos($request->userAgent(), 'Mobile') !== false) {

            $user = $this->repo_app->getUser($hash);

            if($user) {
                return view('App.cart', compact('user'));
            }

            return view('notFound');
        //}

        //$users = $this->entityUser::take(5)->orderBy('ranking', 'asc')->get();
        //return view('desktop', compact('users'));

    }


    public function storeCart(Request $request) {

        $user =  $user = $this->repo_app->getUser($request->user);

        if(!$user){

            return response()->json(['type'=> 'error' , 'data ' => 'Motorista não Encontrado.']);
        }

        $verifyStock = false;
        $products_by_user = $this->repo_app->getProductsVerifyStock($user->id);

        foreach($products_by_user as $product) {
            foreach($request->products as $postProduct) {
                if($product->id == $postProduct['id'] && (int) $postProduct['qtd'] > (int) $product->quantity) {
                    $verifyStock = true;
                }
            }
        }

        if(!$verifyStock){

            $generatePix =  $this->generatePix($request, $request->total);

            if(gettype($generatePix) != 'integer'){

                $sale = [];
                foreach($request->products as $postProduct) {

                    $sale = $this->entitySale::create([
                        'user_id' => $user->id,
                        'movement_id' => $generatePix->id,
                        'product_id' => $postProduct['id'],
                        'quantity' =>$postProduct['qtd'],
                        'total' => ($postProduct['price'] * $postProduct['qtd'])
                    ]);

                    $product = $this->entityProduct::with(['users' => function($q) use ($request) {
                        $q->where('user_id', $request->user);
                    }])
                    ->where('id', $postProduct['id'])
                    ->first();

                    $user->products()->updateExistingPivot($postProduct['id'], [
                        'quantity' => ((int) $product->users[0]->pivot->quantity - (int) $postProduct['qtd']),
                    ]);
                }

                if($sale){

                    return response()->json(['type'=> 'success', 'data'=> $generatePix]);
                }

                return response()->json(['type'=> 'error' , 'data ' => 'Erro ao salvar Pedido.']);

            }

            return response()->json(['type'=> 'error' , 'data ' => 'Erro ao criar QrCode para Pagamento.']);
        }

        return response()->json(['type'=> 'error' , 'data ' => 'Estoque Insuficiente.']);
    }

    /*
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
         $saveQr = __DIR__.'/../../../../public_html/homologa/images/qrcodes/'.$name;
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


     public function checkoutView($movement, Request $request) {

         //if (strpos($request->userAgent(), 'Mobile') !== false) {

             $movement = $this->entityMovement::where('status', '1')->find($movement);
             $getUser = $this->entitySale::where('movement_id', $movement->id)->first('user_id');
             $user = $this->entityUser::where('id', $getUser->user_id)->first('hash');

             if($movement) {

                 return view('checkout', compact('movement', 'user'));
             }

             //return view('notFound');
         //}

         $users = $this->entityUser::take(5)->orderBy('ranking', 'asc')->get();
         return view('desktop', compact('users'));
     }
    */
}
