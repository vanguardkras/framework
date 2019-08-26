<?php

namespace Service;

use App\Orders;

/**
 * Class for purchasing products online.
 *
 * @author Maksim Shaian
 */
class Purchase 
{
    /**
     * an App\Orders instance
     * 
     * @var App\Orders 
     */
    private $order;
    
    public function __construct() 
    {
        $this->order = new Orders;
    }
    
    /**
     * Checks if a purchase was successful.
     * 
     * @return bool
     */
    public function check(): bool
    {
        if (!isset($_POST['label'])) {
            return false;
        } 
        
        if ($_POST['unaccepted'] == 'true') {
                return false;
        }
        
        $price = $this->order->getByName($_POST['label'])['price'];
        
        if ($_POST['withdraw_amount'] < 0.7 * (new YandexMoney)->USDtoRub($price)) {
            return false;
        }
        
        return true;
    }
    
    /**
     * Process an order by sending a notification email and an order to the
     * orderer mail.
     */
    public function sendEmail()
    {
        $mail = new Mail;
        $order = $this->order->getByName($_POST['label']);
        
        $subject = 'mshaian.com Purchase';
        
        $message = '<h3>Operation: ' . $_POST['operation_id'] . '</h3>';
        $message .= '<p>Thanks for purchasing ' . $_POST['label']
                . ' The ordered file is attached to this message.</p>';
        $message .= '<p>If you have any questions, '
                . 'use the contact form on our website: '
                . '<a href="https://mshaian.com">mshaian.com</a></p>';
        
        $service_message = 'Purchase: ' . $_POST['label'] . '<br>';
        $service_message .= 'Amount: ' . $_POST['amount'] . '<br>';
        $service_message .= 'Email: ' . $_POST['email'] . '<br>';
        $service_message .= 'Operation ID: ' . $_POST['operation_id'] . '<br>';
        
        $email = $_POST['email'];
        
        $attachment = 'products/'.$order['product_id'].'/'.$order['file_link'];
        
        $mail->sendEmail($subject, $message, $email, $attachment);
        $mail->sendNotification($service_message);
        
    }
}
