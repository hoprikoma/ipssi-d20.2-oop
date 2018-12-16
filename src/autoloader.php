<?php
class autoloader
{
    static function autoload($class_name)
    {
        require 'src/'.$class_name.'.php';
    }
    static function register()
    {
        spl_autoload_register(array(__CLASS__,'autoload'));
    }
}