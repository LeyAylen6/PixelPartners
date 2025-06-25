<?php

class Project {
  public $id;
  public $name;
  public $developer;
  public $description;
  public $image;
  public $link;

  public function findAll($connection) {
    $query = "SELECT * FROM `project`";
    $projects = [];

    try {
      $response = mysqli_query($connection, $query);

      while ($row = mysqli_fetch_assoc($response)) {
          $project = new Project();
          $project->id = $row["id"];
          $project->name = $row["name"];
          $project->developer = $row["developer"];
          $project->description = $row["description"];
          $project->image = $row["image"];
          $project->link = $row["link"];

          $projects[] = $project;
      }

      return $projects;
    
    } catch (Exception $e) {
      throw $e;
    }
  }
}

?> 