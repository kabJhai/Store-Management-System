<?php
include "includes/head.php";
include "includes/navbar.php";
include "includes/sidebar.php";
$q = "";
if(isset($_GET['code'])||isset($_GET['name'])||isset($_GET['year'])){
  $day = $_GET['day'];
  $month = $_GET['month'];
  $year = $_GET['year'];
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
  if (strlen($day)>0) {
    if ($count==1) {
      $q = $q." AND ";
    }
    $date = $year."-".$month."-".$day;
    $q = $q."done_date Like '".$date."%'";
    $count = 1;
    $search = $search." Date:".$date."";   

  }elseif (strlen($month)>0) {
    if ($count==1) {
      $q = $q." AND ";
    }
    $date = $year."-".$month;
    $q = $q."done_date Like '".$date."%'";
    $count = 1;
    $search = $search." Date:".$date."";   
  }elseif ((strlen($year)>0)) {
    if ($count==1) {
      $q = $q." AND ";
    }
    $date = $year;
    $q = $q."done_date Like '".$date."%'";
    $count = 1;
    $search = $search." Date:".$date."";   
  }
  if (strlen($name)>0) {
    if ($count==1) {
      $q = $q." AND ";
    }
    $query = $DBcon->query("SELECT * FROM material WHERE material_name LIKE '".$name."%'");
    $count = mysqli_num_rows($query);
    if($count > 0){
      while ($row = $query->fetch_assoc()) {
        $q = $q." code = ".$row['code'];
      }
    }else{
      $q = $q." code = -9999";
    }

  }
  
}
?>
  <div class="main-panel">
  <div class="content-wrapper" id="paper">
          <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  <form method="get" id="form">
                  <div class="input-group mb-3">
                  
                    <input type="text" class="form-control" placeholder="Item Code" name="code"  id="code"  oninput="filter_cn('code')" aria-describedby="basic-addon2" >
                    <input type="text" class="form-control" placeholder="Item Name" name="name" id="name" oninput="filter_cn('name')" aria-describedby="basic-addon2">

                    <select class="form-control" id="day" name="day" oninput="selected('day')">
                      <option value="">Day</option>
                      <?php
                      $i = 1;
                      while ($i <= 30) {
                      ?>
                        <option value="<?php if($i < 10){echo "0".$i;}else{echo $i;}?>"><?php if($i < 10){echo "0".$i;}else{echo $i;}?></option>
                      <?php
                          $i++;
                      }
                      ?>
                    </select>
                    <select class="form-control" id="month"  oninput="selected('month')" name="month">
                      <option value="">Month</option>
                      <?php
                      $i = 1;
                      while ($i <= 12) {
                      ?>
                        <option value="<?php if($i < 10){echo "0".$i;}else{echo $i;}?>"><?php if($i < 10){echo "0".$i;}else{echo $i;}?></option>
                      <?php
                          $i++;
                      }
                      ?>
                    </select>
                    <select class="form-control" id="year" name="year">
                      <option value="">Year</option>
                      <?php
                      $year = date("Y");
                      while ($year >= 2000) {
                      ?>
                        <option value="<?php echo $year;?>"><?php echo $year;?></option>
                      <?php
                          $year = $year - 1;
                      }
                      ?>
                    </select>
                    <div class="input-group-append">
                      <button class="btn btn-outline-secondary" type="submit">Search</button>
                    </div>
                  </div>
                  </form>
                    <h4 class="card-title">Material Movement Report</h4>
                    </p>
                    <strong>Report Generated On <span id="date"></span></strong><br/>
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
                          $query = $DBcon->query("SELECT * FROM bin_log ".$q);
                          $count = mysqli_num_rows($query);
                          if($count > 0){
                            ?>
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
                            <button type="button" onclick="printReport('movement')" id="print_button" name="approve" class="btn btn-gradient-primary btn-icon-text col-sm-6 floating">
                              Print Report</button>
                            <div class="col-sm-3">
                            </div>
                          </div>
                        </div>
                     </div>

                      <?php
                          }else{
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
                          </div>
                            <?php
                          } 
                      ?>

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