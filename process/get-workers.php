<?php
require_once 'class/User.php';
require_once 'class/db/mysqli.php';

$user = new User();
$users = $user->findAll($connection);

foreach ($users as $user) {
    if ($user->job) {
        $workers[] = $user;
    }
}

return $workers;
