<?php

class Router
{

    private $routes = array();
    private $uri;
	
	
    public function __construct($uri)
    {
        $this->uri = $uri;
    }


    public function add($pattern, $callback)
    {
        $this->routes[$pattern] = $callback;
    }
    
    public function run()
    {
        foreach ($this->routes as $pattern => $callback)
        {
            if (preg_match('#^' . $pattern . '$#', $this->uri->getCleanedURI(), $params) === 1)
            {
                array_shift($params);
                return call_user_func_array($callback, array_values($params));
            }
			else
			{
				require 'View/404.php';
			}
        }
    }
}
