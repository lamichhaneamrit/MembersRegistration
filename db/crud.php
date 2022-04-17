<?php 
    class crud{
        private $db;

        function __construct($conn){
            $this->db =$conn;
        }
//    FUNCTION FOR CREATING MEMBERS
        public function createMember ($fname, $lname, $dob, $spes, $email, $phone){
            try{
                $sql="INSERT INTO `Attendee` (`firstname`, `lastname`,  `dob`, `specilities_id`, `email`,`phone`) VALUES (:fname, :lname, :dob, :spes, :email, :phone)";
                
                $stmt=$this->db->prepare($sql);

                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':spes',$spes);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':phone',$phone);

                $stmt->execute();
                return true;

                
            }   catch(PDOException $e){
                echo $e->getMessage();
                return false;

        }
   
        
    }
// Functions for getting members from db
    public function getMembers(){
        try {
            $sql ="SELECT * FROM `Attendee` a inner join specalities s on a.specilities_id = s.speciality_id";
            $result=$this->db->query($sql);
            return $result;
        }catch (PDOException $e) {
             echo $e->getMessage();
            return false;
    }
    }
// functions to get speciality only
     public function getSpecialty(){
         try{
                $sql ="SELECT * FROM `specalities` ";
                $result=$this->db->query($sql);
                return $result;
        }catch  (PDOException $e) {
                echo $e->getMessage();
                return false;

         }
    }


    public function getMemberDetails($id){
        try{
            $sql ="SELECT * FROM Attendee  a inner join specalities s on a.specilities_id = s.speciality_id where  addendee_id =:id ";
            $stmt =$this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            $result=$stmt->fetch();
            return $result;
        }catch (PDOException $e) {
            echo $e->getMessage();
            return false;
    }
    }
      public function updateMemberDetails($id,$fname, $lname, $dob, $spes, $email, $phone){
        try{ 
                $sql = "UPDATE `Attendee` SET `firstname`=:fname,`lastname`=:lname,`dob`=:dob,`specilities_id`=:spes, `email`=:email,`phone`=:phone WHERE addendee_id = :id ";
                $stmt = $this->db->prepare($sql);
                // bind all placeholders to the actual values
                $stmt->bindparam(':id',$id);
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':spes',$spes);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':phone',$phone);

                // execute statement
                $stmt->execute();
                return true;
                }catch (PDOException $e) {
                    echo $e->getMessage();
                    return false;
                }
    

    }
   
        public function deleteMembers($id){
            try{
            $sql= "delete from Attendee  WHERE addendee_id = :id ";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id',$id);
            $stmt->execute();
            return true;
            }  catch ( PDOException $e) {
                    echo $e->getMessage();
                    return false;

            }
        }
  }
?>