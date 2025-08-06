<?php
session_start();
require_once '../class/db/mysqli.php';
require_once '../class/User.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"] ?? "";
    $email = $_POST["email"] ?? "";
    $password = $_POST["password"] ?? "";
    $confirm_password = $_POST["confirm_password"] ?? "";

    try {
        if (empty($name) || empty($email) || empty($password) || empty($confirm_password)) {
            throw new Exception("Falto completar algun campo.");
        }

        if ($password !== $confirm_password) {
            throw new Exception("Las contraseñas no coinciden.");
        }

        $userFound = new User();
        $userFound = $userFound->findByEmail($connection, $email);
        
        if ($userFound->id !== null){
            throw new Exception("Usuario ya existe.");
        }

        $newUser = new User();
        $newUser->name = $name;
        $newUser->email = $email;
        $newUser->password = password_hash($password, PASSWORD_DEFAULT);
        $newUser->rol = 'user';
        $newUser->save($connection);

        $_SESSION['user'] = [
            'id' => $newUser->id,
            'name' => $newUser->name,
            'email' => $newUser->email,
            'rol' => $newUser->rol,
        ];

        header("Location: ../index.php?page=welcome");
    
    } catch (Exception $e) {
        header("Location: ../index.php?page=register&error=" . urlencode($e->getMessage()));
        exit;
    }
}
