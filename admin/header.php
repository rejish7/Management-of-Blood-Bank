  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blood Bank & Donation Admin Panel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
    .navbar {
      background-color: #333333;
      padding: 10px;
      color: #FF0404;
    }
    .navbar a {
      color: white;
      text-align: center;
      padding: 12px;
      text-decoration: none;
      font-size: 18px;
      line-height: 25px;
    }
    .navbar-brand {
      font-size: 25px;
      font-weight: bold;
    }
    .navbar a {
      display: block;
      text-align: left;
    }
    .navbar-right {
      float: none;
    }
    #qq:hover {
      background-color: #E5E8E8;
      border-radius: 5px;
    }
    </style>
  </head>
  <body>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" id="qq" href="dashboard.php" style="color: #F51A14;">Blood Bank & Donation Admin Panel</a>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a id="qw" href="#" style="font-weight: bold; color: white;">
            <span class="glyphicon glyphicon-user"></span>  
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
