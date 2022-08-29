<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailWelcome extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $taxi;
    public function __construct($taxi) {

        $this->taxi = $taxi;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(){
        return $this->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
        ->subject('Seja Bem-vindo à Moongo')
        ->view('Emails.welcome')
        ->with(['taxi' => $this->taxi]);
    }
}
