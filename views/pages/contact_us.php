<!DOCTYPE html>
<html lang="en">
<?php 
include($_SERVER['DOCUMENT_ROOT'] . '/blood bank/config/config.php');
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Contact Us - BloodBank & Donor Management System">
    <meta name="author" content="">
    <title>Contact Us - Blood Bank</title>
    <link rel="stylesheet" href="../../public/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .contact-hero {
            background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
            color: white;
            padding: 80px 0;
            margin-top: -20px;
        }
        .contact-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            padding: 40px;
            margin-top: -50px;
            position: relative;
            z-index: 2;
        }
        .form-group label {
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
        }
        .form-control {
            border: 2px solid #e9ecef;
            border-radius: 8px;
            padding: 12px 15px;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            border-color: #dc3545;
            box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
        }
        .btn-send {
            background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
            border: none;
            padding: 12px 30px;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-send:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(220, 53, 69, 0.4);
        }
        .contact-info-card {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 20px;
            border-left: 5px solid #dc3545;
        }
        .contact-info-item {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            padding: 15px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
        }
        .contact-info-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }
        .contact-icon {
            background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
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
        .contact-details h5 {
            margin-bottom: 5px;
            color: #333;
            font-weight: 600;
        }
        .contact-details a {
            color: #6c757d;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .contact-details a:hover {
            color: #dc3545;
        }
        .section-title {
            position: relative;
            margin-bottom: 40px;
        }
        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 50px;
            height: 3px;
            background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
            border-radius: 2px;
        }
        .alert-success {
            border-radius: 10px;
            border: none;
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            color: white;
        }
    </style>
</head>

<?php 
include($_SERVER['DOCUMENT_ROOT'] . '/blood bank/views/header/head.php');
?>

<?php
if(isset($_POST["send"])){
    $name = mysqli_real_escape_string($conn, $_POST['fullname']);
    $number = mysqli_real_escape_string($conn, $_POST['contactno']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    
    $sql = "INSERT INTO contact_query (query_name, query_mail, query_number, query_message) VALUES ('$name', '$email', '$number', '$message')";
    $result = mysqli_query($conn, $sql);
    
    if($result) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle mr-2"></i>
                <strong>Success!</strong> Your message has been sent successfully. We will contact you shortly.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
              </div>';
    }
}
?>

<!-- Hero Section -->
<div class="contact-hero">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <h1 class="display-4 mb-3" style="color: white;">
                    <i class="fas fa-envelope mr-3"></i>Get In Touch
                </h1>
                <p class="lead">We're here to help and answer any questions you might have. We look forward to hearing from you!</p>
            </div>
        </div>
    </div>
</div>

<div class="container" style="margin-top: 20px;">
    <div class="contact-card">
        <div class="row">
            <!-- Contact Form -->
            <div class="col-lg-8">
                <h3 class="section-title">
                    <i class="fas fa-paper-plane mr-2 text-danger"></i>Send us a Message
                </h3>
                <form name="sentMessage" method="post" class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">
                                    <i class="fas fa-user mr-1"></i>Full Name *
                                </label>
                                <input type="text" class="form-control" id="name" name="fullname" required>
                                <div class="invalid-feedback">
                                    Please provide your full name.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">
                                                                        <i class="fas fa-phone-alt"></i>
Phone Number *
                                </label>
                                <input type="tel" class="form-control" id="phone" name="contactno" required>
                                <div class="invalid-feedback">
                                    Please provide a valid phone number.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">
                            <i class="fas fa-envelope mr-1"></i>Email Address *
                        </label>
                        <input type="email" class="form-control" id="email" name="email" required>
                        <div class="invalid-feedback">
                            Please provide a valid email address.
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message">
                            <i class="fas fa-comment mr-1"></i>Message *
                        </label>
                        <textarea rows="6" class="form-control" id="message" name="message" required maxlength="999" 
                                  placeholder="Tell us how we can help you..." style="resize:none"></textarea>
                        <div class="invalid-feedback">
                            Please enter your message.
                        </div>
                    </div>
                    <button type="submit" name="send" class="btn btn-danger btn-send">
                        <i class="fas fa-paper-plane mr-2"></i>Send Message
                    </button>
                </form>
            </div>

            <!-- Contact Information -->
            <div class="col-lg-4">
                <h3 class="section-title">
                    <i class="fas fa-info-circle mr-2 text-danger"></i>Contact Information
                </h3>
                <div class="contact-info-card">
                    <?php
                    $sql = "SELECT * FROM contact_info";
                    $result = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) { ?>
                            <div class="contact-info-item">
                                <div class="contact-icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="contact-details">
                                    <h5>Address</h5>
                                    <a href="https://www.google.com/maps/search/?api=1&query=<?php echo urlencode($row['contact_address']); ?>" target="_blank">
                                        <?php echo $row['contact_address']; ?>
                                    </a>
                                </div>
                            </div>

                            <div class="contact-info-item">
                                <div class="contact-icon">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                                <div class="contact-details">
                                    <h5>Phone Number</h5>
                                    <a href="tel:<?php echo $row['contact_phone']; ?>">
                                        <?php echo $row['contact_phone']; ?>
                                    </a>
                                </div>
                            </div>

                            <div class="contact-info-item">
                                <div class="contact-icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="contact-details">
                                    <h5>Email Address</h5>
                                    <a href="mailto:<?php echo $row['contact_mail']; ?>">
                                        <?php echo $row['contact_mail']; ?>
                                    </a>
                                </div>
                            </div>
                        <?php }
                    } ?>
                    
                    <!-- Additional Contact Options -->
                    <div class="mt-4">
                        <h5 class="mb-3">Follow Us</h5>
                        <div class="d-flex">
                            <a href="#" class="btn btn-outline-danger btn-sm mr-2">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="btn btn-outline-danger btn-sm mr-2">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="btn btn-outline-danger btn-sm mr-2">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" class="btn btn-outline-danger btn-sm">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </div>
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
<script src="../../public/js/jquery-3.3.1.min.js"></script>
<script src="../../public/js/popper.min.js"></script>
<script src="../../public/js/bootstrap.min.js"></script>

<script>
// Form validation
(function() {
    'use strict';
    window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();

// Smooth scrolling for anchor links
$('a[href*="#"]').on('click', function (e) {
    e.preventDefault();
    $('html, body').animate({
        scrollTop: $($(this).attr('href')).offset().top - 100
    }, 500, 'linear');
});

// Auto-hide alerts after 5 seconds
setTimeout(function() {
    $('.alert').fadeOut('slow');
}, 5000);
</script>

</body>
</html>
