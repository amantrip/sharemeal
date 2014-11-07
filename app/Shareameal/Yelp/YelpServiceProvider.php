<?php namespace Shareameal\Yelp;

use Guzzle\Plugin\Oauth\OauthPlugin;
use Guzzle\Service\Client;
use Illuminate\Support\ServiceProvider;
use Config;

class YelpServiceProvider extends ServiceProvider{

    public function register(){

        $this->app->bind('yelp', function(){
            $client = new Client('http://api.yelp.com/v2/');

            $auth = new OauthPlugin([
                'consumer_key' => Config::get('yelp.consumer_key'),
                'consumer_secret' => Config::get('yelp.consumer_secret'),
                'token' => Config::get('yelp.token'),
                'token_secret' => Config::get('yelp.token_secret')
            ]);

            $client->addSubscriber($auth);
            return new YelpAPI($client);
        });

    }
}
