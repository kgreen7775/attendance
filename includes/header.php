<!-- the session function located in the session.php file
is used to resume a session. including it here will make
it lod on all pages that require the header file --> 
<?php include_once 'includes/session.php' ?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- JQUERY CSS FOR DOB-Datepicker-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">

    <!-- User created CSS -->
    <link rel='stylesheet' href="css/site.css"/>



    <title> Attendance - <?php echo $title ?> </title>
  </head>
  <body>

  
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary" action="signin.php">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">IT CONFERENCE</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="records.php">View Attendees</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li> -->

      </ul>
    </div>
  </div>

  <div class="navbar-nav mr-auto"  id="navbarNav">
      <li class="nav-item dropdown">
        <a class="nav-link active dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false" >Login</a>
        <ul class="dropdown-menu">
        <?php 
      if(!isset($_SESSION['userid']))
      {
        ?>
          <li><a class="dropdown-item" href="signin.php">Sign In</a></li>
          <!-- <li><a class="dropdown-item" href="#">Another action</a></li> -->
      <?php }else {?>
        <span style="text-align: center;"> Hi <?php echo $_SESSION['username'].','; ?></span>
        <li><a class="dropdown-item" href="signout.php">Sign Out</a></li>
      <?php }?>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="signup.php">Sign Up</a></li>
          <!-- <li><a class="dropdown-item" href="#">Something else here</a></li> -->
        </ul>
      </li>
  </div>
</nav>


  <div class="container">
      

<br/>
<br/>
