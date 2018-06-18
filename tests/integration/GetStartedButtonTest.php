<?php

namespace CodeBot;

use PHPUnit\Framework\TestCase;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GetStartedButtonTest
 *
 * @author gabriel
 */
class GetStartedButtonTest extends TestCase
{
    public function testAddGetStartedButton()
    {
        $data = (new GetStartedButton())->add('iniciar');
        $callSendApi = new CallSendApi('EAADPxrRz0iIBAIjYZAWgh5o3ZB7yiUhZBZBu15iXE92qJRvLLemRsIeO1wzfFdbFxwBTrfCNZAdUnS6mTX6LOT9T5LGOFUQKxHKHjZAWzUnsskTZCjHGdCZCA7JTRNC9lZB2sP3J5wSZBBhcUz1zcFd9SkfqO9e0Gc69fleWLQZB15QR4H86FWl3vrh');
        $result = $callSendApi->make($data, CallSendApi::URL_PROFILE);

        $this->assertTrue(is_string($result));
    }
    
    public function testRemoveGetStartedButton()
    {
        $data = (new GetStartedButton())->remove();
        $callSendApi = new CallSendApi('PAGE_ACCESS_TOKEN');
        $result = $callSendApi->make($data, CallSendApi::URL_PROFILE, 'DELETE');

        $this->assertTrue(is_string($result));
    }

}
