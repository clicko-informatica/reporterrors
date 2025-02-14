<?php

namespace Clicko\ReportErrors\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendErrorMail extends Mailable
{
    use SerializesModels;

    public $e;
    public $domain;

    public function __construct($e, $domain)
    {
        $this->e = $e;
        $this->domain = $domain;
    }

    public function build()
    {
        return $this->subject('Se ha producido un error en la web')
            ->from(config('mail.from.address'))
            ->markdown('reporterrors::mail.errorWeb');
    }
}
