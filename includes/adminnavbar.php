<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>admin navbar</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <style>
    .form-control {
      background-color: #f29be8;
    }
  </style>
  <?php
  $conn = mysqli_connect("localhost", "root", "", "mockinterview");
  session_start();
  ?>
  <nav class="navbar navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Mock Interview</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar"
        aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar"
        aria-labelledby="offcanvasDarkNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Mock Interview</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
        </div>
        
            <?php
            if (isset($_SESSION['admin'])) {
              ?>
              <li class="nav-item">
                <a class="nav-link" href="adminpanel.php">dashboard</a>
              </li>
             
              Hello, <?php echo $_SESSION['userid']; ?>
              <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
              </li>
              <?php
            } else{?>
              
              <li class="nav-item">
                <a class="nav-link" href="adminlogin.php">Login</a>
              </li>
              <?php
            }
            ?>



          </ul>

        </div>
      </div>
    </div>
  </nav>



