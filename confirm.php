<?php 
$title='confirm';
?>
<!-- 
 - Firstname
 - Lastname
 - Date of Birth (Use Date Picker)
 - Specialization (Database Admin, Software Developer,Web Admin, Other)
 - Email address
 - Contact Number
-->

<!--<h1 class="text-center text-success">Confirm Registration</h1> -->

<?php 
  require_once 'includes/header.php';
  require_once 'db/conn.php';

  if(isset($_POST['submit']))
  {
    //extract values from the $_POST array
    $fname=$_POST['firstname'];
    $lname=$_POST['lastname'];
    $dob=$_POST['dob'];
    $job=$_POST['job'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
   
    //Call function to insert and track if successful or not
    $issuccess=$crud->insertAttendee($fname,$lname,$dob,$job,$email,$phone);
   
    if($issuccess)
    {
      //echo '<h1 class="text-center text-success">Confirm Registration</h1>';
      echo 'includes/successmsg.php';
    }
    else
      {
        //echo '<h1 class="text-center text-danger">There was a problem processing your info</h1>';
        echo 'includes/errormsg.php';
      }
  
  }

?>

<!--print values that were passed from the action using 'get'-->
<!-- <div class="card" style="width: 18rem;">
  <img src="img/person.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"> 
        <?php //echo  $_GET['firstname'].' '.$_GET['lastname']; ?> 
    </h5>
    <p class="card-text">
        Area of Speciality:<?php //echo  $_GET['job']; ?>
    </p>
    <p class="card-text">
        Date of Birth:<?php //echo  $_GET['dob']; ?>
    </p>
    <p class="card-text">
        Login Email:<?php //echo  $_GET['email']; ?>
    </p>
    <p class="card-text">
        Login Password<?php //echo  $_GET['password']; ?>
    </p>
    <p class="card-text">
        Contact Number<?php //echo  $_GET['phone']; ?>
    </p>
    <a href="#" class="btn btn-primary">Confirm</a>
  </div>
</div> -->




<!--print values that were passed from the action using 'post'-->
 <div class="card" style="width: 18rem;">
  <img src="img/person.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"> 
    <?php echo  $_POST['firstname'].' '.$_POST['lastname']; ?> 
    </h5>
    <p class="card-text">
        Area of Speciality:<?php echo  $_POST['job']; ?>
    </p>
    <p class="card-text">
        Date of Birth:<?php echo  $_POST['dob']; ?>
    </p>
    <p class="card-text">
        Login Email:<?php echo  $_POST['email']; ?>
    </p>
    <p class="card-text">
        Login Password<?php echo  $_POST['password']; ?>
    </p>
    <p class="card-text">
        Contact Number<?php echo  $_POST['phone']; ?>
    </p>
    <a href="records.php" class="btn btn-primary">Confirm</a>
  </div>
</div> 

 <?php

//echo "<h3> Please confirm tht these details are correct</3><br/>";
//echo $_GET['firstname'];
//echo $_GET['lastname'];
//echo $_GET['dob'];
//echo $_GET['job'];
//echo $_GET['email'];
//echo $_GET['password'];
//echo $_GET['phone'];

?> 

<!--<form method="get" action="success.php">-->
    <!--<div class="mb-3 form-check"> <!-- CHECK BOX DIV--> 
    <!--    <input type="checkbox" class="form-check-input" id="submit" name="submit">
        <label class="form-check-label" for="check">I I Confirm that all the information provided is correct</label>
-->
<!--   </div> <!-- SUBMIT BUTTION DIV-->
<!--    <button type="submit" class="btn btn-primary">Confirm</button>
</form>
-->




<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<?php 

  require_once 'includes/footer.php';
?>