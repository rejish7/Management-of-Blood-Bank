<!DOCTYPE html>
<html lang="en">
<?php 
include($_SERVER['DOCUMENT_ROOT'] . '/blood bank/config/config.php');
include($_SERVER['DOCUMENT_ROOT'] . '/blood bank/views/header/head.php');
?>

<body class="bg-light">
    <div id="page-container" class="mt-5">
        <div class="container">
            <div id="content-wrap" class="pb-5">
                <div id="demo" class="carousel slide shadow-lg" data-ride="carousel">
                    <ul class="carousel-indicators">
                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                        <li data-target="#demo" data-slide-to="1"></li>
                    </ul>
                    <div class="carousel-inner rounded shadow">
                        <div class="carousel-item active">
                            <img src="/blood bank/public/image/_107317099_blooddonor976.jpg" alt="Blood Donor" class="w-100" style="height: 500px; object-fit: cover;">
                            <div class="carousel-caption d-none d-md-block bg-danger bg-opacity-75 p-3 rounded">
                                <h3 class="text-white">Donate Blood, Save Lives</h3>
                                <p class="text-white">Your donation can make a difference</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="/blood bank/public/image/Blood-facts_10-illustration-graphics__canteen.png" alt="Blood Facts" class="w-100" style="height: 500px; object-fit: cover;">
                            <div class="carousel-caption d-none d-md-block bg-danger bg-opacity-75 p-3 rounded">
                                <h3 class="text-white">Blood Facts</h3>
                                <p class="text-white">Learn more about blood donation</p>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>

                <h1 class="text-center my-5 text-danger font-weight-bold">Welcome to BloodBank & Donor Platform</h1>

                <div class="row">
                    <div class="col-lg-4 mb-4">
                        <div class="card h-100 shadow hover-shadow transition">
                            <h4 class="card-header bg-danger text-white"><i class="fas fa-tint mr-2"></i>The need for blood</h4>
                            <div class="card-body overflow-auto" style="height: 200px;">
                                <?php
                                $sql = "SELECT * FROM pages WHERE page_type='needforblood'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo $row['page_data'];
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="card h-100 shadow hover-shadow transition">
                            <h4 class="card-header bg-danger text-white"><i class="fas fa-lightbulb mr-2"></i>Blood Tips</h4>
                            <div class="card-body overflow-auto" style="height: 200px;">
                                <?php
                                $sql = "SELECT * FROM pages WHERE page_type='bloodtips'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo $row['page_data'];
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="card h-100 shadow hover-shadow transition">
                            <h4 class="card-header bg-danger text-white"><i class="fas fa-hands-helping mr-2"></i>Who you could Help</h4>
                            <div class="card-body overflow-auto" style="height: 200px;">
                                <?php
                                $sql = "SELECT * FROM pages WHERE page_type='whoyouhelp'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo $row['page_data'];
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row my-5 align-items-center bg-white p-4 rounded shadow">
                    <div class="col-lg-6">
                        <h2 class="text-danger font-weight-bold">BLOOD GROUPS</h2>
                        <p class="lead">
                            <?php
                            $sql = "SELECT * FROM pages WHERE page_type='bloodgroups'";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo $row['page_data'];
                                }
                            }
                            ?>
                        </p>
                    </div>
                    <div class="col-lg-6">
                        <img class="img-fluid rounded shadow-lg" src="/blood bank/public/image/blood_donationcover.jpeg" alt="Blood Donation Cover">
                    </div>
                </div>

                <hr class="my-5">

                <div class="row my-5 align-items-center bg-white p-4 rounded shadow">
                    <div class="col-md-8">
                        <h4 class="text-danger font-weight-bold">UNIVERSAL DONORS AND RECIPIENTS</h4>
                        <p class="lead">
                            <?php
                            $sql = "SELECT * FROM pages WHERE page_type='universal'";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo $row['page_data'];
                                }
                            }
                            ?>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <a class="btn btn-lg btn-block btn-danger shadow-lg hover-shadow transition" href="views/pages/donate_blood.php">Become a Donor</a>
                    </div>
                </div>

            </div>
        </div>
        
    </div>
    <footer class="bg-danger text-white py-4"><?php
    include($_SERVER['DOCUMENT_ROOT'] .'/blood bank/views/footer/footer.php')?>

    </footer>
    
    <script src="public/js/jquery-3.3.1.min.js"></script>
    <script src="public/js/popper.min.js"></script>
    <script src="public/js/bootstrap.min.js"></script>
    <style>
        .hover-shadow:hover {
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
        }
        .transition {
            transition: all 0.3s ease-in-out;
        }
    </style>
</body>

</html>
