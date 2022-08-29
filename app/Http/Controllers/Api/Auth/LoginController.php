<?php

namespace App\Http\Controllers\Api\Auth;

use Carbon\Carbon;
use App\Models\Taxi;
use Illuminate\Http\Request;
use App\Models\ResetPassword;
use App\Mail\SendMailResetPassword;
use App\Http\Controllers\Controller;

use App\Http\Resources\TaxiResource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Jobs\JobSendMailResetPassword;
use App\Http\Requests\Auth\AuthTaxiRequest;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\Auth\ResetPasswordRequest;

class LoginController extends Controller
{
    private $repository_taxi;
    private $repository_password;
    public function __construct(Taxi $taxi, ResetPassword $password) {
        $this->repository_taxi = $taxi;
        $this->repository_password = $password;
    }

    public function login(AuthTaxiRequest $request) {

        $taxi = $this->repository_taxi
            ->with(['place', 'car'])
            ->where('cpf', "$request->cpf")
            ->where('status', 1)
            ->first();

        if (!$taxi || !Hash::check($request->password, $taxi->password)) {

            return response()->json(['error' => [config('messages.error_login')]]);
        }

        return (new TaxiResource($taxi))->additional([
            'token' => $taxi->createToken($request->device_name)->plainTextToken
        ]);
    }

    public function resetPassword(ResetPasswordRequest $request) {

        $taxi = $this->repository_taxi
            ->where('cpf', "$request->cpf")
            ->where('status', 1)
            ->first();

        if(isset($taxi)) {

            $password = $this->repository_password::create([
                'cpf' => $taxi->cpf,
                'token' => mt_rand(1111,9999),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);

            if($password) {
                //dd($taxi->email);
                JobSendMailResetPassword::dispatch($taxi, $password);


                return response()->json(['success' => [config('messages.success_reset_password')]], 200);
            }

            return response()->json(['error' => [config('messages.error_reset_password')]], 404);
        }

        return response()->json(['error' => [config('messages.not_found_reset_password')]], 404);
    }

    public function VerifyTokenResetPassword(Request $request) {


        if(strlen($request->token) == 4 && gettype((int) $request->token) == 'integer') {
            $password = $this->repository_password::where('token', $request->token)->first();

           if($password) {

            $startTime = Carbon::parse($password->created_at);
            $finishTime = Carbon::now();
            $time = $finishTime->diff($startTime)->format('%H:%I:%S');

            if($time <= "00:03:00") {
                $password->delete();
                return response()->json(['success' => [config('messages.success_verify_reset_password')]]);
            }

            $password->delete();
            return response()->json(['error' => [config('messages.error_verify_reset_password')]]);

           }

           return response()->json(['error' => [config('messages.not_found_verify_reset_password')]]);
        }

        return response()->json(['error' => [config('messages.not_found_verify_reset_password')]]);
    }
}
