<?php
include "includes/data.php";
include "includes/head.php";
include "includes/navbar.php";
include "includes/sidebar.php";

if (isset($_GET['from'])) {
  $user_id = $_GET['from']; 
  $serial_number = $_GET['sn']; 
}
?>
  <div class="main-panel">
          <div class="content-wrapper">
          <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  <?php
                      $query = $DBcon->query("SELECT * FROM po WHERE serial_number=".$serial_number." AND is_approved = 0");
                      $row=$query->fetch_array();
                    ?>

                    <h4 class="card-title">PO Number: <?php echo $serial_number;?></h4>
                    </p>
                    <strong>Date <span id="date"><?php echo $row['date']?></span></strong><br/>

                    <div class="row">
                        <div class="col-md-12">
                                <div class="form-group row">
                                  <strong class="col-sm-8 col-form-label">Project Name: <?php echo $row['project_name'];?></strong>
                                  <div class="col-sm-8">
                                    <strong>Supplier: <span id="date"><?php echo $row['supplier']?></span></strong>
                                </div>
                             <strong class="col-sm-6 col-form-label">Proforma Invoice No: <?php echo $row['performa'];?></strong>
                             <div class="col-sm-8">
                                  <strong >Offer Date: <?php echo $row['offer_date'];?></strong>
                             </div>
                          </div>
                      </div>
                    </div>
                    <table class="table table-striped">
                      <thead>
                        <tr>
                        <th> Item No. </th>
                        <th> Part No. </th>
                        <th> Qty. Ordered </th>
                        <th> Material Description </th>
                        <th> Unit </th>
                        <th> Unit Price </th>
                        <th> Total Price </th>
                        <th> Remark </th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                          $i = 1;
                          $query = $DBcon->query("SELECT * FROM po WHERE serial_number=".$serial_number." AND is_approved = 0");
                          while ($row = $query->fetch_assoc()) {
                            $total_birr = $row['total_birr'];
                            $tax_birr = $row['tax_birr'];
                            $net_birr = $row['net_birr'];
                      ?>

                        <tr>
                          <td class="py-1">
                              <?php echo $i;?>
                          </td>
                          <td> <?php echo $row['part_no'];?> </td>
                          <td> <?php echo $row['qty_ordered'];?> </td>
                          <td>
                            <?php echo $row['description'];?>
                          </td>
                          <td> <?php echo $row['unit'];?> </td>
                          <td> <?php echo $row['unit_price'];?> </td>
                          <td> <?php echo $row['total_price'];?> </td>
                          <td> <?php echo $row['remark'];?> </td>
                        </tr>
                        <?php
                            $i++;
                          }

                      ?>
                      <tr>
                          <td class="py-1">
                              
                          </td>
                          <td>  </td>
                          <td>  </td>
                          <td>
                            
                          </td>
                          
                          <td>  </td>
                          <td> Total Birr</td>
                          <td> Tax </td>
                          <td> Net </td>
                        </tr>
                        <tr>
                          <td class="py-1">
                              
                          </td>
                          <td>  </td>
                          <td>  </td>
                          <td>
                            
                          </td>
                          
                          <td>  </td>
                          <td> <?php echo $total_birr;?> </td>
                          <td> <?php echo $tax_birr;?> </td>
                          <td> <?php echo $net_birr;?> </td>
                        </tr>

                      </tbody>
                    </table>
                  </div>
                  <form method="POST" action="includes/routes">
                    <div class="row">
                        <div class="col-md-12">
                          <div class="form-group row">
                            <div class="col-sm-1">
                            </div>
                            <input name="sn"  style="display:none" value="<?php echo $serial_number; ?>">
                            <input name="uid"  style="display:none" value="<?php echo $user_id; ?>">
                            <button type="submit" name="approve_po" class="btn btn-gradient-success btn-icon-text col-sm-4 floating">
                              Approve</button>
                            <div class="col-sm-2">
                            </div>
                            <button type="submit" name="decline_po" class="btn btn-gradient-danger btn-icon-text col-sm-4 floating">
                              Decline</button>
                            <div class="col-sm-1">
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