<?php 
$title='edit';
?>


<?php 
  require_once 'includes/header.php';
  require_once 'includes/check.php';
  require_once 'db/conn.php';

  if(!$_GET['id'])
  {
      echo '';
  }
  else
  {// GET ID VALUES
    $id=$_GET['id'];

    // CALL DELETE FUNCTION
    $results=$crud->deleteAttendee($id);


    //REDIRECT TO LIST
    if($results)
    { 
        echo 'includes/successmsg.php';
        header(":Location: records.php");
       
    }
    else   
        {
            echo 'includes/errormsg.php';
            header('Location: records.php');
        }
  }

?>