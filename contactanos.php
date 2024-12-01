<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = htmlspecialchars($_POST['nombre']);
    $telefono = htmlspecialchars($_POST['telefono']);
    $gmail = filter_var($_POST['gmail'], FILTER_SANITIZE_EMAIL);
    $mensaje = htmlspecialchars($_POST['mensaje']);

    if (!filter_var($gmail, FILTER_VALIDATE_EMAIL)) {
        echo "Correo electrónico no válido.";
        exit;
    }

    // Aquí puedes agregar código para enviar un correo electrónico, guardar en una base de datos, etc.
    $to = "marisolmontiel661@gmail.com";
    $subject = "Nuevo mensaje de contacto";
    $body = "Nombre: $nombre\nTeléfono: $telefono\nGmail: $gmail\nMensaje: $mensaje";
    $headers = "From: $gmail";

    if (mail($to, $subject, $body, $headers)) {
        echo "Gracias, $nombre. Hemos recibido tu mensaje.";
    } else {
        echo "Lo siento, hubo un error al enviar tu mensaje. Por favor, intenta nuevamente.";
    }
}
?>