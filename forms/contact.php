<?php

require '../forms/PHPMailerAutoload.php';

$name = $_POST["name"];
$email = $_POST["email"];
$telefone = $_POST["telefone"];
$message = $_POST["message"];

$mail = new PHPMailer;

$mail->isSMTP();                        // Setar o uso do SMTP

$mail->Host = 'email-ssl.com.br';      // Servidor smtp 

$mail->SMTPAuth = true;                 // Habilita a autenticação do form

$mail->Username = 'henrique.adm@..............com.br';       // Conta de e-mail que realizará o envio

$mail->Password = '...........';       // Senha da conta de e-mail

$mail->Port = 587;                       // Porta de conexão 

$mail->From = 'henrique.adm@............com.br';             // e-mail From deve ser o mesmo de "username" (contadeEmail)

$mail->FromName = 'Contato Site';                 // Nome que será exibido ao receber a mensagem. 

$mail->addAddress('contato@............com.br', 'Contato'); // Destinatário 


$mail->isHTML(true);                                  // Set email format to HTML


$mail->Subject = 'Formulario de Contato do Site';  //Assunto da Mensagem

$mail->Body    =  "<p>Contato Site</p>"
                . "<p><b>Nome: </b> $name\n</p>"
                . "<p><b>Email: </b> $email\n</p>"
                . "<p><b>Telefone: </b> $telefone\n</p>"
                . "<b>Mensagem: </b> $message\n"; // Corpo da mensagem

//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';



if (!$mail->send()) {

    echo 'Message could not be sent.';

    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {

    header("Location: https://www.rokalucoberturas.com.br/obrigado.html");
}
