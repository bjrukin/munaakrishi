<?php

namespace App\Mail\Site;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class CareerEmail extends Mailable
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

    public function build()
    {
        if ($this->data['cv']) {
            return $this->from($this->data['email'])->subject($this->data['subject'])->view('email.site.career')->with($this->data)->attach(Storage::disk('public')->url('cv/' . $this->data['cv']));
        } else {
            return $this->from($this->data['email'])->subject($this->data['subject'])->view('email.site.career')->with($this->data);
        }

    }
}
