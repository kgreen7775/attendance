<?php 
$title='View Record';
?>


<?php 
  require_once 'includes/header.php';
  require_once 'includes/check.php';
  require_once 'db/conn.php';

  // Get attendee by ID
  
  if(!isset($_GET['id'])) //if the getid doesn't exist, print the error msg
  {
    //echo"<h1 class='text-danger'> Please Check 'Attendee_id' value and try again<h1/>";
    echo 'includes/errormsg.php';

  }
  else
  {
    $getid=$_GET['id'];
    $results=$crud->getAttendeesDetails($getid);

?>

 <!--THE VARIABLE POST IS BEIGN USED TO ISSUE THE VALUE TO THE USER INTERFACE -->
<div class="card" style="width: 18rem;">
<img src="<?php echo empty($results['imgpath']) ? "img/person.jpg" : $results['imgpath']; ?>" class="card-img-top" alt="img/person.jpg">
  <div class="card-body">
    <h5 class="card-title"> 
    <?php echo  $results['FirstName'].' '.$results['LastName']; ?> 
    </h5>
    <p class="card-text">
        Area of Speciality:<?php echo  $results['NameOfSpecialization']; ?>
    </p>
    <p class="card-text">
        Date of Birth:<?php echo  $results['DateOfBirth']; ?>
    </p>
    <p class="card-text">
        Login Email:<?php echo  $results['Email']; ?>
    </p>
  
    <p class="card-text">
        Contact Number<?php echo  $results['Contact']; ?>
    </p>
    <a href="records.php" class="btn btn-success">Confirm</a>
  </div>
</div> 


<td><a href="records.php?id" class="btn btn-primary"> BACK TO LIST </a></td>
<td><a href="edit.php?id=<?php echo $results['Attendance_id']?>" class="btn btn-warning"> EDIT </a></td>
<td><a onclick="return confirm('ARE YOU SURE ABOUT DELETING THIS RECORD? ONCE DONE CAN NEVER GO BACK');" href="delete.php?id=<?php echo $results['Attendance_id']?>" class="btn btn-danger"> DELETE </a></td>
<?php  } ?><!-- END of the Else statement -->






<!-- THE SUPER VARIABLE POST IS BEIGN USED TO ISSUE THE VALUE TO THE USER INTERFACE
<div class="card" style="width: 18rem;">
  <img src="img/person.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"> 
    <?php //echo  $_POST['firstname'].' '.$_POST['lastname']; ?> 
    </h5>
    <p class="card-text">
        Area of Speciality:<?php //echo  $_POST['job']; ?>
    </p>
    <p class="card-text">
        Date of Birth:<?php //echo  $_POST['dob']; ?>
    </p>
    <p class="card-text">
        Login Email:<?php //echo  $_POST['email']; ?>
    </p>
    <p class="card-text">
        Login Password<?php //echo  $_POST['password']; ?>
    </p>
    <p class="card-text">
        Contact Number<?php //echo  $_POST['phone']; ?>
    </p>
    <a href="#" class="btn btn-primary">Confirm</a>
  </div>
</div> 
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







