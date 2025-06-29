<?php

require_once 'class/Project.php';

function getProjectsPage($connection, $page) {
    $limit = 3;
    $offset = ($page - 1) * $limit;

    $project = new Project();
    $projects = $project->findWithPagination($connection, $limit, $offset);
    
    return [
        "results" => $projects,
        "has_prev" => $page > 1,
        "has_next" => $project->count($connection) > $page * $limit
    ];
}
