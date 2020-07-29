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
            
          <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <form class="form-sample" method="POST" action="includes/routes">
                    <h4 class="card-title">Store Issue Voucher (SIV)
                    <?php 
                     $query = $DBcon->query("SELECT * FROM sno WHERE document_type = 'siv'");
                     $row=$query->fetch_array();
                    ?>
                      <span class="record_number">Number: <?php echo $row['current_number'];?><input style="display:none" name="serial_number" type="text" value="<?php echo $row['current_number'];?>"></span>
                    </h4>

                      <p class="card-description">
                        <strong>Date <span id="date"></span></strong><br/>
                        <div class="row">
                              <div class="col-md-12">
                                <div class="form-group row">
                                  <strong class="col-sm-4 col-form-label">Requesting Unit/Site:</strong>
                                  <div class="col-sm-8">
                                  <input class="form-control issuing" name="DID" type="text" value="ICT Department">                                  </div>
                                </div>
                              </div>
                        </div>
                        <div class="row">
                              <div class="col-md-12">
                                <div class="form-group row">
                                  <strong class="col-sm-4 col-form-label">Issuing Store:</strong>
                                  <div class="col-sm-8">
                                  <input name="issuing_store" type="text" class="form-control issuing">                                  </div>
                                </div>
                              </div>
                        </div>
                        <div class="row">
                              <div class="col-md-12">
                                <div class="form-group row">
                                  <strong class="col-sm-4 col-form-label">GRV No:</strong>
                                  <div class="col-sm-8">
                                  <input name="grv_number" type="number" class="form-control">                                  </div>
                                </div>
                              </div>
                        </div>
                      <script>
                        var d = new Date();
                        document.getElementById('date').innerHTML = d.getDate()+" - "+(d.getUTCMonth()+1)+" - "+d.getFullYear();
                      </script>
                        </p>
                      <div id='form-array-container'>
                      <?php
                          $i = 1;
                          $query = $DBcon->query("SELECT * FROM srv WHERE serial_number='".$serial_number."'");
                          while ($row = $query->fetch_assoc()) {
                            $authorized_by = $row['approved_by'];
                      ?>
                          <div class='row'> 
                          <div class='col-md-12 line'> 
                          </div> 
                          </div> 
                            <p class='card-description'>Serial Number <?php echo $i;?> </p>
                             <div class='row'> 
                                        <div class='col-md-4'> 
                                        <div class='form-group row'> 
                                            <label class='col-sm-4 col-form-label'>Code</label> 
                                                <div class='col-sm-8'> 
                                                    <input type='text' name='code[]' class='form-control' value="<?php echo $row['code'];?>" required/> 
                                                </div> 
                                                </div> 
                                                </div> 
                                                <div class='col-md-8'> 
                                                    <div class='form-group row'> 
                                                      <label class='col-sm-3 col-form-label'>Material Description</label> 
                                                            <div class='col-sm-9'> 
                                                                <input type='text' name='description[]' class='form-control' value="<?php echo $row['description'];?>" required/>   
                                                            </div> 
                                                        </div>  
                                                    </div> 
                                                </div>
                              <div class='row'> 
                              <div class='col-md-4'> 
                                <div class='form-group row'> 
                                  <label class='col-sm-4 col-form-label'>Unit</label> 
                                  <div class='col-sm-8'> 
                                    <select name='unit[]' class='form-control' required> 
                                      <option name='Dozen' >Dozen</option> 
                                      <option name='Inch' >Inch</option> 
                                      <option name='Kilogram'>Kilogram</option> 
                                      <option name='Meter'>Meter</option> 
                                      <option name='Liter'>Liter</option> 
                                      <option name='Peice'>Peice</option> 
                                    </select> 
                                  </div> 
                                </div> 
                              </div> 
                              <div class='col-md-4'> 
                                <div class='form-group row'> 
                                  <label class='col-sm-5 col-form-label'>Qty. Requested</label> 
                                  <div class='col-sm-7'> 
                                    <input class='form-control' name='qty_requested[]' id='qtyreq"+count+"' value="<?php echo $row['qty_requested'];?>" required/> 
                                  </div> 
                                </div> 
                              </div> 
                              <div class='col-md-4'> 
                                <div class='form-group row'> 
                                  <label class='col-sm-5 col-form-label'>Qty. Issued</label> 
                                  <div class='col-sm-7'> 
                                    <input class='form-control' name='qty_issued[]' id='qtyreq"+count+"' placeholder='' required/> 
                                  </div> 
                                </div> 
                              </div> 
                            </div>
                            <div class='row'> 
                              <div class='col-md-6'> 
                                <div class='form-group row'> 
                                  <label class='col-sm-3 col-form-label'>Unit Price</label> 
                                  <div class='col-sm-9'> 
                                    <div class='input-group'> 
                                      <input type='text' id='unit"+count+"' name='unit_price[]' oninput='calculate("+count+")' class='form-control' value="<?php echo $row['unit_price'];?>" required > 
                                        <div class='input-group-prepend'> 
                                          <span class='input-group-text bg-gradient-primary text-white'>Birr</span> 
                                        </div> 
                                      </div> 
                                  </div> 
                                </div> 
                              </div> 
                              <div class='col-md-6'> 
                                <div class='form-group row'> 
                                  <label class='col-sm-3 col-form-label'>Total Price</label> 
                                  <div class='col-sm-9'> 
                                  <div class='input-group'> 
                                      <input type='text' id='total"+count+"' name='total_price[]' class='form-control' value="<?php echo $row['total_price'];?>" required/> 
                                        <div class='input-group-prepend'> 
                                          <span class='input-group-text bg-gradient-primary text-white'>Birr</span> 
                                        </div> 
                                    </div> 
                                  </div> 
                                </div> 
                              </div> 
                            </div>
                            <div class='row'> 
                              <div class='col-md-12'> 
                                <div class='form-group row'> 
                                  <label class='col-sm-2 col-form-label'>Remark</label> 
                                  <div class='col-sm-10'> 
                                    <input type='text' name='remark[]' class='form-control' value="<?php echo $row['remark'];?>" required/> 
                                  </div> 
                                </div> 
                              </div> 
                        </div>

                      <?php
                          }
                      ?>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Store Keepers Name</label>
                            <div class="col-sm-7">
                            <input type="text" name="store_keeper"  class="form-control"/>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Recepients Name</label>
                            <div class="col-sm-9">
                            <input type="text" name="recepient_name" id="items-needed" class="form-control"/>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Authorized By</label>
                            <div class="col-sm-7">
                            <input type="text" name="authorized_by"  value="Abebe Kebede Chanyalew" value="<?php echo $authorized_by;?>"  class="form-control"/>
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