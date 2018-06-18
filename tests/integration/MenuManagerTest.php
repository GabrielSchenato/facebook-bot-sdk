<?php

namespace CodeBot;

use PHPUnit\Framework\TestCase;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MenuManagerTest
 *
 * @author gabriel
 */
class MenuManagerTest extends TestCase
{

    public function testMakeMenu()
    {
        $menu = new MenuManager('default');

        $call_to_actions = [
            [
                'id' => 1,
                'type' => 'nested',
                'title' => 'O que eu posso fazer?',
                'parent_id' => 0,
                'value' => null,
            ],
            [
                'id' => 2,
                'type' => 'web_url',
                'title' => 'Visite nosso site',
                'parent_id' => 0,
                'value' => 'https://www.google.com',
            ],
            [
                'id' => 3,
                'type' => 'web_url',
                'title' => 'Quer aprender php??',
                'parent_id' => 1,
                'value' => 'http://php.net',
            ],
            [
                'id' => 4,
                'type' => 'postback',
                'title' => 'Ver opções iniciais',
                'parent_id' => 1,
                'value' => 'iniciar',
            ],
        ];
        
        foreach ($call_to_actions as $action){
            $menu->callToAction($action['id'], $action['type'], $action['title'], $action['parent_id'], $action['value']);
        }
        
        
        $callSendApi = new CallSendApi('EAADPxrRz0iIBAIjYZAWgh5o3ZB7yiUhZBZBu15iXE92qJRvLLemRsIeO1wzfFdbFxwBTrfCNZAdUnS6mTX6LOT9T5LGOFUQKxHKHjZAWzUnsskTZCjHGdCZCA7JTRNC9lZB2sP3J5wSZBBhcUz1zcFd9SkfqO9e0Gc69fleWLQZB15QR4H86FWl3vrh');
        $result = $callSendApi->make($menu->toArray(), CallSendApi::URL_PROFILE);
        
        $this->assertTrue(is_string($result));
    }

}
