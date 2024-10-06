<?php
include($_SERVER['DOCUMENT_ROOT'] . '/blood bank/config/config.php');
include($_SERVER['DOCUMENT_ROOT'] . '/blood bank/views/header/head.php');
?>

<div id="page-container" style="margin-top:50px; position: relative;min-height: 84vh;">
    <div class="container">
      <div id="content-wrap" style="padding-bottom:50px;">
        <div class="row">
          <div class="col-lg-12">
            <h1 class="mt-4 mb-3">Donate Blood</h1>
            <form name="donor" action="savedata.php" method="post">
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
                      $result = mysqli_query($conn, $sql) or die("query unsuccessful.");
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
                  <div><input type="submit" name="submit" class="btn btn-primary" value="Submit" style="cursor:pointer"></div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
<?php
include($_SERVER['DOCUMENT_ROOT'] .'/blood bank/views/footer/footer.php')
?>

<script src="../../public/js/jquery-3.3.1.min.js"></script>
<script src="../../public/js/popper.min.js"></script>
<script src="../../public/js/bootstrap.min.js"></script>
</body>
</html>
