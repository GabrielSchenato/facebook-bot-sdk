<?php

namespace CodeBot\TemplatesMessage;

use PHPUnit\Framework\TestCase;
use CodeBot\Element\Button;

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
class ButtonsTemplateTest extends TestCase
{

    public function testRetornoComBotaoNoFormatoArray()
    {
        $buttonsTemplate = new ButtonsTemplate(1234);
        $buttonsTemplate->add(new Button('postback', 'Que tal', 'resposta'));
        $actual = $buttonsTemplate->message('Olha um exemplo');

        $expected = [
            'recipient' => [
                'id' => 1234
            ],
            'message' => [
                'attachment' => [
                    'type' => 'template',
                    'payload' => [
                        'template_type' => 'button',
                        'text' => 'Olha um exemplo',
                        'buttons' => [
                            [
                                'type' => 'postback',
                                'title' => 'Que tal',
                                'payload' => 'resposta',
                            ]
                        ]
                    ]
                ]
            ]
        ];

        $this->assertEquals($expected, $actual);
    }

}
