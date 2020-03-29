<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;

class ResetMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        return $this->view('emails.resetPassword',[
            
            'data'=> $this->data, 
            ])            
            ->to($this->data['user']->email, $this->data['user']->fullname())
            // ->to("hello@jesusroguez.com", $this->data['user']->fullname())
                ->subject('Recupera tu contraseña de tu cuenta - '. env('MAIL_FROM_NAME'))
                ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
    }
}
