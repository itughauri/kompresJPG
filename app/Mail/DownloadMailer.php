<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DownloadMailer extends Mailable
{
    use Queueable, SerializesModels;
    public $details;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if (!empty($this->details['email'])) {
            return $this->view('mails.share')
                ->subject('Download');
        } else {
            return $this->from(env('mail_from_address'))->subject('Download')->view('mails.share', [
                'details' => $this->details
            ]);
        }
    }
}
