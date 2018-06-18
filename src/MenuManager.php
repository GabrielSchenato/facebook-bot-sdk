<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace CodeBot;

/**
 * Description of MenuManager
 *
 * @author gabriel
 */
class MenuManager
{

    private $locale;
    private $composer_input_disabled;
    private $call_to_actions = [];

    function __construct(string $locale, bool $composer_input_disabled = null)
    {
        $this->locale = $locale;
        $this->composer_input_disabled = $composer_input_disabled;
    }

    public function callToAction($id, $type, $title, $parent_id, $value = null)
    {
        $this->call_to_actions[] = [
            'id' => $id,
            'type' => $type,
            'title' => $title,
            'parent_id' => $parent_id,
            'value' => $value
        ];
    }

    public function toArray()
    {

        $persistent_menu = [
            'locale' => $this->locale,
            'composer_input_disabled' => $this->composer_input_disabled,
            'call_to_actions' => $this->mountCallToAction(0)
        ];

        return [
            'persistent_menu' => [
                $persistent_menu
            ]
        ];
    }

    private function mountCallToAction($parent_id = 0)
    {
        $result = [];
        foreach ($this->call_to_actions as $action) {
            if ($action['parent_id'] === $parent_id) {
                $result[] = $this->mountAction($action);
            }
        }

        return $result;
    }

    private function mountAction($action)
    {
        $data = [
            'type' => $action['type'],
            'title' => $action['title'],
        ];

        if ($action['type'] === 'postback') {
            $data['payload'] = $action['value'];
        }

        if ($action['type'] === 'web_url') {
            $data['url'] = $action['value'];
        }

        if ($action['type'] === 'nested') {
            $data['call_to_actions'] = $this->mountCallToAction($action['id']);
        }
        return $data;
    }

}
