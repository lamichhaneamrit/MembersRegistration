<?php 
   $title='view records';
     require_once 'includes/header.php';
    require_once 'includes/auth_check.php';

     require_once 'db/conn.php';
    //  
    if (isset($_GET['id'])){
        $id =$_GET['id'];
        $result=$crud->getMemberDetails($id);
        
    }else {
            include 'includes/errormessage.php';
            header ('Location:viewrecords.php');

    }
?>

<img src="<?php echo empty($result['avatar_path']) ? "uploads/blank.png" :$result['avatar_path'] ; ?>"
    class="rounded-circle" style="width:50%; height:50%" />

<div class='card' style="width:18rem">
    <div class="card-body">
        <h5 class="card-title">
            <?php echo $result["firstname"] . ' ' . $result["lastname"];  ?>
        </h5>
        <h6 class="card-subtitle mb-2 text-muted">
            <?php echo $result["name"];  ?>
        </h6>
        <p class="card-text">
            Date Of Birth: <?php echo $result["dob"];  ?>
        </p>
        <p class="card-text">
            Email Adress: <?php echo $result["email"];  ?>
        </p>
        <p class="card-text">
            Contact Number: <?php echo $result["phone"];  ?>
        </p>

    </div>
</div>
<br />
<a href="view.php" class="btn btn-info">Back to list</a>
<a href="edit.php?id=<?php echo $result['addendee_id'] ?>" class="btn btn-warning">Edit</a>
<a onclick="return confirm ('Are you sure want to delete this record ?');"
    href="delete.php?id=<?php echo $result['addendee_id'] ?>" class="btn btn-danger">Delete</a>

<?php 
     require_once 'includes/footer.php';

?>