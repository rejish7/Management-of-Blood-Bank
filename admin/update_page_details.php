<?php
include($_SERVER['DOCUMENT_ROOT'] . '/blood bank/config/config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Update Page Details</title>
  <link rel="stylesheet" href="../public/css/bootstrap.min.css">
  <link rel="stylesheet" href="../public/css/style.css">
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

<body style="color:black">

  <?php
  include 'session.php';
  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  ?>

    <div id="header">
      <?php include 'header.php';
      ?>
    </div>
    <div id="sidebar">
      <?php $active = "";
      include 'sidebar.php'; ?>

    </div>
    <div id="content">
      <div class="content-wrapper">
        <div class="container-fluid">
          <div class="row mt-4">
            <div class="col-md-12 lg-12 sm-12">
              <h1 class="page-title">Update Page Details</h1>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-10">
              <div class="panel panel-default">
                <div class="panel-heading">Page Details</div>
                <div class="panel-body">

                  <form name="update_page" method="post">
                    <div class="hr-dashed"></div>

                    <div class="form-group">
                      <label class="col-sm-4 control-label">Selected Page : </label>
                      <?php
                      $page_type = isset($_GET['type']) ? $_GET['type'] : '';
                      $page_name = '';
                      switch ($page_type) {
                        case "aboutus":
                          $page_name = "About US";
                          break;
                        case "donor":
                          $page_name = "Why Donate Blood";
                          break;
                        case "needforblood":
                          $page_name = "The Need For Blood";
                          break;
                        case "bloodtips":
                          $page_name = "Blood Tips";
                          break;
                        case "whoyouhelp":
                          $page_name = "Why you could Help";
                          break;
                        case "bloodgroups":
                          $page_name = "Blood Groups";
                          break;
                        case "universal":
                          $page_name = "Universal Donors And Recipients";
                          break;
                      }
                      echo $page_name;
                      ?>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Page Details: </label>
                      <div class="col-sm-8">
                        <?php
                        $sql = "SELECT page_data FROM pages WHERE page_type = '" . mysqli_real_escape_string($conn, $page_type) . "'";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        $page_data = $row['page_data'];
                        ?>
                        <textarea class="form-control" rows="10" name="data"><?php echo htmlspecialchars($page_data); ?></textarea>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-sm-8 col-sm-offset-4"><br>
                        <button class="btn btn-primary" name="submit" type="submit">Update</button>
                      </div>
                    </div>

                  </form>

                </div>
              </div>
            </div>

          </div>

          <?php if (isset($_POST['submit'])) {
            $type = $_GET['type'];
            $data = $_POST['data'];
            $sql = "UPDATE pages SET page_data = '" . mysqli_real_escape_string($conn, $data) . "' WHERE page_type = '" . mysqli_real_escape_string($conn, $type) . "'";
            $result = mysqli_query($conn, $sql) or die("query unsuccessful.");
            echo '<div class="alert alert-success"><b>Page Data Updated Successfully.</b></div>';
          }
          ?>

        </div>
      </div>
    </div>
  <?php
  } else {
    echo '<div class="alert alert-danger"><b> Please Login First To Access Admin Portal.</b></div>';
  ?>
    <form method="post" name="" action="login.php" class="form-horizontal">
      <div class="form-group">
        <div class="col-sm-8 col-sm-offset-4" style="float:left">

          <button class="btn btn-primary" name="submit" type="submit">Go to Login Page</button>
        </div>
      </div>
    </form>
  <?php }
  ?>

</body>

</html>