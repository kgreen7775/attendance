<?php 

require 'vendor/autoload.php';

class sendemail
{
    public static function sendmail($to, $subject, $content)
    {
       // $key = '';

        $email = new SendGrid\Mail\Mail();

        $email ->setFrom('kgreen7775@gmail.com','Kadeem Green');
        $email->setSubject($subject);
        $email->addTo($to);
        //$email->addContent('text/html',$content); // is ideal for rendering html content within emailas intended 
        $email->addContent('text/plain',$content); //is ideal for sending regular text like sentences and paragraphs 

        $sendgrid = new \SendGrid($key);

        try
        {
            $response = $sendgrid->send($email);
            return $response;
        }
            catch(Exception $e)
            {
                echo 'Email exception Caught:'.$e->getMessage().'\n';
                return false;
            }

    }
}

?>