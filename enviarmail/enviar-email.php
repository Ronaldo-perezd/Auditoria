<?php
//include ('database.php');


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';


$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'localhh23@gmail.com';                     //SMTP username
    $mail->Password   = 'sebastian123ron';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

           // $usuarios= "SELECT * FROM `usuarios`";
      //$resultado = mysqli_query($conexion,$usuarios);
        //  $row = mysqli_fetch_assoc($resultado);

    //Recipients
    $mail->setFrom('localhh23@gmail.com', 'LOCAL BOT VACUNACION');
    $mail->addAddress($_POST['correo']);     //Add a recipient

    //Content
    /*
    		*	d - dia del mes (1-31)
    		*	m - mes del año (1-12)
    		*	Y - año (4 dígitos)
    		*	l - día de la semana
    		*
    		*	h - hora en formato 1-12
    		*	i - minutos 0-59
    		*	s - segundos 0-59
    		*	a - am-pm
    		*/

  $mes = array("enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre");

    echo "Fecha: " . date("l") . " " . date("d") . " de " . $mes[date("m")-1] . " de " . date("Y") . "<br>";
		echo "Son las " . date("h:i:sa"). "<br>";
    echo $_POST['correo'] . "<br>". "<br>";
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'asunto importante';
    $mail->Body    =  "CITA VACUNACION: " . date("l") . " " . date("d") . " de " . $mes[date("m")-1] . " de " . date("Y") . "<br>";


    $mail->send();
    echo 'se envio su cita de vacunacion porfavor revise su correo electronico ';
} catch (Exception $e) {
    echo "hubo un errro al enviar el mensaje: {$mail->ErrorInfo}";
}
