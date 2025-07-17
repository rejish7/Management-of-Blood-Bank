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
        
        .search-container {
            background: white;
            border-radius: 25px;
            box-shadow: 0 25px 50px rgba(0,0,0,0.15);
            padding: 40px;
            margin-top: -60px;
            position: relative;
            z-index: 3;
        }
        
        .search-form {
            background: #f8f9fa;
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 30px;
        }
        
        .form-group-modern {
            margin-bottom: 20px;
        }
        
        .form-label {
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
            display: block;
        }
        
        .form-control-modern {
            border: 2px solid #e9ecef;
            border-radius: 12px;
            padding: 15px 20px;
            font-size: 1rem;
            transition: all 0.3s ease;
            width: 100%;
        }
        
        .form-control-modern:focus {
            border-color: #dc3545;
            box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
            outline: none;
        }
        
        .btn-search {
            background: linear-gradient(135deg, #dc3545, #c82333);
            border: none;
            color: white;
            padding: 15px 30px;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
            width: 100%;
        }
        
        .btn-search:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(220, 53, 69, 0.4);
            color: white;
        }
        
        .blood-group-filter {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(80px, 1fr));
            gap: 10px;
            margin-top: 15px;
        }
        
        .blood-option {
            background: white;
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 15px 10px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600;
        }
        
        .blood-option:hover, .blood-option.active {
            background: linear-gradient(135deg, #dc3545, #c82333);
            color: white;
            border-color: #dc3545;
            transform: translateY(-2px);
        }
        
        .donor-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            padding: 25px;
            margin-bottom: 20px;
            transition: all 0.3s ease;
            border-left: 5px solid #dc3545;
        }
        
        .donor-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }
        
        .donor-blood-type {
            background: linear-gradient(135deg, #dc3545, #c82333);
            color: white;
            padding: 10px 15px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 1.1rem;
            display: inline-block;
            margin-bottom: 15px;
        }
        
        .donor-info {
            color: #666;
            margin-bottom: 8px;
        }
        
        .donor-name {
            font-size: 1.3rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 10px;
        }
        
        .contact-btn {
            background: linear-gradient(135deg, #28a745, #20c997);
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 20px;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
        }
        
        .contact-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(40, 167, 69, 0.4);
            color: white;
            text-decoration: none;
        }
        
        .no-results {
            text-align: center;
            padding: 50px;
            color: #666;
        }
        
        .emergency-notice {
            background: linear-gradient(135deg, #ff6b6b, #ee5a52);
            color: white;
            padding: 20px;
            border-radius: 15px;
            margin-bottom: 30px;
            text-align: center;
        }
        
        .stats-row {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 30px;
            margin: 30px 0;
        }
        
        .stat-card {
            text-align: center;
            padding: 20px;
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: 800;
            color: #dc3545;
            display: block;
        }
        
        .stat-label {
            color: #666;
            font-weight: 500;
            margin-top: 5px;
        }
        
        .filter-badge {
            background: #dc3545;
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.9rem;
            margin: 5px;
            display: inline-block;
        }
    </style>
</head>

<body>

<!-- Hero Section -->
<div class="hero-section">
    <div class="container">
        <div class="hero-content">
            <h1 class="display-3 mb-4" style="color:white;">
                <i class="fas fa-search mr-3"></i>Find Blood Donors
            </h1>
            <p class="lead mb-0">Search for available blood donors in your area. Save a life today.</p>
        </div>
    </div>
</div>

<div class="container">
    <div class="search-container">
        
        <!-- Emergency Notice -->
        <div class="emergency-notice">
            <h5><i class="fas fa-exclamation-triangle mr-2"></i>Emergency Blood Need?</h5>
            <p class="mb-2">For immediate emergency blood requirements, please contact our 24/7 helpline: <strong>+91-9999-BLOOD</strong></p>
        </div>
        
        <!-- Search Form -->
        <div class="search-form">
            <h3 class="text-center mb-4"><i class="fas fa-filter mr-2"></i>Search Blood Donors</h3>
            
            <!-- Simple Search Form -->
            <form method="GET" action="need_blood.php">
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="form-group-modern">
                            <label class="form-label">
                                <i class="fas fa-search mr-2"></i>Search for Blood Donors
                            </label>
                            <input type="text" name="quick_search" class="form-control-modern" 
                                   placeholder="Type blood group (A+, B-, O+) or location" 
                                   value="<?php echo isset($_GET['quick_search']) ? htmlspecialchars($_GET['quick_search']) : ''; ?>">
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12 text-center">
                        <button type="submit" class="btn-search" style="width: auto; padding: 12px 30px;">
                            <i class="fas fa-search mr-2"></i>Search Donors
                        </button>
                        
                        <?php if (isset($_GET['quick_search']) && !empty($_GET['quick_search'])): ?>
                        <a href="need_blood.php" class="btn btn-outline-secondary ml-2" style="padding: 12px 20px; border-radius: 25px;">
                            <i class="fas fa-times mr-2"></i>Clear Search
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
            </form>
        </div>
        
        <!-- Search Results -->
        <div class="search-results">
            <?php
            // Check if there's any search query submitted
            $has_search_query = !empty($_GET['quick_search']) || !empty($_GET['blood_group']) || 
                               !empty($_GET['location']) || !empty($_GET['gender']) || 
                               !empty($_GET['min_age']) || !empty($_GET['max_age']);
            
            if ($has_search_query) {
                // Initialize search query
                $search_conditions = [];
                $params = [];
                $types = "";
                
                // Build search query based on filters
                $base_sql = "SELECT d.*, b.blood_group FROM donor_details d 
                            JOIN blood b ON d.donor_blood = b.blood_id WHERE 1=1";
                
                // Handle quick search
                if (!empty($_GET['quick_search'])) {
                    $quick_search = $_GET['quick_search'];
                    $search_conditions[] = "(b.blood_group LIKE ? OR d.donor_address LIKE ? OR d.donor_name LIKE ?)";
                    $params[] = "%" . $quick_search . "%";
                    $params[] = "%" . $quick_search . "%";
                    $params[] = "%" . $quick_search . "%";
                    $types .= "sss";
                }
                
                if (!empty($_GET['blood_group'])) {
                    $search_conditions[] = "d.donor_blood = ?";
                    $params[] = $_GET['blood_group'];
                    $types .= "i";
                }
                
                if (!empty($_GET['location'])) {
                    $search_conditions[] = "d.donor_address LIKE ?";
                    $params[] = "%" . $_GET['location'] . "%";
                    $types .= "s";
                }
                
                if (!empty($_GET['gender'])) {
                    $search_conditions[] = "d.donor_gender = ?";
                    $params[] = $_GET['gender'];
                    $types .= "s";
                }
                
                if (!empty($_GET['min_age'])) {
                    $search_conditions[] = "d.donor_age >= ?";
                    $params[] = $_GET['min_age'];
                    $types .= "i";
                }
                
                if (!empty($_GET['max_age'])) {
                    $search_conditions[] = "d.donor_age <= ?";
                    $params[] = $_GET['max_age'];
                    $types .= "i";
                }
                
                if (!empty($search_conditions)) {
                    $base_sql .= " AND " . implode(" AND ", $search_conditions);
                }
                
                $base_sql .= " ORDER BY d.registration_date DESC";
                
                // Execute search query
                if (!empty($params)) {
                    $stmt = mysqli_prepare($conn, $base_sql);
                    if ($stmt) {
                        mysqli_stmt_bind_param($stmt, $types, ...$params);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                    } else {
                        echo "<div class='alert alert-danger'>Error preparing search query: " . mysqli_error($conn) . "</div>";
                        $result = false;
                    }
                } else {
                    $result = mysqli_query($conn, $base_sql);
                    if (!$result) {
                        echo "<div class='alert alert-danger'>Error executing query: " . mysqli_error($conn) . "</div>";
                    }
                }
                
                // Show active filters
                $active_filters = [];
                if (!empty($_GET['quick_search'])) $active_filters[] = "Search: " . htmlspecialchars($_GET['quick_search']);
                if (!empty($_GET['blood_group'])) {
                    $bg_sql = "SELECT blood_group FROM blood WHERE blood_id = " . intval($_GET['blood_group']);
                    $bg_result = mysqli_query($conn, $bg_sql);
                    $bg_row = mysqli_fetch_assoc($bg_result);
                    $active_filters[] = "Blood Group: " . $bg_row['blood_group'];
                }
                if (!empty($_GET['location'])) $active_filters[] = "Location: " . htmlspecialchars($_GET['location']);
                if (!empty($_GET['gender'])) $active_filters[] = "Gender: " . htmlspecialchars($_GET['gender']);
                if (!empty($_GET['min_age']) || !empty($_GET['max_age'])) {
                    $age_filter = "Age: ";
                    if (!empty($_GET['min_age'])) $age_filter .= $_GET['min_age'] . "+";
                    if (!empty($_GET['max_age'])) $age_filter .= " to " . $_GET['max_age'];
                    $active_filters[] = $age_filter;
                }
                
                if (!empty($active_filters)) {
                    echo "<div class='mb-3'>";
                    echo "<strong>Active Filters:</strong> ";
                    foreach ($active_filters as $filter) {
                        echo "<span class='filter-badge'>{$filter}</span>";
                    }
                    echo " <a href='need_blood.php' class='btn btn-sm btn-outline-secondary'>Clear All</a>";
                    echo "</div>";
                }
                
                if ($result) {
                    $donor_count = mysqli_num_rows($result);
                } else {
                    $donor_count = 0;
                }
                
                // Display search statistics
                echo "<div class='stats-row'>";
                echo "<div class='row'>";
                echo "<div class='col-md-4'>";
                echo "<div class='stat-card'>";
                echo "<span class='stat-number'>{$donor_count}</span>";
                echo "<div class='stat-label'>Donors Found</div>";
                echo "</div>";
                echo "</div>";
                
                // Total registered donors
                $total_sql = "SELECT COUNT(*) as total FROM donor_details";
                $total_result = mysqli_query($conn, $total_sql);
                $total_row = mysqli_fetch_assoc($total_result);
                echo "<div class='col-md-4'>";
                echo "<div class='stat-card'>";
                echo "<span class='stat-number'>{$total_row['total']}</span>";
                echo "<div class='stat-label'>Total Registered Donors</div>";
                echo "</div>";
                echo "</div>";
            } else {
                // Show welcome message when no search is performed
                echo "<div class='text-center py-5'>";
                echo "<i class='fas fa-search fa-4x text-muted mb-4'></i>";
                echo "<h4 class='text-muted'>Search for Blood Donors</h4>";
                echo "<p class='text-muted mb-4'>Use the quick search above to find blood donors by typing blood group, location, or any requirement.</p>";
                echo "</div>";
                $donor_count = 0;
            }
            ?>
            
            <!-- Donor Results -->
            <div class="row">
                <?php
                if ($has_search_query && $donor_count > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        // Calculate age from registration (assuming registration_date exists)
                        $registration_date = new DateTime($row['registration_date']);
                        $now = new DateTime();
                        $days_since_registration = $now->diff($registration_date)->days;
                        
                        echo "<div class='col-md-6'>";
                        echo "<div class='donor-card'>";
                        echo "<div class='donor-blood-type'>{$row['blood_group']}</div>";
                        echo "<div class='donor-name'>{$row['donor_name']}</div>";
                        echo "<div class='donor-info'><i class='fas fa-birthday-cake mr-2'></i>Age: {$row['donor_age']} years</div>";
                        echo "<div class='donor-info'><i class='fas fa-venus-mars mr-2'></i>Gender: {$row['donor_gender']}</div>";
                        echo "<div class='donor-info'><i class='fas fa-map-marker-alt mr-2'></i>Location: " . substr($row['donor_address'], 0, 50) . "...</div>";
                        echo "<div class='donor-info'><i class='fas fa-calendar mr-2'></i>Registered: " . date('M d, Y', strtotime($row['registration_date'])) . "</div>";
                        
                        // Contact information (partially hidden for privacy)
                        $masked_phone = substr($row['donor_number'], 0, 3) . "****" . substr($row['donor_number'], -3);
                        echo "<div class='donor-info'><i class='fas fa-phone mr-2'></i>Phone: {$masked_phone}</div>";
                        
                        echo "<a href='tel:{$row['donor_number']}' class='contact-btn'>";
                        echo "<i class='fas fa-phone mr-2'></i>Contact Donor";
                        echo "</a>";
                        
                        if (!empty($row['donor_mail'])) {
                            echo " <a href='mailto:{$row['donor_mail']}' class='contact-btn' style='background: linear-gradient(135deg, #007bff, #0056b3);'>";
                            echo "<i class='fas fa-envelope mr-2'></i>Email";
                            echo "</a>";
                        }
                        
                        echo "</div>";
                        echo "</div>";
                    }
                } elseif ($has_search_query && $donor_count == 0) {
                    echo "<div class='col-12'>";
                    echo "<div class='no-results'>";
                    echo "<i class='fas fa-search fa-3x mb-3 text-muted'></i>";
                    echo "<h4>No Donors Found</h4>";
                    echo "<p>We couldn't find any donors matching your search criteria. Try adjusting your filters or search in a broader area.</p>";
                    echo "<a href='need_blood.php' class='btn btn-primary'>Clear Filters</a>";
                    echo "</div>";
                    echo "</div>";
                }
                ?>
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
$(document).ready(function() {
    // Simple search functionality for blood group quick links
    $('.blood-option').click(function(e) {
        e.preventDefault();
        const bloodGroup = $(this).text().trim();
        $('input[name="quick_search"]').val(bloodGroup);
        $('form').submit();
    });
    
    // Add loading state to search button on form submit
    $('form').submit(function() {
        const searchValue = $('input[name="quick_search"]').val().trim();
        
        if (searchValue.length < 1) {
            alert('Please enter a search term (blood group or location)');
            return false;
        }
        
        const submitBtn = $('.btn-search');
        submitBtn.html('<i class="fas fa-spinner fa-spin mr-2"></i>Searching...');
        submitBtn.prop('disabled', true);
        
        return true;
    });
    
    // Focus on search input when page loads
    $('input[name="quick_search"]').focus();
});
</script>

</body>
</html>
