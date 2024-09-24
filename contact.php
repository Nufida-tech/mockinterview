<?php
include('./includes/navbar.php');
?>
<?php
if(isset($_POST['submit'])){
   
    $name=$_POST['name'];
    $email=$_POST['email'];
    $message=$_POST['message'];
    $insert=$conn->query("INSERT INTO `feedback`( `name`, `email`, `message`) VALUES('$name','$email','$message')");
    $res=$conn->query("SELECT * FROM `feedback` WHERE `name`='$name' ");
    if ($res->num_rows ==1) {
        while ($r = mysqli_fetch_array($res)) {
           
            $_SESSION['name']=$r['name'];
            $_SESSION['email']=$r['email'];
            $_SESSION['message']=$r['message'];
}
    }
}


    ?>

    <!-- Contact Section -->
    <div class="container mt-5">
        <h1 class="mb-4">Contact Us</h1>

        <!-- Contact Form -->
        <div class="row">
            <div class="col-md-6">
                <h2>Send Us a feedback</h2>
                <form id="contactForm" action="" method="POST">
                    
                    <div class="form-group">
                        <label for="name">name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Your name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Your email" required>
                    </div>
                   
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="4" placeholder="Your Message" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </form>
            </div>

            <!-- Contact Information -->
            <div class="col-md-6">
                <h2>Alternative Contact Methods</h2>
                <p><strong>Email:</strong> <a href="mailto:support@mockinterviewproject.com">support@mockinterviewproject.com</a></p>
                <p><strong>Phone:</strong> (123) 456-7890</p>
                <p><strong>Address:</strong></p>
                <p>123 Mock Interview St.<br>
                Suite 456<br>
                Interview City, IN 78910</p>

                <h3>Follow Us</h3>
                <a href="#"><img src="https://via.placeholder.com/30x30?text=FB" alt="Facebook" class="mr-2"></a>
                <a href="#"><img src="https://via.placeholder.com/30x30?text=TW" alt="Twitter" class="mr-2"></a>
                <a href="#"><img src="https://via.placeholder.com/30x30?text=LI" alt="LinkedIn" class="mr-2"></a>
                <a href="#"><img src="https://via.placeholder.com/30x30?text=IG" alt="Instagram"></a>

                <h3 class="mt-4">Office Hours</h3>
                <p>Monday - Friday: 9:00 AM - 6:00 PM (EST)</p>
                <p>Saturday - Sunday: Closed</p>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>




<?php
include('./includes/footer.php');
?>