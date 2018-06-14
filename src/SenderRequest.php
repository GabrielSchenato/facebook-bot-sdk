<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace CodeBot;

/**
 * Description of SenderRequest
 *
 * @author gabriel
 */
class SenderRequest
{

    private $event;

    public function __construct()
    {
        $event = file_get_contents('php://input');
        $event = json_decode($event, true, 512, JSON_BIGINT_AS_STRING);
        $this->event = $event['entry'][0]['messaging'][0];
    }

    public function getSenderId()
    {
        return $this->event['sender']['id'] ?? null;
    }

    public function getMessage()
    {
        return $this->event['message']['text'] ?? null;
    }

    public function getPostBack()
    {
        if (empty($this->event['postback'])) {
            return null;
        }
        if (is_array($this->event['postback']) and !empty($this->event['postback']['payload'])) {
            $this->event['postback']['payload'];
        }
        return $this->event['postback'];
    }

}
