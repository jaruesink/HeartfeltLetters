<?php
require_once 'google/appengine/api/mail/Message.php';
use \google\appengine\api\mail\Message;
//if "email" is filled out, send email
if (isset($_POST['return_name']))
//if "email" is filled out, send email
{
    try
    {
      //send email
        $email = $_POST['email'];
        $return_name = $_POST['return_name'];
        $return_address = $_POST['return_address'];
        $recipient_name = $_POST['recipient_name'];
        $recipient_address = $_POST['recipient_address'];
        $message = $_POST['text'];
        $customize = $_POST['customize'];
        $message_content ="Email: ".$email."\nReturn Name: ".$return_name."\nReturn Address: ".$return_address."\nRecipient Name:\t".$recipient_name."\nRecipient Address:\t".$recipient_address."\nMessage:\t".$message."\nCustomizations:\t".$customize;
        $message = new Message();
        $message->setSender("djrobotfreak@gmail.com");
        $message->addTo("jaruesink@gmail.com");
        //$message->addTo("derek.wene@gmail.com");
        $message->setSubject("HEARTFELT LETTERS CONTACT: ".$return_name);
        $message->setTextBody($message_content);
        $message->send();
        echo '<a href="/">Thank you, your message has been sent. Please click this message to return to the Heartfelt Website</a>';
        } catch (InvalidArgumentException $e) {
      // ... 
          echo '<a href="/">ERROR: EMAIL NOT SENT. Please click this message to return to the Heartfelt Website to try again. </a> <br>';
          echo $e;
    }
}
else
//if "email" is not filled out, display the form
  {
  echo '
  
    <p>Something weird happened.</p> <script> setTimeout(function(){ window.location.replace("/"); }, 5000);</script>
    ';
  }
?>