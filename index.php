<?php
include('./includes/navbar.php');
?>
<style>
    .text-center{
        color:white;
    }
    body{
      background:url(uploads/images/nufi.avif);
      background-size: cover;
      background-position: center;
    }
</style>
<div class="container" style="margin-top: 150px;">
        <!-- Welcome Section -->
        <div class="text-center">
            <h1>Welcome to Your Mock Interview Platform</h1>
            <p class="lead">Prepare for your dream job with personalized mock interviews and expert feedback.</p>
        </div>

        <!-- Overview Section -->
        <div class="row mt-5">
            <div class="col-md-4 text-center">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Expert Interviewers</h5>
                        <p class="card-text">Get interviewed by industry professionals who know what it takes to succeed.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Personalized Feedback</h5>
                        <p class="card-text">Receive detailed feedback to improve your performance and land the job.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Flexible Scheduling</h5>
                        <p class="card-text">Schedule your mock interviews at a time that suits you.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Call to Action Section -->
        <div class="text-center mt-5">
            <a href="register.php" class="btn btn-primary btn-lg">Get Started</a>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<?php
include('./includes/footer.php');
?>