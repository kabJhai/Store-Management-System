<?php
include "includes/data.php";
include "includes/head.php";
include "includes/navbar.php";
include "includes/sidebar.php";

if (isset($_GET['sn'])) {
  $serial_number = $_GET['sn']; 
}
?>
  <div class="main-panel">
          <div class="content-wrapper">
          <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  <?php
                      $query = $DBcon->query("SELECT * FROM srv WHERE serial_number=".$serial_number." AND is_approved = 1");
                      $row=$query->fetch_array();
                    ?>

                    <h4 class="card-title">SRV Number: <?php echo $serial_number;?></h4>
                    </p>
                    <strong>Date <span id="date"><?php echo $row['date']?></span></strong><br/>
                    <div class="row">
                              <div class="col-md-12">
                                <div class="form-group row">
                                  <strong class="col-sm-6 col-form-label">Requesting Department: <?php echo $row['DID'];?></strong>
                                  <div class="col-sm-8">
                                    <strong>Requested By <span id="date"><?php echo $row['requested_by']?></span></strong><br/>
                                </div>
                                  <strong class="col-sm-6 col-form-label">Approved By: <?php echo $row['approved_by'];?></strong>
                              </div>
                    </div>
                    <table class="table table-striped">
                      <thead>
                        <tr>
                        <th> S/N </th>
                        <th> Code </th>
                        <th> Material Description </th>
                        <th> Unit </th>
                        <th> Qty.Req </th>
                        <th> Unit Price </th>
                        <th> Total Price </th>
                        <th> Is in Stock </th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                          $i = 1;
                          $query = $DBcon->query("SELECT * FROM srv WHERE serial_number=".$serial_number." AND is_approved = 1");
                          while ($row = $query->fetch_assoc()) {
                      ?>

                        <tr>
                          <td class="py-1">
                              <?php echo $i;?>
                          </td>
                          <td> <?php echo $row['code'];?> </td>
                          <td>
                            <?php echo $row['description'];?>
                          </td>
                          <td> <?php echo $row['unit'];?> </td>
                          <td> <?php echo $row['qty_requested'];?> </td>
                          <td> <?php echo $row['unit_price'];?> </td>
                          <td> <?php echo $row['total_price'];?> </td>
                          <?php
                          $query2 = $DBcon->query("SELECT * FROM material WHERE code=".$row['code']."");
                          $row2=$query2->fetch_array();
                          $count = mysqli_num_rows($query2);
                          ?>
                          <td> <?php 
                          if ($count > 0) {
                            if($row2['available_quantity']>$row['qty_requested']){
                              echo "Available";
                            }else if($row2['available_quantity']>0){
                              echo "Only ".$row2['available_quantity']." available";
                            }else {
                              echo "Not Available in Stock";
                            }
                          }else{
                            echo "Not Available in Stock";
                          }
                          ?> </td>
                        </tr>
                        <?php
                            $i++;
                          } 
                      ?>
                      </tbody>
                    </table>
                  </div>
                  <form method="POST" action="includes/routes">
                    <div class="row">
                        <div class="col-md-12">
                          <div class="form-group row">
                            <input name="sn"  style="display:none" value="<?php echo $serial_number; ?>">
                            <input name="uid"  style="display:none" value="<?php echo $_SESSION['USERID']; ?>">
                            <button name="request_siv" class="btn btn-gradient-primary btn-icon-text col-sm-3 floating">
                              Request SIV</button>
                              <div class="col-sm-2">
                            </div>
                            <button name="request_pr" class="btn btn-gradient-warning btn-icon-text col-sm-3 floating">
                              Request PR</button>
                              <div class="col-sm-2">
                            </div>
                              <button name="done_srv" class="btn btn-gradient-success btn-icon-text col-sm-2 floating">
                              Done</button>
                            </div>
                            </div>
                        </div>
                      </div>
                    </form>

                </div>
              </div>

          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <?php
          include "includes/footer.php"
          ?>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
  </body>
</html>