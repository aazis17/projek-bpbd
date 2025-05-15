<?php

namespace App\Mail;

use App\Models\Submission;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StatusChangedEmail extends Mailable
{
    use SerializesModels;

    public $status;
    public $submission;

    /**
     * Create a new message instance.
     *
     * @param string $status
     * @param Submission $submission
     */
    public function __construct($status, $submission)
    {
        $this->status = $status;
        $this->submission = $submission;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Status Pengajuan Anda Telah Diubah')
                    ->view('emails.statusChanged')
                    ->with([
                        'status' => $this->status,
                        'submission' => $this->submission,
                    ]);
    }
}
