<?php
include "includes/data.php";
include "includes/head.php";
include "includes/navbar.php";
include "includes/sidebar.php";
?>
  <div class="main-panel">
          <div class="content-wrapper">
          <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                <?php
                      $query = $DBcon->query("SELECT DISTINCT serial_number FROM po");
                       while ($row = $query->fetch_assoc()) {
                        $query1 = $DBcon->query("SELECT * FROM po where serial_number='".$row['serial_number']."'");
                        $row1 = $query1->fetch_array();
 
                    ?>

                  <div class="card-body">

                    <h4 class="card-title ">PO Number: <?php echo $row1['serial_number'];?></h4>
                    <strong>Date <span id="date"><?php echo $row1['date']?></span></strong><br/><br/>
                    <strong>PO Status:  <span id="date"><?php if($row1['is_approved']==1){echo "PO is approved";}else{echo "Pending Approval"; }?></span></strong><br/>
                    <div class="row">
                        <div class="col-md-12">
                                <div class="form-group row">
                                  <strong class="col-sm-8 col-form-label">Project Name: <?php echo $row1['project_name'];?></strong>
                                  <div class="col-sm-8">
                                    <strong>Supplier: <span id="date"><?php echo $row1['supplier']?></span></strong>
                                </div>
                             <strong class="col-sm-6 col-form-label">Proforma Invoice No: <?php echo $row1['performa'];?></strong>
                             <div class="col-sm-8">
                                  <strong >Offer Date: <?php echo $row1['offer_date'];?></strong>
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
                          $query2 = $DBcon->query("SELECT * FROM po WHERE serial_number='".$row['serial_number']."'");
                          while ($row2 = $query2->fetch_assoc()) {
                            $total_birr = $row1['total_birr'];
                            $tax_birr = $row1['tax_birr'];
                            $net_birr = $row1['net_birr'];
                            $uid = $row1['ordered_by'];
                      ?>

                        <tr>
                          <td class="py-1">
                              <?php echo $i;?>
                          </td>
                          <td> <?php echo $row2['part_no'];?> </td>
                          <td> <?php echo $row2['qty_ordered'];?> </td>
                          <td>
                            <?php echo $row2['description'];?>
                          </td>
                          <td> <?php echo $row2['unit'];?> </td>
                          <td> <?php echo $row2['unit_price'];?> </td>
                          <td> <?php echo $row2['total_price'];?> </td>
                          <td> <?php echo $row2['remark'];?> </td>
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
                <!-- <form method="POST" action="includes/routes">
                    <div class="row">
                        <div class="col-md-12">
                          <div class="form-group row">
                            <div class="col-sm-1">
                            </div>
                            <input name="sn"  style="display:none" value="<?php echo $row['serial_number']; ?>">
                            <input name="uid"  style="display:none" value="<?php echo $uid; ?>">
                            <div class="col-sm-2">
                            </div>
                            <button type="submit" name="po_completed" class="btn btn-gradient-success btn-icon-text col-sm-4 floating">
                              Completed</button>

                            <div class="col-sm-1">
                            </div>
                            </div>
                        </div>
                      </div>
                    </form> -->

                  <?php 
                       }
                  ?>
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