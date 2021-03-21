<?php
    $nome = utf8_encode($_POST['nome']);
    $email = utf8_encode($_POST['email']);
    $mensagem = utf8_encode($_POST['mensagem']);

    require 'PHPMailer/PHPMailerAutoload.php';

    $mail = new PHPMailer;
    $mail->isSMTP();

    $mail->Host = "smtp.gmail.com";
    $mail->Port= "587";
    $mail->SMTPSecure = "tls";
    $mail->SMTPAuth= "true";
    $mail->Username= "";
    $mail->Password="";

    $mail->setFrom($mail->Username,"Thiago Jolvino");
    $mail->addAddress('thiagojolvino@gmail.com');
    $mail->Subject = "Orçamento de Layout";
    
    $conteudo_email = "
    Você recebeu uma mensagem de $nome ($email): 
    Mensagem:
    $mensagem
    ";

    
    $mail->Body = $conteudo_email;

    if ($mail->send()){
        echo "E-mail enviado com sucesso!";
    } else {
        echo "Falha ao enviar o email: ". $mail->ErrorInfo;
    }