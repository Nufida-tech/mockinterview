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