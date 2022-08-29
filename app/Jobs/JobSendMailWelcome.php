<?php

namespace App\Jobs;

use App\Models\Taxi;
use App\Mail\SendMailWelcome;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class JobSendMailWelcome implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $tries = 3;

    private $taxi;

    public function __construct(Taxi $taxi)
    {
        $this->taxi = $taxi;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->taxi->email)->send(new SendMailWelcome($this->taxi));
    }
}
