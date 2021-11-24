
<?php 
$title='records';
?>


<?php 
  require_once 'includes/header.php';
  require_once 'db/conn.php';

  $results=$crud->getAttendees()
?>

<table class="table table-striped">
    <tr> <!-- attendee table headers -->
    <th>#</th>
    <th>First Name</th>
    <th>Last Name</th>
  <!--  <th>Date Of Birth</th> -->
    <th>Job</th>
  <!--  <th>Email</th> -->
  <!--  <th>Contact</th> -->
    <th>Actions</th>
    </tr>

    <tr>
        <td>1</td>
        <td>fname value</td>
        <td>lname value</td>
    <!--    <td>dob value</td> -->
        <td>Developer</td>
    <!--    <td>email@value.com</td> -->
    <!--    <td>1234567</td> -->
        

    </tr>

    <!-- while loop to fetch the informartion -->
    <!-- We have also referenced NameOfSpecialization from the Specialization table because of the inner join that is now ineffect of the crub.php page 
    syntax is simple: < ?php echo $r['NameOfSpecialization']?> inside of the <td></td> tag-->
    <?php while($r=$results->fetch(PDO::FETCH_ASSOC)){?>
    <tr>
    <td><?php echo $r['Attendance_id']?></td>
    <td><?php echo $r['FirstName']?></td>
    <td><?php echo $r['LastName']?></td>
    <!-- <td><?php //echo $r['DateOfBirth']?></td> -->
    <td><?php echo $r['NameOfSpecialization']?></td> 
    <!-- <td><?php //echo $r['Email']?></td> -->
    <!-- <td><?php //echo $r['Contact']?></td> -->
    <td><a href="view.php?id=<?php echo $r['Attendance_id']?>" class="btn btn-primary"> VIEW </a></td>
    <td><a href="edit.php?id=<?php echo $r['Attendance_id']?>" class="btn btn-warning"> EDIT </a></td>
    <td><a onclick="return confirm('ARE YOU SURE ABOUT DELETING THIS RECORD? ONCE DONE CAN NEVER GO BACK');" href="delete.php?id=<?php echo $r['Attendance_id']?>" class="btn btn-danger"> DELETE </a></td>
    
</tr>
        <?php  }?>
            
    

</table>

<br/>
<br/>
<br/>
<br/>
<br/>
<br/>

<?php 

  require_once 'includes/footer.php';
?>