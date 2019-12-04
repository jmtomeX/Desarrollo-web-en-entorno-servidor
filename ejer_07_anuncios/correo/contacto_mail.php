<?php 
// esta línea llama al paquete como en java, da error si no se usa.
use PHPMailer\PHPMailer\PHPMailer;
require('./PHPMailer-master/src/PHPMailer.php');
require('./PHPMailer-master/src/SMTP.php');
//require('./PHPMailer-master/class.phpmailer.php');
//require('./PHPMailer-master/class.smtp.php');
// https://domitienda.com/como-enviar-correo-smtp-autenticado-con-php/

$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];

$mail = new PHPMailer();
$body = '«Hola es una prueba»';
$body .= '»ojalá funcione»';

//El primer valor es el que se usa para selecionar la ruta del archivo. El segundo indica el nombre escogido para mostrar el archivo adjunto al destinatario.
$mail->AddAttachment('../img/habit.jpg', 'habit.jpg');

$mail->IsSMTP();

/* Sustituye (ServidorDeCorreoSMTP)  por el host de tu servidor de correo SMTP*/
$mail->Host = 'mail.muchoruidoypocasluces.com';

/* Sustituye  ( CuentaDeEnvio )  por la cuenta desde la que deseas enviar por ejem. prueba@domitienda.com  */
$mail->From = 'forsale@muchoruidoypocasluces.com';
$mail->FromName = 'Forsale';
$mail->Subject = 'Prueba de envio';
$mail->AltBody = 'ESto es el body';
$mail->MsgHTML($body);

/* Sustituye  (CuentaDestino )  por la cuenta a la que deseas enviar por ejem. admin@domitienda.com  */
$mail->AddAddress('iremti2@gmail.com', 'Jose Mari');
$mail->SMTPAuth = true;

/* Sustituye (CuentaDeEnvio )  por la misma cuenta que usaste en la parte superior en este caso  prueba@domitienda.com 
y sustituye (ContraseñaDeEnvio)  por la contraseña que tenga dicha cuenta */

$mail->Username = 'forsale@muchoruidoypocasluces.com';
$mail->Password = '7185[AN]wP51';

if(!$mail->Send()) {
echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
echo 'Mensaje enviado!';
}
?>