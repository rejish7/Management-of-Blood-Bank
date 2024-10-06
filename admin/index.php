<?php
include($_SERVER['DOCUMENT_ROOT'] . '/blood bank/config/config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Login - Blood Bank & Management</title>
  <link rel="stylesheet" href="../public/css/bootstrap.min.css">
  <link rel="stylesheet" href="../public/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <style>
    body {
      background: url('admin_image/blood-cells.jpg') no-repeat center center fixed;
      background-size: cover;
    }

    .login-container {
      margin-top: 100px;
      background-color: rgba(255, 255, 255, 0.9);
      border-radius: 10px;
      padding: 30px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    .login-title {
      color: #000302;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
      margin-bottom: 30px;
    }

    .form-control {
      border-radius: 20px;
    }

    .btn-login {
      border-radius: 20px;
      padding: 10px 30px;
      font-weight: bold;
      background-color: #281E5D;
      border: none;
      color: #fff;
      transition: all 0.3s ease;
    }

    .btn-login:hover {
      background-color: #333;
      color: #D2F015;
    }
  </style>
</head>

<body>
  <div class="container login-container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <h1 class="text-center login-title">
          Blood Bank & Management<br>Admin Login Portal
        </h1>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
          <div class="form-group">
            <label for="username" class="font-weight-bold">Username <span class="text-danger">*</span></label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
              <input type="text" name="username" id="username" placeholder="Enter your username" class="form-control" required>
            </div>
          </div>
          <div class="form-group mt-4">
            <label for="password" class="font-weight-bold">Password <span class="text-danger">*</span></label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-lock"></i></span>
              </div>
              <input type="password" name="password" id="password" placeholder="Enter your Password" class="form-control" required>
            </div>
          </div>
          <div class="text-center mt-4">
            <input type="submit" name="login" class="btn btn-login" value="LOGIN">
          </div>
        </form>
      </div>
    </div>
  </div>

  <?php
  if (isset($_POST["login"])) {
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    $sql = "SELECT * FROM admin_info WHERE admin_username='$username' AND admin_password='$password'";
    $result = mysqli_query($conn, $sql) or die("query failed.");

    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION["username"] = $username;
        header("Location: dashboard.php");
      }
    } else {
      echo '<div class="alert alert-danger mt-4 text-center" role="alert">
              <strong><i class="fas fa-exclamation-triangle"></i> Error:</strong> Username and Password do not match!
            </div>';
    }
  }
  ?>
  <script src="../public/js/jquery-3.3.1.min.js"></script>
  <script src="../public/js/popper.min.js"></script>
  <script src="../public/js/bootstrap.min.js"></script>
</body>

</html>