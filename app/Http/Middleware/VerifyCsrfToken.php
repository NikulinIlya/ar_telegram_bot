<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */

    protected $except = [
        "644916677:AAHoaA5Dc4lfjghtaa6aX1KztaP1JT0klSc/webhook",
    ];

    public function __construct(\Illuminate\Foundation\Application $app, \Illuminate\Contracts\Encryption\Encrypter $encrypter)
    {
        $this->app = $app;
        $this->encrypter = $encrypter;
        $this->except[] = \Telegram::getAccessToken();
    }
}
