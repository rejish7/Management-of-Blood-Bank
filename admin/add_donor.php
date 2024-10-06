<?php
include($_SERVER['DOCUMENT_ROOT'] . '/blood bank/config/config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add Donor</title>
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
        $active = "add";
        include 'sidebar.php';
        ?>
      </nav>
      <div id="content">
        <div class="content-wrapper">
          <div class="container-fluid">
            <div class="row mt-4">
              <div class="col-md-12 lg-12 sm-12">
                <h1 class="page-title">Add Donor</h1>
              </div>
            </div>
            <hr>
            <form name="donor" action="save_donor_data.php" method="post">
              <div class="row">
                <div class="col-lg-4 mb-4">
                  <div class="font-italic">Full Name<span style="color:red">*</span></div>
                  <div><input type="text" name="fullname" class="form-control" required></div>
                </div>
                <div class="col-lg-4 mb-4">
                  <div class="font-italic">Mobile Number<span style="color:red">*</span></div>
                  <div><input type="text" name="mobileno" class="form-control" required></div>
                </div>
                <div class="col-lg-4 mb-4">
                  <div class="font-italic">Email Id</div>
                  <div><input type="email" name="emailid" class="form-control"></div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-4 mb-4">
                  <div class="font-italic">Age<span style="color:red">*</span></div>
                  <div><input type="text" name="age" class="form-control" required></div>
                </div>
                <div class="col-lg-4 mb-4">
                  <div class="font-italic">Gender<span style="color:red">*</span></div>
                  <div>
                    <select name="gender" class="form-control" required>
                      <option value="">Select</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                  </div>
                </div>
                <div class="col-lg-4 mb-4">
                  <div class="font-italic">Blood Group<span style="color:red">*</span></div>
                  <div>
                    <select name="blood" class="form-control" required>
                      <option value="" selected disabled>Select</option>
                      <?php
                      $sql = "SELECT * FROM blood";
                      $result = mysqli_query($conn, $sql) or die("Query failed: " . mysqli_error($conn));
                      while ($row = mysqli_fetch_assoc($result)) {
                      ?>
                        <option value="<?php echo $row['blood_id'] ?>"><?php echo $row['blood_group'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-4 mb-4">
                  <div class="font-italic">Address<span style="color:red">*</span></div>
                  <div><textarea class="form-control" name="address" required></textarea></div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-4 mb-4">
                  <div><input type="submit" name="submit" class="btn btn-primary" value="Submit" style="cursor:pointer" onclick="popup()"></div>
                </div>
              </div>
            </form>
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
  <script>
    function popup() {
      alert("Data added Successfully.");
    }
  </script>
</body>
</html>
