<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Models\Taxi;
use Illuminate\Support\Str;
use App\Mail\SendMailWelcome;

use App\Jobs\JobSendMailWelcome;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class TaxiRepository {

    private $repo_taxi;

    public function __construct(Taxi $model_taxi) {
        $this->repo_taxi = $model_taxi;
    }


    public function setCreateTaxi(array $date): Taxi {

        $hash = $this->generateHash();
        $qr_code = $this->generateQrCode($hash);

        $taxi = $this->repo_taxi::create([
            'name' => $date['name'],
            'email' => $date['email'],
            'phone' => $date['phone'],
            'cpf' => $date['cpf'],
            'date_birth' => Carbon::parse($date['date_birth'])->format("Y-m-d"),
            'gender' => $date['gender'],
            'password' => Hash::make($date['password']),
            'image' => null,
            'hash' => $hash,
            'qr_code' => $qr_code,
            'status' => 1,
            'accept_lgpd' => 1
        ]);

       $car = $taxi->car()->create([
            'car_plate' => $date['car_plate'],
            'car_renamed' => $date['car_renamed'],
            'model' => $date['model'],
            'year' => $date['year'],
            'color' => $date['color']
       ]);

       $place = $taxi->place()->create([
            'zipcode' => $date['zipcode'],
            'address' => $date['address'],
            'address_number' => isset($date['address_number']) ? $date['address_number'] : null,
            'neighborhood' => $date['neighborhood'],
            'complement' => isset($date['complement']) ? $date['complement'] : null,
            'state' => $date['state'],
            'city' => $date['city'],
       ]);


        if($taxi && $car && $place) {

            JobSendMailWelcome::dispatch($taxi)->delay(now()->addSeconds('30'));
            return $taxi;
        }

        return false;
    }

    private function generateHash() {

        $count_taxi = $this->repo_taxi::whereDate('created_at', Carbon::now()->format('Y-m-d'))->count();
        $date = Carbon::now()->format('d');
        $number_hash =  str_pad(($count_taxi + 1) , 4 , '0' , STR_PAD_LEFT);
        return $date.$number_hash;

    }

    private function generateQrCode ($hash) {

        $url_qr_code = config('app.url').'/'.$hash;
        $name_qr_code = uniqid().'.svg';
        $path_qr_code = public_path('/uploads/qrcodes/taxis/'.$name_qr_code);
        $local_qr_code = '/uploads/qrcodes/taxis/'.$name_qr_code;

        QrCode::generate($url_qr_code, $path_qr_code);

        return $local_qr_code;
    }


}
