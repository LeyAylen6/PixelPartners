<?php

class User {
    public $name;
    public $image;

    public static function findAll($connection) {
        $query = "SELECT name, image FROM user ORDER BY name";
        $users = [];

        try {
            $response = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($response)) {
                $user = new User();
                $user->name = $row["name"];
                $user->image = $row["image"];
                $users[] = $user;
            }

            return $users;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
