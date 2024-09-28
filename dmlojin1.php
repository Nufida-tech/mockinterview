<?php include('includes/navbar.php')?>

<style>

* {
    box-sizing: border-box;
}

html, body {
    height: 100%;
    margin: 0;
}

body {
    display: flex;
    flex-direction: column;
}

.login-container {
    background: white;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 300px;
    padding: 5px;
    margin: auto; /* Center the container */
    margin-top: 150px; /* Space from the top */
}


.login-container h2 {
    text-align: center;
}

.login-container input {
    width: 100%;
    padding: 0.75rem;
    margin: 0.5rem 0;
    border: 1px solid #ddd;
    border-radius: 4px;
}

.login-container button {
    border: none;
    border-radius: 4px;
    background-color: #007bff;
    color: white;
    font-size: 1rem;
    cursor: pointer;
    width: 100%;
    padding: 10px;
    transition: 0.3s ease;
}

.login-container button:hover {
    background-color: #0056b3;
}

</style>
<body>
    

    <div class="login-container" >
        <h2>interviewer Login</h2>
        <form action="" method="post">
            <input type="text" name="Userid" placeholder="Username" required>
            <input type="password" name="Password" placeholder="Password" required>  
            
            <button type="submit" name="interviewer">Login</button>
        </form>

    </div>
<?php
session start();
$con=mysqli_connect("localhost","root","","mockinterview");
if(!$con)
{
    echo "not connected";
}
if(isset($_POST["interviewer"]))
{
    $Userid=$_POST["Userid"];
    $Password=$_POST["Password"];
    $s=$con->query("SELECT * FROM interviewer where Userid='$Userid' and Password= '$Password'");
    if($s->num_rows==1)
    {
    
        echo "<script> alert('staff exist'); </script>";
        while($r=mysqli_fetch_array($s))
        $_SESSION["Userid"]=$Userid;
        $_SESSION["role"]="interviewerid";
        header("location:interviewerpanel.php");
    }
}
else
{
    echo mysqli_error($con);
 
}
?>
<?php include('includes/footer.php')?>

//interviewerbooking

<?php
include('./includes/navbar.php');
$conn = mysqli_connect("localhost", "root", "", "mockinterview");

?>
<div style="padding-top:150px"></div>
<?php
// Check if the session variable is set
if (isset($_SESSION["role"]) == "interviewer") {
    $interviewerid = $_SESSION["userid"];

    $s = $conn->query("SELECT * FROM bookings WHERE `interviewerid`='$interviewerid'");

    if ($s->num_rows > 0) {
        ?>
        <style>
            .form-control {
                background-color: #d4d3e3;
            }
        </style>
        <div class="container mt-5 text-center mb-5" style="margin-top:150px;">
            <h2 class="mb-4">My Bookings</h2>
            <form action="" method="post" class="d-flex justify-content-center">
                <div class="row">
                    <div class="container mt-5">

                        <table class="table table-bordered">

                            <tr>
                                <th>ID</th>
                                <th>User ID</th>
                                <th>Interviewer ID</th>
                                <th>Description</th>
                                <th>Date of Booking</th>
                                <th>Status</th>
                                <th>Payment Status</th>
                            </tr>


                            <?php while ($row = mysqli_fetch_array($s)) { ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['userid']; ?></td>
                                    <td><?php echo $row['interviewerid']; ?></td>
                                    <td><?php echo $row['description']; ?></td>
                                    <td><?php echo $row['dateofbooking']; ?></td>
                                    <td><?php echo $row['status']; ?></td>
                                    <td><?php echo $row['paymentstatus']; ?></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                        <?php   
    } else {
        echo "No bookings found.";
    }
} else {
    echo "Interviewer ID not set. Please log in as an interviewer.";
}
?>
            </div>
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            <?php include 'includes/footer.php' ?>
            </body>

            </html>

            <?php
            $conn->close();
            ?>

            //booknow
            <?php include('includes/navbar.php')?>
<?php
session_start();
$interid=$_GET['book'];
$queryy=$conn->query("select * from interviewer where userid='$interid'");
while($r=mysqli_fetch_array($queryy))
{
    $intername=$r['name'];
}

if(isset($_POST['book'])){
    
$userid = $_SESSION['userid'];
$interviewerid = $interid;
$description = $_POST['description'];
$dateofbooking = $_POST['dateofbooking'];
$status = "pending";
$paymentstatus = "pending";

$sql=$conn->query("INSERT INTO bookings(userid, interviewerid, description, dateofbooking, status, paymentstatus) VALUES ('$userid','$interviewerid','$description','$dateofbooking','$status','$paymentstatus')");

if ($sql) {
    echo "New booking created successfully";
} 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Book Now</h2>
    <form action="" method="POST">
             <div class="form-group">
            <label for="interviewerid">Interviewer : </label>
           <p><b> <?php echo $intername; ?></b></p>
            <input type="text" class="form-control" id="interviewerid" hidden name="interviewerid" value="<?php  echo $interid; ?>"><br><required>
            
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" id="description" name="description" required>
        </div>
        <div class="form-group">
            <label for="dateofbooking">Date of Booking</label>
            <input type="date" class="form-control" id="dateofbooking" name="dateofbooking" required>
        </div>
      
        <button type="submit" name="book" class="btn btn-primary">Book Now</button>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
    
</body>
</html>   