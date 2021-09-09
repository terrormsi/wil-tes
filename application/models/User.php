<?php

defined('BASEPATH') or exit('No direct script access allowed');

use GuzzleHttp\Client as GuzzleClient;

class User extends CI_Model
{
    private $guzzle;

    public function __construct()
    {
        $this->guzzle = new GuzzleClient(['base_uri' => 'https://reqres.in/']);
    }

    public function getUserList(string $page = '1')
    {
        try {
            $response = $this->guzzle->request('GET', "/api/users?page={$page}");
        } catch (Exception $e) {
            return '';
        }

        return json_decode($response->getBody()->getContents(), true);
    }

    public function register(array $data = [])
    {
        try {
            $response = $this->guzzle->request('POST', '/api/register', [
                'form_params' => $data,
            ]);
        } catch (Exception $e) {
            return '';
        }

        return json_decode($response->getBody()->getContents());
    }

    public function insert(array $data = [])
    {
        try {
            $response = $this->guzzle->request('POST', '/api/users', [
                'form_params' => $data,
            ]);
        } catch (Exception $e) {
            return '';
        }

        return json_decode($response->getBody()->getContents());
    }

    public function update(array $data = [])
    {
        try {
            $response = $this->guzzle->request('PUT', "/api/users/{$data['id']}", [
                'form_params' => $data,
            ]);
        } catch (Exception $e) {
            return '';
        }

        return json_decode($response->getBody()->getContents());
    }

    public function drop(string $uid = '')
    {
        try {
            $response = $this->guzzle->request('DELETE', "/api/users/{$uid}");
        } catch (Exception $e) {
            return '';
        }

        return $response->getStatusCode();
    }
}
