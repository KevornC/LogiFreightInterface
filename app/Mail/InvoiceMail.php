<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $pdf;
    public function __construct($pdf)
    {
        //
        $this->pdf=$pdf;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   
        $pdfattachment='public/storage/logifreightinvoices/'.$this->pdf.'.pdf';
        return $this->subject('Member Invoice')
        ->view('LogiFreightMail.invoice')
        ->attach($pdfattachment);
    }
}
