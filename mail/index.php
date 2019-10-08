<?php

//SANTIAGOOOOOO
//DESCOMENTE ESTAS LINEAS PARA QUE NO SE MOSTRE LOS ERRORES EM PRODUCION

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('/var/www/PHPMailer-master/src/PHPMailer.php');
include("/var/www/PHPMailer-master/src/SMTP.php");
include("/var/www/PHPMailer-master/src/Exception.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail  = new PHPMailer();

//asigna a $body el contenido del correo electrónico
$body = "<h1>Contenido del cuerpo del correo</h1><br><b>no se puede ser tan reverendo</b><br><p>esta é uma msg enviada por email alto matica mente</p><br><img src='logo.png' width='100'>"; 

// Indica que se usará SMTP para enviar el correo
$mail->IsSMTP(); 

$mail->SMTPDebug  = 2;                     
// Activar los mensajes de depuración, 
// muy útil para saber el motivo si algo sale mal
// 1 = errores y mensajes
// 2 = solo mensajes entre el servidor u la clase PHPMailer

$mail->SMTPAuth = true;
// Activar autenticación segura a traves de SMTP, necesario para gmail

$mail->SMTPSecure = "tls";
// Indica que la conexión segura se realizará mediante TLS

$mail->Host = "smtp.gmail.com";
// Asigna la dirección del servidor smtp de GMail

$mail->Port = 587;
// Asigna el puerto usado por GMail para conexion con su servidor SMTP

$mail->Username = "kevinmmti@gmail.com";  
// Indica el usuario de gmail a traves del cual se enviará el correo

$mail->Password = "SENHAAQUI";
// GMAIL password

$mail->SetFrom('kevinmmti@gmail.com', 'First Last'); 
//Asignar la dirección de correo y el nombre del contacto que aparecerá cuando llegue el correo

$mail->Subject = "Probando enviar un correo con PHPMailer y GMail"; 
//Asignar el asunto del correo

$mail->MsgHTML($body); 
//Si deseas enviar un correo con formato HTML debes descomentar la linea anterior

$mail->addAttachment('logo.png', 'imagem.png');

$mail->AddAddress("gibazjr@gmail.com", "lalal"); 
//Indica aquí la dirección que recibirá el correo que será enviado

if(!$mail->Send()) {
  echo "Error enviando correo: " . $mail->ErrorInfo;
} else {
  echo "Correo enviado!!!";
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>PHPMailer Contact Form</title>
</head>
<body>
<h1>Contact us</h1>
<?php if (empty($msg)) { ?>
    <h1>vai?</h1>
<?php } else {
    echo $msg;
} ?>
</body>
</html>