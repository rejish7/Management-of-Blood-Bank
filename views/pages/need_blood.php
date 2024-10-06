<?php
include($_SERVER['DOCUMENT_ROOT'] . '/blood bank/config/config.php');
include($_SERVER['DOCUMENT_ROOT'] . '/blood bank/views/header/head.php');
?>

<div id="page-container" style="margin-top:50px; position: relative;min-height: 84vh;">
  <div class="container">
    <div id="content-wrap" style="padding-bottom:50px;">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="mt-4 mb-3">Need Blood</h1>
          <form name="needblood" action="" method="post">
            <div class="row">
              <div class="col-lg-6 mb-4">
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
              <div class="col-lg-6 mb-4">
                <div class="font-italic">Reason, why do you need blood?<span style="color:red">*</span></div>
                <div><textarea class="form-control" name="address" required></textarea></div>
              </div>
              <div class="col-lg-12 mb-4">
                <div><input type="submit" name="search" class="btn btn-primary" value="Search" style="cursor:pointer"></div>
              </div>
            </div>
          </form>
          <?php if (isset($_POST['search'])) {
            $bg = $_POST['blood'];
            $sql = "SELECT * FROM donor_details JOIN blood WHERE donor_details.donor_blood=blood.blood_id AND donor_blood='{$bg}' ORDER BY RAND() LIMIT 5";
            $result = mysqli_query($conn, $sql) or die("query unsuccessful.");
            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
          ?>
                <div class="card mb-4">
                  <div class="card-body">
                    <h3 class="card-title"><?php echo $row['donor_name']; ?></h3>
                    <p class="card-text">
                      <b>Blood Group : </b> <b><?php echo $row['blood_group']; ?></b><br>
                      <b>Mobile No. : </b> <?php echo $row['donor_number']; ?><br>
                      <b>Gender : </b><?php echo $row['donor_gender']; ?><br>
                      <b>Age : </b> <?php echo $row['donor_age']; ?><br>
                      <b>Address : </b> <?php echo $row['donor_address']; ?><br>
                    </p>
                  </div>
                </div>
          <?php
              }
            } else {
              echo '<div class="alert alert-danger">No Donor Found For your search Blood group </div>';
            }
          } ?>
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