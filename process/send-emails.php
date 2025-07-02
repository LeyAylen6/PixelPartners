<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';
    
    if (empty($name) || empty($email) || empty($message)) {
        header("Location: ../index.php?page=request-our-services&error=Todos los campos son obligatorios");
        exit;
    }
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../index.php?page=request-our-services&error=Email no válido");
        exit;
    }
    
    $mailSent = true;
    
    if ($mailSent) {
        header("Location: ../index.php?page=request-our-services&message=Gracias por escribirnos. Nos pondremos en contacto contigo lo antes posible.");
    } else {
        header("Location: ../index.php?page=request-our-services&error=Error al enviar el mensaje. Por favor, inténtalo de nuevo.");
    }
    exit;
}