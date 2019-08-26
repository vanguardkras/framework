<?php

namespace App\Controllers;

/**
 * The main view controller.
 *
 * @author Max Shaian
 */
abstract class Controller 
{
    /**
     * The name of your pages layout. You can change it in daughter classes.
     * 
     * @var string 
     */
    protected $layout = 'main_layout';
    protected $description = 'Shaian developer web source';
    protected $keywords = 'monitorting,snmp,php,apache,mysql,server,articles';
    
    /**
     * Error page view.
     * 
     * @return mixed
     */
    public function error()
    {
        return $this->view('error');
    }
    
    /**
     * Builds pagination string.
     * 
     * @return string
     */
    protected static function paginator(int $total): string
    {
        $page = $_GET['page'] ?? '1';
        $ceil = ceil($total / setting('per_page'));
        
        $result = '';
        
        if ($page > 1) {
            $result .= '<a href="?page='.($page - 1).'">Previous</a>';
        }
        
        if ($page < $ceil || 1) {
            $result .= ' <a href="?page='.($page + 1).'">Next</a>';
        }
        
        return $result;
    }
    
    /**
     * Builds page from the template and gives to the template the parameters
     * array.
     * 
     * @param string $template
     * @param array $parameters
     */
    protected function view(string $template, array $parameters = [])
    {
        extract($parameters);
        
        $title = $title ?? '';
        $description = $description ?? $this->description;
        $keywords = $keywords ?? $this->keywords;
        
        ob_start();
        include(static::templateFile($template));
        $content = ob_get_contents();
        ob_clean();
        
        include(static::templateFile($this->layout));
    }
    
    /**
     * Determines a template file based on its name.
     * 
     * @param string $template_name
     * @return string
     */
    protected static function templateFile(string $template_name): string
    {
        $template_name = str_replace('/', DIRECTORY_SEPARATOR, $template_name);
        $template_name = str_replace('.', DIRECTORY_SEPARATOR, $template_name);
        return 'views'.DIRECTORY_SEPARATOR.$template_name.'.php';
    }
}
