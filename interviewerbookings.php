<?php include('includes/navbar.php')?>
<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "mockinterview");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


if (isset($_POST['update'])) {
    $booking_id = $_POST['booking_id'];
    $updation = $_POST['updation'];

    
    $sql = $conn->query("UPDATE bookings SET updation='$updation' WHERE id='$booking_id'");

    if ($sql) {
        echo "Booking updated successfully!";
    } else {
        echo "Error updating booking.";
    }
}


$interviewerid = $_SESSION["userid"];

// Fetch bookings for the logged-in interviewer
$s = $conn->query("SELECT * FROM bookings WHERE interviewerid='$interviewerid'");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interviewer Bookings</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>My Bookings</h2>

    <?php if ($s->num_rows > 0): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User ID</th>
                    <th>Description</th>
                    <th>Date of Booking</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $s->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['userid']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td><?php echo $row['dateofbooking']; ?></td>
                    <td>
                        <!-- Form to update the description with link and time -->
                        <form action="" method="POST">
                            <input type="hidden" name="booking_id" value="<?php echo $row['id']; ?>">
                            <textarea class="form-control" name="updation" rows="2" placeholder="Add meeting link and time..."><?php echo $row['updation']; ?></textarea>
                            <button type="submit" name="update" class="btn btn-primary mt-2">Update</button>
                        </form>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No bookings found.</p>
    <?php endif; ?>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php include('includes/footer.php')?>

