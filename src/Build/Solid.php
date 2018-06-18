<?php

namespace CodeBot\Build;

use CodeBot\Bot;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Solid
 *
 * @author gabriel
 */
class Solid
{

    private static $instance;

    private function __construct()
    {
        
    }

    private function __clone()
    {
        
    }

    public static function factory()
    {
        if (self::$instance === null) {
            self::$instance = new Bot;
        }
        return self::$instance;
    }

    public static function __callStatic($name, $arguments)
    {
        call_user_func_array([self::$instance, $name], $arguments);
    }

}
