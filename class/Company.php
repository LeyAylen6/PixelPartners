<?php

class Company {
  public $id;
  public $name;
  public $logo;

  public function findAll($connection) {
    $query = "SELECT * FROM `company`";
    $companies = [];

    try {
      $response = mysqli_query($connection, $query);
      $response = mysqli_fetch_assoc($response);

      while ($response){
        $company = new Company();
        $company->id = $response["id"];
        $company->name = $response["name"];
        $company->logo = $response["logo"];

        array_push($companies, $company);
      }

      return $companies;
    
    } catch (Exception $e) {
      throw $e;
    }
  }
}

?> 