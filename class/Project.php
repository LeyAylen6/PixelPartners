<?php
require_once 'class/User.php';

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
        
        return $this->parseProjects($connection, $query);
    }

    public function save($connection) {
        $query = "INSERT INTO project (id, name, description, image, link) VALUES (NULL, '$this->name', '$this->description', '$this->image', '$this->link')";
        
		try {
			$result = mysqli_query($connection, $query);

            if ($result) {
                $this->id = mysqli_insert_id($connection);
				$query = "INSERT INTO user_project (id, user_id, project_id) VALUES ";

				foreach ($project->developers as $developer) {
					$query = $query . "(NULL, " . $developer->id . ", " . $this->id . ")";
				}
            
				foreach ($this->developers as $developer) {
					if ($developer !== reset($this->developers)) {
						$query .= ", ";
					}
					$query .= "(NULL, " . $developer->id . ", " . $this->id . ")";
				}

				mysqli_query($connection, $query);
            }
		} catch (Exception $e) {
			throw $e;
		}
    }

    public function findWithPagination($connection, $limit, $offset) {
        $query = "SELECT * FROM project LIMIT $limit OFFSET $offset";

        return $this->parseProjects($connection, $query);
    }

    private function parseProjects($connection, $query) {
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