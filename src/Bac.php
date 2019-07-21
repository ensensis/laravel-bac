<?php

namespace Manfredjb\LaravelBac;

use GuzzleHttp\Client;

class Bac
{
    public function checkout(Authorization $authorization, array $customFields = []){
        $authorizationFields = array_merge($authorization->toFields(), $customFields);
        $client = new Client();
        $response = $client->request('POST', $this->getAuthAction(), [
            'form_params' => $authorizationFields
        ]);

        return Transaction::createFromResponse($response);
    }

    public function getAuthAction(){
        return config('bac.gateway');
    }
}