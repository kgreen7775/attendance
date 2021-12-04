<?php 
$title='User Sign-in';
?>


<?php 
  require_once 'includes/header.php';
  require_once 'db/conn.php';

//if data was submitted via a post request then
if($_SERVER['REQUEST_METHOD']=='POST')
{
    //var_dump($_POST); die();
    $username=strtolower(trim($_POST['username']));
    $password=$_POST['password'];
    $newpassword=md5($password.$username);

    $results = $user->getUser($username,$newpassword);
   
    if(!$results)
    {
        echo 'SOMTHING IS WRONG WITH SERVER REQUEST IF STATEMENT';
    }
    else
        {
           $_SESSION['username']=$username;
           $_SESSION['userid']=$results['user_id'];
           header("Location: records.php");

        }

}

?>

<h1 class="text-centre"> <?php echo $title ?> </h1>


<form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="post">
    <table class="table table-sm">
        <tr>
            <td><label for="username">Username: *</lable></td>
            <td><input type="text" name="username" class="form-conrol" id="username" value="<?php if($_SERVER['REQUEST_METHOD']=='POST') echo $_POST['username'];?>"></td>
        </tr>
        <tr>
            <td><label for="password">password: *</label></td>
            <td><input type="text" name="password" class="form-control" id="password"></input></td>
        </tr>
    </table><br/><br/><hr/>
    <input type="submit" value="Login" class="btn btn-primary btn-block"></input>
    <a href="#">Forgot Password</a>
</form><br/><br/><br/>

<?php include_once 'includes/footer.php'?>