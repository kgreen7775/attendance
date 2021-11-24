
<?php 
$title='edit';
?>


<?php 
  require_once 'includes/header.php';
  require_once 'db/conn.php';

  $results=$crud->getSpecialization();
  if(!isset($_GET['id']))
  {
    //echo"<h1 class='text-danger'> THERE'S AN ISSUE WITH  IF FUNCTION IN EDIT<h1/>";
    echo 'includes/errormsg.php';
    header('Location: records.php');
  }
  else
  {
      $id=$_GET['id'];
      $attendee=$crud->getAttendeesDetails($id);
?>

<!-- 
 - Firstname
 - Lastname
 - Date of Birth (Use Date Picker)
 - Specialization (Database Admin, Software Developer,Web Admin, Other)
 - Email address
 - Contact Number
-->
    <h1 class="text-center">Edit Record</h1>

    <!--<form method="get" action="confirm.php"> -->
    
    <form method="post" action="editpost.php">
    <!-- <input type="hidden" name="id" value="<?php // echo $attendee['attendee_id']?>"/> --> 
    <input type="hidden" name="id" value="<?php echo $attendee['Attendance_id']?>"/> 
      <div class="mb-3"> <!-- FIRST NAME DIV-->
        <label for="firstname" class="form-label">First Name</label> <!-- NOTE THAT THE VALUES INSIDE THE PHP BLOCK IS REF FROM THE DATQBASE VARIABLES -->                                   
        <input type="text" class="form-control" value="<?php echo $attendee['FirstName']; ?>" id="firstname" name="firstname" aria-describedby="firstname">
       <div class="form-text">Your First Name is your identity 
       </div>
      </div>

      <div class="mb-3"> <!-- LAST NAME DIV-->
        <label for="lastname" class="form-label">Last Name</label>
        <input type="text" class="form-control" value="<?php echo $attendee['LastName']; ?>" id="lastname" name="lastname" aria-describedby="lastname">
       <div class="form-text">Your Last Name is your hertiage 
       </div>
      </div>

      <div class="mb-3"> <!-- DATE OF BIRTH DIV-->
        <label for="dob" class="form-label">Date of Birth</label>
        <input type="text" class="form-control" value="<?php echo $attendee['DateOfBirth']; ?>" id="dob" name="dob" aria-describedby="dob">
       <div class="form-text">Your D.O.B is life marker 
       </div>
      </div>

      <div class="mb-3"> <!-- SPECIALIZATION DIV-->
      <select class="form-control" aria-label="specialization" id="job" name="job">
       
      <!-- <option selected>Select an Option</option>
        <option value="Software">Software</option>
        <option value="Database">Database</option>
        <option value="Web">Web</option>
        <option value="Networking">Networking</option>
        <option value="Media and Graphics">Media and Graphics</option>
        <option value="Animation and Gaming">Animation and Gaming</option>
        <option value="Other">Other</option>
      -->
      <?php while($r=$results->fetch(PDO::FETCH_ASSOC)) {?>

        <option value="<?php echo $r['Specialization_id']?>" <?php if($r['Specialization_id']==$attendee['Specialization_id']) echo 'selected'?>> 
        <?php echo $r['NameOfSpecialization'];?></option>

      <?php }?> 
      </select>
      </div>

      <div class="mb-3"> <!-- EMAIL DIV-->
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" value="<?php echo $attendee['Email']; ?>" id="email" name="email" aria-describedby="emailHelp">
       <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
       </div>
      </div>
    <!-- PASSWORD DIV
        <div class="mb-3"> 
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
    -->
      <div class="mb-3"> <!-- PHONE NUM DIV-->
        <label for="phone" class="form-label">Contact number</label>
        <input type="text" class="form-control" value="<?php echo $attendee['Contact']; ?>" id="phone" name="phone" aria-describedby="phonehelp">
       <div id="phonehelp" class="form-text">We'll never share your contact with anyone else.
       </div>
      </div>



    <div class="mb-3 form-check">  <!--CHECK BOX DIV -->
        <input type="checkbox" class="form-check-input">
        <label class="form-check-label" for="check">CHECK THE BOX</label>
      </div>
      
      <!-- SUBMIT BUTTION DIV-->
        <button type="submit" name="submit" id="submit"class="btn btn-success">Save Changes</button>
        <td><a href="records.php?id" class="btn btn-primary"> BACK TO LIST </a></td>
    </form>
<?php } ?><!-- END OF ELSE STATEMENT -->


<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<?php 

  require_once 'includes/footer.php';
?>