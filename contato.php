    <html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
<?php
    /*AQUI COMEÇA O ENVIO DE EMAIL*/
        require 'PHPMailer-master/PHPMailerAutoload.php';    
        $nome  = $_POST['nome'];
        $empresa  = $_POST['empresa'];
        $email = $_POST['email'];
        $fone  = $_POST['fone'];    
        $mensagem  = $_POST['mensagem'];
        $assunto='Fale Conosco';
        
        $body = $mensagem;

        $mail = new PHPMailer;

        $mail-> isSMTP();
        $mail->Host       = 'smtp.gmail.com';               // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                           // Enable SMTP authentication
        $mail->Username   = 'hc.natan@gmail.com'; // SMTP username
        $mail->Password   = 'Apollo07';                 // SMTP password
        $mail->SMTPSecure = 'tls';                          // Enable TLS encryption, `ssl` also accepted
        $mailvPort       = 587;   
        $mail->CharSet    = 'UTF-8';                        // TCP port to connect to
        $mail->setFrom($email);
        $mail->addAddress('hc.natan@gmail.com');       // Name is optional
        $mail->isHTML(true);  
        $mail->Subject = $assunto;
        //$mail->Body  = $html;
        $mail->msgHtml('REMETENTE: ' . $nome . ' (' .$email .')'  . '<br />' . '<br />' .  $body );

        $mail->smtpConnect([
        'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
                ]
        ]);


        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo '
            <script language="JavaScript"> 
            window.location="index.html"; 
            </script>'; 
        }
    ?>
</body>
</html>