      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="Home"><img src="<?= ASSETS .THEME?>admin/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered"><?= $data['admin_info']->name ?></h5>
                  <h6 class="centered" style="color: white;"><?= $data['admin_info']->email ?></h6>
                      <!-- DashBoard -->
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-dashboard"></i>
                          <span>DashBoard</span>
                      </a>
                  </li>
                    <!-- End DashBoard -->

                       <!-- Products -->
                  <li class="sub-menu">
                      <a href="<?=ROOT?>admin/product" >
                          <i class="fa fa-barcode fa-fw"></i>
                          <span>Products</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="<?=ROOT?>Admin/product">Add New Product</a></li>
                      </ul>
                  </li>
                  <!-- End Products -->

                  <!-- Categories -->
                  <li class="sub-menu">
                      <a href="<?=ROOT?>admin/categories" >
                          <i class="fa fa-list-alt"></i>
                          <span>Categories</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="<?=ROOT?>Admin/categories">View Categories</a></li>
                      </ul>
                  </li>
                  <!-- end Categories -->

                 <!-- Orders -->
                  <li class="sub-menu">
                      <a href="<?=ROOT?>admin/orders" >
                          <i class="fa fa-reorder"></i>
                          <span>Orders</span>
                      </a>
                    
                  </li>
                 <!-- end Orders -->

                 <!-- Settings -->
                  <li class="sub-menu">
                      <a href="<?=ROOT?>admin/settings" >
                          <i class="fa fa-cogs"></i>
                          <span>Setting</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="<?=ROOT?>Admin/settings">Slider Images</a></li>
                      </ul>
                  </li>
                 <!-- End Settings -->

                      <!-- users -->
                      <li class="sub-menu">
                      <a href="<?=ROOT?>admin/users" >
                          <i class="fa fa-user"></i>
                          <span>users</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="<?=ROOT?>admin/users/customers">Customers</a></li>
                          <li><a  href="<?=ROOT?>admin/users/admins">Admins</a></li>

                      </ul>
                  </li>
                 <!-- End users -->

                     <!-- Backup -->
                     <li class="sub-menu">
                      <a href="<?=ROOT?>admin/backup" >
                          <i class="fa fa-hdd-o"></i>
                          <span>Website-Backup</span>
                      </a>
                    
                  </li>
                 <!-- End users -->

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      