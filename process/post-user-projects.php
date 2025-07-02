<?php
require_once __DIR__ . '/../class/Project.php';
require_once __DIR__ . '/../class/User.php';
require_once __DIR__ . '/../class/db/mysqli.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $project = new Project();

    try {
    
        if (!validateLength($_POST['name'], 3, 50)) {
            throw new Exception('El nombre debe tener entre 3 y 50 caracteres');
        } else {
            $project->name = $_POST['name'];
        }

        if (!validateLength($_POST['description'], 10, 255)) {
            throw new Exception('La descripción debe tener entre 10 y 255 caracteres');
        } else {
            $project->description = $_POST['description'];
        }

        if (!validateLength($_POST['image'], 10, 255)) {
            throw new Exception('La imagen debe tener entre 10 y 255 caracteres');
        } else {
            $project->image = $_POST['image'];
        }

        if (!validateLength($_POST['link'], 10, 255)) {
            throw new Exception('El link debe tener entre 10 y 255 caracteres');
        } else {
            $project->link = $_POST['link'];
        }
        $project->developers = [];

        $user = new User();
        echo '<pre>' . $_POST['developers'] . '</pre>';
       
        foreach ($_POST['developers'] as $dev_name) {
            $user_dev = $user->findByName($connection, trim($dev_name));
            if (count($user_dev) === 1) {
                $project->developers[] = $user_dev[0];
            } else {
                throw new Exception('El usuario ' . $dev_name . ' no existe');
            }
        }

        $project->save($connection);
        header("Location: ../index.php?page=admin-projects&message=Proyecto guardado correctamente");
        exit;
    
    } catch (Exception $e) {
        header("Location: ../index.php?page=admin-projects&error=" . urlencode($e->getMessage()));
        exit;
    }
}

function validateLength($text, $min, $max) {
    $length = strlen(trim($text));
    return $length >= $min && $length <= $max;
}