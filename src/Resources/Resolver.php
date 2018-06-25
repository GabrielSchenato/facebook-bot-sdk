<?php

namespace CodeBot\Resources;

use CodeBot\Bot;
use CodeBot\SenderRequest;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Resolver
 *
 * @author gabriel
 */
class Resolver
{

    private $resources = [];

    public function register(string $class)
    {
        if (!in_array($class, $this->resources)) {
            $this->resources[] = $class;
        }
    }

    public function resolver(SenderRequest $sender, Bot $bot)
    {
        foreach ($this->resources as &$resource) {
            if ($this->instance($resource, $sender, $bot)) {
                return true;
            }
        }

        return false;
    }

    private function instance(string $resource, SenderRequest $sender, Bot $bot)
    {
        $interfaces = class_implements($resource);

        if (!isset($interfaces[ResourceInterface::class])) {
            throw new Exception('class must be implements ' . ResourceInterface::class . ' interface');
        }


        $object = new $resource;
        return $object($sender, $bot);
    }

}
