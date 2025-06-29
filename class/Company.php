<?php

class Company {
  public $id;
  public $name;
  public $logo;

  public function findAll($connection) {
    $query = "SELECT * FROM `company`";
    $companies = [];

    try {
      $result = mysqli_query($connection, $query);
      
      if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
          $company = new Company();
          $company->id = $row["id"];
          $company->name = $row["name"];
          $company->logo = $row["logo"];
          $companies[] = $company;
        }
        mysqli_free_result($result);
      }
      
      return $companies;
      
    } catch (Exception $e) {
      error_log("Error en Company::findAll: " . $e->getMessage());
      throw $e;
    }
  }
}