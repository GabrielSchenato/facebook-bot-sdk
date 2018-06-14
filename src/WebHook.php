<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace CodeBot;

/**
 * Description of WebHook
 *
 * @author gabriel
 */
class WebHook
{

    public function check(string $token)
    {
        $hubMode = filter_input(INPUT_GET, 'hub_mode');
        $hubVerifyToken = filter_input(INPUT_GET, 'hub_verify_token');

        if ($hubMode === 'subscribe' and $hubVerifyToken === $token) {
            return filter_input(INPUT_GET, 'hub_challenge');
        }
        return false;
    }

}
