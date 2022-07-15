<?php

namespace App\Http;

class AjaxResponseMessage
{
    public string $message_text = "";
    public string $message_status = "";

    public function __construct(string $pStatus, string $pMessage)
    {
        $this->message_text = $pMessage;
        $this->message_status = $pStatus;
    }
}
