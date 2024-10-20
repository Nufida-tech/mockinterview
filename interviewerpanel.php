<?php include('includes/navbar.php')?>

<style>
    body {
        background-color: #83a4d4; /* Softer background for a modern look */
        font-family: 'Poppins', sans-serif; /* Sleek and modern font */
        color: #333; /* Darker text for readability */
    }

    .container {
        max-width: 900px; /* Slightly wider container */
        margin: 0 auto; /* Center the container */
        padding: 60px 20px; /* Add padding for spacing */
    }

    .header {
        text-align: center;
        margin-bottom: 40px;
        color: white;
        font-size: 32px;
        font-weight: bold;
    }

    .card-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px; 
        justify-content: center;
    }

    .card {
        background-color: #ffffff;
        border-radius: 15px; 
        box-shadow: 0 6px 25px rgba(0, 0, 0, 0.1); 
        padding: 25px;
        width: 250px;
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        text-align: center; 
        position: relative; 
    }

    .card:hover {
        transform: scale(1.05); /* Subtle zoom on hover */
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.2); /* Deeper shadow on hover */
    }

    .card img {
        width: 130px; /* Small image size */
        height: 130px;
        margin-bottom: 15px; 
    }

    .card a {
        display: block;
        text-decoration: none;
        color: #fff;
        background-color: #0d6efd;
        padding: 15px 20px; 
        border-radius: 30px; 
        font-size: 18px; 
        transition: background-color 0.3s, transform 0.3s; /* Smooth transitions */
    }

    .card a:hover {
        background-color: #0a58ca; /* Slightly darker on hover */
        transform: translateY(-3px); /* Lift on hover */
    }

    .card a:active {
        background-color: #084298; /* Even darker when clicked */
        transform: translateY(1px); /* Slight push down on click */
    }

    /* Responsive styles for smaller screens */
    @media (max-width: 768px) {
        .card {
            width: 100%; /* Full width cards on smaller screens */
        }

        .container {
            padding: 30px 10px; /* Less padding for mobile */
        }
    }
</style>

<div class="container">
    <h2 class="header">Interviewer Dashboard</h2>

    
        <div class="card">
            <img src=".uploads/images/interviewerbookings.jpg" alt="interviewer Bookings"> <!-- Small image icon -->
            <a href="viewbookings.php">InterviewerBookings</a>
        </div>
    </div>
</div>
<?php include('includes/footer.php')?>
