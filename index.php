<!DOCTYPE html>
<html lang="en">
<?php 
include($_SERVER['DOCUMENT_ROOT'] . '/blood bank/config/config.php');
include($_SERVER['DOCUMENT_ROOT'] . '/blood bank/views/header/head.php');
?>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
        
        .hero-carousel {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 25px 50px rgba(0,0,0,0.15);
        }
        
        .carousel-item img {
            height: 600px;
            object-fit: cover;
            filter: brightness(0.8);
        }
        
        .carousel-caption {
            position: absolute;
            bottom: 50px;
            left: 50px;
            right: 50px;
            background: linear-gradient(135deg, rgba(220, 53, 69, 0.95), rgba(200, 35, 51, 0.95));
            padding: 40px;
            border-radius: 15px;
            backdrop-filter: blur(10px);
            transform: translateY(30px);
            opacity: 0;
            animation: slideUp 1s ease-out 0.5s forwards;
        }
        
        @keyframes slideUp {
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
        
        .hero-title {
            background: linear-gradient(135deg, #dc3545, #c82333);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 800;
            font-size: 3.5rem;
            margin: 60px 0;
            text-align: center;
            position: relative;
        }
        
        .hero-title::after {
            content: '';
            position: absolute;
            bottom: -20px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background: linear-gradient(135deg, #dc3545, #c82333);
            border-radius: 2px;
        }
        
        .info-card {
            background: white;
            border-radius: 20px;
            border: none;
            transition: all 0.4s ease;
            overflow: hidden;
            position: relative;
            margin-bottom: 30px;
        }
        
        .info-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, #dc3545, #c82333);
            transition: left 0.4s ease;
        }
        
        .info-card:hover::before {
            left: 0;
        }
        
        .info-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px rgba(220, 53, 69, 0.15);
        }
        
        .card-header {
            background: linear-gradient(135deg, #dc3545, #c82333) !important;
            border: none;
            padding: 20px;
            position: relative;
            overflow: hidden;
        }
        
        .card-header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 200%;
            background: rgba(255,255,255,0.1);
            transform: rotate(45deg);
            transition: all 0.3s ease;
        }
        
        .card-header:hover::before {
            right: -30%;
        }
        
        .card-body {
            padding: 25px;
            font-size: 0.95rem;
            line-height: 1.7;
            color: #555;
        }
        
        .feature-section {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-radius: 25px;
            padding: 50px;
            margin: 50px 0;
            position: relative;
            overflow: hidden;
        }
        
        .feature-section::before {
            content: '';
            position: absolute;
            top: -50px;
            right: -50px;
            width: 200px;
            height: 200px;
            background: linear-gradient(135deg, rgba(220, 53, 69, 0.1), rgba(200, 35, 51, 0.1));
            border-radius: 50%;
        }
        
        .feature-title {
            color: #dc3545;
            font-weight: 700;
            font-size: 2.5rem;
            margin-bottom: 20px;
            position: relative;
        }
        
        .feature-text {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #555;
            margin-bottom: 0;
        }
        
        .cta-section {
            background: linear-gradient(135deg, #dc3545, #c82333);
            border-radius: 25px;
            padding: 50px;
            color: white;
            position: relative;
            overflow: hidden;
        }
        
        .cta-section::before {
            content: '';
            position: absolute;
            top: -100px;
            left: -100px;
            width: 300px;
            height: 300px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
        }
        
        .cta-section::after {
            content: '';
            position: absolute;
            bottom: -50px;
            right: -50px;
            width: 200px;
            height: 200px;
            background: rgba(255,255,255,0.05);
            border-radius: 50%;
        }
        
        .cta-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 20px;
            position: relative;
            z-index: 2;
        }
        
        .cta-text {
            font-size: 1.1rem;
            opacity: 0.9;
            position: relative;
            z-index: 2;
        }
        
        .donate-btn {
            background: white;
            color: #dc3545;
            border: 3px solid white;
            padding: 15px 40px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            position: relative;
            z-index: 2;
            text-decoration: none;
            display: inline-block;
        }
        
        .donate-btn:hover {
            background: transparent;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(255,255,255,0.2);
            text-decoration: none;
        }
        
        .stats-container {
            background: white;
            border-radius: 20px;
            padding: 40px;
            margin: 50px 0;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        }
        
        .stat-item {
            text-align: center;
            padding: 20px;
        }
        
        .stat-number {
            font-size: 3rem;
            font-weight: 800;
            background: linear-gradient(135deg, #dc3545, #c82333);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .stat-label {
            font-size: 1rem;
            color: #666;
            font-weight: 500;
            margin-top: 10px;
        }
        
        .floating-shapes {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }
        
        .floating-shape {
            position: absolute;
            background: linear-gradient(135deg, rgba(220, 53, 69, 0.05), rgba(200, 35, 51, 0.05));
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }
        
        .floating-shape:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }
        
        .floating-shape:nth-child(2) {
            width: 120px;
            height: 120px;
            top: 60%;
            right: 10%;
            animation-delay: 2s;
        }
        
        .floating-shape:nth-child(3) {
            width: 60px;
            height: 60px;
            bottom: 20%;
            left: 20%;
            animation-delay: 4s;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }
        
        .section-fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s ease;
        }
        
        .section-fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }
        
        body {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            min-height: 100vh;
        }
    </style>
