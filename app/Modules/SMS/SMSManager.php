<?php

namespace App\Modules\SMS;

use \GuzzleHttp\Client;

trait SMSManager
{
    private $urlSMS;
    private $authData;
    private $client;

    public function __construct()
    {
        $this->client = new Client();
        $this->urlSMS = env('ONEMAll_URL');
        $this->authData = [env('ONEMAll_USER'), env('ONEMAll_PASS')];
    }


}
