<?php

namespace Service;

/**
 * Class for processing payments
 *
 * @author Maxim Shaian
 */
class YandexMoney 
{
    /**
     * Default yandex money action.
     * 
     * @var string 
     */
    private $action = 'https://money.yandex.ru/quickpay/confirm.xml';
    
    /**
     * Current purchase name. It will be shown to a client.
     * 
     * @var string 
     */
    private $targets;
    
    /**
     * Purchase label. Will be send to a server.
     * 
     * @var type 
     */
    private $label;
            
    private $need_fio = false;
    private $need_email = false;
    private $need_phone = false;
    private $need_address = false;
    
    /**
     * Returns a purchase form that can be used to input on your site.
     * 
     * @param numeric $value
     * @param string $button_name
     * @return type
     */
    public function purchaseForm($value, string $button_name = 'Purchase')
    {
        return '<form method="POST" action="'.$this->action.'">    
            <input type="hidden" name="receiver" value="'.setting('ya_wallet').'">   
            <input type="hidden" name="label" value="'.$this->label.'">    
            <input type="hidden" name="quickpay-form" value="donate">    
            <input type="hidden" name="targets" value="'.$this->targets.'">    
            <input type="hidden" name="sum" value="'.$value.'" data-type="number">
            <input type="hidden" name="need-fio" value="'.$this->need_fio.'"> 
            <input type="hidden" name="need-email" value="'.$this->need_email.'">    
            <input type="hidden" name="need-phone" value="'.$this->need_phone.'">    
            <input type="hidden" name="need-address" value="'.$this->need_address.'">       
            <input type="hidden" name="paymentType" value="AC">  
            <input type="submit" class="special" value="'.$button_name.'">
        </form>';
    }
    
    /**
     * Set a particular propery dinamically.
     * Use setProperty to change its value.
     * 
     * Or needName - to change need parameters.
     * 
     * @param type $name
     * @param type $value
     */
    public function __call($name, $value): void
    {
        if (substr($name, 0, 4) === 'need') {
            $property = 'need_'.strtolower(substr($name, 4));
            $this->$property = true;
        } elseif (substr($name, 0, 3) === 'set') {
            $property = strtolower(substr($name, 3));
            $this->$property = $value[0];
        }
    }
    
    /**
     * Converts US Dollars to Rubbles according to the current course.
     * 
     * @param int $usd
     * @return type
     */
    public function USDtoRub(int $usd): int
    {
        $cache = 'cache/dollar_course';
        $status = true;
        $current_time = time();
        
        if (file_exists($cache)) {
            $data = json_decode(file_get_contents($cache), true);
            if ($current_time - $data['timestamp'] > 86400) {
                $status = false;
            }
        } else {
            $status = false;
        }
        
        if (!$status) {
            $source = 'https://www.cbr-xml-daily.ru/daily_json.js';
            $currencies = json_decode(file_get_contents($source), true);
            $course = $currencies['Valute']['USD']['Value'];
            $new_data = ['timestamp' => $current_time, 'course' => $course];
            file_put_contents($cache, json_encode($new_data));
        } else {
            $course = $data['course'];
        }
        
        return $usd * $course;
    }
}
