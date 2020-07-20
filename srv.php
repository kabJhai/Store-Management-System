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
                    <h4 class="card-title">Store Requisition Voucher (SRV)
                      <span class="record_number">Number: 205032</span>
                    </h4>
                    <form class="form-sample">
                      <p class="card-description">
                      <strong>Date <span id="date"></span></strong><br/>
                      <strong>Requesting Department: ICT Department</strong>
                      <script>
                        var d = new Date();
                        document.getElementById('date').innerHTML = d.getDate()+" - "+(d.getUTCMonth()+1)+" - "+d.getFullYear();
                      </script>
                        </p>
                      <div id='form-array-container'>
                          <p class="card-description">S.N 1 </p>
                          <div class="row">
                            <div class="col-md-4">
                              <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Code</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" />
                                </div>
                              </div>
                            </div>
                            <div class="col-md-8">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Material Description</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" />
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-4">
                              <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Unit</label>
                                <div class="col-sm-8">
                                  <select class="form-control">
                                    <option>Dozen</option>
                                    <option>Inch</option>
                                    <option>Kilogram</option>
                                    <option>Meter</option>
                                    <option>Liter</option>
                                    <option>Peice</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group row">
                                <label class="col-sm-5 col-form-label">Qty. Requested</label>
                                <div class="col-sm-7">
                                  <input class="form-control" placeholder="" />
                                </div>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group row">
                                <label class="col-sm-5 col-form-label">Qty. Issued</label>
                                <div class="col-sm-7">
                                  <input class="form-control" placeholder="" />
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Unit Price</label>
                                <div class="col-sm-9">
                                  <div class="input-group">
                                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text bg-gradient-primary text-white">Birr</span>
                                      </div>
                                    </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Total Price</label>
                                <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text bg-gradient-primary text-white">Birr</span>
                                      </div>
                                    </div>
                                </div>
                              </div>
                            </div>
                          </div>
                      </div>
                      
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group row">
                            <div class="col-sm-2">
                            </div>
                            <button type="button" class="btn btn-gradient-success btn-icon-text col-sm-8">
                                <i class="mdi mdi-file-plus btn-icon-prepend"></i> Add More Item</button>
                            <div class="col-sm-2">
                            </div>
                            </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Requested By</label>
                            <div class="col-sm-7">
                            <p class="form-control">
                              Abebe Kebede Chanyalew
                            </p>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Approved By</label>
                            <div class="col-sm-9">
                              <p class="form-control">
                                Not Approved Yet
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group row">
                            <div class="col-sm-2">
                            </div>
                            <button type="button" class="btn btn-gradient-primary btn-icon-text col-sm-8">
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