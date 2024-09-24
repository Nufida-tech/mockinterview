<?php
include ('./includes/navbar.php');
?>
<?php
$categoryid=$_GET['avail'];
$query=$conn->query("select * from category where id=$categoryid ");
while($r=mysqli_fetch_array($query))
{
    $title=$r['title'];
    $price=$r['price'];
}


if(isset($_POST['placeorder']))
{

    $date=date("d/m/Y");
    
    $userid = $_SESSION['user_id'];
    $selectedoption = $_POST['selectedoption'];
    $deliverydate = $_POST['deliverydate'];
    $place = $_POST['place'];
    $price = $_POST['price'];
    $paymentmode = $_POST['paymentmode'];
    $insert=$conn->query("INSERT INTO booking (userid, categoryid, date, place, rate,delivery,paymentmode) VALUES 
                                            ('$userid','$selectedoption','$date','$place','$price','$deliverydate','$paymentmode')");
}

   ?>
 <style>
.form-control {
    background-color: #d4d3e3;
}
</style>
<div class="container mt-5 text-center mb-5">
<h2 class="mb-4">Place Order</h2>
<form action="" method="post" class="d-flex justify-content-center">
    <div class="row">
    
        <div class="mb-3 col-5">
            <label for="selectedoption" class="form-label">Selected Option :</label>
            <?php echo $title; ?>
            <input type="text" value="<?php echo $title; ?>"  hidden class="form-control" id="selectedoption" name="selectedoption" required>
         </div>
         <div class="mb-3 col-5">
            <label for="place" class="form-label">Place</label>
            <input type="text" class="form-control" id="place" name="place" required>
        </div>
        <div class="mb-3 col-5">
            <label for="amountdisplay" class="form-label">Amount:</label>
            <?php echo $price; ?>
            <input type="text" class="form-control" value="<?php echo $price; ?>"  hidden id="price" name="price" required>
        </div>
        <div class="mb-3 col-5">
            <label for="paymentmode" class="form-label">Payment Mode</label>
         <select name="paymentmode" id="" class="form-control">
            <option value="Gpay">Gpay</option>
            <option value="Card">Card</option>
            <option value="Cash">Cash</option>
         </select>
        </div>
        <div class="mb-3 col-5">
            <label for="deliverydate" class="form-label">Delivery Date</label>
            <input type="date" class="form-control" id="deliverydate" name="deliverydate" required>
        </div>
       
        <button type="submit" class="btn btn-primary" name="placeorder">Submit</button>
    </div>
</form>

</div>