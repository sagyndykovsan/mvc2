<?php 

declare(strict_types=1);

namespace App;

class Response {
    public function setStatusCode($code)
    {
        http_response_code($code);
    }
}