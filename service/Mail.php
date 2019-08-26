<?php

namespace Service;

use PHPMailer\PHPMailer\PHPMailer;

/**
 * Class for managing Mail notifications
 *
 * @author Max Shaian
 */
class Mail 
{
    /**
     * An instance of PHPMailer class
     * 
     * @var PHPMailer\PHPMailer\PHPMailer 
     */
    private $mailer;
    
    public function __construct()
    {
        $this->mailer = new PHPMailer;
        //$this->mailer->SMTPDebug = 3; 
        $this->mailer->CharSet = 'UTF-8';
        $this->mailer->isSMTP();
        $this->mailer->Host = setting('mail_host');
        $this->mailer->SMTPAuth = true;
        $this->mailer->Username = setting('mail_user');
        $this->mailer->Password = setting('mail_pass');
        $this->mailer->SMTPSecure = setting('mail_secure');
        $this->mailer->Port = setting('mail_port');
        $this->mailer->setFrom(setting('notify_email'), setting('notify_app_name'));
        $this->mailer->addReplyTo(setting('notify_email'), setting('notify_app_name'));
        $this->mailer->isHTML(true);
    }
    
    /**
     * Sends an Email notification to admin.
     * 
     * @param string $message
     */
    public function sendNotification(string $message): void
    {   
        $this->sendEmail(
                setting('notify_app_name') . ' notification.',
                $message,
                setting('notify_email')
                );
    }
    
    /**
     * Sends a custom email.
     * 
     * @param string $subject
     * @param string $body
     * @param mixed $email It can be an email string or an array of emails.
     */
    public function sendEmail(
            string $subject, 
            string $body, 
            $email, 
            $attachment = false
            ): void
    {
        $email = is_array($email) ? $email : [0 => $email];
        
        foreach ($email as $em) {
            if ($address = filter_var($em, FILTER_VALIDATE_EMAIL)) {
                $this->mailer->addAddress($address);
            }
        }
        
        if ($attachment) {
            $this->mailer->addAttachment($attachment);
        }
        
        $this->mailer->Subject = $subject;
        $this->mailer->Body = $body;
        $this->mailer->send();
        $this->mailer->clearAddresses();
        $this->mailer->clearAttachments();
        $this->mailer->clearAllRecipients();
        $this->mailer->clearCCs();
    }
}
