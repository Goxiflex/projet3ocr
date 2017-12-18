<?php


class autoloader {
    
    static function register(){
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    static function autoload($class){

        self::requireFile('Model/Classes/' . $class . '.php');
		self::requireFile('Controller/Classes/' . $class . '.php');
		self::requireFile('View/Classes/' . $class . '.php');


    }
    
    static function requireFile($filename)
    {
        if (false === file_exists($filename)) {
			printf(" Non je n'ai pas trouvé %s !", $filename);
            return false;
        }
        printf(" oui %s trouvé on continue !", $filename);
        require $filename;
        return true;
    }
}