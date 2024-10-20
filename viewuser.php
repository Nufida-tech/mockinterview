<?php
include('./includes/navbar.php');
?>
<?php
session_start();
if(isset($_GET["update"]))
{
    $name = $_GET['name'];
    $email = $_GET['email'];
    $address = $_GET['address'];
    $phone = $_GET['phone'];
    $userid = $_GET['userid'];
    $password = $_GET['password'];
    $qualification = $_GET['qualification'];

    $photo = $_FILES['photo']['name'];
    $resume = $_FILES['resume']['name'];
    $photo_target = "uploads/photos/" . basename($photo);
    $resume_target = "uploads/resumes/" . basename($resume);


    move_uploaded_file($_FILES['photo']['tmp_name'], $photo_target);
    move_uploaded_file($_FILES['resume']['tmp_name'], $resume_target);
   
    $update=$conn->query("UPDATE user SET `name`='$name',`email`='$email',`address`='$address',`phone`='$phone',`photo`='$photo',`password`='$password',`qualification`='$qualification',  WHERE `userid`='$userid'");
}

if(isset($_GET["delete"]))
{
    $d=$_GET["delete"];
    $delete=$conn->query("DELETE FROM user where userid='$d'");
}
$user=$conn->query("SELECT * FROM user "); 
if($user->num_rows>0)
{
    ?>
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Userid</th>
            <th>Password</th>
            <th>Qualification</th>
            <th>Photo</th>
            
           
            
            
            
</tr>
<?php
while($r=mysqli_fetch_array($user))
{
    ?>
    <tr>
        <form method="get" action="">
        <td><input type="text" name="name" value="<?php echo $r['name'];?>"></td>
        <td><input type="email" name="email" value="<?php echo $r['email'];?>"></td>
        
        <td><input type="text" name="address" value="<?php echo $r['address'];?>"></td>
        <td><input type="text" name="phone" value="<?php echo $r['phone'];?>"></td>
        <td><?php echo $r['userid'];?></td>
        <td><input type="text" name="password" value="<?php echo $r['password'];?>"></td>
        <td><input type="text" name="qualification" value="<?php echo $r['qualification'];?>"></td>
        <td><input type="text" name="photo" value="<?php echo $r['photo'];?>"></td>
        
        <td><button type="submit" name="update" value="<?php echo $r['userid'];?>">Update</button></form></td>
        <td><form action="" method="get">
        <button type="submit" name="delete" value="<?php echo $r['userid'];?>">Delete</button> </form></td>
</tr>
<?php      
}
?>
</table>
<?php
}
else{
    echo"<br> TABLE IS EMPTY";
}
?>
<?php
include('./includes/footer.php');
?>