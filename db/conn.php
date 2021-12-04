<?php 

$host='127.0.0.1';
$db='attendace_db';
$user='root';
$pass='';
$charset='utf8mb4';

// $host='b0tgfpkm1nuzvojebjvb-mysql.services.clever-cloud.com';
// $db='b0tgfpkm1nuzvojebjvb';
// $user='uzd4gsef776t0tyf';
// $pass='spWr32xjmJOnVbQzQ0JP';
// $charset='utf8mb4';


$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try
{
    $pdo=new PDO($dsn,$user,$pass);
   // echo 'Database Initialized Successfully';
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e)
    {
      //throw new PDOException($e->getMessage());
       //echo "<h1 class='text-danger'> Database Failed to Initialized </h1>";

      echo '
       <div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </svg>
        <div>
            Database Failed to Initialized
        </div>
        </div> ';


    }

require_once 'crud.php';
require_once 'user.php';
$crud=new crud($pdo);
$user=new user($pdo);

$user->insertUser("admin","password");
?>



