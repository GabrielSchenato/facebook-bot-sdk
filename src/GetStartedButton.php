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
class GetStartedButton
{

    public function add(string $postback)
    {
        return [
            'get_started' => [
                'payload' => $postback
            ]
        ];
    }

    public function remove()
    {
        return [
            'fields' => [
                'get_started'
            ]
        ];
    }

}
