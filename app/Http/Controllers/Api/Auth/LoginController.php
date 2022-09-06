<?php

namespace App\Http\Controllers\Api\Auth;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ResetPassword;
use App\Mail\SendMailResetPassword;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Jobs\JobSendMailResetPassword;
use App\Http\Resources\MotoristResource;
use App\Http\Requests\Auth\AuthMotoristRequest;
use App\Http\Requests\Auth\ResetPasswordRequest;

class LoginController extends Controller
{
    private $repo_motorist;
    private $repository_password;
    public function __construct(User $taxi, ResetPassword $password) {
        $this->repo_motorist = $taxi;
        $this->repository_password = $password;
    }

    public function login(AuthMotoristRequest $request) {

        $motorist = $this->repo_motorist
            ->where('cpf', "$request->cpf")
            ->where('status', 1)
            ->first();

        //dd($motorist, !$motorist, !Hash::check($request->password, $motorist->password));
        if (!$motorist || !Hash::check($request->password, $motorist->password)) {

            return response()->json(['error' => [config('messages.error_login')]]);
        }

        return (new MotoristResource($motorist))->additional([
            'token' => $motorist->createToken($request->device_name)->plainTextToken
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

            return response()->json(['error' => [config('messages.error_reset_password')]], 400);
        }

        return response()->json(['error' => [config('messages.not_found_reset_password')]], 400);
    }

    public function VerifyTokenResetPassword(Request $request) {


        if(strlen($request->token) == 4 && gettype((int) $request->token) == 'integer') {
            $password = $this->repository_password::where('token', $request->token)->first();

           if($password) {

            $startTime = Carbon::parse($password->created_at);
            $finishTime = Carbon::now();
            $time = $finishTime->diff($startTime)->format('%H:%I:%S');

            if($time <= "00:04:00") {
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
