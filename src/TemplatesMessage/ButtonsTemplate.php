<?php

namespace CodeBot\TemplatesMessage;

use CodeBot\Element\ElementInterface;
use CodeBot\Message\MessageInterface;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ButtonsTemplate
 *
 * @author gabriel
 */
class ButtonsTemplate implements MessageInterface
{

    protected $buttons = [];
    protected $recipientId;

    public function __construct(string $recipientId)
    {
        $this->recipientId = $recipientId;
    }

    public function add(ElementInterface $element)
    {
        $this->buttons[] = $element->get();
    }

    public function message(string $messageText): array
    {
        return [
            'recipient' => [
                'id' => $this->recipientId
            ],
            'message' => [
                'attachment' => [
                    'type' => 'template',
                    'payload' => [
                        'template_type' => 'button',
                        'text' => $messageText,
                        'buttons' => $this->buttons
                    ]
                ]
            ]
        ];
    }

}
