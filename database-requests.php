<?php
session_start();

function getAllDepartments()
{
   global $db;
   $query = "select * from Department";    
   $statement = $db->prepare($query);    // compile
   $statement->execute();
   $result = $statement->fetchAll();     // fetch()
   $statement->closeCursor();

   return $result;
}

function getCoursesForDept($dept_code)
{
   global $db;
   $query = "select * from Course where dept_code='" . $dept_code . "';";
   $statement = $db->prepare($query);    // compile
   $statement->execute();
   $result = $statement->fetchAll();     // fetch()
   $statement->closeCursor();

   return $result;
}

function getUser($username, $computingId){
   global $db;

   $query = "select * from User where computing_id='" . $computingId . "';";
   $statement = $db->prepare($query);    // compile
   $statement->execute();
   $result = $statement->fetchAll();     // fetch()
   $statement->closeCursor();

   return $result;
}

function insertUser($username, $computingId)
{
   global $db;

   $query = "INSERT INTO User (computing_id, name) VALUES (:computingId, :username)";
   $statement = $db->prepare($query);
   $statement->bindParam(':computingId', $computingId);
   $statement->bindParam(':username', $username);
   
   $success = $statement->execute();
   $statement->closeCursor();

   return $success;
}

?>