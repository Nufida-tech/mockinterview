<?php include('includes/navbar.php') ?>

<style>
    * {
        box-sizing: border-box;
    }

    html,
    body {
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
        margin: auto;
        /* Center the container */
        margin-top: 150px;
        /* Space from the top */
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
<?php
    $con = mysqli_connect("localhost", "root", "", "mockinterview");

    if (isset($_POST["interviewer"])) {
        $userid = $_POST["userid"];
        $Password = $_POST["Password"];
        $s = $con->query("SELECT * FROM interviewer where userid='$userid' and Password= '$Password'");
        if ($s->num_rows == 1) {
            echo "<script> alert('staff exist'); </script>";
            while ($r = mysqli_fetch_array($s))
             $_SESSION["userid"] = $userid;
            $_SESSION["role"] = "interviewer";
            header("location:interviewerpanel.php");
        }
    } else {
        echo mysqli_error($con);

    }
    ?>

    <div class="login-container">
        <h2>interviewer Login</h2>
        <form action="" method="post">
            <input type="text" name="userid" placeholder="Username" required>
            <input type="password" name="Password" placeholder="Password" required>

            <button type="submit" name="interviewer">Login</button>
        </form>

    </div>


    <?php include('includes/footer.php'); ?>