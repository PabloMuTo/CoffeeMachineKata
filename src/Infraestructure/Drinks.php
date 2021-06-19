<?php

namespace Src\CoffeeMachine\Infraestructure;

class Drinks {

    /**
     * Drinks array repository
     * static function
     * array positions. uid (unique identifier), name (string), price (float)
     * 
     * @return array drinks array
     */
    public static function get() : array
    {
        return [
            [
                'uid'   => 1,
                'name'  => 'tea',
                'price' => 0.4
            ],
            [
                'uid'   => 2,
                'name'  => 'coffee',
                'price' => 0.5
            ],
            [
                'uid'   => 3,
                'name'  => 'chocolate',
                'price' => 0.6
            ]
        ];
    }
}