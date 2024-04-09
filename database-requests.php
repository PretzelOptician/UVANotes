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

function getNotesForCourse($course_id) {
   global $db;
   $query = "SELECT N.id AS note_id, N.date_uploaded, U.name AS author_name, N.computing_id, AVG(R.value) AS average_rating 
            FROM Note N JOIN User U ON N.computing_id = U.computing_id LEFT JOIN NoteRating NR ON N.id = NR.note_id LEFT JOIN Rating R ON NR.rating_id = R.id 
            WHERE N.course_id = " . $course_id . " 
            GROUP BY N.id, N.date_uploaded, U.name, N.computing_id;";
   $statement = $db->prepare($query);    // compile
   $statement->execute();
   $result = $statement->fetchAll();     // fetch()
   $statement->closeCursor();

   return $result;
}

?>