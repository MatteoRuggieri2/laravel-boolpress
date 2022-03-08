<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PostDeletedAdminNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $deleted_post_title;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($_deleted_post_title)
    {
        $this->deleted_post_title = $_deleted_post_title;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = [
            'deleted_post_title' => $this->deleted_post_title
        ];

        return $this->view('mails.post-deleted-admin-notification', $data);
    }
}
