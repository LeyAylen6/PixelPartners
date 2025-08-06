<?php
require_once '../class/db/mysqli.php';
require_once '../class/User.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"] ?? "";
    $password = $_POST["password"] ?? "";

    try {
        if (empty($email) || empty($password)) {
            throw new Exception("Todos los campos son requeridos.");
        }

        $user = new User();
        $existingUser = $user->findByEmail($connection, $email);
   
        if (!$existingUser->id) {
            throw new Exception("Usuario o contraseña incorrecta.");
        }

        $_SESSION['user'] = [
            'id' => $existingUser->id,
            'name' => $existingUser->name,
            'email' => $existingUser->email,
            'rol' => $existingUser->rol,
            'job' => $existingUser->job
        ];
       
        error_log("Sesión después de guardar: " . print_r($_SESSION, true));
        header("Location: ../index.php?page=welcome");
    
    } catch (Exception $e) {
        header("Location: ../index.php?page=login&error=" . urlencode($e->getMessage()));
        exit;
    }
}