<?php

class crud
{
    //private database object
    private $db;

    //constructor to initialize private variable tro the database connection
    function __construct($conn)
    {
        $this ->db = $conn;
    }
    // function that creates records for database
    public function insertAttendee($fname,$lname,$dob,$job,$email,$phone,$imgpath)
    {
       try
       {
        $sql="INSERT INTO attendee (FirstName, LastName, DateOfBirth,Specialization_id,Email,Contact,img_path) VALUES(:fname,:lname,:dob,:job,:email,:phone,:imgpath)";
       // binding all placeholders to actual values
        $stmt=$this->db->prepare($sql);
        $stmt->bindparam(':fname',$fname);
        $stmt->bindparam(':lname',$lname);
        $stmt->bindparam(':dob',$dob);
        $stmt->bindparam(':job',$job);
        $stmt->bindparam(':email',$email);
        $stmt->bindparam(':phone',$phone);
        $stmt->bindparam(':imgpath',$imgpath);
        

        $stmt->execute();
        return true;

        }catch(\PDOException $e)
            {
                //throw $th;
                echo $e->getMessage();
                return false;
            }
    } 


  // function that views records from database

    public function getAttendees()
    {
       try
       { $sql="SELECT *FROM `attendee`a inner join `specialization`s on a.Specialization_id = s.Specialization_id";
        $results = $this->db->query($sql);
        return $results;
       }
       catch(\PDOException $e)
            {
                //throw $th;
                echo $e->getMessage();
                return false;
            }
    }

    public function getSpecialization()
    {
        try
        {
            $sql="SELECT *FROM `specialization`";
            $results = $this->db->query($sql);
            return $results;
        }
        catch(\PDOException $e)
            {
                //throw $th;
                echo $e->getMessage();
                return false;
            }

    }

    public function getAttendeesDetails($id)
    {
       try
       { 
           $sql="select * from `attendee`a inner join `specialization`s on a.Specialization_id = s.Specialization_id where Attendance_id=:id";
            $stmt=$this->db->prepare($sql);
            $stmt->bindparam(':id',$id);
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

    public function editAttendee($id,$fname,$lname,$dob,$job,$email,$phone)
    {
        // $sql="UPDATE `attendee` SET `FirstName`=':fname',`LastName`=':lname',`DateOfBirth`=':dob',
        // `Specialization_id`=':job',`Email`=':email',`Contact`=':phone' WHERE `Attendance_id`=':id'";
   
        $sql = "UPDATE `attendee` SET `FirstName`=:fname,`LastName`=:lname,`DateOfBirth`=:dob,`Email`=:email,
        `Contact`=:phone,`Specialization_id`=:job 
        WHERE Attendance_id = :id ";
        try
        {

            $stmt = $this->db->prepare($sql);
            // bind all placeholders to the actual values
            $stmt->bindparam(':id',$id);
            $stmt->bindparam(':fname',$fname);
            $stmt->bindparam(':lname',$lname);
            $stmt->bindparam(':dob',$dob);
            $stmt->bindparam(':email',$email);
            $stmt->bindparam(':phone',$phone);
            $stmt->bindparam(':job',$job);

        // $sql="INSERT INTO attendee (FirstName, LastName, DateOfBirth,Specialization_id,Email,Contact) VALUES(:fname,:lname,:dob,:job,:email,:phone)";
        // binding all placeholders to actual values
        // //  $stmt=$this->db->prepare($sql);
        // //  $stmt->bindparam(':id',$id);
        // //  $stmt->bindparam(':fname',$fname);
        // //  $stmt->bindparam(':lname',$lname);
        // //  $stmt->bindparam(':dob',$dob);
        // //  $stmt->bindparam(':job',$job);
        // //  $stmt->bindparam(':email',$email);
        // //  $stmt->bindparam(':phone',$phone);
         
        // //  var_dump($stmt);
         $stmt->execute();
         return true;
 
         }catch(\PDOException $e)
             {
                 //throw $th;
                 echo $e->getMessage();
                 return false;
             }

   
   
    }// end of the edit function

    public function deleteAttendee($id)
    {
        try{
            $sql="delete from attendee where Attendance_id=:id";
            $stmt=$this->db->prepare($sql);
            $stmt->bindparam(':id',$id);
            $stmt->execute();
            return true;
        }
        catch(\PDOException $e)
        {
            //throw $th;
            echo $e->getMessage();
            return false;
        }
    }   


    public function getSpecializationByID($job)
    {
        try
        {
            $sql="SELECT *FROM `specialization` WHERE `specialization_id` =:job";
            $stmt= $this->db->prepare($sql);
            $stmt->bindparam(':job',$job);
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