<?php include('includes/navbar.php')?>
<style>

.login-container{
    background:white;
    border-radius:8px;
    box-shadow:0 0 10px rgba(0,0,0,0.1);
    width: 300px;
    padding: 5px;
    margin-top: 150px;
    border: 1px solid #ccc;
    margin-left:500px;
}
.login-container h2{

    text-align:center;
}
.login-container input{
    width: 100%;
    padding: 0.75rem;
    margin: 0.5rem 0;
    border:1px solid #ddd;
    border-radius:4px;
}
.login-container button{
    border:none;
    border-radius:4px;
    background-color:#007bff;
    color:white;
    font-size:1rem;
    cursor:pointer;
    width: 100%;
    padding: 10px;
    transition:900ms ease;
}
.login-container button:hover{
    background-color:#0056b3;
}
</style>
    <div class="login-container" >
        <h2>Interviewer Login</h2>
        <form action="" method="post">
            <input type="text" name="Userid" placeholder="Username" required>
            <input type="password" name="Password" placeholder="Password" required>  
            <input type="password" name="confirmPassword" placeholder="Confirm Password" required>  
            <button type="submit" name="LOGIN">Login</button>
        </form>

    </div>
<?php
$con=mysqli_connect("localhost","root","","mockinterview");
if($con)
{
    
}
else{
    echo "not connected";
}
if(isset($_POST["LOGIN"]))
{
    $Userid=$_POST["Userid"];
    $Password=$_POST["Password"];
    $confirmPassword=$_POST["confirmPassword"];
    if($Password==$confirmPassword){

    
    $s=$con->query("SELECT * FROM admin where Userid='$Userid' and Password= '$Password'");
    if($s->num_rows>0)
    {
        echo "<script> alert('user exist'); </script>";
        while($r=mysqli_fetch_array($s))
        $_SESSION["Userid"]=$Userid;
        $_SESSION["role"]="admin";
        header("location:interviewerpanel.php");
    }
    else
    {
        echo "<script> alert('user does not exist') ;</script>";
    }
}
else{
    echo "<script> alert('please confirm your password') ;</script>";
}
}

?>
<?php include('includes/footer.php')?>