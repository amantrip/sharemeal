<?php namespace Shareameal\Yelp;

use Guzzle\Service\Client;

class YelpAPI{

    protected $client;

    public function __construct(Client $client){

        $this->client = $client;

    }

    public function search($query){
        $response = $this->client->get($query)->send();

        return $response->json();
    }
}