<?php
include "includes/data.php";
include "includes/head.php";

include "includes/navbar.php";
include "includes/sidebar.php";
?>
  <div class="main-panel">
          <div class="content-wrapper">
            
          <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <form class="form-sample" method="POST" action="includes/routes">
                    <h4 class="card-title">Store Requisition Voucher (SRV)
                    <?php 
                     $query = $DBcon->query("SELECT * FROM sno WHERE document_type = 'srv'");
                     $row=$query->fetch_array();
                    ?>
                      <span class="record_number">Number: <?php echo $row['current_number'];?><input style="display:none" name="serial_number" type="text" value="<?php echo $row['current_number'];?>"></span>
                    </h4>

                      <p class="card-description">
                        <strong>Date <span id="date"></span></strong><br/>
                        <strong>Requesting Department: <?php echo $_SESSION['department_name'];?><input style="display:none" name="DID" type="text" value="<?php echo $_SESSION['did'];?>"></strong><br/>
                        
                        <strong>Items: <span id="item_count">0</span></strong>
                      <script>
                        var d = new Date();
                        document.getElementById('date').innerHTML = d.getDate()+" - "+(d.getUTCMonth()+1)+" - "+d.getFullYear();
                      </script>
                        </p>
                      <div id="form-items-count">
                        <div class="row">
                              <div class="col-md-12">
                                <div class="form-group row">
                                  <label class="col-sm-4 col-form-label">Number of Items to Order</label>
                                  <div class="col-sm-8">
                                    <input type="number" min="0" value=0 id="items-needed" oninput="add()" class="form-control" />
                                  </div>
                                </div>
                              </div>
                        </div>
                      </div>
                      <div id='form-array-container'>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Requested By</label>
                            <div class="col-sm-7">
                            <input type="text" name="requested_by"  value="<?php echo $_SESSION['fn']." ".$_SESSION['ln'];?>" class="form-control"/>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Approved By</label>
                            <div class="col-sm-9">
                            <input type="text" name="approved_by" value="Not approved yet" id="items-needed" class="form-control"/>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group row">
                            <div class="col-sm-2">
                            </div>
                            <button type="submit" name="srv" class="btn btn-gradient-primary btn-icon-text col-sm-8">
                                <i class="mdi mdi-file-check btn-icon-prepend"></i> Submit SRV</button>
                            <div class="col-sm-2">
                            </div>
                            </div>
                        </div>
                      </div>

                    </form>
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