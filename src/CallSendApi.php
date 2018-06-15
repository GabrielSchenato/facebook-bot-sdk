<?php

namespace CodeBot;

use GuzzleHttp\Client;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CallSendApi
 *
 * @author gabriel
 */
class CallSendApi {

    const URL = 'https://graph.facebook.com/v3.0/me/messages';
    const URL_PROFILE = 'https://graph.facebook.com/v3.0/me/messenger_profile';
        
    /**
     * @var string
     */
    private $pageAcessToken;
    
    public function __construct(string $pageAcessToken)
    {
        $this->pageAcessToken = $pageAcessToken;
    }
    
    public function make(array $message, string $url = null, $method = "POST"): string
    {
        $client = new Client();
        $url = $url ?? CallSendApi::URL;
        
        $response = $client->request($method, $url, [
            'json' => $message,
            'query' => ['access_token' => $this->pageAcessToken]
        ]);
        
        return (string)$response->getBody();
    }
}
