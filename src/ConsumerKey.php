<?php


/*
$oauth = new OAuth("ZtHXroWKQumSeaoDYLWM","NTWwBNfQdxjWkiJlHWQJUEKZQLDpaLdc");
$oauth->setToken($request_token,$request_token_secret);
$access_token_info = $oauth->getAccessToken("https://api.discogs.com/oauth/request_token","GET");


$oauth = new GuzzleHttp\Subscriber\Oauth\Oauth1([
    'consumer_key'    => "ZtHXroWKQumSeaoDYLWM", // from Discogs developer page
    'consumer_secret' => "NTWwBNfQdxjWkiJlHWQJUEKZQLDpaLdc", // from Discogs developer page
    'token'           => $token['oauth_token'], // get this using a OAuth library
    'token_secret'    => $token['oauth_token_secret'] // get this using a OAuth library
]);
$handler = GuzzleHttp\HandlerStack::create();
$handler->push($oauth);
$client = Discogs\ClientFactory::factory([
    'handler' => $handler,
    'auth' => 'oauth'
]);*/