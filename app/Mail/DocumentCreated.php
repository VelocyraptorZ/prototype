<?php
namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
class DocumentCreated extends Mailable
{
    use Queueable, SerializesModels;
    public $document;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($document)
    {
        //
        $this->document = $document;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('document.mail')->attach('storage/document'.$this->document->id.'.pdf');
    }
}