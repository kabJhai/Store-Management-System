
      <!-- partial -->
      <div id="sidebar" class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <img src="assets/images/faces/face1.jpg" alt="profile">
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2"><?php echo $_SESSION['fn']." ".$_SESSION['ln'];?></span>
                  <span class="text-secondary text-small"><?php echo $_SESSION['did'];?></span>
                </div>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <?php
          if ($_SESSION['did']=="TACON-PC"){
          ?>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Precurement Department Tasks</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="grn">
                    <span class="menu-title">Good Recieving Note</span>
                    <i class="mdi mdi-file-document-box menu-icon"></i>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pr">
                    <span class="menu-title">Purchase Requisition</span>
                    <i class="mdi mdi-file-document-box menu-icon"></i>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="orders">
                    <span class="menu-title">Purchase Orders</span>
                    <i class="mdi mdi-file-document-box menu-icon"></i>
                  </a>
                </li>
                </ul>
              </div>
            </li>
            <?php
          }
            ?>

            <li class="nav-item">
              <a class="nav-link" href="../../pages/icons/mdi.html">
                <span class="menu-title">Search for Item in Store</span>
                <i class="mdi mdi-file-find menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="srv">
                <span class="menu-title">Store Requisition Voucher</span>
                <i class=" mdi mdi-file-export menu-icon"></i>
              </a>
            </li>
          </ul>
        </nav>
        <!-- partial -->