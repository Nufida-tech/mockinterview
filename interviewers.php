<?php
include ('./includes/navbar.php');
?>
<div class="container" style="margin-top:150px">
    <h1 class="text-center">Our Interviewers</h1>
    <div class="row">
        <?php
        $res = $conn->query("select * from interviewer");
        if ($res->num_rows > 0) {
            while ($r = mysqli_fetch_array($res)) {
                ?>
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="<?php echo $r['photo']; ?>" class="card-img-top" alt="..." style="height:10rem;object-fit:cover;">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $r['name']; ?></h5>
                            <p class="card-text"><?php echo $r['qualification']; ?></p>
                            <p class="card-text"><?php echo $r['description']; ?></p>
                            
                            <form action="booknow.php" method="GET"><button type="submit" name="book" value=<?php echo $r['userid'];?>>Book </button></form>

                        </div>
                    </div>
                </div>
                <?php
            }
        }
        ?>

    </div>
</div>
<?php
include ('./includes/footer.php');
?>


