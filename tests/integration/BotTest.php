<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace CodeBot;

use CodeBot\Build\Solid;
use PHPUnit\Framework\TestCase;

/**
 * Description of BotTest
 *
 * @author gabriel
 */
class BotTest extends TestCase
{
    private $pageAccessToken = 'EAADPxrRz0iIBAIjYZAWgh5o3ZB7yiUhZBZBu15iXE92qJRvLLemRsIeO1wzfFdbFxwBTrfCNZAdUnS6mTX6LOT9T5LGOFUQKxHKHjZAWzUnsskTZCjHGdCZCA7JTRNC9lZB2sP3J5wSZBBhcUz1zcFd9SkfqO9e0Gc69fleWLQZB15QR4H86FWl3vrh';

    public function testAddMenu()
    {
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
        $bot = Solid::factory();
        Solid::setPageAccessToken($this->pageAccessToken);
        $bot->addMenu('default', false, $call_to_actions);
        
        $this->AssertTrue(true);
    }

    public function testRemoveMenu()
    {
        $bot = Solid::factory();
        Solid::setPageAccessToken($this->pageAccessToken);
        $bot->removeMenu();
        
        $this->AssertTrue(true);
    }
    
    public function testAddGetStartedButton()
    {
        $bot = Solid::factory();
        Solid::setPageAccessToken($this->pageAccessToken);
        $bot->addGetStartedButton('iniciar');
        
        $this->AssertTrue(true);
    }
    
    public function testRemoveGetStartedButton()
    {
        $bot = Solid::factory();
        Solid::setPageAccessToken($this->pageAccessToken);
        $bot->removeGetStartedButton();
        
        $this->AssertTrue(true);
    }

}
