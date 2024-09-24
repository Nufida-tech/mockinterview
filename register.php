<?php
include ('./includes/navbar.php');
?>
<?php

if (isset($_POST['register'])) {
    // Collect form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $userid = $_POST['userid'];
    $password = $_POST['password'];
    $qualification = $_POST['qualification'];

    $photo = $_FILES['photo']['name'];
    $resume = $_FILES['resume']['name'];
    $photo_target = "uploads/photos/" . basename($photo);
    $resume_target = "uploads/resumes/" . basename($resume);


    move_uploaded_file($_FILES['photo']['tmp_name'], $photo_target);
    move_uploaded_file($_FILES['resume']['tmp_name'], $resume_target);
    
    $query = "SELECT * FROM user WHERE userid = '$userid'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    echo "<script>alert('Username already exists!')</script>";
} else {


    $res = $conn->query("INSERT INTO user (name, email, address, phone, userid, password, qualification, photo, resume)
     VALUES ('$name', '$email', '$address', '$phone','$userid', '$password', '$qualification', '$photo_target', '$resume_target')");
    if ($res) {
        echo "<script>alert('Registeration successfull')</script>";
    }
    
}
}
?>


<div class="container" style="margin-top:200px;">
    <h2 class="text-center mb-3">User Registration</h2>
    <form class="row" action="register.php" method="post" enctype="multipart/form-data">
        <div class="form-group col-3">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group col-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group col-3">
            <label for="address">Address</label>
            <textarea class="form-control" id="address" name="address" required></textarea>
        </div>
        <div class="form-group col-3">
            <label for="phone">Phone</label>
            <input type="number" class="form-control" id="number" name="phone" required>
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
            <label for="qualification">Qualification</label>
            <input type="text" class="form-control" id="qualification" name="qualification" required>
        </div>
        <div class="form-group col-3">
            <label for="photo">Photo</label>
            <input type="file" class="form-control" id="photo" name="photo" required>
        </div>
        <div class="form-group col-3">
            <label for="resume">Resume</label>
            <input type="file" class="form-control" id="resume" name="resume" required>
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