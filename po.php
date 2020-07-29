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
                    <h4 class="card-title">Purchase Order (PO)
                    <?php 
                     $query = $DBcon->query("SELECT * FROM sno WHERE document_type = 'po'");
                     $row=$query->fetch_array();
                    ?>
                      <span class="record_number">Number: <?php echo $row['current_number'];?><input style="display:none" name="serial_number" type="text" value="<?php echo $row['current_number'];?>"></span>
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
                      <script>
                        var d = new Date();
                        document.getElementById('date').innerHTML = d.getDate()+" - "+(d.getUTCMonth()+1)+" - "+d.getFullYear();
                      </script>
                        </p>
                        <p class="card-description">Please supply the under mentioned items as per offer dated <input class="inline-form" name="offer_date" type="date"> and in accordance with the terms and conditions stated here.</p>
                      <div id='form-array-container'>
                      <?php
                          $i = 1;
                          $query = $DBcon->query("SELECT * FROM pr WHERE serial_number='".$serial_number."' AND is_approved = 1");
                          while ($row = $query->fetch_assoc()) {
                            $authorized_by = $row['approved_by'];
                      ?>
                        <div class='row'> 
                          <div class='col-md-12 line'> 
                          </div> 
                          </div> 
                          <p class='card-description'>Item Number <?php echo $i;?> </p>
                          <div class='row'> 
                                      <div class='col-md-4'> 
                                      <div class='form-group row'> 
                                          <label class='col-sm-4 col-form-label'>Part No</label> 
                                              <div class='col-sm-8'> 
                                                  <input type='text' name='part_no[]' class='form-control' required/> 
                                              </div> 
                                              </div> 
                                              </div> 
                                              <div class='col-md-8'> 
                                                  <div class='form-group row'> 
                                                    <label class='col-sm-3 col-form-label'>Material Description</label> 
                                                          <div class='col-sm-9'> 
                                                              <input type='text' name='description[]' class='form-control'value=" <?php echo $row['description'];?>" required/>   
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
                                      <option name='Dozen' <?php if(strcasecmp($row['unit'],'Dozen')==0){echo "selected";};?> >Dozen</option> 
                                      <option name='Inch'<?php if(strcasecmp($row['unit'],'Inch')==0){echo "selected";};?>  >Inch</option> 
                                      <option name='Kilogram' <?php if(strcasecmp($row['unit'],'Kilogram')==0){echo "selected";};?> >Kilogram</option> 
                                      <option name='Meter' <?php if(strcasecmp($row['unit'],'Meter')==0){echo "selected";};?> >Meter</option> 
                                      <option name='Liter'<?php if(strcasecmp($row['unit'],'Liter')==0){echo "selected";};?> >Liter</option> 
                                      <option name='Peice'<?php if(strcasecmp($row['unit'],'Piece')==0){echo "selected";};?> >Peice</option> 
                                    </select> 
                                </div> 
                              </div> 
                            </div> 
                            <div class='col-md-4'> 
                              <div class='form-group row'> 
                                <label class='col-sm-5 col-form-label'>Qty. Ordered</label> 
                                <div class='col-sm-7'> 
                                  <input class='form-control' name='qty_ordered[]' id='qtyreq<?php echo $i;?>' placeholder=''value="<?php echo $row['qty'];?>" required/> 
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
                                    <input type='number' value='0' id='unit<?php echo $i;?>' name='unit_price[]' oninput='calculatePO(<?php echo $i;?>)' class='form-control' required > 
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
                                    <input type='number' value='0' id='total<?php echo $i;?>' name='total_price[]' class='form-control' required/> 
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
                      $i++;
                          }
                      ?>
                      </div>
                      
                    <div class='row'> 
                      <div class='col-md-6'> 
                        <div class='form-group row'> 
                          <label class='col-sm-3 col-form-label'>Total Birr</label> 
                          <div class='col-sm-9'> 
                            <div class='input-group'> 
                              <input type='number' value='0' id='total_sum' name='total_birr' class='form-control' required > 
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
                              <input type='number' value='0' id='total_tax' name='tax_birr' class='form-control' value required/> 
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
                                    <input type='number' value='0' id='net_birr' name='net_birr' class='form-control' required/> 
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
                            <input type="date" name="delivery_time" id="items-needed" class="form-control"/>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Prepared By</label>
                            <div class="col-sm-7">
                            <input type="text" name="prepared_by" value="<?php echo $_SESSION['fn']." ".$_SESSION['ln'];?>" class="form-control"/>
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
                            <button type="submit" name="po" class="btn btn-gradient-primary btn-icon-text col-sm-8">
                                <i class="mdi mdi-file-check btn-icon-prepend"></i> Submit PO</button>
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