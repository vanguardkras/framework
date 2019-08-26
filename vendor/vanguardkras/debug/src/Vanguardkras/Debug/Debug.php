<?php

namespace Vanguardkras\Debug;

/**
 * Class debug allows to use a simple function debug() anywhere in your code
 * to analyze any variable or data instead of using not very convenient 
 * functions print_r or var_dump()
 *
 * @author mshaian
 */
class Debug 
{
    /**
     * Variable for debug.
     * 
     * @var any 
     */
    protected $var;
    
    public function __construct($var) 
    {
        $this->var = $var;
    }
    
    /**
     * Shows debug information on your screen.
     * 
     * @return void
     */
    public function handle(): void
    {
        echo static::wrapDebugDiv(static::process($this->var));
    }
    
    /**
     * Returns processing method.
     * 
     * @param any $value
     * @return string
     */
    protected static function getMethod($value): string
    {
        $method = explode(' ', gettype($value));
        return ucfirst(trim($method[0]));
    }
    
    /**
     * Main function for processing any value.
     * 
     * @param any $value
     * @param int $blanks number of spaces
     * @return type
     */
    protected static function process($value, int $blanks = 0): string
    {
        $blank = str_repeat(' ', $blanks);
        $method = static::getMethod($value);
        $res = $blank.static::wrapBasic('type').static::wrapType($method).PHP_EOL;
        $res .= $blank.static::wrapBasic('value');
        $method = 'proc'.$method;
        $res .= static::$method($value, $blanks);
        return $res;
    }
    
    /**
     * Array processor.
     * 
     * @param array $value
     * @param int $blanks
     * @return string
     */
    protected static function procArray(array $value, int $blanks = 0): string
    {
        $blanks += 4;
        $res = '';
        foreach ($value as $key => $val) {
            $res .= PHP_EOL;
            $res .= str_repeat(' ', $blanks).static::wrapIndex($key) . ' => ' . PHP_EOL;
            $res .= static::process($val, $blanks + 4);
            $res .= PHP_EOL;
        }
        return $res;
    }

    /**
     * Boolean processor.
     * 
     * @param bool $value
     * @return string
     */
    protected static function procBoolean(bool $value): string
    {
        $res = $value ? 'true' : 'false';
        return static::wrapValue($res);
    }
    
    /**
     * Float processor.
     * 
     * @param float $value
     * @return string
     */
    protected static function procDouble(float $value): string
    {
        return static::wrapValue(strval($value));
    }
    
    /**
     * Integer processor.
     * 
     * @param int $value
     * @return string
     */
    protected static function procInteger(int $value): string
    {
        return static::wrapValue(strval($value));
    }
    
    /**
     * NULL processor.
     * 
     * @param type $value
     * @return string
     */
    protected static function procNULL($value): string
    {
        return static::wrapValue('NULL');
    }
    
    /**
     * Objects processor.
     * 
     * @param object $value
     * @param int $blanks
     * @return string
     */
    protected static function procObject(object $value, $blanks = 0): string
    {
        $blanks +=4;
        
        $class = get_class($value);
        $properties = get_object_vars($value);
        $methods = get_class_methods($value);
        
        $res = PHP_EOL;
        $res .= str_repeat(' ', $blanks).static::wrapBasic('Class Name');
        $res .= static::wrapValue($class).PHP_EOL;
        $res .= str_repeat(' ', $blanks).static::wrapBasic('methods').PHP_EOL;
        foreach ($methods as $method) {
            $res .= str_repeat(' ', $blanks + 8).static::wrapValue($method.'()').PHP_EOL;
        }
        
        if (count($properties) > 0) {
            $res .= str_repeat(' ', $blanks).static::wrapBasic('properties').PHP_EOL;
            $res_prop = static::process($properties, $blanks + 4);
            $res .= preg_replace('@^\s*(<span.+</span>\s*){3}.*\n@U', '', $res_prop, 1);
        }
        
        return $res;
    }
    
    /**
     * Resources processor.
     * 
     * @param type $value
     * @return string
     */
    protected static function procResource($value): string
    {
        return static::wrapValue(get_resource_type($value));
    }
    
    /**
     * String processor.
     * 
     * @param string $value
     * @return string
     */
    protected static function procString(string $value): string
    {
        return static::wrapValue(htmlspecialchars($value));
    }
    
    /**
     * Unknown type processor.
     * 
     * @param any $value
     * @return string
     */
    protected static function procUnknown($value): string
    {
        return '';
    }
    
    /**
     * Shows basic hints.
     * 
     * @param string $value
     * @return string
     */
    protected static function wrapBasic(string $value): string
    {
        return '<span style="color: Salmon;">['.$value.']: </span>';
    }
    
    /**
     * Shows debug block anywhere on your page.
     * 
     * @param string $value
     * @return string
     */
    protected static function wrapDebugDiv(string $value): string
    {
        return '<div style="background-color: black; color: white; padding: '
        . '5px; font-size: 14px;"><pre style="font-family: Consolas;">'.$value.'</pre></div>';
    }
    
    /**
     * Shows index.
     * 
     * @param string $value
     * @return string
     */
    protected static function wrapIndex(string $value): string
    {
        return '<span style="color: Yellow;">['.$value.']: </span>';
    }
    
    /**
     * Shows type.
     * 
     * @param string $value
     * @return string
     */
    protected static function wrapType(string $value): string
    {
        return '<span style="color: LightGreen;">'.$value.'</span>';
    }
    
    /**
     * Shows value.
     * 
     * @param string $value
     * @return string
     */
    protected static function wrapValue(string $value): string
    {
        return '<span style="color: white;">'.$value.'</span>';
    }
}
