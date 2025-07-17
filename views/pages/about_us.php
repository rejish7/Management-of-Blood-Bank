<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="About Us - BloodBank & Donor Management System">
    <meta name="author" content="">
    <title>About Us - Blood Bank</title>
    <link rel="stylesheet" href="../../public/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .hero-section {
            background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
            color: white;
            padding: 100px 0;
            position: relative;
            overflow: hidden;
        }
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('../../public/image/blood-cells.jpg') center/cover;
            opacity: 0.1;
        }
        .hero-content {
            position: relative;
            z-index: 2;
        }
        .about-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            padding: 50px;
            margin-top: -80px;
            position: relative;
            z-index: 3;
        }
        .section-title {
            position: relative;
            margin-bottom: 30px;
            font-weight: 700;
            color: #333;
        }
        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 60px;
            height: 4px;
            background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
            border-radius: 2px;
        }
        .stats-card {
            background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
            color: white;
            padding: 30px;
            border-radius: 15px;
            text-align: center;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }
        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(220, 53, 69, 0.3);
        }
        .stats-number {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 10px;
        }
        .stats-label {
            font-size: 1rem;
            opacity: 0.9;
        }
        .mission-card {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 40px;
            margin-bottom: 30px;
            border-left: 5px solid #dc3545;
            transition: all 0.3s ease;
        }
        .mission-card:hover {
            transform: translateX(10px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        .mission-icon {
            background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
            color: white;
            width: 70px;
            height: 70px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-bottom: 20px;
        }
        .team-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            margin-bottom: 30px;
        }
        .team-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }
        .team-image {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin: 0 auto 20px;
            background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            color: white;
        }
        .about-content {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #555;
            text-align: justify;
        }
        .highlight-box {
            background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
            color: white;
            padding: 30px;
            border-radius: 15px;
            margin: 30px 0;
        }
        .feature-item {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            padding: 15px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
        }
        .feature-item:hover {
            transform: translateX(5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }
        .feature-icon {
            background: #dc3545;
            color: white;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            font-size: 18px;
        }
    </style>
</head>

<?php
include($_SERVER['DOCUMENT_ROOT'] . '/blood bank/config/config.php');
include($_SERVER['DOCUMENT_ROOT'] . '/blood bank/views/header/head.php');
?>

<!-- Hero Section -->
<div class="hero-section">
    <div class="container">
        <div class="hero-content text-center">
            <h1 class="display-3 mb-4" style="color: white;">
                <i class="fas fa-heart mr-3"></i>About Our Mission
            </h1>
            <p class="lead mb-0">Saving lives through the gift of blood donation</p>
        </div>
    </div>
</div>

<div class="container">
    <!-- Main About Section -->
    <div class="about-card">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h2 class="section-title">Who We Are</h2>
                <div class="about-content">
                    <?php
                    $sql = "SELECT * FROM pages WHERE page_type='aboutus'";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo $row['page_data'];
                        }
                    } else {
                        echo "<p>We are a dedicated blood bank committed to saving lives by connecting generous donors with those in need. Our mission is to ensure a safe, reliable blood supply for our community through modern technology and compassionate care.</p>";
                    }
                    ?>
                </div>
                
                <div class="highlight-box mt-4">
                    <h4 style="color: white;"><i class="fas fa-quote-left mr-2"></i>Our Commitment</h4>
                    <p class="mb-0">"Every drop of blood donated through our platform has the potential to save up to three lives. We are honored to facilitate this life-saving connection between donors and recipients."</p>
                </div>
            </div>
            <div class="col-lg-6">
                <img class="img-fluid rounded shadow-lg" src="../../public/image/banner_590x300.jpg" alt="About Us Banner" style="border-radius: 20px;">
            </div>
        </div>
    </div>

    <!-- Statistics Section -->
    <div class="row mt-5">
        <div class="col-lg-3 col-md-6">
            <div class="stats-card">
                <div class="stats-number">
                    <i class="fas fa-users"></i>
                    <div>1000+</div>
                </div>
                <div class="stats-label">Registered Donors</div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="stats-card">
                <div class="stats-number">
                    <i class="fas fa-tint"></i>
                    <div>5000+</div>
                </div>
                <div class="stats-label">Lives Saved</div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="stats-card">
                <div class="stats-number">
                    <i class="fas fa-hospital"></i>
                    <div>50+</div>
                </div>
                <div class="stats-label">Partner Hospitals</div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="stats-card">
                <div class="stats-number">
                    <i class="fas fa-clock"></i>
                    <div>24/7</div>
                </div>
                <div class="stats-label">Emergency Service</div>
            </div>
        </div>
    </div>

    <!-- Mission, Vision, Values Section -->
    <div class="row mt-5">
        <div class="col-lg-4">
            <div class="mission-card">
                <div class="mission-icon">
                    <i class="fas fa-bullseye"></i>
                </div>
                <h4>Our Mission</h4>
                <p>To provide a safe, reliable, and efficient blood donation system that connects willing donors with those in critical need, ensuring no life is lost due to blood shortage.</p>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="mission-card">
                <div class="mission-icon">
                    <i class="fas fa-eye"></i>
                </div>
                <h4>Our Vision</h4>
                <p>To create a world where blood shortage is eliminated through technology, community engagement, and sustainable donation practices that save millions of lives globally.</p>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="mission-card">
                <div class="mission-icon">
                    <i class="fas fa-heart"></i>
                </div>
                <h4>Our Values</h4>
                <p>Compassion, integrity, safety, and excellence drive everything we do. We believe in the power of human kindness and the impact of collective action in saving lives.</p>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="row mt-5">
        <div class="col-lg-12">
            <h2 class="section-title text-center">Why Choose Us</h2>
        </div>
        <div class="col-lg-6">
            <div class="feature-item">
                <div class="feature-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <div>
                    <h5>Safe & Secure</h5>
                    <p class="mb-0">All donations follow strict medical protocols and safety standards.</p>
                </div>
            </div>
            <div class="feature-item">
                <div class="feature-icon">
                    <i class="fas fa-mobile-alt"></i>
                </div>
                <div>
                    <h5>Easy Registration</h5>
                    <p class="mb-0">Quick and simple online registration process for donors.</p>
                </div>
            </div>
            <div class="feature-item">
                <div class="feature-icon">
                    <i class="fas fa-search"></i>
                </div>
                <div>
                    <h5>Blood Type Matching</h5>
                    <p class="mb-0">Advanced matching system to find compatible donors quickly.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="feature-item">
                <div class="feature-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <div>
                    <h5>24/7 Availability</h5>
                    <p class="mb-0">Round-the-clock service for emergency blood requirements.</p>
                </div>
            </div>
            <div class="feature-item">
                <div class="feature-icon">
                    <i class="fas fa-bell"></i>
                </div>
                <div>
                    <h5>Real-time Notifications</h5>
                    <p class="mb-0">Instant alerts for urgent blood donation requests.</p>
                </div>
            </div>
            <div class="feature-item">
                <div class="feature-icon">
                    <i class="fas fa-certificate"></i>
                </div>
                <div>
                    <h5>Certified Process</h5>
                    <p class="mb-0">All procedures are medically certified and approved.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include($_SERVER['DOCUMENT_ROOT'] .'/blood bank/views/footer/footer.php');
