<?php
include($_SERVER['DOCUMENT_ROOT'] . '/blood bank/config/config.php');
include($_SERVER['DOCUMENT_ROOT'] . '/blood bank/views/header/head.php');
?>

<div id="page-container" style="margin-top:50px; position: relative;min-height: 84vh;">
  <div class="container">
    <div id="content-wrap" style="padding-bottom:50px;">
      <div class="row">
        <div class="col-lg-6">
          <h1 class="mt-4 mb-3">Why Should I Donate Blood?</h1>
          <p>
            <?php
            $sql = "SELECT * FROM pages WHERE page_type='donor'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                echo $row['page_data'];
              }
            }
            ?>
          </p>
        </div>
        <div class="col-lg-6">
          <img class="img-fluid rounded" src="../../public/image/08f2fccc45d2564f74ead4a6d5086871.png" style="height:600px; width:500px" alt="Blood Donation Image">
        </div>
      </div>
    </div>
  </div>
  <?php
    include($_SERVER['DOCUMENT_ROOT'] .'/blood bank/views/footer/footer.php')
  ?>
</div>

<script src="../../public/js/jquery-3.3.1.min.js"></script>
<script src="../../public/js/popper.min.js"></script>
<script src="../../public/js/bootstrap.min.js"></script>
</body>
</html>
