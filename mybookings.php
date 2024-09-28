<?php
include ('./includes/navbar.php');
?>
<?php


if(isset($_POST['book']))
{

    $date=date("d/m/Y");
    
    $userid = $_SESSION['userid'];
    $interviewerid = $interid;
    $description = $_POST['description'];
    $dateofbooking = $_POST['dateofbooking'];
    $updation = "pending";
    $paymentstatus = "pending";
    $insert=$conn->query("INSERT INTO bookings (userid, interviewerid, description, dateofbooking, updation, paymentstatus)
     VALUES ('$userid','$interviewerid','$description','$dateofbooking','$updation','$paymentstatus')");

}
$userid=$_SESSION["userid"];
$s=$conn->query("SELECT * FROM bookings where `userid`='$userid' ");
if($s->num_rows>0){
   ?>
 <style>
.form-control {
    background-color: #d4d3e3;
}
</style>
<div class="container mt-5 text-center mb-5">
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
                <th>updation</th>
                <th>Payment Status</th>
            </tr>
       

            <?php while($row = mysqli_fetch_array($s)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['userid']; ?></td>
                <td><?php echo $row['interviewerid']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['dateofbooking']; ?></td>
                <td><?php echo $row['updation']; ?></td>
                <td><?php echo $row['paymentstatus']; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php
}
?>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>
<?php
include ('./includes/footer.php');
?>