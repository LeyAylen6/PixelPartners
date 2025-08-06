<?php

class User {
    public $id;
    public $name;
    public $email;
    public $password;
    public $image;
    public $rol;
    public $job;

    public function findAll($connection) {
        $query = "SELECT * FROM user ORDER BY name";
        $users = [];

        return $this->parseUsers($connection, $query);
    }

    public function findByName($connection, $name) {
        $query = "SELECT * FROM user WHERE name = '$name'";
        $users = [];

        return $this->parseUsers($connection, $query);
    }

    
    public function findByEmail($connection, $email) {
        $query = "SELECT * FROM user WHERE email = '$email'";
        $response = mysqli_query($connection, $query);
        $user = new User();

        try {
            if ($response) {
                $row = mysqli_fetch_assoc($response);
                if ($row) {
                    $user->id = $row["id"]; 
                    $user->name = $row["name"];
                    $user->email = $row["email"];
                    $user->password = $row["password"];
                    $user->image = $row["image"];
                    $user->rol = $row["rol"];
                    $user->job = $row["job"];
                }
            }

            return $user;
        } catch (Exception $e) {
            throw $e;
        }
    }

    private function parseUsers($connection, $query) {
        $users = [];
        
        try {
            $response = mysqli_query($connection, $query);
            
            if ($response) {
                while ($row = mysqli_fetch_assoc($response)) {
                    $user = new User();
                    $user->id = $row["id"]; 
                    $user->name = $row["name"];
                    $user->image = $row["image"];
                    $user->rol = $row["rol"];
                    $user->job = $row["job"];
                    $users[] = $user;
                }
            }

            return $users;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function save($connection) {
        $query = "INSERT INTO user (name, email, password, rol) 
                  VALUES (?, ?, ?, ?)";
        
        try {
            $stmt = $connection->prepare($query);
            $stmt->bind_param("ssss", 
                $this->name,
                $this->email,
                $this->password,
                $this->rol
            );
            
            $result = $stmt->execute();
            $this->id = $connection->insert_id;
            
            if (!$result) {
                throw new Exception("Error al guardar el usuario: " . $connection->error);
            }

        } catch (Exception $e) {
            throw $e;
        }
    }

    public function update($connection, $id) {
        $name = mysqli_real_escape_string($connection, $this->name);
        $email = mysqli_real_escape_string($connection, $this->email);
        $password = mysqli_real_escape_string($connection, $this->password);

        $query = "UPDATE user SET ";

        if ($name) {
            $query .= "name = '$name', ";
        }
        
        if ($email) {
            $query .= "email = '$email', ";
        }
        
        if ($password) {
            $query .= "password = '$password'";
        }
        
        $query .= " WHERE id = $id";

        try {
            $response = mysqli_query($connection, $query);
            
            if (!$response) {
                throw new Exception("Error al actualizar el usuario: " . $connection->error);
            }
            
            error_log(print_r($_SESSION['user'], true));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function makeAdmin($connection, $id) {
        $query = "UPDATE user SET rol = 'admin' WHERE id = $id";
        
        try {
            $response = mysqli_query($connection, $query);
            
            if (!$response) {
                throw new Exception("Error al hacer admin el usuario: " . $connection->error);
            }
            
        } catch (Exception $e) {
            throw $e;
        }
    }
}