?>

<!-- Bootstrap JS and Custom Scripts -->
<script src="../../public/js/jquery-3.3.1.min.js"></script>
<script src="../../public/js/popper.min.js"></script>
<script src="../../public/js/bootstrap.min.js"></script>

<script>
// Counter animation for statistics
function animateCounters() {
    $('.stats-number div').each(function() {
        const $this = $(this);
        const countTo = $this.text();
        
        if (countTo.includes('+') || countTo.includes('/')) {
            return; // Skip non-numeric values
        }
        
        $({ countNum: 0 }).animate({
            countNum: parseInt(countTo.replace(/\D/g, ''))
        }, {
            duration: 2000,
            easing: 'swing',
            step: function() {
                $this.text(Math.floor(this.countNum) + '+');
            },
            complete: function() {
                $this.text(countTo);
            }
        });
    });
}

// Trigger counter animation when stats section comes into view
$(window).scroll(function() {
    const statsTop = $('.stats-card').first().offset().top;
    const windowTop = $(window).scrollTop();
    const windowHeight = $(window).height();
    
    if (windowTop + windowHeight > statsTop + 100) {
        animateCounters();
        $(window).off('scroll'); // Remove event listener after animation
    }
});

// Smooth scrolling for anchor links
$('a[href*="#"]').on('click', function (e) {
    e.preventDefault();
    $('html, body').animate({
        scrollTop: $($(this).attr('href')).offset().top - 100
    }, 500, 'linear');
});

// Add fade-in animation to cards
$(window).scroll(function() {
    $('.mission-card, .team-card, .feature-item').each(function() {
        const elementTop = $(this).offset().top;
        const windowBottom = $(window).scrollTop() + $(window).height();
        
        if (elementTop < windowBottom - 50) {
            $(this).addClass('animate__fadeInUp');
        }
    });
});
</script>

</body>
</html>
