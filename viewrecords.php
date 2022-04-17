<?php 
    $title='view records';
     require_once 'includes/header.php';
     require_once 'db/conn.php';

     $results=$crud->getMembers();


?>
<table class="table">
    <tr>
        <th>S.N</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Specialty</th>
        <!-- <th>Date of birth</th>
        <th>email</th>
        <th>phone</th> -->
        <th>Actions</th>

    </tr>
    <?php while ($r =$results->fetch(PDO::FETCH_ASSOC)){?>
    <tr>
        <td><?php echo $r['addendee_id']?></td>
        <td><?php echo $r['firstname']?></td>
        <td><?php echo $r['lastname']?></td>
        <td><?php echo $r['name']?></td>
        <!-- name is now the column from db which is now fetched from db as well  -->
        <!-- <td><?php echo $r['dob']?></td>
        <td><?php echo $r['email']?></td>
        <td><?php echo $r['phone']?></td> -->
        <td>
            <a href="view.php?id=<?php echo $r['addendee_id']?>" class="btn btn-primary">View</a>
            <a href="edit.php?id=<?php echo $r['addendee_id'] ?>" class="btn btn-warning">Edit</a>
            <a onclick="return confirm ('Are you sure want to delete this record ?');"
                href="delete.php?id=<?php echo $r['addendee_id'] ?>" class="btn btn-danger">Delete</a>

        </td>






    </tr>

    <?php } ?>;







</table>



<?php
 require_once 'includes/footer.php';

?>