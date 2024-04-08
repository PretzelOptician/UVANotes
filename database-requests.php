<?php

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

?>