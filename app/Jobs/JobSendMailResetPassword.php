<?php

namespace App\Jobs;

use App\Models\User;
use App\Models\ResetPassword;
use Illuminate\Bus\Queueable;
use App\Mail\SendMailResetPassword;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class JobSendMailResetPassword implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $tries = 1;

    private $motorist;

    private $password;

    public function __construct(User $motorist, ResetPassword $password)
    {
        $this->motorist = $motorist;
        $this->password = $password;


    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try{
            Mail::to($this->motorist->email)->send(new SendMailResetPassword($this->motorist, $this->password));
        }catch(\Exception $e){
            Log::error($e->getMessage());
        }

    }
}
