<?php
include($_SERVER['DOCUMENT_ROOT'] . '/blood bank/config/config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Manage Pages</title>
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
        $active = "pages";
        include 'sidebar.php';
        ?>
      </nav>
      <div id="content">
        <div class="content-wrapper">
          <div class="container-fluid">
            <div class="row mt-4">
              <div class="col-md-12 lg-12 sm-12">
                <h1 class="page-title text-center">Manage Pages</h1>
              </div>
            </div>
            <hr>
            <div class="row justify-content-center">
              <?php
              $sql = "SELECT DISTINCT page_type FROM pages";
              $result = mysqli_query($conn, $sql);
              while($row = mysqli_fetch_assoc($result)) {
                $page_type = $row['page_type'];
              ?>
              <div class="col-md-3 mb-3">
                <div class="card shadow-sm h-100">
                  <div class="card-body text-center" style="background-color:#D6EAF8; border-radius:15px">
                    <i class="fas fa-file-alt fa-3x mb-3" style="color:#3498db;"></i>
                    <div class="stat-panel-title text-uppercase"><?php echo $page_type; ?> Pages</div>
                    <button class="btn btn-primary btn-detail mt-3" onclick="window.location.href = '?type=<?php echo urlencode($page_type); ?>';">
                      Full Detail <i class="fas fa-arrow-right ml-2"></i>
                    </button>
                  </div>
                </div>
              </div>
              <?php } ?>
            </div>
            <?php
            if(isset($_GET['type'])) {
              $type = mysqli_real_escape_string($conn, $_GET['type']);
              $sql = "SELECT * FROM pages WHERE page_type = '$type'";
              $result = mysqli_query($conn, $sql);
              if(mysqli_num_rows($result) > 0) {
            ?>
            <div class="row mt-4">
              <div class="col-md-12">
                <h2 class="text-center mb-4"><?php echo $type; ?> Pages</h2>
                <ul class="list-group">
                  <?php while($row = mysqli_fetch_assoc($result)) { ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      <?php echo htmlspecialchars($row['page_name']); ?>
                      <a class="btn btn-primary btn-sm" href='update_page_details.php?type=<?php echo urlencode($row['page_type']);?>'><i class="fas fa-edit"></i> Edit</a>
                    </li>
                  <?php } ?>
                </ul>
              </div>
            </div>
            <?php
              } else {
                echo '<div class="alert alert-info mt-4"><i class="fas fa-info-circle"></i> No pages found for this type.</div>';
              }
            }
            ?>
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
  <script src="/blood bank/public/js/jquery-3.3.1.min.js"></script>
  <script src="/blood bank/public/js/popper.min.js"></script>
  <script src="/blood bank/public/js/bootstrap.min.js"></script>
</body>
</html>
