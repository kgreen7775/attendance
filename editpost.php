<?php 

require_once 'db/conn.php';

//Get values from post opertion

if(isset($_POST['submit']))
  {
    //extract values from the $_POST array
    $id = $_POST['id'];
    $fname=$_POST['firstname'];
    $lname=$_POST['lastname'];
    $dob=$_POST['dob'];
    $job=$_POST['job'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];

  }  else
  {
    echo"<h1 class='text-danger'> THERE IS AN ISSUE WITH THE SUBMIT FUNCTION IN EDITPOST<h1/>";
    echo 'includes/errormsg.php';
    header('Location: records.php');
  }


//Call CRUD Function
$results=$crud->editAttendee($id,$fname,$lname,$dob,$job,$email,$phone);



// Redirect to the view.php page
if($results)
{
    echo 'includes/successmsg.php';
    header("Location: records.php");
    
}
else
{
    //echo '<h1 class="text-center text-danger">There was a problem Sending Over Your Changes</h1>';
    echo 'includes/errormsg.php';
    header('Location: records.php');
}
?>