<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StatusUpdateMail extends Mailable
{
    use Queueable, SerializesModels;

    public $status;
    public $vacancy;

    public function __construct($status, $vacancy)
    {
        $this->status = $status;
        $this->vacancy = $vacancy;
    }

    public function build()
    {
        return $this->subject('Update Status Lamaran Anda')
            ->view('emails.status-update');
    }
}

