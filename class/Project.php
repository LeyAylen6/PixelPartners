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
        $query = "SELECT DISTINCT p.*, u.name as developer, u.image as user_image, u.rol as user_rol
                  FROM project p
                  LEFT JOIN user_project up ON p.id = up.project_id
                  LEFT JOIN user u ON up.user_id = u.id
                  ORDER BY p.id, u.name";
        
        return $this->parseProjects($connection, $query);
    }

    public function findWithPagination($connection, $limit, $offset) {
        $query = "SELECT DISTINCT p.*,
                    GROUP_CONCAT(CONCAT(u.name, '|', u.image, '|', u.rol) 
                    ORDER BY u.name SEPARATOR '||') as developers_data
                  FROM project p
                  LEFT JOIN user_project up ON p.id = up.project_id
                  LEFT JOIN user u ON up.user_id = u.id
                  GROUP BY p.id
                  LIMIT $limit OFFSET $offset";

        return $this->parseProjects($connection, $query);
    }

    public function count($connection) {
        $query = "SELECT COUNT(*) as count FROM project";

        return mysqli_fetch_assoc(mysqli_query($connection, $query))["count"];
    }

    public function save($connection) {
        $query = "INSERT INTO project (id, name, description, image, link) VALUES (NULL, '$this->name', '$this->description', '$this->image', '$this->link')";
        
		try {
			$result = mysqli_query($connection, $query);

            if ($result) {
                $this->id = mysqli_insert_id($connection);
				$query = "INSERT INTO user_project (id, user_id, project_id) VALUES ";

				foreach ($this->developers as $developer) {
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
                if ($row["developers_data"]) {
                    $developers = explode('||', $row["developers_data"]);
                    foreach ($developers as $developerData) {
                        list($name, $image, $rol) = explode('|', $developerData);
                        $user = new User();
                        $user->name = $name;
                        $user->image = $image;
                        $user->rol = $rol;
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