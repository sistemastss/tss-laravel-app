<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $view;
    public $subject;
    public $mailData;

    /**
     * Create a new message instance.
     * @param $view
     * @param $subject
     * @return void
     */
    public function __construct(string $view, string $subject, $mailData)
    {
        //
        $this->to($mailData['to']);
        $this->view = $view;
        $this->subject = $subject;
        $this->mailData = $mailData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view($this->view)->subject($this->subject);
    }
}
