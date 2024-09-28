<?php
include ('./includes/navbar.php');
?>
<?php
session_start();


if (isset($_POST['login'])) {
    $userid = $_POST['userid'];
    $password = $_POST['password'];
    $confirmpassword=$_POST['confirmpassword'];
    if($password==$confirmpassword){

    


    $res = $conn->query("SELECT * FROM user WHERE userid = '$userid'");
    if ($res->num_rows > 0) {
        while ($r = mysqli_fetch_array($res)) {
            if ($password == $r['password']) {
                $_SESSION['userid']=$userid;    
                $_SESSION['userimage']=$r['photo'];
                $_SESSION['role']="user";
                header("location:interviewers.php");
            } else {
                echo "<script>alert('Invalid Password')</script>";
            }
        }
    } else {
        echo "<script>alert('Invalid User ID')</script>";
    }

}

// Close connection
$conn->close();
}
?>


<div class="container " style="margin-top:190px">
    <h2 class="text-center">User Login</h2>
    <form action="login.php" method="post" class="row justify-content-center">
        <div class="form-group col-7">
            <label for="userid">User ID</label>
            <input type="text" class="form-control" id="userid" name="userid" required>
        </div>
        <div class="form-group col-7">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="form-group col-7">
        <label for="confirmpassword">confirmpassword</label>
        <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" required>
</div>
        <button type="submit" class="btn btn-dark col-7 mt-3" name="login">Login</button>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<?php
include ('./includes/footer.php');
?>