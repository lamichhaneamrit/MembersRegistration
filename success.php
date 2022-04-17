<?php
$title='Success';
require_once 'includes/header.php';
require_once 'db/conn.php';

if (isset($_POST["submit"])){
    $fname=$_POST["fname"];
    $lname=$_POST["lname"];
    $dob=$_POST["dob"];
    $spes=$_POST["spes"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];


    $isSuccess=$crud->createMember ($fname,$lname,$dob,$spes,$email, $phone);

    if($isSuccess){
              include 'includes/successmessage.php';

    }else{
               include 'includes/errormessage.php';
            header ('Location:viewrecords.php');



    }
}

?>


<!-- First Trying with GET METHODS and then changing to Post afterwards  -->
<div class='card' style="width:18rem">
    <div class="card-body">
        <h5 class="card-title">
            <?php echo $_POST["fname"] . ' ' . $_POST["lname"];  ?>
        </h5>
        <h6 class="card-subtitle mb-2 text-muted">
            <?php echo $_POST["spes"];  ?>
        </h6>
        <p class="card-text">
            Date Of Birth: <?php echo $_POST["dob"];  ?>
        </p>
        <p class="card-text">
            Email Adress: <?php echo $_POST["email"];  ?>
        </p>
        <p class="card-text">
            Contact Number: <?php echo $_POST["phone"];  ?>
        </p>

    </div>
</div>



<?php 
    // echo $_POST['fname'];
    // echo $_POST['lname'];
    // echo $_POST['dob'];
    // echo $_POST['spes'];
    // echo $_POST['email'];
    // echo $_POST['phone'];


 



?>


<?php 
include_once 'includes/footer.php';

?>