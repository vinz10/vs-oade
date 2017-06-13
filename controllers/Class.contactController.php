<?php
/**
 *
 * Class contactController
 *
 */
class contactController extends Controller {
    
    /**
	 * @method contact()
	 * @desc Method that controls the page 'contact.php'
	 */
    function contact() {}

    /**
     * @method contact()
     * @desc Method that controls the page 'confirmationmessage.php'
     */
    function confirmationmessage() {}

    /**
     * @method notsend()
     * @desc Method that controls the page 'notsend.php'
     */
    function notsend() {}

    /**
     * @method cancel()
     * @desc Method that cancel the contact form
     */
    function cancel() {
        $this->redirect('', '');
    }

    /**
     * @method mailerPHP()
     * @desc Method that send the form to the admin
     */
    function mailerPHP() {

        //Get data posted by the form
        $firstname = (isset($_POST['firstname'])) ? $this->Rec($_POST['firstname']) : '';
        $lastname = (isset($_POST['lastname'])) ? $this->Rec($_POST['lastname']) : '';;
        $mailTo = (isset($_POST['mail'])) ? $this->Rec($_POST['mail']) : '';;
        $message = (isset($_POST['message'])) ? $this->Rec($_POST['message']) : '';;
        require 'PHPMailler/PHPMailerAutoload.php';

        // New instance
        $mail = new PHPMailer;
        
        // Configuration SMTP
        $mail->isSMTP();
        $mail->CharSet = 'UTF-8';
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'ribcruz.daisy@gmail.com';
        $mail->Password = 'ribeiro94';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('ribcruz.daisy@gmail.com', 'CAS Montana - Contact');
        // Add a recipient
        $mail->addAddress($mailTo, $firstname);
        $mail->addBCC('ribcruz.daisy@gmail.com');

        // Set email format to HTML
        $mail->isHTML(true);

        $mail->Subject = COPY_MESSAGE;
        $mail->MailHeader = "OK";
        $mail->Body = $message;

        // Check if the mail was sent
        if (!$mail->send()) {
            $this->redirect('contact', 'notsend');
        } else {
            $this->redirect('contact', 'confirmationmessage');
        }
    }

    /**
     * @method cancel()
     * @desc Method that manage the special char
     * @return Text
     */
    function Rec($text)
    {
        $text = htmlspecialchars(trim($text), ENT_QUOTES);
        if (1 === get_magic_quotes_gpc()) {
            $text = stripslashes($text);
        }

        $text = nl2br($text);
        return $text;
    }
}
?>