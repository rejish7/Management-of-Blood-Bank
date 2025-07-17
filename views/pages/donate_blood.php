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
        
        .donation-form-container {
            background: white;
            border-radius: 25px;
            box-shadow: 0 25px 50px rgba(0,0,0,0.15);
            padding: 50px;
            margin-top: -60px;
            position: relative;
            z-index: 3;
        }
        
        .form-step {
            display: none;
        }
        
        .form-step.active {
            display: block;
            animation: fadeInSlide 0.5s ease-in-out;
        }
        
        @keyframes fadeInSlide {
            from {
                opacity: 0;
                transform: translateX(30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        .progress-bar-container {
            margin-bottom: 40px;
        }
        
        .progress-steps {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .progress-step {
            background: #e9ecef;
            color: #6c757d;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            position: relative;
            transition: all 0.3s ease;
        }
        
        .progress-step.active {
            background: linear-gradient(135deg, #dc3545, #c82333);
            color: white;
            box-shadow: 0 8px 25px rgba(220, 53, 69, 0.3);
        }
        
        .progress-step.completed {
            background: linear-gradient(135deg, #28a745, #20c997);
            color: white;
        }
        
        .progress-step::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 100%;
            width: calc(100vw / 3 - 100px);
            height: 2px;
            background: #e9ecef;
            transform: translateY(-50%);
        }
        
        .progress-step:last-child::after {
            display: none;
        }
        
        .progress-step.completed::after {
            background: linear-gradient(135deg, #28a745, #20c997);
        }
        
        .form-group-modern {
            margin-bottom: 25px;
            position: relative;
        }
        
        .form-label {
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
            display: block;
        }
        
        .required {
            color: #dc3545;
            margin-left: 5px;
        }
        
        .form-control-modern {
            border: 2px solid #e9ecef;
            border-radius: 12px;
            padding: 15px 20px;
            font-size: 1rem;
            transition: all 0.3s ease;
            width: 100%;
            background: #f8f9fa;
        }
        
        .form-control-modern:focus {
            border-color: #dc3545;
            box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
            background: white;
            outline: none;
        }
        
        .form-control-modern.is-valid {
            border-color: #28a745;
            background: rgba(40, 167, 69, 0.05);
        }
        
        .form-control-modern.is-invalid {
            border-color: #dc3545;
            background: rgba(220, 53, 69, 0.05);
        }
        
        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
            transition: all 0.3s ease;
        }
        
        .form-control-modern:focus + .input-icon {
            color: #dc3545;
        }
        
        .btn-step {
            background: linear-gradient(135deg, #dc3545, #c82333);
            border: none;
            color: white;
            padding: 15px 30px;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
            margin: 10px;
        }
        
        .btn-step:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(220, 53, 69, 0.4);
            color: white;
        }
        
        .btn-secondary-step {
            background: #6c757d;
            border: none;
            color: white;
            padding: 15px 30px;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
            margin: 10px;
        }
        
        .btn-secondary-step:hover {
            background: #5a6268;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(108, 117, 125, 0.4);
            color: white;
        }
        
        .blood-group-selector {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(80px, 1fr));
            gap: 15px;
            margin-top: 15px;
        }
        
        .blood-option {
            background: white;
            border: 2px solid #e9ecef;
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
        }
        
        .blood-option:hover {
            border-color: #dc3545;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(220, 53, 69, 0.15);
        }
        
        .blood-option.selected {
            background: linear-gradient(135deg, #dc3545, #c82333);
            color: white;
            border-color: #dc3545;
        }
        
        .blood-type {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 5px;
        }
        
        .eligibility-info {
            background: linear-gradient(135deg, #e3f2fd, #bbdefb);
            border-left: 5px solid #2196f3;
            padding: 20px;
            border-radius: 10px;
            margin: 30px 0;
        }
        
        .step-title {
            color: #dc3545;
            font-weight: 700;
            font-size: 1.8rem;
            margin-bottom: 15px;
            text-align: center;
        }
        
        .step-description {
            color: #6c757d;
            text-align: center;
            margin-bottom: 30px;
        }
        
        .thank-you-section {
            text-align: center;
            padding: 40px;
        }
        
        .thank-you-icon {
            background: linear-gradient(135deg, #28a745, #20c997);
            color: white;
            width: 80px;
            height: 80px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            margin-bottom: 20px;
            animation: bounce 2s infinite;
        }
        
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-10px); }
            60% { transform: translateY(-5px); }
        }
        
        .gender-selector {
            display: flex;
            gap: 15px;
            margin-top: 15px;
        }
        
        .gender-option {
            flex: 1;
            background: white;
            border: 2px solid #e9ecef;
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .gender-option:hover {
            border-color: #dc3545;
            transform: translateY(-2px);
        }
        
        .gender-option.selected {
            background: linear-gradient(135deg, #dc3545, #c82333);
            color: white;
            border-color: #dc3545;
        }
        
        .validation-message {
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 5px;
            display: none;
        }
        
        .validation-message.show {
            display: block;
        }
    </style>
</head>

<body>

<!-- Hero Section -->
<div class="hero-section">
    <div class="container">
        <div class="hero-content">
            <h1 class="display-3 mb-4" style="color:white;">
                <i class="fas fa-heart mr-3"></i>Become a Life Saver
            </h1>
            <p class="lead mb-0">Your donation can save up to three lives. Join our community of heroes today.</p>
        </div>
    </div>
</div>

<div class="container">
    <div class="donation-form-container">
        <!-- Progress Bar -->
        <div class="progress-bar-container">
            <div class="progress-steps">
                <div class="progress-step active" id="step-1">
                    <i class="fas fa-user"></i>
                </div>
                <div class="progress-step" id="step-2">
                    <i class="fas fa-info-circle"></i>
                </div>
                <div class="progress-step" id="step-3">
                    <i class="fas fa-tint"></i>
                </div>
                <div class="progress-step" id="step-4">
                    <i class="fas fa-check"></i>
                </div>
            </div>
        </div>

        <form name="donor" action="savedata.php" method="post" id="donorForm">
            <!-- Step 1: Personal Information -->
            <div class="form-step active" id="step1">
                <h2 class="step-title">Personal Information</h2>
                <p class="step-description">Let's start with your basic details</p>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group-modern">
                            <label class="form-label">
                                <i class="fas fa-user mr-2"></i>Full Name<span class="required">*</span>
                            </label>
                            <input type="text" name="fullname" class="form-control-modern" required placeholder="Enter your full name">
                            <div class="validation-message">Please enter your full name</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group-modern">
                            <label class="form-label">
                                <i class="fas fa-phone mr-2"></i>Mobile Number<span class="required">*</span>
                            </label>
                            <input type="tel" name="mobileno" class="form-control-modern" required placeholder="Enter your mobile number">
                            <div class="validation-message">Please enter a valid mobile number</div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group-modern">
                            <label class="form-label">
                                <i class="fas fa-envelope mr-2"></i>Email Address
                            </label>
                            <input type="email" name="emailid" class="form-control-modern" placeholder="Enter your email address">
                            <div class="validation-message">Please enter a valid email address</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group-modern">
                            <label class="form-label">
                                <i class="fas fa-calendar mr-2"></i>Age<span class="required">*</span>
                            </label>
                            <input type="number" name="age" class="form-control-modern" required min="18" max="65" placeholder="Enter your age">
                            <div class="validation-message">Age must be between 18 and 65</div>
                        </div>
                    </div>
                </div>
                
                <div class="text-center">
                    <button type="button" class="btn-step" onclick="nextStep(1)">
                        Next Step <i class="fas fa-arrow-right ml-2"></i>
                    </button>
                </div>
            </div>

            <!-- Step 2: Additional Details -->
            <div class="form-step" id="step2">
                <h2 class="step-title">Additional Details</h2>
                <p class="step-description">Help us know you better</p>
                
                <div class="form-group-modern">
                    <label class="form-label">
                        <i class="fas fa-venus-mars mr-2"></i>Gender<span class="required">*</span>
                    </label>
                    <div class="gender-selector">
                        <div class="gender-option" onclick="selectGender('Male')">
                            <i class="fas fa-mars fa-2x mb-2"></i>
                            <div>Male</div>
                        </div>
                        <div class="gender-option" onclick="selectGender('Female')">
                            <i class="fas fa-venus fa-2x mb-2"></i>
                            <div>Female</div>
                        </div>
                    </div>
                    <input type="hidden" name="gender" id="selectedGender" required>
                    <div class="validation-message">Please select your gender</div>
                </div>
                
                <div class="form-group-modern">
                    <label class="form-label">
                        <i class="fas fa-map-marker-alt mr-2"></i>Address<span class="required">*</span>
                    </label>
                    <textarea class="form-control-modern" name="address" required rows="4" placeholder="Enter your complete address"></textarea>
                    <div class="validation-message">Please enter your complete address</div>
                </div>
                
                <div class="text-center">
                    <button type="button" class="btn-secondary-step" onclick="prevStep(2)">
                        <i class="fas fa-arrow-left mr-2"></i>Previous
                    </button>
                    <button type="button" class="btn-step" onclick="nextStep(2)">
                        Next Step <i class="fas fa-arrow-right ml-2"></i>
                    </button>
                </div>
            </div>

            <!-- Step 3: Blood Group Selection -->
            <div class="form-step" id="step3">
                <h2 class="step-title">Blood Group Selection</h2>
                <p class="step-description">Select your blood group</p>
                
                <div class="form-group-modern">
                    <label class="form-label">
                        <i class="fas fa-tint mr-2"></i>Blood Group<span class="required">*</span>
                    </label>
                    <div class="blood-group-selector">
                        <?php
                        $sql = "SELECT * FROM blood";
                        $result = mysqli_query($conn, $sql) or die("query unsuccessful.");
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <div class="blood-option" onclick="selectBloodGroup('<?php echo $row['blood_id']; ?>', '<?php echo $row['blood_group']; ?>')">
                                <div class="blood-type"><?php echo $row['blood_group']; ?></div>
                                <small>Blood Type</small>
                            </div>
                        <?php } ?>
                    </div>
                    <input type="hidden" name="blood" id="selectedBlood" required>
                    <div class="validation-message">Please select your blood group</div>
                </div>
                
                <div class="eligibility-info">
                    <h5><i class="fas fa-info-circle mr-2"></i>Eligibility Criteria</h5>
                    <ul class="mb-0">
                        <li>Age: 18-65 years</li>
                        <li>Weight: Minimum 50 kg</li>
                        <li>Good general health</li>
                        <li>No recent illness or medication</li>
                        <li>Last donation was at least 3 months ago</li>
                    </ul>
                </div>
                
                <div class="text-center">
                    <button type="button" class="btn-secondary-step" onclick="prevStep(3)">
                        <i class="fas fa-arrow-left mr-2"></i>Previous
                    </button>
                    <button type="button" class="btn-step" onclick="nextStep(3)">
                        Review & Submit <i class="fas fa-arrow-right ml-2"></i>
                    </button>
                </div>
            </div>

            <!-- Step 4: Review & Submit -->
            <div class="form-step" id="step4">
                <h2 class="step-title">Review Your Information</h2>
                <p class="step-description">Please review your details before submitting</p>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-3">
                            <div class="card-header bg-light">
                                <h6 class="mb-0"><i class="fas fa-user mr-2"></i>Personal Details</h6>
                            </div>
                            <div class="card-body">
                                <div id="reviewPersonal"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-3">
                            <div class="card-header bg-light">
                                <h6 class="mb-0"><i class="fas fa-tint mr-2"></i>Medical Details</h6>
                            </div>
                            <div class="card-body">
                                <div id="reviewMedical"></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="text-center">
                    <button type="button" class="btn-secondary-step" onclick="prevStep(4)">
                        <i class="fas fa-arrow-left mr-2"></i>Previous
                    </button>
                    <button type="submit" name="submit" class="btn-step">
                        <i class="fas fa-heart mr-2"></i>Submit Donation Request
                    </button>
                </div>
            </div>
        </form>
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
let currentStep = 1;
const totalSteps = 4;

// Step navigation functions
function nextStep(step) {
    if (validateStep(step)) {
        if (step < totalSteps) {
            hideStep(step);
            showStep(step + 1);
            updateProgressBar(step + 1);
            currentStep = step + 1;
            
            if (step + 1 === 4) {
                populateReview();
            }
        }
    }
}

function prevStep(step) {
    if (step > 1) {
        hideStep(step);
        showStep(step - 1);
        updateProgressBar(step - 1);
        currentStep = step - 1;
    }
}

function showStep(step) {
    document.getElementById('step' + step).classList.add('active');
}

function hideStep(step) {
    document.getElementById('step' + step).classList.remove('active');
}

function updateProgressBar(step) {
    // Reset all steps
    for (let i = 1; i <= totalSteps; i++) {
        const stepElement = document.getElementById('step-' + i);
        stepElement.classList.remove('active', 'completed');
        
        if (i < step) {
            stepElement.classList.add('completed');
        } else if (i === step) {
            stepElement.classList.add('active');
        }
    }
}

// Validation functions
function validateStep(step) {
    let isValid = true;
    
    if (step === 1) {
        const fullname = document.querySelector('input[name="fullname"]');
        const mobileno = document.querySelector('input[name="mobileno"]');
        const age = document.querySelector('input[name="age"]');
        
        isValid = validateField(fullname) && validateField(mobileno) && validateField(age) && isValid;
        
        // Validate age range
        if (age.value && (age.value < 18 || age.value > 65)) {
            showValidationError(age, 'Age must be between 18 and 65');
            isValid = false;
        }
        
        // Validate mobile number
        if (mobileno.value && !/^\d{10}$/.test(mobileno.value)) {
            showValidationError(mobileno, 'Please enter a valid 10-digit mobile number');
            isValid = false;
        }
    } else if (step === 2) {
        const gender = document.getElementById('selectedGender');
        const address = document.querySelector('textarea[name="address"]');
        
        isValid = validateField(gender) && validateField(address) && isValid;
    } else if (step === 3) {
        const blood = document.getElementById('selectedBlood');
        isValid = validateField(blood) && isValid;
    }
    
    return isValid;
}

function validateField(field) {
    if (!field.value.trim()) {
        showValidationError(field, field.getAttribute('placeholder') || 'This field is required');
        return false;
    } else {
        hideValidationError(field);
        field.classList.add('is-valid');
        field.classList.remove('is-invalid');
        return true;
    }
}

function showValidationError(field, message) {
    field.classList.add('is-invalid');
    field.classList.remove('is-valid');
    const errorDiv = field.parentNode.querySelector('.validation-message');
    if (errorDiv) {
        errorDiv.textContent = message;
        errorDiv.classList.add('show');
    }
}

function hideValidationError(field) {
    field.classList.remove('is-invalid');
    const errorDiv = field.parentNode.querySelector('.validation-message');
    if (errorDiv) {
        errorDiv.classList.remove('show');
    }
}

// Gender selection
function selectGender(gender) {
    document.querySelectorAll('.gender-option').forEach(option => {
        option.classList.remove('selected');
    });
    event.target.closest('.gender-option').classList.add('selected');
    document.getElementById('selectedGender').value = gender;
    hideValidationError(document.getElementById('selectedGender'));
}

// Blood group selection
function selectBloodGroup(bloodId, bloodGroup) {
    document.querySelectorAll('.blood-option').forEach(option => {
        option.classList.remove('selected');
    });
    event.target.closest('.blood-option').classList.add('selected');
    document.getElementById('selectedBlood').value = bloodId;
    hideValidationError(document.getElementById('selectedBlood'));
}

// Populate review section
function populateReview() {
    const formData = new FormData(document.getElementById('donorForm'));
    
    const personalHTML = `
        <p><strong>Name:</strong> ${formData.get('fullname')}</p>
        <p><strong>Mobile:</strong> ${formData.get('mobileno')}</p>
        <p><strong>Email:</strong> ${formData.get('emailid') || 'Not provided'}</p>
        <p><strong>Age:</strong> ${formData.get('age')} years</p>
    `;
    
    const selectedBloodText = document.querySelector('.blood-option.selected')?.textContent.trim() || 'Not selected';
    
    const medicalHTML = `
        <p><strong>Gender:</strong> ${formData.get('gender')}</p>
        <p><strong>Blood Group:</strong> ${selectedBloodText}</p>
        <p><strong>Address:</strong> ${formData.get('address')}</p>
    `;
    
    document.getElementById('reviewPersonal').innerHTML = personalHTML;
    document.getElementById('reviewMedical').innerHTML = medicalHTML;
}

// Form submission
document.getElementById('donorForm').addEventListener('submit', function(e) {
    if (!validateStep(4)) {
        e.preventDefault();
        return false;
    }
    
    // Show loading state
    const submitBtn = document.querySelector('button[type="submit"]');
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Submitting...';
    submitBtn.disabled = true;
});

// Real-time validation
document.querySelectorAll('input, textarea, select').forEach(field => {
    field.addEventListener('blur', function() {
        if (this.value.trim()) {
            validateField(this);
        }
    });
    
    field.addEventListener('input', function() {
        if (this.classList.contains('is-invalid')) {
            hideValidationError(this);
        }
    });
});

// Initialize
document.addEventListener('DOMContentLoaded', function() {
    updateProgressBar(1);
});
</script>

</body>
</html>
