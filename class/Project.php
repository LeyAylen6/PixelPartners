<?php
require_once __DIR__ . '/User.php';

class Project {
    public $id;
    public $name;
    public $developers = [];
    public $description;
    public $image;
    public $link;

    public function findAll($connection) {
        $query = "SELECT DISTINCT p.*, u.name as developer, u.image as user_image 
                  FROM project p
                  LEFT JOIN user_project up ON p.id = up.project_id
                  LEFT JOIN user u ON up.user_id = u.id
                  ORDER BY p.id, u.name";
        
        $projects = [];
        $currentProjectId = null;
        $currentProject = null;

        try {
            $response = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($response)) {
                if ($row["id"] !== $currentProjectId) {
                    if ($currentProject !== null) {
                        $projects[] = $currentProject;
                    }
                    
                    $currentProject = new Project();
                    $currentProject->id = $row["id"];
                    $currentProject->name = $row["name"];
                    $currentProject->description = $row["description"];
                    $currentProject->image = $row["image"];
                    $currentProject->link = $row["link"];
                    $currentProjectId = $row["id"];
                }
                
                if ($row["developer"] !== null && $row["user_image"] !== null) {
                    $user = new User();
                    $user->name = $row["developer"];
                    $user->image = $row["user_image"];
                    $currentProject->developers[] = $user;
                }
            }

            if ($currentProject !== null) {
                $projects[] = $currentProject;
            }

            return $projects;
        
        } catch (Exception $e) {
            throw $e;
        }
    }
}

?> 