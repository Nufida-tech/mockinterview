<?php
include('./includes/navbar.php');
?>
<?php
session_start();
if (isset($_GET["register"])) {
    
    $name = $_GET['name'];
   $userid = $_GET['userid'];
    $password = $_GET['password'];
    $photo = $_FILES['photo']['name'];
    $photo_target = "uploads/photos/" . basename($photo);
    move_uploaded_file($_FILES['photo']['tmp_name'], $photo_target);
    
     $phone = $_GET['phone'];
    $qualification = $_GET['qualification'];
    $description = $_GET['description'];
   
 $res = $conn->query("INSERT INTO `interviewer`(`name`, `userid`, `password`, `photo`, `phone`, `qualification`, `description`) VALUES ('$name','$userid','$password','$photo_target','$phone','$qualification','$description')");
 if ($res) {
        echo "<script>alert('Added successfully')</script>";
    }
}
?>


<div class="container" style="margin-top:200px;">
    <h2 class="text-center mb-3">Interviewer Registration</h2>
    <form class="row" action="" method="get" enctype="multipart/form-data">
        <div class="form-group col-3">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        
       
        <div class="form-group col-3">
            <label for="userid">User ID</label>
            <input type="text" class="form-control" id="userid" name="userid" required>
        </div>
        <div class="form-group col-3">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="form-group col-3">
            <label for="photo">Photo</label>
            <input type="file" class="form-control" id="photo" name="photo" required>
        </div>
        <div class="form-group col-3">
            <label for="phone">Phone</label>
            <input type="number" class="form-control" id="phone" name="phone" required>
        </div>
        
        <div class="form-group col-3">
            <label for="qualification">Qualification</label>
            <input type="text" class="form-control" id="qualification" name="qualification" required>
        </div>
       
        <div class="form-group col-3">
            <label for="description">description</label>
            <input type="text" class="form-control" id="description" name="description" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3" name="register">Register</button>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<?php
include ('./includes/footer.php');
?>