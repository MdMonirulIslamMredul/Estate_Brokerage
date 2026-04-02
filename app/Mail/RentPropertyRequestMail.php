<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RentPropertyRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    public array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function build()
    {
        $subjectParts = array_filter([
            'Rent Property Request',
            $this->data['property_title'] ?? null,
            $this->data['location'] ?? null,
        ]);

        $mail = $this->subject(implode(' - ', $subjectParts))
            ->view('emails.rent_property_request');

        if (!empty($this->data['email'])) {
            $mail->replyTo($this->data['email'], $this->data['name_english'] ?? 'Property Owner');
        }

        return $mail;
    }
}
