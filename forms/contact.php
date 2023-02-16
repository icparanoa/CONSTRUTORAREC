<?php

require '../forms/PHPMailerAutoload.php';

$name = $_POST["name"];
$telefone = $_POST["telefone"];
$email = $_POST["email"];
$obra = $_POST["obra"];
$servico = $_POST["servico"];
$message = $_POST["message"];

$mail = new PHPMailer;

$mail->isSMTP();                        // Setar o uso do SMTP

$mail->Host = 'email-ssl.com.br';      // Servidor smtp 

$mail->SMTPAuth = true;                 // Habilita a autenticação do form

$mail->Username = 'adeilson@construtorarec.com.br';       // Conta de e-mail que realizará o envio

$mail->Password = 'R3cC0nstrutor@';       // Senha da conta de e-mail

$mail->Port = 587;                       // Porta de conexão 

$mail->From = 'adeilson@construtorarec.com.br';             // e-mail From deve ser o mesmo de "username" (contadeEmail)

$mail->FromName = 'Contato Site';                 // Nome que será exibido ao receber a mensagem. 

$mail->addAddress('contato@construtorarec.com.br', 'Contato'); // Destinatário 


$mail->isHTML(true);                                  // Set email format to HTML


$mail->Subject = 'Formulario de Contato do Site';  //Assunto da Mensagem

$mail->Body    =  "<p>Contato Site</p>"
                . "<p><b>Nome: </b> $name\n</p>"
                . "<p><b>Email: </b> $email\n</p>"
                . "<p><b>Telefone: </b> $obra\n</p>"
                . "<p><b>Endereço da Obra: </b> $telefone\n</p>"
                . "<p><b>Descrição do Serviço: </b> $servico\n</p>"
                . "<b>Mensagem: </b> $message\n";

//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';



if (!$mail->send()) {

    echo 'Message could not be sent.';

    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {

    header("Location: https://www.construtorarec.com.br/obrigado.html");
}
