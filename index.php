<?php 
$title ='homepage';
include 'includes/header.php';
require_once 'db/conn.php';

$results=$crud->getSpecialty();


?>

<br />
<div class="container">
    <h1 class='text-center'>Registration form IT Conference</h1>

    <form action='success.php' method="POST">
        <div class="form-group">
            <label for="FirstName">First Name</label>
            <input required type="text" class="form-control" id="FirstName" name="fname" placeholder="Enter First Name">

        </div>
        <div class="form-group">
            <label for="LastName">Last Name</label>
            <input required type="text" class="form-control" id="LastName" name="lname" placeholder="Enter Last Name">

        </div>

        <div class="form-group">
            <label for="dob">Birthday</label>
            <input required type="text" class="form-control" id="dob" name="dob" placeholder="Enter Date ">
        </div>
        <div class="form-group">
            <label for="specialtiy">Area of your Specilities </label>
            <select required class="form-control" id="specilities" name="spes">
                <?php while($r = $results->fetch(PDO::FETCH_ASSOC)){?>
                <option value="<?php echo $r['speciality_id'] ?> "> <?php echo $r["name"];?></option>
                <?php } ?>

            </select>

        </div>


        <div class="form-group">
            <label for="Email1">Email address</label>
            <input required type="email" class="form-control" id="Email" name="email" placeholder="Enter email">
            <small id="Email" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="phone">Contact Number</label>
            <input required type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone">

        </div>

        <button type="submit" class="btn btn-primary btn-block" name="submit">Register Now</button>
    </form>
    <br>
    <br>
    <br>
    <br>
    <?php 
  include 'includes/footer.php';

?>
</div>