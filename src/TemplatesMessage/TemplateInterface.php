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
interface TemplateInterface extends MessageInterface
{

    public function add(ElementInterface $element);
}
