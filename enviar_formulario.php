<?php
include_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $service = htmlspecialchars($_POST['service']);
    $message = htmlspecialchars($_POST['message']);

    $to = SITE_EMAIL;
    $subject = "Nuevo contacto desde la web";
    $body = "Nombre: $name\nEmail: $email\nServicio: $service\nMensaje:\n$message";

    $headers = "From: $email\r\nContent-Type: text/plain; charset=UTF-8";

    if (mail($to, $subject, $body, $headers)) {
        echo "Formulario enviado con éxito.";
    } else {
        echo "Error al enviar el formulario.";
    }
}
?>