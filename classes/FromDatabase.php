<?php
  class FromDatabase{ //name of the class
    public $table;

    function __construct($table) //constructing table
    {
      $this->table = $table;
    }

//function that is used to insert the values in a table of database
    public function insertFunc($record) 
    {
      global $pdo; //globalized variable pdo
      
      $keys = array_keys($record); 
      $values = implode(', ', $keys);
      $valuesUsingColon = implode(', :', $keys);

      $queryStmt = 'INSERT INTO ' . $this->table . ' (' . $values . ') VALUES (:' . $valuesUsingColon . ')'; //insert query to fill in the fields of the table
      $insertStmt = $pdo->prepare($queryStmt);
      $insertStmt->execute($record);
    }

//function used to update the values in a table of database
    public function updateFunc($record, $primary_Key)
    {
      global $pdo;
      
      $parameters = [];
      foreach($record as $key => $value)
      {
        $parameters[] = $key. '= :' .$key;
      }
      $parametersUsingComma = implode(',', $parameters);
      $queryStmt = "UPDATE $this->table SET $parametersUsingComma WHERE $primary_Key =:primary_Key"; //update query using primary key of the table
      $record['primary_Key'] = $record[$primary_Key];
      $updateStmt = $pdo->prepare($queryStmt);
      $updateStmt->execute($record);
    }

//function used to upload the images by taking the last insert id.
    public function imageUpload()
    {
      global $pdo;

      return $pdo->lastInsertId();
    }

//function that is used to delete the values of a row of the table in the database
    public function deleteFunc($field, $value)
    {
      global $pdo;

      $deleteStmt = $pdo->prepare('DELETE FROM ' . $this->table . ' WHERE ' . $field . ' = :primary_Key'); //delete query of a row
      $del_criteria = [
        'primary_Key' => $value
      ];
      $deleteStmt->execute($del_criteria);
      return $deleteStmt;
    }

//function that is used to save both the insert and update functions using try and catch method 
    public function saveFunc($record, $primary_Key = '')
    {
      try
      {
        $this->insertFunc($record); //insert query
      }
      catch(Exception $e){
        $this->updateFunc($record, $primary_Key); //exception of the insert 
      }
    }
 
 //function that is used to query all the values of a row of the required table from the database
    public function selectAllFunc()
    {
      global $pdo;
      
      $queryStmt = $pdo->prepare('SELECT * FROM ' . $this->table ); //select query of all the fields
      $queryStmt->execute();
      return $queryStmt;
    }

//function used to query one of the fields of the table from the database
    public function selectFunc($field, $value) 
    {
      global $pdo;  
      
      $queryStmt = $pdo->prepare('SELECT * FROM ' . $this->table . ' WHERE ' . $field . ' = :value'); //select statement of one field
      $sel_criteria = [
        'value' => $value
      ];
      $queryStmt->execute($sel_criteria);
      return $queryStmt;
    }
   
   //function used to query two of the fiels of the table from the database.
    public function selectTwoFunc($field, $field1, $value, $value1)
    {
      global $pdo;
     
      $queryStmt = $pdo->prepare('SELECT * FROM ' . $this->table . ' WHERE ' . $field . ' = :value AND '.$field1. '= :value1'); //select statement for two fields
      $sel_criteria = [
        'value' => $value,
        'value1' => $value1
      ];
      $queryStmt->execute($sel_criteria);
      return $queryStmt;
    }

//function that is used to validate the field of the table by using row count.
    public function validatingFunc($field, $value)
    {
      global $pdo;

      $user_Validation = $pdo->prepare('SELECT COUNT('.$field.') AS row FROM '. $this->table . ' WHERE ' . $field . ' = :value'); //count statement
      $validate_criteria = [
        'value' => $value
      ];
      $user_Validation->execute($validate_criteria);
      return $user_Validation;
    }

//function that is used to search the furnitures using the keyword
    public function searchFunc($field, $field1, $keyword, $value1)
    {
      global $pdo;
     
      $searchStmt = $pdo->prepare('SELECT * FROM ' . $this->table . ' WHERE ' . $field . ' LIKE "%":keyword"%" AND '.$field1. '= :value1'); //search statement using keyword of the name of the table
      $search_criteria = [
        'keyword' => $keyword,
        'value1' => $value1
      ];
      $searchStmt->execute($search_criteria);
      return $searchStmt;
    }
  }
?>