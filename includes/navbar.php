<?php
session_start();
include "includes/data.php";
if(!isset($_SESSION['user'])){
  header("Location:login");
}
?>
<div id="nav_bar" class="container-scroller">
      <!-- partial:../../partials/_navbar.html -->
      <nav  class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="../../index"><img src="assets/images/tlogo.png" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="../../index"><img src="assets/images/tlogos.png" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <div class="search-field d-none d-md-block">
            <form class="d-flex align-items-center h-100" action="search" method="get">
              <div class="input-group">
                <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>
                </div>
                <input type="text" class="form-control bg-transparent border-0" name="code" placeholder="Search for Item by Code">
              </div>
            </form>
          </div>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                  <img src="assets/images/faces/face1.jpg" alt="image">
                  <span class="availability-status online"></span>
                </div>
                <div class="nav-profile-text">
                  <p class="mb-1 text-black"><?php echo $_SESSION['fn']." ".$_SESSION['ln'];?></p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="#">
                  <i class="mdi mdi-cached mr-2 text-success"></i> Activity Log </a>
                <div class="dropdown-divider"></div>
                <form method="POST" action="includes/routes">
                <button class="dropdown-item" type="submit" name="logout">
                  <i class="mdi mdi-logout mr-2 text-primary"></i> Signout </button>
                </form>
              </div>
            </li>
            <li class="nav-item d-none d-lg-block full-screen-link">
              <a class="nav-link">
                <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" data-toggle="dropdown">             
                <i class="mdi mdi-bell-outline"></i>
                <?php 
                if ($_SESSION['did']=='TACON-PC') {
                  $q = "SELECT * FROM notifications WHERE (notify = '".$_SESSION['USERID']."' and unred = 0) or (notif_type='pc_handle'  and unred = 0)  ORDER BY ID DESC";
                } else {
                  $q = "SELECT * FROM notifications WHERE notify = '".$_SESSION['USERID']."' and unred = 0  ORDER BY ID DESC";
                }
                
                $query = $DBcon->query($q); $count = mysqli_num_rows($query); if($count > 0){?>
                <span class="count-symbol bg-danger"></span>
                <?php }?>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                <h6 class="p-3 mb-0">Notifications</h6>
                <div class="dropdown-divider"></div>
                  <?php
                  if ($count > 0) {
                        while ($row = $query->fetch_assoc()) {
                    ?>
                      <a class="dropdown-item preview-item" 
                      <?php
                      if(strcasecmp($row['notif_type']," ")>0){
                        if(strcmp($row['notif_type'],"rsiv")==0){
                          ?>
                          href="<?php echo 'sivfled?from='.$row['USERID'].'&sn='.$row['serial_number'];?>"
                          <?php 
                        }elseif (strcmp($row['notif_type'],"sivdone")==0) {
                          ?>
                            href="#"
                          <?php  
                        }elseif (strcmp($row['notif_type'],"arrived")==0) {
                          ?>
                            href="<?php echo 'is_instore?sn='.$row['serial_number'];?>"
                          <?php  
                        }elseif ((strcmp($row['notif_type'],"pc_handle")==0 )&&($_SESSION['did']=="TACON-PC")) {
                            ?>
                              href="po?sn=<?php echo $row['serial_number'].'&from='.$row['USERID'];?>"
                            <?php  
                              
                        }else{
                      ?>
                      href="<?php echo $row['notif_type'].'_approve?from='.$row['USERID'].'&sn='.$row['serial_number'];?>"
                      <?php
                        }
                      }else{
                        ?>
                      href="<?php echo 'is_instore?sn='.$row['serial_number'];?>"
                        <?php
                      }
                      ?>
                      >
                        <div class="preview-thumbnail">
                          <div class="preview-icon bg-warning">
                            <i class="mdi mdi-settings"></i>
                          </div>
                        </div>
                        <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                          <h6 class="preview-subject font-weight-normal mb-1"><?php echo $row['title'];?></h6>
                          <p class="text-gray ellipsis mb-0"><?php echo $row['notification_body'];?></p>
                        </div>
                      </a>

                      <div class="dropdown-divider"></div>
                     <?php
                        } 
                      }else{
                        ?>
                      <a class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                          <div class="preview-icon bg-warning">
                            <i class="mdi mdi-empty"></i>
                          </div>
                        </div>
                        <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                          <h6 class="preview-subject font-weight-normal mb-1">No Notifications</h6>
                          <p class="text-gray ellipsis mb-0">....</p>
                        </div>
                      </a>

                      <div class="dropdown-divider"></div>

                        <?php
                      }
                     ?>

                <a href="notifications"><h6 class="p-3 mb-0 text-center">See all notifications</h6></a>
              </div>
            </li>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
