<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class edit_biodata_button extends Mailable
{
    use Queueable, SerializesModels;

     /**
     * Create a new message instance.
     *
     * @return void
     */
  
     public function __construct()
     {
         
     }
 
     /**
      * Get the message envelope.
      *
      * @return \Illuminate\Mail\Mailables\Envelope
      */
 
      public function build()
      {
         return $this->subject('Welcome Ordhangini.com')
         ->view('mail.edit_biodata_button');
         // ->with(['otp'=>$this->otp]);
      }
 
     // public function envelope()
     // {
     //     return $this->subject('Password Change OTP Request for Admin Ordhangini')
     //     ->view('pages.otp_mail')
     //     ->with(['otp'=>$this->otp]);
     // }
 
     /**
      * Get the message content definition.
      *
      * @return \Illuminate\Mail\Mailables\Content
      */
     // public function content()
     // {
     //     return new Content(
     //         view: 'view.name',
     //     );
     // }
 
     /**
      * Get the attachments for the message.
      *
      * @return array
      */
     // public function attachments()
     // {
     //     return [];
     // }
}
