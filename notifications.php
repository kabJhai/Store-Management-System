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
                    <h4 class="card-title">Notifications</h4>
                    </p>
                    <form method="POST" action="includes/routes">
                    <div class="row">
                        <div class="col-md-12">
                          <div class="form-group row">
                            <div class="col-sm-3">
                            </div>
                              <input name="uid"  style="display:none" value="<?php echo $_SESSION['USERID']; ?>">
                              <button type="submit"name="mark_all" class="btn .btn-outline-primary btn-icon-text col-sm-6 floating">
                                Mark all as red</button>
                            <div class="col-sm-3">
                            </div>
                            </div>
                        </div>
                      </div>
                      </form>

                    <table class="table">
                      <tbody>
                      <?php
                          $query = $DBcon->query("SELECT * FROM notifications WHERE notify=".$_SESSION['USERID']);
                          while ($row = $query->fetch_assoc()) {
                      ?>

                        <tr class="table-<?php if($row['unred']==0){echo "primary";}?>">
                          <td class="py-1">
                              <?php echo "";?>
                          </td>
                          <td> <?php echo $row['title'];?> </td>
                          <td>
                            <?php echo $row['notification_body'];?>
                          </td>
                          <td>
                            <?php echo $row['notification_time'];?>
                          </td>
                        </tr>
                        <?php
                          } 
                      ?>
                      </tbody>
                    </table>
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