<?php

class User {
    public $name;
    public $image;
    public $rol;

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

    private function parseUsers($connection, $query) {
        try {
            $response = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($response)) {
                $user = new User();
                $user->name = $row["name"];
                $user->image = $row["image"];
                $user->rol = $row["rol"];
                $users[] = $user;
            }

            return $users;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
