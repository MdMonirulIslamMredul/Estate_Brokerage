<?php
  
namespace App\Mail;
  
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
  
class SendEmail extends Mailable
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
       
    return $this->subject('Cv - '. $this->data->subject_english)
                    ->view('emails.cv')->attach($this->data->file('pdf_file')->getRealPath(), [
                'as' => $this->data->file('pdf_file')->getClientOriginalName(),
            ]);
    }
}