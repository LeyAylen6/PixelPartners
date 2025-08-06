<?php
require_once '../class/db/mysqli.php';
require_once '../class/User.php';

$id = $_GET["id"] ?? "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"] ?? "";
    $email = $_POST["email"] ?? "";
    $password = $_POST["password"] ?? "";
    $repeat_password = $_POST["confirm_password"] ?? "";

    try {
        $user = new User();

        if ($password != $repeat_password) {
            throw new Exception("Las contraseñas no coinciden.");
        }

        $user->name = $name;
        $user->email = $email;
        $user->password = password_hash($password, PASSWORD_DEFAULT);
        $user->update($connection, $id);
        
        header("Location: ../index.php?page=profile-edit&message=Usuario actualizado correctamente");
    } catch (Exception $e) {
        header("Location: ../index.php?page=profile-edit&error=" . urlencode($e->getMessage()));
        throw $e;
    }
}
?>