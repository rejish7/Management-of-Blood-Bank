<?php
include($_SERVER['DOCUMENT_ROOT'] . '/blood bank/config/config.php');?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="/blood bank/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="/blood bank/public/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <style>
    body {
      background-color: #f8f9fa;
      color: #333;
    }
    .page-title {
      color: #007bff;
      font-weight: bold;
      margin-bottom: 30px;
    }
    .stat-panel {
      transition: transform 0.3s ease-in-out;
    }
    .stat-panel:hover {
      transform: scale(1.05);
    }
    .stat-panel-number {
      font-size: 3rem;
      font-weight: bold;
      margin-bottom: 10px;
    }
    .stat-panel-title {
      font-size: 1.2rem;
      margin-bottom: 20px;
    }
    .btn-detail {
      border-radius: 25px;
      padding: 10px 20px;
      font-weight: bold;
      transition: all 0.3s ease;
    }
    .btn-detail:hover {
      transform: translateY(-3px);
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    #sidebar {
      width: 250px;
      position: fixed;
      top: 0;
      left: 0;
      height: 100vh;
      z-index: 999;
      background: #7386D5;
      color: #fff;
      transition: all 0.3s;
    }
    #content {
      width: calc(100% - 250px);
      padding: 40px;
      min-height: 100vh;
      transition: all 0.3s;
      position: absolute;
      top: 0;
      right: 0;
    }
  </style>
</head>

<body>
  <?php
  include 'session.php';
  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  ?>
    <div id="header">
      <?php include 'header.php'; ?>
    </div>
    <div class="wrapper">
      <nav id="sidebar">
        <?php
        $active = "dashboard";
        include 'sidebar.php';
        ?>
      </nav>
      <div id="content">
        <div class="content-wrapper">
          <div class="container-fluid">
            <div class="row mt-4">
              <div class="col-md-12 lg-12 sm-12">
                <h1 class="page-title text-center">Admin Dashboard</h1>
              </div>
            </div>
            <hr>
            <div class="row justify-content-center">
              <div class="col-md-3 mb-3">
                <div class="card shadow-sm h-100">
                  <div class="card-body text-center" style="background-color:#D6EAF8; border-radius:15px">
                    <i class="fas fa-user-friends fa-3x mb-3" style="color:#3498db;"></i>
                    <?php
                    $sql = "SELECT * FROM donor_details";
                    $result = mysqli_query($conn, $sql) or die("Query failed: " . mysqli_error($conn));
                    $row = mysqli_num_rows($result);
                    ?>
                    <div class="stat-panel-number"><?php echo $row; ?></div>
                    <div class="stat-panel-title text-uppercase">Blood Donors Available</div>
                    <button class="btn btn-primary btn-detail mt-3" onclick="window.location.href = 'donor_list.php';">
                      Full Detail <i class="fas fa-arrow-right ml-2"></i>
                    </button>
                  </div>
                </div>
              </div>

              <div class="col-md-3 mb-3">
                <div class="card shadow-sm h-100">
                  <div class="card-body text-center" style="background-color:#ABEBC6; border-radius:15px">
                    <i class="fas fa-question-circle fa-3x mb-3" style="color:#2ecc71;"></i>
                    <?php
                    $sql1 = "SELECT * FROM contact_query";
                    $result1 = mysqli_query($conn, $sql1) or die("Query failed: " . mysqli_error($conn));
                    $row1 = mysqli_num_rows($result1);
                    ?>
                    <div class="stat-panel-number"><?php echo $row1; ?></div>
                    <div class="stat-panel-title text-uppercase">All User Queries</div>
                    <button class="btn btn-success btn-detail mt-3" onclick="window.location.href = 'query.php';">
                      Full Detail <i class="fas fa-arrow-right ml-2"></i>
                    </button>
                  </div>
                </div>
              </div>

              <div class="col-md-3 mb-3">
                <div class="card shadow-sm h-100">
                  <div class="card-body text-center" style="background-color:#E8DAEF; border-radius:15px">
                    <i class="fas fa-clock fa-3x mb-3" style="color:#9b59b6;"></i>
                    <?php
                    $sql2 = "SELECT * FROM contact_query WHERE query_status=2";
                    $result2 = mysqli_query($conn, $sql2) or die("Query failed: " . mysqli_error($conn));
                    $row2 = mysqli_num_rows($result2);
                    ?>
                    <div class="stat-panel-number"><?php echo $row2; ?></div>
                    <div class="stat-panel-title text-uppercase">Pending Queries</div>
                    <button class="btn btn-info btn-detail mt-3" onclick="window.location.href = 'pending_query.php';">
                      Full Detail <i class="fas fa-arrow-right ml-2"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php
  } else {
    echo '<div class="alert alert-danger"><b>Please Login First To Access Admin Portal.</b></div>';
  ?>
    <form method="post" name="" action="login.php" class="form-horizontal">
      <div class="form-group">
        <div class="col-sm-8 col-sm-offset-4" style="float:left">
          <button class="btn btn-primary" name="submit" type="submit">Go to Login Page</button>
        </div>
      </div>
    </form>
  <?php
  }
  ?>
  <script src="../public/js/jquery-3.3.1.min.js"></script>
  <script src="../public/js/popper.min.js"></script>
  <script src="../public/js/bootstrap.min.js"></script>
</body>
</html>