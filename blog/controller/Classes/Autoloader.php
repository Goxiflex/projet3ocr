<?php


class autoloader {
    
    static function register(){
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    static function autoload($class){

        self::requireFile('model/Classes/' . $class . '.php');
		self::requireFile('controller/Classes/' . $class . '.php');
		self::requireFile('view/Classes/' . $class . '.php');


    }
    
    static function requireFile($filename)
    {
        if (false === file_exists($filename)) {
            return false;
        }
        require $filename;
        return true;
    }
}