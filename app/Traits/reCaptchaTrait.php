<?php

namespace App\Traits;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rules\In;


trait reCaptchaTrait
{
    /**
     * @param $token
     * @return mixed
     */
    public function validateCaptchaResponse()
    {
        $token = Input::get('g-recaptcha-response');
        $client = new Client();
        $response = $client->post('https://www.google.com/recaptcha/api/siteverify', [
            'form_params' => array(
                'secret' => env('RE_CAPTCHA_SECRET'),
                'response' => $token
            )
        ]);
        $result = json_decode($response->getBody()->getContents());

        return $result->success? 1 : null;
    }
}