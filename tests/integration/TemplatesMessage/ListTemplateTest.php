<?php

namespace CodeBot\TemplatesMessage;

use PHPUnit\Framework\TestCase;
use CodeBot\Element\Product;
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
class ListTemplateTest extends TestCase
{

    public function testListaComDoisProdutos()
    {
        $button = new Button('web_url', null, 'https://angular.io');
        $product = new Product('Produto 1', 'http://www.contabilidadetoledo.com.br/wp-content/uploads/2017/11/20171123.jpg', 'Curso de angular', $button);
        
        $button = new Button('web_url', null, 'http://php.net');
        $product2 = new Product('Produto 2', 'https://mestredoadwords.com.br/wp-content/uploads/2016/12/vender-produtos.png', 'Curso de php', $button);
        
        $template = new ListTemplate(1234);
        $template->add($product);
        $template->add($product2);

        $actual = $template->message('qwe');
        
        $expected = [
            'recipient' => [
                'id' => 1234
            ],
            'message' => [
                'attachment' => [
                    'type' => 'template',
                    'payload' => [
                        'template_type' => 'list',
                        'elements' => [
                            [
                                'title' => 'Produto 1',
                                'subtitle' => 'Curso de angular',
                                'image_url' => 'http://www.contabilidadetoledo.com.br/wp-content/uploads/2017/11/20171123.jpg',
                                'default_action' => [
                                    'type' => 'web_url',
                                    'url' => 'https://angular.io'
                                ]
                            ],
                            [
                                'title' => 'Produto 2',
                                'subtitle' => 'Curso de php',
                                'image_url' => 'https://mestredoadwords.com.br/wp-content/uploads/2016/12/vender-produtos.png',
                                'default_action' => [
                                    'type' => 'web_url',
                                    'url' => 'http://php.net'
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ];

        $this->assertEquals($expected, $actual);
    }

}
