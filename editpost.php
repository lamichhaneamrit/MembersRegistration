<?php 

$title='Success';
require_once 'includes/header.php';
require_once 'db/conn.php';

if (isset($_POST["submit"])){
    $id=$_POST["id"];
    $fname=$_POST["fname"];
    $lname=$_POST["lname"];
    $dob=$_POST["dob"];
    $spes=$_POST["spes"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];

    // call crud 
    $result=$crud->updateMemberDetails($id,$fname, $lname, $dob, $spes, $email, $phone);

    if ($result){
        header("Location: viewrecords.php");
    }else{
        include 'includes/errormessage.php';
        header ('Location:viewrecords.php');


    }

}
else {
        include 'includes/errormessage.php';
     header ('Location:viewrecords.php');

    
}
   ?>
<?php 
include_once 'includes/footer.php';

?>