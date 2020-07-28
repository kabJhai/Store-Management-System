<?php
include "includes/data.php";
include "includes/head.php";
?>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <img src="../../assets/images/tlogo.png">
                </div>
                <h4>New here?</h4>
                <h6 class="font-weight-light">All the fields are required</h6>
                <form class="pt-3" method="POST" action="includes/routes">
                <div class="form-group">
                    <input type="text" class="form-control form-control-lg" name="fn" placeholder="First Name" required>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" name="ln" placeholder="Last Name" required>
                  </div>
                  <div class="form-group">
                    <input type="phone" class="form-control form-control-lg" name="phone" placeholder="Phone Number" required>
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control form-control-lg" name="email" placeholder="Email" required>
                  </div>
                  <div class="form-group">
                    <select class="form-control form-control-lg" name="department" required>
                    <option value="">Select Department</option>
                    <?php
                        $query = $DBcon->query("SELECT * FROM departments");
                        while ($row = $query->fetch_assoc()) {
                    ?>
                      <option value="<?php echo $row['DID'];?>"><?php echo $row['department_name'];?></option>
                     <?php
                        } 
                     ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <input type="password" id="password" class="form-control form-control-lg" name="password" placeholder="Password" required>
                  </div>
                  <div class="form-group">
                    <input type="password" id="cpassword" class="form-control form-control-lg" oninput="checkValues()" placeholder="Confirm Password" required>
                  </div>
                  <div class="mb-4">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input" required> I agree to all Terms & Conditions </label>
                    </div>
                  </div>
                  <div class="mt-3">
                    <button id="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" name="register" disabled>REGISTER</button>
                  </div>
                  <div class="text-center mt-4 font-weight-light"> Already have an account? <a href="login.php" class="text-primary">Login</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <!-- endinject -->
  </body>
</html>