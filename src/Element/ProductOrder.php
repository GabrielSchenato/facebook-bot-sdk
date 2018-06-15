<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace CodeBot\Element;

/**
 * Description of ProductOrder
 *
 * @author gabriel
 */
class ProductOrder implements ElementInterface
{
    private $title;
    private $subtitle;
    private $quantity;
    private $price;
    private $currency;
    private $image_url;    
    
    function __construct(string $title, string $subtitle, ? int $quantity = null , float $price = 0, ? string $currency = null, string $image_url = null)
    {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->quantity = $quantity;
        $this->price = $price;
        $this->currency = $currency;
        $this->image_url = $image_url;
    }

    public function get(): array
    {
        $result['title'] = $this->title;
        $result['subtitle'] = $this->subtitle;
        $result['price'] = $this->price;
        
        if($this->quantity !== null){
            $result['quantity'] = $this->quantity;
        }
        
        if($this->currency !== null){
            $result['currency'] = $this->currency;
        }
        
        if($this->image_url !== null){
            $result['image_url'] = $this->image_url;
        }
        
        return $result;
    }

}
