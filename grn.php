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
                    <h4 class="card-title">Goods Receiving Note (GRN)
                    <?php 
                     $query = $DBcon->query("SELECT * FROM sno WHERE document_type = 'grn'");
                     $row=$query->fetch_array();
                    ?>
                      <span class="record_number">Number: <?php echo $row['current_number'];?><input style="display:none" name="serial_number" type="text" value="<?php echo $row['current_number'];?>"></span>
                    </h4>

                      <p class="card-description">
                        <strong>Date <span id="date"></span></strong><br/>
                        <div class="row">
                              <div class="col-md-12">
                                <div class="form-group row">
                                  <strong class="col-sm-4 col-form-label">Supplier:</strong>
                                  <div class="col-sm-8">
                                  <input class="form-control issuing" name="supplier" type="text">                                  </div>
                                </div>
                              </div>
                        </div>
                        <div class="row">
                              <div class="col-md-12">
                                <div class="form-group row">
                                  <strong class="col-sm-4 col-form-label">Supplier Invoice No:</strong>
                                  <div class="col-sm-8">
                                  <input name="supplier_invoice" type="number" class="form-control issuing">                                  </div>
                                </div>
                              </div>
                        </div>
                        <div class="row">
                              <div class="col-md-12">
                                <div class="form-group row">
                                  <strong class="col-sm-4 col-form-label">Purchase Order No:</strong>
                                  <div class="col-sm-8">
                                  <input name="pr_po_no" type="number" class="form-control">                                  </div>
                                </div>
                              </div>
                        </div>
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
                                  <label class="col-sm-4 col-form-label">Number of Items Received</label>
                                  <div class="col-sm-8">
                                    <input type="number" min="0" value=0 id="items-needed" oninput="addgrn()" class="form-control" />
                                  </div>
                                </div>
                              </div>
                        </div>
                      </div>
                      <div id='form-array-container'>
                      </div>
                      <div class="row">
                              <div class="col-md-12">
                              <div class="form-group row">
                              <label class='col-sm-3 col-form-label'>Type of Receipt: </label>
                              <div class='col-sm-3'>
                                    <div class="form-check form-check-primary">
                                      <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="receipt_type" value="Purchase"> Purchase </label>
                                    </div>
                                  </div>  
                                  <div class='col-sm-3'>
                                    <div class="form-check form-check-success">
                                      <label class="form-check-label">
                                        <input type="radio" class="form-check-input"  name="receipt_type" value="Transfer"> Transfer </label>
                                        
                                    </div>
                                  </div>                                  
                                  <div class='col-sm-3'>
                                    <div class="form-check form-check-info">
                                      <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="receipt_type" value="Return"> Return </label>
                                    </div>
                                  </div>                                  
                                </div>
                              </div>
                      
                      </div>

                      <div class='row'> 
                        <div class='col-md-4'> 
                          <div class='form-group row'> 
                            <label class='col-sm-4 col-form-label'>Total Qty.</label> 
                            <div class='col-sm-8'> 
                                <input type='text' id='total_quantity' name='total_qty' oninput='calculate("+count+")' class='form-control' required > 
                                </div> 
                            </div> 
                          </div> 
                        <div class='col-md-4'> 
                          <div class='form-group row'> 
                            <label class='col-sm-4 col-form-label'>Total Unit Price</label> 
                            <div class='col-sm-8'> 
                            <div class='input-group'> 
                                <input type='text' id='total_unit_price' name='total_unit' class='form-control' value="0" required/> 
                                  <div class='input-group-prepend'> 
                                    <span class='input-group-text bg-gradient-primary text-white'>Birr</span> 
                                  </div> 
                              </div> 
                            </div> 
                          </div> 
                        </div> 
                        <div class='col-md-4'> 
                          <div class='form-group row'> 
                            <label class='col-sm-4 col-form-label'>Grand Total</label> 
                            <div class='col-sm-8'> 
                            <div class='input-group'> 
                                <input type='text' id='grand_total' name='grand_total' class='form-control' required/> 
                                  <div class='input-group-prepend'> 
                                    <span class='input-group-text bg-gradient-primary text-white'>Birr</span> 
                                  </div> 
                              </div> 
                            </div> 
                          </div> 
                        </div> 
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Store Keepers Name</label>
                            <div class="col-sm-7">
                            <input type="text" name="store_keeper"  value="Abebe Kebede Chanyalew" class="form-control"/>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Delivered By Name</label>
                            <div class="col-sm-9">
                            <input type="text" name="delivered_by" id="items-needed" class="form-control"/>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Sending Store</label>
                            <div class="col-sm-7">
                            <input type="text" name="sending_store" class="form-control"/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group row">
                            <div class="col-sm-2">
                            </div>
                            <button type="submit" name="grn" class="btn btn-gradient-primary btn-icon-text col-sm-8">
                                <i class="mdi mdi-file-check btn-icon-prepend"></i> Submit GRN</button>
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