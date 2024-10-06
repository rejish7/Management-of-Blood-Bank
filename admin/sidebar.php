<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Sidebar</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <style>
      body {
          margin: 0;
          font-family: 'Poppins', sans-serif;
          background-color: #f4f4f4;
      }

      .sidebar {
          margin: 0;
          padding: 20px 0;
          width: 250px;
          background-color: #2c3e50;
          position: fixed;
          height: 100%;
          overflow: auto;
          box-shadow: 2px 0 5px rgba(0,0,0,0.1);
      }

      .sidebar a {
          display: block;
          color: #ecf0f1;
          padding: 16px 20px;
          text-decoration: none;
          transition: all 0.3s ease;
          border-left: 4px solid transparent;
      }

      .sidebar a:hover:not(.active) {
          background-color: #34495e;
          border-left: 4px solid #3498db;
      }

      .sidebar a i {
          margin-right: 10px;
      }

      div.content {
          margin-left: 250px;
          padding: 20px;
          height: 1000px;
      }

      a.act {
          background: linear-gradient(135deg, #3498db, #2ecc71);
          color: white;
          border-left: 4px solid #e74c3c;
      }

      @media screen and (max-width: 700px) {
          .sidebar {
              width: 100%;
              height: auto;
              position: relative;
          }
          .sidebar a {float: left;}
          div.content {margin-left: 0;}
      }

      @media screen and (max-width: 400px) {
          .sidebar a {
              text-align: center;
              float: none;
          }
      }
  </style>
</head>
<body>

<div class="sidebar">
  <a href="dashboard.php" <?php if($active=='dashboard') echo "class='act'"; ?>><i class="fas fa-tachometer-alt"></i>Dashboard</a>
  <a href="add_donor.php" <?php if($active=='add') echo "class='act'"; ?>><i class="fas fa-user-plus"></i>Add Donor</a>
  <a href="donor_list.php" <?php if($active=='list') echo "class='act'"; ?>><i class="fas fa-list-alt"></i>Donor List</a>
  <a href="query.php" <?php if($active=='query') echo "class='act'"; ?>><i class="fas fa-question-circle"></i>Check Queries</a>
  <a href="pages.php" <?php if($active=='pages') echo "class='act'"; ?>><i class="fas fa-file-alt"></i>Manage Pages</a>
  <a href="update_contact.php" <?php if($active=='contact') echo "class='act'"; ?>><i class="fas fa-address-book"></i>Update Contact</a>
  <a href="logout.php" <?php if($active=='logout') echo "class='act'"; ?>><i class="fas fa-sign-out-alt"></i>Logout</a>
</div>
