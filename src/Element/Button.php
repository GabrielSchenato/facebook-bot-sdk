<?php

namespace CodeBot\Element;

use CodeBot\Element\ElementInterface;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this te}mplate file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Button
 *
 * @author gabriel
 */
class Button implements ElementInterface
{

    /**
     * @var array
     */
    private $config;

    /**
     * @var string
     */
    private $value;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $type;

    public function __construct(string $type, ? string $title = null, ? string $value = null, array $config = [])
    {        
        $this->type = $type;
        $this->title = $title;
        $this->value = $value;
        $this->config = $config;
    }
    
    public function get() :array
    {
        $data = [
            'type' => $this->type
        ];
        
        if($this->title !== null){
            $data['title'] = $this->title;
        }
        if($this->type === 'web_url'){
            $data['url'] = $this->value;
        }
        if($this->type === 'postback' or $this->type === 'phone_number'){
            $data['payload'] = $this->value;
        }
        if($this->type === 'share_contents'){
            if($this->value){
                $data['share_contents'] = $this->value;
            }
            unset($this->title);
        }
        
        return array_merge($data, $this->config);
    }
}
