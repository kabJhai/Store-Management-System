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
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Item name / CODE / SIV" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-outline-secondary" type="button">Search</button>
                    </div>
                  </div>
                    <h4 class="card-title">Material Movement Report</h4>
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
                        <th> Description </th>
                        <th> Stock Balance</th>
                        <th> Issued / Added</th>
                        <th> Movement Type </th>
                        <th> Recipient </th>
                        <th> Action Date </th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                          $i = 1;
                          $total_quantity = 0;
                          $grand_total = 0;
                          $query = $DBcon->query("SELECT * FROM bin_log");
                          while ($row = $query->fetch_assoc()) {
                      ?>

                        <tr>
                          <td class="py-1">
                              <?php echo $i;?>
                          </td>
                          <td> <?php echo $row['CODE'];?> </td>
                          <td>
                          <?php
                              $query1 = $DBcon->query("SELECT * FROM material WHERE code=".$row['CODE']);
                              $row1=$query1->fetch_array();                            
                              echo $row1['material_name'];
                              ?>
                          </td>
                          <td> <?php echo $row['balance'];?> </td>
                          <td class="<?php if(strcmp($row['action_type'],'grn')==0){echo "success";}else{echo "danger";}?>">
                           <?php if(strcmp($row['action_type'],'grn')==0){
                              $query1 = $DBcon->query("SELECT * FROM grn WHERE code='".$row['CODE']."' AND serial_number=".$row['serial_number']);
                              $row1=$query1->fetch_array();
                              echo '<i class="mdi mdi-arrow-up"></i>'.$row1['qty'];
                                      }else{
                                        $query1 = $DBcon->query("SELECT * FROM siv WHERE code='".$row['CODE']."' AND serial_number=".$row['serial_number']);
                                        $row1=$query1->fetch_array();
                                        echo '<i class="mdi mdi-arrow-down"></i>'.$row1['qty_requested'];
                                          }?> 
                          </td>
                          <td> <?php if(strcmp($row['action_type'],'grn')==0){echo "Purchased";}else{echo "Moved";}?> </td>
                          <td> <?php 
                          $query1 = $DBcon->query("SELECT * FROM employee WHERE USERID=".$row['USERID']);
                          $row1=$query1->fetch_array();                            
                          echo $row1['first_name'].' '.$row1['last_name'];
                          ?> </td>
                          <td> <?php echo $row['done_date'];?> </td>
                        </tr>
                        <?php
                            $i++;
                          } 
                      ?>
                      </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-12">
                          <div class="form-group row">
                            <div class="col-sm-3">
                            </div>
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