<?php
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
                    <h4 class="card-title">Purchase Order (PO)
                      <span class="record_number">Number: 205032<input style="display:none" name="serial_number" type="text" value="205032"></span>
                    </h4>

                      <p class="card-description">
                        <strong>Date <span id="date"></span></strong><br/>
                        <div class="row">
                              <div class="col-md-12">
                                <div class="form-group row">
                                  <strong class="col-sm-4 col-form-label">Project Name:</strong>
                                  <div class="col-sm-8">
                                  <input class="form-control issuing" name="project_name" type="text" value="ICT Department">                                  </div>
                                </div>
                              </div>
                        </div>
                        <div class="row">
                              <div class="col-md-12">
                                <div class="form-group row">
                                  <strong class="col-sm-4 col-form-label">Supplier:</strong>
                                  <div class="col-sm-8">
                                  <input name="supplier" type="text" class="form-control issuing">                                  </div>
                                </div>
                              </div>
                        </div>
                        <div class="row">
                              <div class="col-md-12">
                                <div class="form-group row">
                                  <strong class="col-sm-4 col-form-label">Proforma Invoice No:</strong>
                                  <div class="col-sm-8">
                                  <input name="proforma" type="number" class="form-control">                                  </div>
                                </div>
                              </div>
                        </div>
                        <strong>Items: <span id="item_count">0</span></strong>
                      <script>
                        var d = new Date();
                        document.getElementById('date').innerHTML = d.getDate()+" - "+(d.getUTCMonth()+1)+" - "+d.getFullYear();
                      </script>
                        </p>
                        <p class="card-description">Please supply the under mentioned items as per offer dated <input class="inline-form" name="offer_date" type="date"> and in accordance with the terms and conditions stated here.</p>
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
                      
                    <div class='row'> 
                      <div class='col-md-6'> 
                        <div class='form-group row'> 
                          <label class='col-sm-3 col-form-label'>Total Birr</label> 
                          <div class='col-sm-9'> 
                            <div class='input-group'> 
                              <input type='text' id='unit"+count+"' name='unit_price[]' oninput='calculate("+count+")' class='form-control' required > 
                                <div class='input-group-prepend'> 
                                  <span class='input-group-text bg-gradient-primary text-white'>Birr</span> 
                                </div> 
                              </div> 
                          </div> 
                        </div> 
                      </div> 
                      <div class='col-md-6'> 
                        <div class='form-group row'> 
                          <label class='col-sm-3 col-form-label'>Taxes Birr</label> 
                          <div class='col-sm-9'> 
                          <div class='input-group'> 
                              <input type='text' id='total"+count+"' name='total_price[]' class='form-control' required/> 
                                <div class='input-group-prepend'> 
                                  <span class='input-group-text bg-gradient-primary text-white'>Birr</span> 
                                </div> 
                            </div> 
                          </div> 
                        </div> 
                      </div> 
                    </div>
                    <div class="row">
                              <div class="col-md-12">
                                <div class="form-group row">
                                  <label class="col-sm-4 col-form-label">Net Birr:</label>
                                  <div class="col-sm-8">
                                    <div class='input-group'> 
                                    <input type='text' id='total"+count+"' name='total_price[]' class='form-control' required/> 
                                      <div class='input-group-prepend'> 
                                        <span class='input-group-text bg-gradient-primary text-white'>Birr</span> 
                                      </div> 
                                  </div> 
                                </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Terms of Payment</label>
                            <div class="col-sm-7">
                            <input type="text" name="terms"   class="form-control"/>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Delivery Time</label>
                            <div class="col-sm-9">
                            <input type="text" name="delivery_time" id="items-needed" class="form-control"/>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Prepared By</label>
                            <div class="col-sm-7">
                            <input type="text" name="prepared_by"   class="form-control"/>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Checked By</label>
                            <div class="col-sm-9">
                            <input type="text" name="checked_by" id="items-needed" class="form-control"/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group row">
                            <div class="col-sm-2">
                            </div>
                            <button type="submit" name="siv" class="btn btn-gradient-primary btn-icon-text col-sm-8">
                                <i class="mdi mdi-file-check btn-icon-prepend"></i> Submit SIV</button>
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