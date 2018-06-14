<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace CodeBot\Message;

/**
 *
 * @author gabriel
 */
interface MessageInterface {

    public function __construct(string $recipientId);

    public function message(string $messageText): array;
}
