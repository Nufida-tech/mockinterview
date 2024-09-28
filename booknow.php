<?php include('includes/navbar.php')?>
<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "mockinterview"); // Database connection

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$interid = $_GET['book'];
$queryy = $conn->query("SELECT * FROM interviewer WHERE userid='$interid'");
$r = mysqli_fetch_array($queryy);
$intername = $r['name'];

// Check if a booking was made
if (isset($_POST['book'])) {
    $userid = $_SESSION['userid']; // Assume this is stored in the session
    $interviewerid = $interid;
    $description = $_POST['description'];
    $dateofbooking = $_POST['dateofbooking'];
    $price=$_POST['price'];
    $updation = $_POST['updation'];;
    $paymentstatus = "pending";

    // Insert the booking into the database
    $sql = $conn->query("INSERT INTO bookings(userid, interviewerid, description, dateofbooking,price, updation, paymentstatus) 
                         VALUES ('$userid', '$interviewerid', '$description', '$dateofbooking','$price', '$updation', '$paymentstatus')");

    if ($sql) {
        $booking_id = $conn->insert_id; // Get the booking ID
        $booking_made = true; // Flag to indicate booking is made
    } else {
        echo "Error creating booking.";
    }
}

// Process payment without redirecting
if (isset($_POST['pay'])) {
    $booking_id = $_POST['booking_id']; // Get the booking ID from the form
    $payment_status = "completed"; // Simulate successful payment

    // Update payment status in the bookings table
    $conn->query("UPDATE bookings SET paymentstatus='$payment_status' WHERE id='$booking_id'");
    $payment_completed = true; // Flag for successful payment
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking and Payment Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Book Now</h2>
    
    <!-- Booking Form -->
    <?php if (!isset($booking_made)): ?>
        <form action="" method="POST">
            <div class="form-group">
                <label for="interviewerid">Interviewer: </label>
                <p><b><?php echo $intername; ?></b></p>
                <input type="text" class="form-control" id="interviewerid" hidden name="interviewerid" value="<?php echo $interid; ?>"><br>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description" name="description" required>
            </div>
            <div class="form-group">
                <label for="dateofbooking">Date of Booking</label>
                <input type="date" class="form-control" id="dateofbooking" name="dateofbooking" required>
            </div>
           
  
     
     <div class="mb-3 col-md-6">
          <label for="amountdisplay" class="form-label">Amount</label>
          <input type="text" class="form-control" value="<?php echo $r['price'];?>" hidden id="price" name="price" required>
          <p class="form-control bg-light text-dark"><?php echo $r['price'];?></p>
        </div>
        <button type="submit" name="book" class="btn btn-primary">Book Now</button>
        </form>
        
    <?php endif; ?>


        <!-- Payment Mode -->
        <?php if (isset($booking_made) && !isset($payment_completed)): ?>
        <h2 class="mt-5">Complete Your Payment</h2>
        <form action="" method="POST">
            <input type="hidden" name="booking_id" value="<?php echo $booking_id; ?>">
            <div class="form-group">
          <label for="paymentmode" class="form-label">Payment Mode</label>
          <select name="paymentmode" id="paymentmode" class="form-control">
            <option value="Gpay">Gpay</option>
            <option value="Card">Card</option>
            <option value="Cash">Cash</option>
          </select>
        </div>
        <button type="submit" name="pay" class="btn btn-success">Pay Now</button>
        </form>
    <?php elseif (isset($payment_completed)): ?>
        <div class="alert alert-success mt-5">Payment successful! Your booking is confirmed.</div>
       
    <?php endif; ?>
</div>




     
    </form>
  
        

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php
include ('./includes/footer.php');
?>
