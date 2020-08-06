<?php
include "includes/head.php";
include "includes/navbar.php";
include "includes/sidebar.php";
?>
  <div class="main-panel">
  <div class="content-wrapper" id="paper">
          <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  <?php
                      $query = $DBcon->query("SELECT * FROM material");
                      $row=$query->fetch_array();
                    ?>

                    <h4 class="card-title">Inventory Report</h4>
                    </p>
                    <strong>Date <span id="date"></span></strong><br/>
                        <script>
                        var d = new Date();
                        document.getElementById('date').innerHTML = d.getDate()+" - "+(d.getUTCMonth()+1)+" - "+d.getFullYear();
                      </script>

                    <table class="table table-striped">
                      <thead>
                        <tr>
                        <th> S/N </th>
                        <th> Item-Code </th>
                        <th> Material Description </th>
                        <th> Available Quantity </th>
                        <th> Unit Price </th>
                        <th> Total Price </th>
                        <th> Bought On </th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                          $i = 1;
                          $total_quantity = 0;
                          $grand_total = 0;
                          $query = $DBcon->query("SELECT * FROM material");
                          while ($row = $query->fetch_assoc()) {
                      ?>

                        <tr>
                          <td class="py-1">
                              <?php echo $i;?>
                          </td>
                          <td> <?php echo $row['code'];?> </td>
                          <td>
                            <?php echo $row['material_name'];?>
                          </td>
                          <td> <?php echo $row['available_quantity'];$total_quantity=$row['available_quantity']+$total_quantity;?> </td>
                          <td> <?php echo $row['unit_price'];?> </td>
                          <td> <?php echo $row['available_quantity']*$row['unit_price'];$grand_total=($row['available_quantity']*$row['unit_price'])+$grand_total;?> </td>
                          <td> <?php echo $row['bought_on'];?> </td>
                        </tr>
                        <?php
                            $i++;
                          } 
                      ?>
                          <td class="py-1">
                          </td>
                          <td> </td>
                          <td class="grand_total">
                            Total
                          </td>
                          <td class="grand_total"> <?php echo $total_quantity;?> </td>
                          <td class="grand_total"> </td>
                          <td class="grand_total"> <?php echo $grand_total." ETB";?> </td>
                          <td>  </td>
                      </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-12">
                          <div class="form-group row">
                            <div class="col-sm-3">
                            </div>
                            <button type="button" onclick="printReport('inventory')" id="print_button" name="approve" class="btn btn-gradient-primary btn-icon-text col-sm-6 floating">
                              Print</button>
                            <div class="col-sm-3">
                            </div>
                            </div>
                        </div>
                      </div>

                  </div>
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