</head>

<body>
    <!-- Floating Background Shapes -->
    <div class="floating-shapes">
        <div class="floating-shape"></div>
        <div class="floating-shape"></div>
        <div class="floating-shape"></div>
    </div>

    <div id="page-container" class="mt-4">
        <div class="container">
            <div id="content-wrap" class="pb-5">
                <!-- Hero Carousel -->
                <div id="demo" class="carousel slide hero-carousel section-fade-in" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                        <li data-target="#demo" data-slide-to="1"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="/blood bank/public/image/_107317099_blooddonor976.jpg" alt="Blood Donor" class="w-100">
                            <div class="carousel-caption">
                                <h3 class="display-4 font-weight-bold mb-3">
                                    <i class="fas fa-heart mr-3"></i>Donate Blood, Save Lives
                                </h3>
                                <p class="lead mb-0">Every donation can save up to three lives. Be a hero today.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="/blood bank/public/image/Blood-facts_10-illustration-graphics__canteen.png" alt="Blood Facts" class="w-100">
                            <div class="carousel-caption">
                                <h3 class="display-4 font-weight-bold mb-3">
                                    <i class="fas fa-info-circle mr-3"></i>Know the Facts
                                </h3>
                                <p class="lead mb-0">Learn about blood donation and its life-saving impact.</p>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#demo" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#demo" role="button" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

                <!-- Hero Title -->
                <h1 class="hero-title section-fade-in">Welcome to BloodBank & Donor Platform</h1>

                <!-- Statistics Section -->
                <div class="stats-container section-fade-in">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="stat-item">
                                <div class="stat-number" data-count="1500">0</div>
                                <div class="stat-label">Active Donors</div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="stat-item">
                                <div class="stat-number" data-count="5000">0</div>
                                <div class="stat-label">Lives Saved</div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="stat-item">
                                <div class="stat-number" data-count="24">0</div>
                                <div class="stat-label">Hours Service</div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="stat-item">
                                <div class="stat-number" data-count="50">0</div>
                                <div class="stat-label">Hospitals Connected</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Information Cards -->
                <div class="row section-fade-in">
                    <div class="col-lg-4 mb-4">
                        <div class="card info-card h-100">
                            <h4 class="card-header" style="color: white;">
                                <i class="fas fa-tint mr-3"></i>The Need for Blood
                            </h4>
                            <div class="card-body">
                                <?php
                                $sql = "SELECT * FROM pages WHERE page_type='needforblood'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $content = strip_tags($row['page_data']);
                                        // Limit content to 150 characters
                                        if (strlen($content) > 150) {
                                            $content = substr($content, 0, 150) . '...';
                                        }
                                        echo "<p>" . htmlspecialchars($content) . "</p>";
                                    }
                                } else {
                                    echo "<p>Every 2 seconds, someone needs blood. Your donation saves lives in emergencies, surgeries, and treatments for chronic diseases.</p>";
                                }
                                ?>
                                <div class="mt-3">
                                    <a href="#" class="btn btn-outline-danger btn-sm">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="card info-card h-100">
                            <h4 class="card-header" style="color: white;">
                                <i class="fas fa-lightbulb mr-3"></i>Blood Tips
                            </h4>
                            <div class="card-body">
                                <?php
                                $sql = "SELECT * FROM pages WHERE page_type='bloodtips'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $content = strip_tags($row['page_data']);
                                        // Limit content to 150 characters
                                        if (strlen($content) > 150) {
                                            $content = substr($content, 0, 150) . '...';
                                        }
                                        echo "<p>" . htmlspecialchars($content) . "</p>";
                                    }
                                } else {
                                    echo "<p>Stay hydrated, eat iron-rich foods, get enough sleep. Avoid alcohol 24 hours before donation and bring a valid ID.</p>";
                                }
                                ?>
                                <div class="mt-3">
                                    <a href="#" class="btn btn-outline-danger btn-sm">View Tips</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="card info-card h-100">
                            <h4 class="card-header" style="color: white;">
                                <i class="fas fa-hands-helping mr-3"></i>Who You Help
                            </h4>
                            <div class="card-body">
                                <?php
                                $sql = "SELECT * FROM pages WHERE page_type='whoyouhelp'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $content = strip_tags($row['page_data']);
                                        // Limit content to 150 characters
                                        if (strlen($content) > 150) {
                                            $content = substr($content, 0, 150) . '...';
                                        }
                                        echo "<p>" . htmlspecialchars($content) . "</p>";
                                    }
                                } else {
                                    echo "<p>Accident victims, cancer patients, surgical patients, mothers during childbirth, and people with blood disorders.</p>";
                                }
                                ?>
                                <div class="mt-3">
                                    <a href="#" class="btn btn-outline-danger btn-sm">Read Stories</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Blood Groups Section -->
                <div class="feature-section section-fade-in">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <h2 class="feature-title">
                                <i class="fas fa-dna mr-3"></i>BLOOD GROUPS
                            </h2>
                            <div class="feature-text">
                                <?php
                                $sql = "SELECT * FROM pages WHERE page_type='bloodgroups'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo $row['page_data'];
                                    }
                                } else {
                                    echo "<p>There are eight main blood types: A+, A-, B+, B-, AB+, AB-, O+, and O-. Each type is unique and plays a crucial role in saving lives. Understanding your blood type helps us match you with patients who need your specific donation.</p>";
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <img class="img-fluid rounded shadow-lg" src="/blood bank/public/image/blood_donationcover.jpeg" alt="Blood Donation Cover" style="border-radius: 20px;">
                        </div>
                    </div>
                </div>

                <!-- Call to Action Section -->
                <div class="cta-section section-fade-in">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="cta-title" style="color:white">
                                <i class="fas fa-globe mr-3"></i>UNIVERSAL DONORS AND RECIPIENTS
                            </h4>
                            <div class="cta-text">
                                <?php
                                $sql = "SELECT * FROM pages WHERE page_type='universal'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo $row['page_data'];
                                    }
                                } else {
                                    echo "<p>O- donors are universal donors, meaning their blood can be given to anyone. AB+ recipients are universal recipients, able to receive blood from any type. Your donation, regardless of type, is valuable and needed.</p>";
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <a class="donate-btn" href="views/pages/donate_blood.php">
                                <i class="fas fa-heart mr-2"></i>Become a Donor
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <?php
    include($_SERVER['DOCUMENT_ROOT'] .'/blood bank/views/footer/footer.php');
    ?>
    
    <!-- Bootstrap JS and Custom Scripts -->
    <script src="public/js/jquery-3.3.1.min.js"></script>
    <script src="public/js/popper.min.js"></script>
    <script src="public/js/bootstrap.min.js"></script>
    
    <script>
        $(document).ready(function() {
            // Fade in animation on scroll
            function animateOnScroll() {
                $('.section-fade-in').each(function() {
                    const elementTop = $(this).offset().top;
                    const windowBottom = $(window).scrollTop() + $(window).height();
                    
                    if (elementTop < windowBottom - 50) {
                        $(this).addClass('visible');
                    }
                });
            }
            
            // Counter animation for statistics
            function animateCounters() {
                $('.stat-number').each(function() {
                    const $this = $(this);
                    const countTo = $this.data('count');
                    
                    $({ countNum: 0 }).animate({
                        countNum: countTo
                    }, {
                        duration: 2000,
                        easing: 'swing',
                        step: function() {
                            $this.text(Math.floor(this.countNum));
                        },
                        complete: function() {
                            $this.text(countTo);
                        }
                    });
                });
            }
            
            // Trigger animations
            let countersAnimated = false;
            
            $(window).scroll(function() {
                animateOnScroll();
                
                // Animate counters when stats section is visible
                if (!countersAnimated) {
                    const statsTop = $('.stats-container').offset().top;
                    const windowBottom = $(window).scrollTop() + $(window).height();
                    
                    if (statsTop < windowBottom - 100) {
                        animateCounters();
                        countersAnimated = true;
                    }
                }
            });
            
            // Initial load animations
            animateOnScroll();
            
            // Smooth scrolling for anchor links
            $('a[href*="#"]').on('click', function (e) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: $($(this).attr('href')).offset().top - 100
                }, 500, 'linear');
            });
            
            // Parallax effect for floating shapes
            $(window).scroll(function() {
                const scrolled = $(window).scrollTop();
                const parallax = scrolled * 0.5;
                $('.floating-shape').css('transform', 'translateY(' + parallax + 'px)');
            });
            
            // Card hover effects
            $('.info-card').hover(
                function() {
                    $(this).find('.card-header').addClass('animated');
                },
                function() {
                    $(this).find('.card-header').removeClass('animated');
                }
            );
            
            // Auto-advance carousel
            $('.carousel').carousel({
                interval: 5000,
                pause: 'hover'
            });
        });
    </script>

</body>
</html>
