<?php

namespace Service;

/**
 * Main site router
 *
 * @author Max Shaian
 */
class Router 
{
    /**
     * The list of registered routes.
     * Routes should be registered in router.php file.
     * 
     * @var type 
     */
    private $routes = [];
    
    /**
     * Adds a new router;
     * 
     * @param string $uri
     * @param string $data Format: ControllerName/MethodName
     * @return void
     */
    public function add(string $uri, string $data): void
    {
        $data = explode('/', $data);
        $this->routes[$uri] = [
            'controller' => $data[0],
            'method' => $data[1],
        ];
    }
    
    /**
     * Return a page view depending on current URI.
     * 
     * @return mixed
     */
    public function get()
    {     
        if ($route = $this->uriStrip()) {
            extract($this->routes[$route['uri']]);
            $params = $route['params'];
        } else {
            $controller = 'MainController';
            $method = 'error';
            $params = false;
        }
        
        $controller_name = '\\App\\Controllers\\'.ucfirst($controller);
        $content = (new $controller_name)->$method($params);
        return $content;
    }
    
    /**
     * Processes URI string to determine Controller and Method based
     * on the router list.
     * 
     * @return mixed
     */
    private function uriStrip()
    {
        //Remove first slash in Uri
        $full_uri = substr($_SERVER['REQUEST_URI'], 1);
        
        //Remove request parameters.
        if (strstr($full_uri, '?')) {
            $request_pos = strpos($full_uri, '?');
            $full_uri = substr($full_uri, 0, $request_pos);
        }
        
        //Main page case
        if ($full_uri === '') {
            return [
                'uri' => '/',
                'params' => [],
            ];
        }
        
        /*Finds appropriate route in the router list
         * and determine parameters
         */
        $uris = [];
        foreach ($this->routes as $temp_uri => $value) {
            if (preg_match("@^$temp_uri@", $full_uri, $matches)) {
                $uris[] = $temp_uri;
                $field = $matches[0];
            }
        }
        
        /**
         * Chose the most appropriate uri variant
         */
        if (count($uris) > 0) {
            $uri = max($uris);
            $params = substr($full_uri, strlen($field) + 1);
            $params = explode('/', $params);
        } else {
            return false;
        }
        
        return [
            'uri' => $uri,
            'params' => $params,
        ];
    }
}
