<?php
    require __DIR__ . '/PHPMailer/Exception.php';
    require __DIR__ . '/PHPMailer/PHPMailer.php';
    require __DIR__ . '/PHPMailer/SMTP.php';

    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;

    class Message{
        private $recipient = null;
        private $subject = null;
        private $text = null;
        public $status = array('code_status'=>null, 'status_description'=>'');

		public function __get($attribute) {
			return $this->$attribute;
		}

        public function __set($attribute, $value){
            $this->$attribute = $value;
        }

        public function validMessage() {
            if (!filter_var($this->recipient, FILTER_VALIDATE_EMAIL) || empty($this->subject) || empty($this->text)) {
                return false;
            }
            return true; 
        }
    }

    $message = new Message();

    $message->__set('recipient' ,$_POST['recipient-email']);
    $message->__set('subject' ,$_POST['email-subject']);
    $message->__set('text' ,$_POST['email-text']);

    print_r($message);
    echo '<br/>';

    if(!$message->validMessage()){
        echo 'A mensagem não é válida';
        header('Location: ../../index.php');
    }

    $mail = new PHPMailer;

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'your-email@mail.com';
        $mail->Password   = 'your-password';             
        $mail->SMTPSecure = 'tls';                  
        $mail->Port       = 587;
        $mail->setFrom('your-email@mail.com', 'MailSwift');
        $mail->addAddress($message->__get('recipient'));
        $mail->isHTML(true);
        $mail->Subject = $message->__get('subject');
        $mail->Body = $message->__get('text')."
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        Este e-mail foi enviado pelo aplicativo <strong>MailSwift</strong>. Portanto, não nos responsabilizamos pelo conteúdo deste e-mail.<br/>
        Por favor, não responda a este e-mail.";
        //Envia a mensagem de e-mail
        $mail->send();
        $mail->status['code_status'] = 1;
        $mail->status['status_description'] = 'E-mail enviado com sucesso!';

    } catch (Exception $e) {
        $mail->status['code_status'] = 2;
        $mail->status['status_description'] = 'Não foi possivel enviar este e-mail! Por favor, tente novamente mais tarde.<br> '.$mail->ErrorInfo;
    }

    if ($mail->status['code_status'] == 1){
        header('Location:../../confirmation.html');
    }else{
        header('Location:../../fail.html');
    }
?>

