<?php

namespace mkweb;
/**
 *  трейт синглтон для создания только одного объекта от класса который включает в себя этот трейт 
 */
trait TSingletone
{
    private static $instance;

    public static function instance()
    {
        if (self::$instance === null) {
            self::$instance = new self;
        }

        return self::$instance;
    } 
}