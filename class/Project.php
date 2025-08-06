<?php
require_once 'User.php';

class Project {
    public $id;
    public $name;
    public $developers = [];
    public $description;
    public $image;
    public $link;
    public $company_logo;

    public function findAll($connection) {
        $query = "SELECT DISTINCT p.*, c.logo as company_logo,
                    GROUP_CONCAT(CONCAT(u.name, '|', u.image, '|', u.job) 
                    ORDER BY u.name DESC SEPARATOR '||') as developers_data
                  FROM project p
                  LEFT JOIN user_project up ON p.id = up.project_id
                  LEFT JOIN user u ON up.user_id = u.id
                  LEFT JOIN company c ON p.company_id = c.id
                  GROUP BY p.id DESC";
        
        return $this->parseProjects($connection, $query);
    }

    public function findWithPagination($connection, $limit, $offset) {
        $query = "SELECT DISTINCT p.*, c.logo as company_logo,
                    GROUP_CONCAT(CONCAT(u.name, '|', u.image, '|', u.job) 
                    ORDER BY u.name DESC SEPARATOR '||') as developers_data
                  FROM project p
                  LEFT JOIN user_project up ON p.id = up.project_id
                  LEFT JOIN user u ON up.user_id = u.id
                  LEFT JOIN company c ON p.company_id = c.id
                  GROUP BY p.id DESC
                  LIMIT $limit OFFSET $offset";

        return $this->parseProjects($connection, $query);
    }

    public function count($connection) {
        $query = "SELECT COUNT(*) as count FROM project";

        return mysqli_fetch_assoc(mysqli_query($connection, $query))["count"];
    }

    public function save($connection) {
        // Escapar valores para prevenir inyección SQL
        $name = mysqli_real_escape_string($connection, $this->name);
        $description = mysqli_real_escape_string($connection, $this->description);
        $image = mysqli_real_escape_string($connection, $this->image);
        $link = mysqli_real_escape_string($connection, $this->link);

        $query = "INSERT INTO project (name, description, image, link) 
                 VALUES ('$name', '$description', '$image', '$link')";
        
        try {
            $result = mysqli_query($connection, $query);

            if ($result) {
                $this->id = mysqli_insert_id($connection);
                
                // Solo si hay desarrolladores para insertar
                if (!empty($this->developers)) {
                    $query = "INSERT INTO user_project (user_id, project_id) VALUES ";
                    $values = [];
                    
                    foreach ($this->developers as $developer) {
                        $values[] = "(" . intval($developer->id) . ", " . intval($this->id) . ")";
                    }
                    
                    if (!empty($values)) {
                        $query .= implode(", ", $values);
                        mysqli_query($connection, $query);
                    }
                }
            }
		} catch (Exception $e) {
			throw $e;
		}
    }

    public function update($connection) {
        $name = mysqli_real_escape_string($connection, $this->name);
        $description = mysqli_real_escape_string($connection, $this->description);
        $image = mysqli_real_escape_string($connection, $this->image);
        $link = mysqli_real_escape_string($connection, $this->link);

        $query = "UPDATE project SET name = '$name', description = '$description', image = '$image', link = '$link' WHERE id = " . $this->id;
        
        try {
            $result = mysqli_query($connection, $query);

            if ($result) {
                if (!empty($this->developers)) {
                    $query = "DELETE FROM user_project WHERE project_id = " . $this->id;
                    mysqli_query($connection, $query);
                    
                    $query = "INSERT INTO user_project (user_id, project_id) VALUES ";
                    $values = [];
                    
                    foreach ($this->developers as $developer) {
                        $values[] = "(" . intval($developer->id) . ", " . $this->id . ")";
                    }
                    
                    if (!empty($values)) {
                        $query .= implode(", ", $values);
                        mysqli_query($connection, $query);
                    }
                }
            }
		} catch (Exception $e) {
			throw $e;
		}
    }

    public function delete($connection, $id) {
        $query = "DELETE FROM user_project WHERE project_id = " . $id;
        mysqli_query($connection, $query);
        
        $query = "DELETE FROM project WHERE id = $id";
        
        try {
            $response = mysqli_query($connection, $query);
            
            if (!$response) {
                throw new Exception("Error al eliminar el proyecto: " . $connection->error);
            }
            
        } catch (Exception $e) {
            throw $e;
        }
    }

    private function parseProjects($connection, $query) {
        $projects = [];

        try {
            $response = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($response)) {
                $project = new Project();
                $project->id = $row["id"];
                $project->name = $row["name"];
                $project->description = $row["description"];
                $project->image = $row["image"];
                $project->link = $row["link"];
                $project->company_logo = $row["company_logo"];

                if ($row["developers_data"]) {
                    $developers = explode('||', $row["developers_data"]);
                    
                    foreach ($developers as $developerData) {
                        list($name, $image, $job) = explode('|', $developerData);
                        $user = new User();
                        $user->name = $name;
                        $user->image = $image;
                        $user->job = $job;
                        $project->developers[] = $user;
                    }
                }

                $projects[] = $project;
            }

            return $projects;
        
        } catch (Exception $e) {
            throw $e;
        }
    }
}