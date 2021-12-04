<?php 

class user
{
    //private database object
    private $db;

    //constructor to initialize private variable tro the database connection
    function __construct($conn)
    {
        $this ->db = $conn;   
    }

    public function insertUser($username, $password)
    {
        try
       {
           //function doing a username redundancy check
           $results=$this->getUserbyUsername($username);
            if($results['num']>0)
            {
                return false;
                echo'
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                <div>
                    Username is NOT available! Please user a different Username.
                </div>
                </div>
                ';
            }
            else
                {
                    $newpassword=md5($password.$username); // password value is being hashed and salted with username to increase security. value is being stored in new password
                    $sql="INSERT INTO users (username,password) VALUES(:username,:password)";
                    // binding all placeholders to actual values
                    $stmt=$this->db->prepare($sql);
                    $stmt->bindparam(':username',$username);
                    $stmt->bindparam(':password',$newpassword);// hashed and salted password is being stored in database for greater security    
                }

             

        $stmt->execute();
        return true;

        }catch(\PDOException $e)
            {
                //throw $th;
                echo $e->getMessage();
                return false;
            }
    } 
    
    
    
    public function getUser($username, $password)
    {
            try
            { 
                $sql="select * from users where `username`=:username AND `password`=:password ";
                $stmt=$this->db->prepare($sql);
                $stmt->bindparam(':username',$username);
                $stmt->bindparam(':password',$password);
                $stmt->execute();
                $results=$stmt->fetch();
                return $results;
            }
            catch(\PDOException $e)
                {
                    //throw $th;
                    echo $e->getMessage();
                    return false;
                }
    }


    public function getUserbyUsername($username)
    {
        try
            { 
                $sql="select count(*) as num from users where `username`= :username";
                $stmt=$this->db->prepare($sql);
                $stmt->bindparam(':username',$username);
                
                $stmt->execute();
                $results=$stmt->fetch();
                return $results;
            }
            catch(\PDOException $e)
                {
                    //throw $th;
                    echo $e->getMessage();
                    return false;
                }

    }


}
    
    
?>