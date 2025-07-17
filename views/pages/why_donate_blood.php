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
        
        body {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            overflow-x: hidden;
        }
        
        .hero-section {
            background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
            color: white;
            padding: 100px 0 80px 0;
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
            text-align: center;
        }
        
        .main-container {
            background: white;
            border-radius: 25px;
            box-shadow: 0 25px 50px rgba(0,0,0,0.15);
            padding: 50px;
            margin-top: -60px;
            position: relative;
            z-index: 3;
            min-height: 600px;
        }
        
        .content-section {
            animation: fadeInUp 0.8s ease-out;
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .section-title {
            color: #dc3545;
            font-weight: 700;
            font-size: 2.5rem;
            margin-bottom: 30px;
            position: relative;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 60px;
            height: 4px;
            background: linear-gradient(135deg, #dc3545, #c82333);
            border-radius: 2px;
        }
        
        .content-text {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #555;
            text-align: justify;
        }
        
        .content-text strong {
            color: #dc3545;
            font-weight: 600;
        }
        
        .image-container {
            position: relative;
            text-align: center;
            animation: fadeInRight 0.8s ease-out 0.3s both;
        }
        
        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        .donation-image {
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
            transition: all 0.3s ease;
            max-width: 100%;
            height: auto;
        }
        
        .donation-image:hover {
            transform: translateY(-10px);
            box-shadow: 0 30px 60px rgba(0,0,0,0.2);
        }
        
        .benefits-section {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            border-radius: 20px;
            padding: 40px;
            margin-top: 50px;
            animation: fadeInUp 0.8s ease-out 0.6s both;
        }
        
        .benefit-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            border-left: 5px solid #dc3545;
        }
        
        .benefit-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.15);
        }
        
        .benefit-icon {
            background: linear-gradient(135deg, #dc3545, #c82333);
            color: white;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 15px;
        }
        
        .benefit-title {
            color: #333;
            font-weight: 600;
            font-size: 1.3rem;
            margin-bottom: 10px;
        }
        
        .benefit-text {
            color: #666;
            line-height: 1.6;
        }
        
        .cta-section {
            background: linear-gradient(135deg, #dc3545, #c82333);
            color: white;
            border-radius: 20px;
            padding: 40px;
            text-align: center;
            margin-top: 50px;
            position: relative;
            overflow: hidden;
        }
        
        .cta-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('../../public/image/blood-cells.jpg') center/cover;
            opacity: 0.1;
        }
        
        .cta-content {
            position: relative;
            z-index: 2;
        }
        
        .cta-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 15px;
        }
        
        .cta-text {
            font-size: 1.1rem;
            margin-bottom: 30px;
            opacity: 0.9;
        }
        
        .donate-btn {
            background: white;
            color: #dc3545;
            border: 3px solid white;
            padding: 15px 40px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1.1rem;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
        }
        
        .donate-btn:hover {
            background: transparent;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(255,255,255,0.2);
            text-decoration: none;
        }
        
        .stats-section {
            background: white;
            border-radius: 20px;
            padding: 40px;
            margin-top: 50px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        }
        
        .stat-card {
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
            color: #666;
            font-weight: 500;
            margin-top: 10px;
        }
        
        .floating-elements {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }
        
        .floating-element {
            position: absolute;
            opacity: 0.1;
            animation: float 6s ease-in-out infinite;
        }
        
        .floating-element:nth-child(1) {
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }
        
        .floating-element:nth-child(2) {
            top: 60%;
            right: 10%;
            animation-delay: 2s;
        }
        
        .floating-element:nth-child(3) {
            top: 80%;
            left: 20%;
            animation-delay: 4s;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        .section-divider {
            text-align: center;
            margin: 50px 0;
        }
        
        .divider-icon {
            background: linear-gradient(135deg, #dc3545, #c82333);
            color: white;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }
        
        @media (max-width: 768px) {
            .section-title {
                font-size: 2rem;
            }
            
            .main-container {
                padding: 30px;
                margin-top: -40px;
            }
            
            .donation-image {
                margin-top: 30px;
            }
            
            .stat-number {
                font-size: 2rem;
            }
        }
    </style>
</head>

<body>

<!-- Floating Background Elements -->
<div class="floating-elements">
    <i class="fas fa-heart floating-element" style="font-size: 3rem; color: #dc3545;"></i>
    <i class="fas fa-tint floating-element" style="font-size: 2.5rem; color: #dc3545;"></i>
    <i class="fas fa-heartbeat floating-element" style="font-size: 2rem; color: #dc3545;"></i>
</div>

<!-- Hero Section -->
<div class="hero-section">
    <div class="container">
        <div class="hero-content">
            <h1 class="display-3 mb-4" style="color:white;">
                <i class="fas fa-heart mr-3"></i>Why Donate Blood?
            </h1>
            <p class="lead mb-0">Discover the incredible impact of your donation and the benefits it brings to both recipients and donors.</p>
        </div>
    </div>
</div>

<div class="container">
    <div class="main-container">
        <!-- Main Content Section -->
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="content-section">
                    <h2 class="section-title">The Gift of Life</h2>
                    <div class="content-text">
                        <?php
                        $sql = "SELECT * FROM pages WHERE page_type='donor'";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo $row['page_data'];
                            }
                        } else {
                            echo '<p><strong>Save Lives:</strong> Each blood donation can save up to three lives. Your single act of generosity can make a significant difference for patients undergoing surgeries, cancer treatments, or recovering from traumatic injuries.</p>
                                  <p><strong>Health Benefits:</strong> Regular blood donation has several health benefits including reduced risk of heart disease, improved circulation, and enhanced production of new blood cells.</p>
                                  <p><strong>Free Health Checkup:</strong> Before donation, we conduct comprehensive health screenings including blood pressure, pulse, temperature, and hemoglobin checks - absolutely free.</p>
                                  <p><strong>Community Service:</strong> Donating blood is a simple way to give back to your community and help fellow human beings in their time of need.</p>';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="image-container">
                    <img class="donation-image" src="../../public/image/08f2fccc45d2564f74ead4a6d5086871.png" alt="Blood Donation - Saving Lives">
                </div>
            </div>
        </div>

        <!-- Section Divider -->
        <div class="section-divider">
            <div class="divider-icon">
                <i class="fas fa-plus"></i>
            </div>
        </div>

        <!-- Benefits Section -->
        <div class="benefits-section">
            <h3 class="text-center mb-5" style="color: #dc3545; font-weight: 700; font-size: 2rem;">Key Benefits of Blood Donation</h3>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-heart"></i>
                        </div>
                        <div class="benefit-title">Saves Lives</div>
                        <div class="benefit-text">One donation can save up to 3 lives. You become a hero for families in crisis situations.</div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-user-md"></i>
                        </div>
                        <div class="benefit-title">Free Health Check</div>
                        <div class="benefit-text">Complete health screening including blood pressure, pulse, hemoglobin, and infectious disease testing.</div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-heartbeat"></i>
                        </div>
                        <div class="benefit-title">Health Benefits</div>
                        <div class="benefit-text">Reduces risk of heart disease, stimulates blood cell production, and helps maintain healthy iron levels.</div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-hands-helping"></i>
                        </div>
                        <div class="benefit-title">Community Service</div>
                        <div class="benefit-text">Make a positive impact in your community and experience the joy of helping others in need.</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistics Section -->
        <div class="stats-section">
            <h3 class="text-center mb-5" style="color: #dc3545; font-weight: 700; font-size: 2rem;">Blood Donation Impact</h3>
            <div class="row">
                <div class="col-md-3">
                    <div class="stat-card">
                        <div class="stat-number">3</div>
                        <div class="stat-label">Lives Saved per Donation</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card">
                        <div class="stat-number">8</div>
                        <div class="stat-label">Minutes to Donate</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card">
                        <div class="stat-number">56</div>
                        <div class="stat-label">Days Blood Can Be Stored</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card">
                        <div class="stat-number">2</div>
                        <div class="stat-label">Seconds Someone Needs Blood</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Call to Action Section -->
        <div class="cta-section">
            <div class="cta-content">
                <h3 class="cta-title">
                    <i class="fas fa-hands-helping mr-3"></i>Ready to Save Lives?
                </h3>
                <p class="cta-text">Join thousands of heroes who donate blood regularly and make a difference in their community.</p>
                <a href="../donate_blood.php" class="donate-btn">
                    <i class="fas fa-heart mr-2"></i>Donate Blood Now
                </a>
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
$(document).ready(function() {
    // Animate numbers on scroll
    function animateValue(element, start, end, duration) {
        let startTimestamp = null;
        const step = (timestamp) => {
            if (!startTimestamp) startTimestamp = timestamp;
            const progress = Math.min((timestamp - startTimestamp) / duration, 1);
            element.innerHTML = Math.floor(progress * (end - start) + start);
            if (progress < 1) {
                window.requestAnimationFrame(step);
            }
        };
        window.requestAnimationFrame(step);
    }

    // Trigger animation when stats section comes into view
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const statNumbers = entry.target.querySelectorAll('.stat-number');
                statNumbers.forEach(num => {
                    const targetValue = parseInt(num.textContent);
                    animateValue(num, 0, targetValue, 2000);
                });
                observer.unobserve(entry.target);
            }
        });
    });

    const statsSection = document.querySelector('.stats-section');
    if (statsSection) {
        observer.observe(statsSection);
    }

    // Add smooth scrolling to CTA button
    $('.donate-btn').click(function(e) {
        $(this).html('<i class="fas fa-spinner fa-spin mr-2"></i>Redirecting...');
    });

    // Add hover effects to benefit cards
    $('.benefit-card').hover(
        function() {
            $(this).find('.benefit-icon').css('transform', 'scale(1.1)');
        },
        function() {
            $(this).find('.benefit-icon').css('transform', 'scale(1)');
        }
    );
});
</script>

</body>
</html>
