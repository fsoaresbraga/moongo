<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailResetPassword extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $taxi;
    private $password;

    public function __construct($taxi, $password) {

        $this->taxi = $taxi;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(){
        return $this->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
        ->subject('Resetar Senha Moongo')
        ->view('Emails.resetPassword')
        ->with(['taxi' => $this->taxi, 'password' => $this->password]);
    }
}
