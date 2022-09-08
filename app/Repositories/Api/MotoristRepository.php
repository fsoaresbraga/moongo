<?php

namespace App\Repositories\Api;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Company;
use Illuminate\Support\Str;

use App\Mail\SendMailWelcome;
use App\Jobs\JobSendMailWelcome;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class MotoristRepository {

    private $repo_motorist;
    private $repo_company;

    public function __construct(User $model_motorist, Company $company) {
        $this->repo_motorist = $model_motorist;
        $this->repo_company = $company;
    }


    public function setCreateMotorist(array $req): User {
        //dd($req);
        $hash = $this->generateHash();
        $qr_code = $this->generateQrCode($hash);
        
        $company = $this->repo_company::where('code', $req['company'])->first();
        if(isset($company)) {
            $motorist = $this->repo_motorist::create([
                'company_id' => $company->id,
                'name' => $req['name'],
                'email' => $req['email'],
                'phone' => $req['phone'],
                'cpf' => $req['cpf'],
                'date_birth' => Carbon::parse($req['date_birth'])->format("Y-m-d"),
                'gender' => $req['gender'],
                'password' => Hash::make($req['password']),
                'image' => null,
                'hash' => $hash,
                'qr_code' => $qr_code,
                'status' => 1,
                'accept_lgpd' => 1,
                'administrator' => 0
            ]);
    
           $car = $motorist->car()->create([
                'car_plate' => $req['car_plate'],
                'car_renamed' => $req['car_renamed'],
                'model' => $req['model'],
                'year' => $req['year'],
                'color' => $req['color']
           ]);
    
           $place = $motorist->place()->create([
                'zipcode' => $req['zipcode'],
                'address' => $req['address'],
                'address_number' => isset($req['address_number']) ? $req['address_number'] : null,
                'neighborhood' => $req['neighborhood'],
                'complement' => isset($req['complement']) ? $req['complement'] : null,
                'state' => $req['state'],
                'city' => $req['city'],
           ]);
    
    
            if($motorist && $car && $place) {
    
                //JobSendMailWelcome::dispatch($motorist)->delay(now()->addSeconds('30'));
                return $motorist;
            }

            return false;
        }

        return false;
    }

    private function generateHash() {

        $count_taxi = $this->repo_motorist::whereDate('created_at', Carbon::now()->format('Y-m-d'))->count();
        $date = Carbon::now()->format('d');
        $number_hash =  str_pad(($count_taxi + 1) , 4 , '0' , STR_PAD_LEFT);
        return $date.$number_hash;

    }

    private function generateQrCode ($hash) {

        $url_qr_code = config('app.url').'/'.$hash;
        $name_qr_code = uniqid().'.png';
        $local_qr_code = '/assets/qrCodes/motorist/'.$name_qr_code;
        
        //$path_qr_code = public_path('/assets/qrCodes/motorist/'.$name_qr_code);
        //QrCode::generate($url_qr_code, $path_qr_code);

        $image = QrCode::format('png')
            //->merge('img/t.jpg', 0.1, true)
            ->size(400)->errorCorrection('H')
            ->generate($url_qr_code);
        
        $output_file = '/storage/img/qr-code/motorist/' . $name_qr_code;
        Storage::disk('public')->put($output_file, $image);
        //storage/app/public/img/qr-code/img-1557309130.png

       

        return $local_qr_code;
    }


}
