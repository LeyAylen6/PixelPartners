<?php

require_once 'class/Project.php';

public function getProjectsPage($connection, $page) {
    $limit = 3;
    $offset = ($page - 1) * $limit;

    $project = new Project();
    $projects = $project->findWithPagination($connection, $limit, $offset);
    
    return $projects;
}
