<?php

namespace CodeBot\Message;

use PHPUnit\Framework\TestCase;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TextTest
 *
 * @author gabriel
 */
class TextTest extends TestCase{
    public function testRetornaUmArray()
    {
        $actual = (new Text(1))->message('oiii');
        $expected = [
           'recipient' => [
               'id' => 1
           ],
            'message' => [
                'text' => 'oiii',
                'metadata' => 'DEVELOPER_DEFINED_METADATA'
            ]
        ];
        $this->assertEquals($actual, $expected);
    }
}
