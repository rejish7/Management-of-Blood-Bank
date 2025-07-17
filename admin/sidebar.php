<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Sidebar</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<style>
    :root {
      --primary-color: #e74c3c;
      --primary-dark: #c0392b;
      --secondary-color: #34495e;
      --success-color: #27ae60;
      --warning-color: #f39c12;
      --info-color: #3498db;
      --light-bg: #f8f9fa;
      --white: #ffffff;
      --text-dark: #2c3e50;
      --text-muted: #6c757d;
      --shadow: 0 4px 20px rgba(0,0,0,0.1);
      --border-radius: 12px;
      --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .sidebar {
      position: fixed;
      top: 70px;
      left: 0;
      width: 280px;
      height: calc(100vh - 70px);
      background: linear-gradient(180deg, var(--white) 0%, #f8f9fa 100%);
      overflow-y: auto;
      z-index: 999;
    }

    .sidebar-nav {
      padding: 0 15px;
    }

    .nav-section {
      margin-bottom: 30px;
    }

    .nav-section-title {
      color: var(--text-muted);
      font-weight: 600;
      text-transform: uppercase;
    }

    .nav-item {
      margin-bottom: 5px;
    }

    .nav-link {
    display: flex
;
    /* align-items: center; */
    gap: 12px;
    padding: 15px 20px;
    color: var(--text-dark);
    text-decoration: none;
    font-weight: 500;
    /* font-size: 0.95rem; */
    /* position: relative; */
    overflow: hidden;
}

    .nav-link::before {
      content: '';
      position: absolute;
      left: 0;
      top: 0;
      bottom: 0;
      width: 0;
      background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
      transition: var(--transition);
      border-radius: var(--border-radius);
    }

    .nav-link.active {
      background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
      color: var(--white);
      box-shadow: 0 4px 15px rgba(231, 76, 60, 0.3);
      transform: translateX(5px);
    }

    .nav-link.active::before {
      width: 4px;
      background: var(--white);
    }

    .nav-icon {
      width: 20px;
      height: 20px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1rem;
      flex-shrink: 0;
    }

    .nav-text {
      flex: 1;
    }

    .nav-badge {
      background: var(--warning-color);
      color: var(--white);
      padding: 3px 8px;
      border-radius: 12px;
      font-size: 0.7rem;
      font-weight: 600;
      min-width: 20px;
      text-align: center;
    }

    .sidebar-footer {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      padding: 20px 25px;
      border-top: 1px solid #e9ecef;
      background: var(--white);
    }

    .footer-text {
      color: var(--text-muted);
      font-size: 0.8rem;
      text-align: center;
      margin: 0;
    }

    /* Custom scrollbar */
    .sidebar::-webkit-scrollbar {
      width: 6px;
    }

    .sidebar::-webkit-scrollbar-track {
      background: #f1f1f1;
    }

    .sidebar::-webkit-scrollbar-thumb {
      background: #c1c1c1;
      border-radius: 3px;
    }

    .sidebar::-webkit-scrollbar-thumb:hover {
      background: #a8a8a8;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      .sidebar {
        transform: translateX(-100%);
        transition: transform 0.3s ease;
      }

      .sidebar.show {
        transform: translateX(0);
      }
    }

    /* Loading animation */
    @keyframes slideInLeft {
      from {
        opacity: 0;
        transform: translateX(-20px);
      }
      to {
        opacity: 1;
        transform: translateX(0);
      }
    }

    .nav-item {
      animation: slideInLeft 0.3s ease forwards;
    }

</style>
</head>
<body>

<div class="sidebar">

  <nav class="sidebar-nav">
    <div class="nav-section">
      
      <div class="nav-item">
        <a href="dashboard.php" class="nav-link <?php echo ($active == 'dashboard') ? 'active' : ''; ?>">
          <div class="nav-icon">
            <i class="fas fa-tachometer-alt"></i>
          </div>
          <span class="nav-text">Dashboard</span>
        </a>
      </div>

      <div class="nav-item">
        <a href="add_donor.php" class="nav-link <?php echo ($active == 'add') ? 'active' : ''; ?>">
          <div class="nav-icon">
            <i class="fas fa-user-plus"></i>
          </div>
          <span class="nav-text">Add Donor</span>
        </a>
      </div>

      <div class="nav-item">
        <a href="donor_list.php" class="nav-link <?php echo ($active == 'list') ? 'active' : ''; ?>">
          <div class="nav-icon">
            <i class="fas fa-users"></i>
          </div>
          <span class="nav-text">Donor List</span>
        </a>
      </div>
    </div>

    <div class="nav-section">
      <div class="nav-section-title">Queries & Support</div>
      
      <div class="nav-item">
        <a href="query.php" class="nav-link <?php echo ($active == 'query') ? 'active' : ''; ?>">
          <div class="nav-icon">
            <i class="fas fa-question-circle"></i>
          </div>
          <span class="nav-text">All Queries</span>
        </a>
      </div>

      <div class="nav-item">
        <a href="pending_query.php" class="nav-link <?php echo ($active == 'pending') ? 'active' : ''; ?>">
          <div class="nav-icon">
            <i class="fas fa-clock"></i>
          </div>
          <span class="nav-text">Pending Queries</span>
          <span class="nav-badge">New</span>
        </a>
      </div>
    </div>

    <div class="nav-section">
      <div class="nav-section-title">Settings</div>
      
      <div class="nav-item">
        <a href="pages.php" class="nav-link <?php echo ($active == 'pages') ? 'active' : ''; ?>">
          <div class="nav-icon">
            <i class="fas fa-file-alt"></i>
          </div>
          <span class="nav-text">Manage Pages</span>
        </a>
      </div>

      <div class="nav-item">
        <a href="update_contact.php" class="nav-link <?php echo ($active == 'contact') ? 'active' : ''; ?>">
          <div class="nav-icon">
            <i class="fas fa-address-book"></i>
          </div>
          <span class="nav-text">Update Contact</span>
        </a>
      </div>

      <div class="nav-item">
        <a href="change_password.php" class="nav-link <?php echo ($active == 'password') ? 'active' : ''; ?>">
          <div class="nav-icon">
            <i class="fas fa-key"></i>
          </div>
          <span class="nav-text">Change Password</span>
        </a>
      </div>
    </div>

    <div class="nav-section">
      <div class="nav-section-title">Account</div>
      
      <div class="nav-item">
        <a href="logout.php" class="nav-link <?php echo ($active == 'logout') ? 'active' : ''; ?>">
          <div class="nav-icon">
            <i class="fas fa-sign-out-alt"></i>
          </div>
          <span class="nav-text">Logout</span>
        </a>
      </div>
    </div>
  </nav>
</div>
