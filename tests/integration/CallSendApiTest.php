<?php


namespace CodeBot;

use CodeBot\Message\Text;
use PHPUnit\Framework\TestCase;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CallSendApiTest
 *
 * @author gabriel
 */
class CallSendApiTest extends TestCase
{
    /**
     * @expectedException GuzzleHttp\Exception\ClientException
     */
    public function testMakeRequest()
    {
        $message = (new Text(1))->message('oiii');
        (new CallSendApi('2585sdfsd5'))->make($message);
    }
}
