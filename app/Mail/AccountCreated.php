<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AccountCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $userinfo;

    /**
     * Create a new message instance.
     *
     * @param mixed $userinfo
     */
    public function __construct($userinfo)
    {
        $this->userinfo = $userinfo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.accountcreated');
    }
}
