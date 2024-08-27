<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminNotificationEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $otp_value)
    {
        $this->email = $email;
        $this->otp_value = $otp_value;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New Email Verification Request')
                    ->view('emails.admin_notification')
                    ->with(['email' => $this->email,'otp_value'=>$this->otp_value]);
    }
}
