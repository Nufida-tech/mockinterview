<?php
include('./includes/navbar.php');
?>
<?php
session_start();
if(isset($_GET["update"]))
{
    $name=$_GET['name'];
    $phone=$_GET['phone'];
    $photo=$_GET['photo'];
    $qualification=$_GET['qualification'];
    $description=$_GET['description'];
    $price=$_GET["price"];
    


    
    $password=$_GET['password'];
    $userid=$_GET['update'];
    $update=$conn->query("UPDATE interviewer SET `name`='$name',`phone`='$phone',`password`='$password',`photo`='$photo',`qualification`='$qualification',`description`='$description',`price`='$price'  WHERE `userid`='$userid'");
}

if(isset($_GET["delete"]))
{
    $d=$_GET["delete"];
    $delete=$conn->query("DELETE FROM interviewer where userid='$d'");
}
$addinterviewer=$conn->query("SELECT * FROM interviewer "); 
if($addinterviewer->num_rows>0)
{
    ?>
    <table>
        <tr>
            <th>name</th>
            
            <th>phone</th>
            <th>userid</th>
            <th>password</th>
            <th>qualification</th>
            <th>photo</th>
            <th>description</th>
            <th>price</th>

</tr>
<?php
while($r=mysqli_fetch_array($addinterviewer))
{
    ?>
    <tr>
        <form method="get" action="">
        <td><input type="text" name="name" value="<?php echo $r['name'];?>"></td>
        <td><input type="text" name="phone" value="<?php echo $r['phone'];?>"></td>
        <td><?php echo $r['userid'];?></td>
        <td><input type="text" name="password" value="<?php echo $r['password'];?>"></td>
        <td><input type="text" name="qualification" value="<?php echo $r['qualification'];?>"></td>
        <td><input type="text" name="photo" value="<?php echo $r['photo'];?>"></td>
        <td><input type="text" name="description" value="<?php echo $r['description'];?>"></td>
        <td><input type="text" name="price" value="<?php echo $r['price'];?>"></td>
        <td><button type="submit" name="update" value="<?php echo $r['userid'];?>">update</button></form></td>
        <td><form action="" method="get">
        <button type="submit" name="delete" value="<?php echo $r['userid'];?>">delete</button> </form></td>
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