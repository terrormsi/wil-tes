<?php

defined('BASEPATH') or exit('No direct script access allowed');

use GuzzleHttp\Client as GuzzleClient;

class Auth extends CI_Model
{
    private $guzzle;

    public function __construct()
    {
        $this->guzzle = new GuzzleClient(['base_uri' => 'https://reqres.in/']);
    }

    public function verify(array $data = [])
    {
        try {
            $response = $this->guzzle->request('POST', '/api/login', [
                'form_params' => $data,
            ]);
        } catch (Exception $e) {
            return '';
        }

        return json_decode($response->getBody()->getContents());
    }
}
