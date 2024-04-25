<?php 
session_start();
require("connect-db.php"); 
require("database-requests.php");

$schedule = getSchedule($_SESSION['computingId']);

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $courseId = $_POST['courseID'];
    deleteClassFromSchedule($_SESSION['computingId'], $courseId);
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">    
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="https://www.cs.virginia.edu/~up3f/cs4750/images/db-icon.png" />
  
  <title>Schedule</title>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">  
  <link rel="stylesheet" href="styles.css">  
</head>
<body>
<?php include('header.php') ?> 
    <h1 style="text-align: center; padding-top: 20px;">Schedule</h1>
    <h3 style="text-align: center; padding-top: 10px;">Use this page to bookmark your courses and find notes easily!</h3>
    <div class="schedule-container">
        <h5 style="text-align: center; padding-top: 20px;"><?php echo $_SESSION['name'] . "'s"?> Schedule:</h5>
        <table class="table" style="width:90%; margin:auto;">
            <thead>
                <tr>
                    <th>Course Name</th>
                    <th>Department Code</th>
                    <th>Professor Name</th>
                    <th>Get Notes</th>
                    <th>Delete Course</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($schedule as $course): ?>
                <tr>
                    <td><?= htmlspecialchars($course['name']) ?></td>
                    <td><?= htmlspecialchars($course['dept_code']) ?></td>
                    <td><?= htmlspecialchars($course['professor_name']) ?></td>
                    <td>
                        <a href="notes.php?course=<?php echo $course['id'] ?>">
                            <button class="btn btn-secondary">
                                Go to notes
                            </button>
                        </a>
                    </td>
                    <td>
                        <form action="schedule.php" method="POST">
                            <input type="hidden" name="courseID" value="<?= $course['id'] ?>">
                            <button type="submit" class="btn btn-danger">Delete from schedule</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>