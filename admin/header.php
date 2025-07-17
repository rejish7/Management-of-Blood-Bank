  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blood Bank Admin Panel</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
    body {
      font-family: 'Inter', sans-serif;
    }
    
    .navbar {
      background: linear-gradient(135deg, #e74c3c, #c0392b);
      padding: 15px 0;
      border: none;
      border-radius: 0;
      box-shadow: 0 2px 10px rgba(0,0,0,0.15);
      margin-bottom: 0;
      width: 100%;
    }
    
    .container-fluid {
      padding-left: 30px;
      padding-right: 30px;
    }
    
    .navbar-brand {
      font-size: 22px;
      font-weight: 600;
      color: #ffffff !important;
      transition: all 0.3s ease;
      padding: 15px 0;
    }
    
    .navbar-brand:hover {
      color: rgba(255,255,255,0.9) !important;
      transform: translateY(-1px);
    }
    
    .navbar-nav > li > a {
      color: #ffffff !important;
      font-weight: 500;
      padding: 12px 20px;
      border-radius: 20px;
      transition: all 0.3s ease;
      background: rgba(255,255,255,0.1);
      margin: 3px 0 3px 10px;
    }
    
    .navbar-nav > li > a:hover {
      background: rgba(255,255,255,0.2);
      transform: translateY(-2px);
      box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    }
    
    .glyphicon-user {
      margin-right: 8px;
      font-size: 16px;
    }
    </style>
  </head>
  <body>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="dashboard.php">
          <i class="fas fa-heartbeat" style="margin-right: 10px;"></i>
          Blood Bank Admin Panel
        </a>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="#" style="font-weight: 500;">
            <i class="fas fa-user-circle" style="margin-right: 8px; font-size: 16px;"></i>  
            <?php
            $username = $_SESSION['username'];
            $sql = "SELECT * FROM admin_info WHERE admin_username = ?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_assoc($result);
            echo "Hello " . htmlspecialchars($row['admin_name']);
            ?>
          </a>
        </li>
      </ul>
    </div>
  </nav>
  </body>
  </html>
