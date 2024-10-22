<?php
include "includes/head.php";
include "includes/navbar.php";
include "includes/sidebar.php";
$q = "";
if(isset($_GET['code'])||isset($_GET['name'])){
  $search = "";
  if (isset($_GET['name'])==0) {
    $name = "";
  }else {
    $name =  $_GET['name'];  
    $search = "Name:".$name."";   
  }
  if (isset($_GET['code'])==0) {
    $code = "";
  }else {
    $code =  $_GET['code']; 
    $search = "Code:".$code."";    
  }
  $count = 0;
  if (strlen($code)>0) {
    $q = "code = '".$code."'";
    $count = 1;
  }
  if (strlen($name)>0) {
    if ($count==1) {
      $q = $q." AND (";
    }
    $query = $DBcon->query("SELECT * FROM material WHERE material_name LIKE '".$name."%'");
    while ($row = $query->fetch_assoc()) {
      $q = $q." code = ".$row['code'];
    }
    if ($count==1) {
      $q = $q.")";
    }

  }
  
}
?>
  <div class="main-panel">
  <div class="content-wrapper" id="paper">
          <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  <?php
                      $query = $DBcon->query("SELECT * FROM material");
                      $row=$query->fetch_array();
                    ?>
                  <div class="card-body">
                  <form method="get" id="form">
                  <div class="input-group mb-3">
                  
                    <input type="text" class="form-control" placeholder="Item Code" name="code"  id="code"  oninput="filter_cn('code')" aria-describedby="basic-addon2" >
                    <input type="text" class="form-control" placeholder="Item Name" name="name" id="name" oninput="filter_cn('name')" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-outline-secondary" type="submit">Search</button>
                    </div>
                  </div>
                  </form>

                    <h4 class="card-title">Materials</h4>
                    </p>
                    <strong>Date <span id="date"></span></strong><br/>
                        <script>
                        var d = new Date();
                        document.getElementById('date').innerHTML = d.getDate()+" - "+(d.getUTCMonth()+1)+" - "+d.getFullYear();
                      </script>

                      <?php
                          $i = 1;
                          $total_quantity = 0;
                          $grand_total = 0;
                          if (strlen($q)>0) {
                            $q = " WHERE ".$q;
                          }  
                          $query = $DBcon->query("SELECT * FROM material ".$q);
                          $count = mysqli_num_rows($query);
                          if($count > 0){
                            ?>
                    <table class="table table-striped">
                      <thead>
                        <tr>
                        <th> S/N </th>
                        <th> Item-Code </th>
                        <th> Material Description </th>
                        <th> Available Quantity </th>
                        <th> Unit Price </th>
                        <th> Total Price </th>
                        <th> Bought On </th>
                        </tr>
                      </thead>
                      <tbody>

                      <?php
                      while ($row = $query->fetch_assoc()) {
                      ?>

                        <tr>
                          <td class="py-1">
                              <?php echo $i;?>
                          </td>
                          <td> <?php echo $row['code'];?> </td>
                          <td>
                            <?php echo $row['material_name'];?>
                          </td>
                          <td> <?php echo $row['available_quantity'];$total_quantity=$row['available_quantity']+$total_quantity;?> </td>
                          <td> <?php echo $row['unit_price'];?> </td>
                          <td> <?php echo $row['available_quantity']*$row['unit_price'];$grand_total=($row['available_quantity']*$row['unit_price'])+$grand_total;?> </td>
                          <td> <?php echo $row['bought_on'];?> </td>
                        </tr>
                        <?php
                            $i++;
                          } 
                      ?>
                          <td class="py-1">
                          </td>
                          <td> </td>
                          <td class="grand_total">
                            Total
                          </td>
                          <td class="grand_total"> <?php echo $total_quantity;?> </td>
                          <td class="grand_total"> </td>
                          <td class="grand_total"> <?php echo $grand_total." ETB";?> </td>
                          <td>  </td>
                      </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-12">
                          <div class="form-group row">
                            <div class="col-sm-3">
                            </div>
                            <button type="button" onclick="printReport('inventory')" id="print_button" name="approve" class="btn btn-gradient-primary btn-icon-text col-sm-6 floating">
                              Print</button>
                            <div class="col-sm-3">
                            </div>
                            </div>
                        <?php }else {
                          ?>
                    <div class="row">
                        <div class="col-md-12">
                          <div class="form-group row">
                            <div class="col-sm-3">
                            </div>
                            <p class="text-danger text-capitalize display-5 align-self-center">  
                                    Couldn't find anything matching your search "<span class="h6"><?php echo $search?>"</p>
                            <div class="col-sm-3">
                            </div>
                            </div>
                          <?php
                        }?>
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