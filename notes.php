<?php 
require("connect-db.php");    // include("connect-db.php");
require("database-requests.php");
?>

<?php 

if (isset($_GET['course'])){ //check to see if 'page' is set.
    $course= $_GET['course']; //then set a variable equal to the parameter.
}
$list_of_notes = getNotesForCourse($course);

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">    
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="https://www.cs.virginia.edu/~up3f/cs4750/images/db-icon.png" />
  
  <title>Notes</title>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">  
  <link rel="stylesheet" href="styles.css">  
</head>

<body>  
<div class="container">
  <div class="row g-3 mt-2">
    <div class="col">
      <h2>Notes for course</h2>
    </div>  
  </div>
</div>
<div class="container">
    <h3>Notes</h3>
    <!-- <div class="search-container">
        <input type="text" id="searchCourse" onkeyup="searchCourses()" placeholder="Search for Courses">
    </div> -->
    <table class="w3-table w3-bordered w3-card-4 center" style="width:100%">
        <thead>
        <tr style="background-color:#B0B0B0">
            <th><b>Author</b></th>
            <th><b>Date Uploaded (YYYY-MM-DD)</b></th>        
            <th><b>Rating</b></th> 
            <th><b>Link</b></th>
        </tr>
        </thead>
        <!-- iterate array of results, display the existing requests -->
        <?php foreach ($list_of_notes as $note): ?>
        <tr>
            <td><?php echo $note['computing_id']; ?></td>
            <td><?php echo $note['date_uploaded']; ?></td>        
            <td><?php echo $note['average_rating']; ?>/5</td>    
            <td><a href="../notes/example.pdf">View Note</a></td>
            
        </tr>
        <?php endforeach; ?>  

    </table>
</div>   
<br/><br/>
<?php // include('footer.html') ?> 
<!-- <script src='courses.js'></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>