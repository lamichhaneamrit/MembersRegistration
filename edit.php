<?php 
$title ='Edit the Records';
include 'includes/header.php';
require_once 'includes/auth_check.php';

require_once 'db/conn.php';

$results=$crud->getSpecialty();

if(!isset($_GET['id'])){

    include 'includes/errormessage.php';
    header ('Location:viewrecords.php');

}else {
    $id=$_GET['id'];
    $attendee =$crud->getMemberDetails($id);




?>

<br />
<div class="container">
    <h1 class='text-center'>Edit Records</h1>

    <form method="POST" action='editpost.php'>

        <input type='hidden' name='id' value="<?php echo $attendee['addendee_id']?>" />
        <div class="form-group">
            <label for="FirstName">First Name</label>
            <input type="text" value="<?php echo $attendee['firstname'] ?>" class="form-control" id="FirstName"
                name="fname">

        </div>
        <div class="form-group">
            <label for="LastName">Last Name</label>
            <input type="text" value="<?php echo $attendee['lastname'] ?>" class="form-control" id="LastName"
                name="lname" placeholder="Enter Last Name">

        </div>

        <div class="form-group">
            <label for="dob">Birthday</label>
            <input type="text" value="<?php echo $attendee['dob'] ?>" class="form-control" id="dob" name="dob"
                placeholder="Enter Date ">
        </div>
        <div class="form-group">
            <label for="specialtiy">Area of your Specilities </label>
            <select class="form-control" id="specilities" name="spes">
                <?php while($r = $results->fetch(PDO::FETCH_ASSOC)){?>
                <option selected value="<?php echo $r['speciality_id']?>" <?php if($r['speciality_id'] == $attendee['specilities_id']) echo 'selected'
                     ?>>

                    <?php echo $r["name"];?></option>
                <?php } ?>

            </select>

        </div>


        <div class="form-group">
            <label for="Email1">Email address</label>
            <input type="email" value="<?php echo $attendee['email'] ?>" class="form-control" id="Email" name="email"
                placeholder="Enter email">
            <small id="Email" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="phone">Contact Number</label>
            <input type="text" value="<?php echo $attendee['phone'] ?>" class="form-control" id="phone" name="phone"
                placeholder="Enter phone">

        </div>

        <button type="submit" class="btn btn-success btn-block" name="submit">Save Changes</button>
    </form>

    <?php } ?>
    <br>
    <br>
    <br>
    <br>
    <?php 
  include 'includes/footer.php';

?>
</div>