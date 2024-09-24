


<?php


$host = "localhost";
$dbname = "mockinterview";
$username = "root";
$password = "";

$conn = new mysqli($host, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM bookings";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Bookings</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>All Bookings</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
            <th>ID</th>
                <th>User ID</th>
                <th>Interviewer ID</th>
                <th>Description</th>
                <th>Date of Booking</th>
                <th>Status</th>
                <th>Payment Status</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()) { ?>
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
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>