<?php 
require("connect-db.php");    // include("connect-db.php");
require("database-requests.php");
?>

<?php 

$list_of_depts = getAllDepartments();
// var_dump($list_of_depts);

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">    
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Upsorn Praphamontripong">
  <meta name="description" content="Maintenance request form, a small/toy web app for ISP homework assignment, used by CS 3250 (Software Testing)">
  <meta name="keywords" content="CS 3250, Upsorn, Praphamontripong, Software Testing"> -->
  <link rel="icon" type="image/png" href="https://www.cs.virginia.edu/~up3f/cs4750/images/db-icon.png" />
  
  <title>Departments</title>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">  
  <link rel="stylesheet" href="styles.css">  
</head>

<body>  
<div class="container">
  <div class="row g-3 mt-2">
    <div class="col">
      <h2>Select a Department</h2>
    </div>  
  </div>
  
  <!---------------->

  <!-- <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" onsubmit="return validateInput()">
    <table style="width:98%">
      <tr>
        <td width="50%">
          <div class='mb-3'>
            Requested date:
            <input type='text' class='form-control' 
                   id='requestedDate' name='requestedDate' 
                   placeholder='Format: yyyy-mm-dd' 
                   pattern="\d{4}-\d{1,2}-\d{1,2}" 
                   value="<?php if ($request_to_update != null) echo $request_to_update['reqDate'] ?>" />
          </div>
        </td>
        <td>
          <div class='mb-3'>
            Room Number:
            <input type='text' class='form-control' id='roomNo' name='roomNo' 
            value="<?php if ($request_to_update != null) echo $request_to_update['roomNumber'] ?>" />
          </div>
        </td>
      </tr>
      <tr>
        <td colspan=2>
          <div class='mb-3'>
            Requested by: 
            <input type='text' class='form-control' id='requestedBy' name='requestedBy'
                   placeholder='Enter your name'
                   value="<?php if ($request_to_update != null) echo $request_to_update['reqBy'] ?>" />
          </div>
        </td>
      </tr>
      <tr>
        <td colspan=2>
          <div class="mb-3">
            Description of work/repair:
            <input type='text' class='form-control' id='requestDesc' name='requestDesc'
            value="<?php if ($request_to_update != null) echo $request_to_update['repairDesc'] ?>" />
        </div>
        </td>
      </tr>
      <tr>
        <td colspan=2>
          <div class='mb-3'>
            Requested Priority:
            <select class='form-select' id='priority_option' name='priority_option'>
              <option selected></option>
              <option value='high' <?php if ($request_to_update!=null && $request_to_update['reqPriority']=='high') echo ' selected="selected"' ?> >
                High - Must be done within 24 hours</option>
              <option value='medium' <?php if ($request_to_update!=null && $request_to_update['reqPriority']=='medium') echo ' selected="selected"' ?> >
                Medium - Within a week</option>
              <option value='low' <?php if ($request_to_update!=null && $request_to_update['reqPriority']=='low') echo ' selected="selected"' ?> >
                Low - When you get a chance</option>
            </select>
          </div>
        </td>
      </tr>
    </table>

    <div class="row g-3 mx-auto">    
      <div class="col-4 d-grid ">
      <input type="submit" value="Add" id="addBtn" name="addBtn" class="btn btn-dark"
           title="Submit a maintenance request" />                  
      </div>	    
      <div class="col-4 d-grid ">
      <input type="submit" value="Confirm update" id="cofmBtn" name="cofmBtn" class="btn btn-primary"
           title="Update a maintenance request" />
      <input type="hidden" value="<?= $_POST['reqId'] ?>" name="cofm_reqID" />           
      </div>	    
      <div class="col-4 d-grid">
        <input type="reset" value="Clear form" name="clearBtn" id="clearBtn" class="btn btn-secondary" />
      </div>      
    </div>  
    <div>
  </div>  
</form> -->

</div>
<div class="container">
    <h3>Departments</h3>
    <div class="search-container">
        <input type="text" id="searchDept" onkeyup="searchDepartments()" placeholder="Search for Department">
    </div>
    <div class="dept-container" id="deptContainer">
        <?php foreach ($list_of_depts as $dept): ?>
            <button class="dept-button">
                <h5><?= htmlspecialchars($dept['code']) ?></h5>
                <!-- <br> -->
                <!-- <?= htmlspecialchars($dept['name']) ?> -->
            </button>
        <?php endforeach; ?>
    </div>
</div>   


<br/><br/>

<?php // include('footer.html') ?> 

<script src='departments.js'></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>