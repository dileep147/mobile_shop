<?php
require_once __DIR__ . '/../../util/initialize.php';

$user = User::find_by_id($_SESSION["user"]["id"]);
?>
<div class="col-md-3 left_col ">
  <div class="left_col scroll-view">

    <div class="navbar nav_title" style="border: 0;">
      <a href="index.php" class="site_title"><i class="fa fa-home "></i> <span><?php echo ProjectConfig::$project_name; ?></span></a>
    </div>

    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    <div class="profile clearfix">
      <div class="profile_pic" >
        <?php
        $image = "images/user.png";
        if ($user->image) {
          $image = "uploads/users/" . $user->image;
        }
        ?>
        <img src="<?php echo $image; ?>" alt="..." class="img-circle profile_img">
        <!--<figure style="height: 3em; width: 3em;">
        <img style="border-radius: 100%" class="img-responsive image_fit " src="<?php // echo 'uploads/users/'.$user->image;               ?>"  alt="Image not found" onerror="this.src='images/user.png';">
      </figure>-->
    </div>

    <div class="profile_info">
      <span>Welcome,</span>
      <h2><?php echo $user->name; ?></h2>
    </div>
    <div class="clearfix"></div>
  </div>

  <!-- /menu profile quick info -->
  <br />

  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
      <!--<h3>General</h3>-->
      <ul class="nav side-menu">


        <!-- <li><a><i class="fa fa-shopping-cart"></i> Barcode Management <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <div class="menu_heading"><label >PRINT</label></div>
            <?php
            if(Functions::check_privilege_by_module_action("Category","ins")){
              echo '<li><a href="category.php">Barcode Print</a></li>';
            }
            ?>
          </ul>
        </li> -->

        <li><a><i class="fa fa-shopping-cart"></i> Repair Management <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <div class="menu_heading"><label >EDIT</label></div>
            <?php
              echo '<li><a href="device_fault.php">Add Device Faults</a></li>';
              echo '<li><a href="possible_solution.php">Add Possible Solutions </a></li>';
              echo '<li><a href="collected_accessories.php">Add Collected Accessories </a></li>';
              echo '<li><a href="device_model.php">Add Device Name & Model Number </a></li>';
              echo '<li><a href="repair.php">Add Device Repair </a></li>';
              echo '<li><a href="location_number.php">Add Device Location and Number </a></li>';
              echo '<li><a href="brand.php">Add Brand </a></li>';
              echo '<li><a href="remainder.php">Add Reminder </a></li>';
              echo '<li><a href="discription.php">Add Discription</a></li>';
              echo '<li><a href="repair_status.php">Add Repair Status Registration </a></li>';
              echo '<li><a href="job_close_status.php">Add Job Close Status</a></li>';
              echo '<li><a href="job_close.php">Add Job Close </a></li>';
              echo '<li><a href="payment_close.php">Add Payment </a></li>';

            ?>

            <div class="menu_heading"><label>REPORTS</label></div>
            <?php
            echo '<li><a href="device_fault_management.php">Device Faults Management</a></li>';
            echo '<li><a href="possible_solution_management.php">Possible Solutions Management</a></li>';
            echo '<li><a href="collected_accessories_management.php">Collected Accessories Management</a></li>';
            echo '<li><a href="device_model_management.php">Device Name & Model Number Management </a></li>';
            echo '<li><a href="repair_management.php">Device Repair Management</a></li>';

            echo '<li><a href="location_number_management.php">Device Location and Number Management </a></li>';
            echo '<li><a href="brand_management.php">Brand Management</a></li>';
            echo '<li><a href="remainder_management.php">Remainder Management</a></li>';
            echo '<li><a href="discription_management.php">Discription Management</a></li>';
            echo '<li><a href="repair_status_management.php">Repair Status Management</a></li>';
            echo '<li><a href="job_close_status_management.php">Job Close Status Management</a></li>';
            echo '<li><a href="job_close_management.php">Job Close Management</a></li>';
            echo '<li><a href="payment_close_management.php">Payment Management</a></li>';
            ?>
          </ul>
        </li>

        <li><a><i class="fa fa-shopping-cart"></i> Product Management <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <div class="menu_heading"><label >EDIT</label></div>
            <?php
            
              echo '<li><a href="location.php">Add Location</a></li>';
            
            
              echo '<li><a href="category.php">Add Category</a></li>';
            
              echo '<li><a href="product.php">Add Product</a></li>';
            ?>
            <!--<li><a href="batch.php">Batch</a></li>-->

            <div class="menu_heading"><label>REPORTS</label></div>
            <?php
           
              echo '<li><a href="location_management.php">Location Detailed Report</a></li>';
            
            
              echo '<li><a href="category_management.php">Category Detailed Report</a></li>';
            
            
              echo '<li><a href="product_management.php">Product Detailed Report</a></li>';
            
            
            ?>
          </ul>
        </li>

        <li><a><i class="fa fa-shopping-cart"></i> Allocation Management <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <div class="menu_heading"><label >EDIT</label></div>
            <?php
            if(Functions::check_privilege_by_module_action("Category","ins")){
              echo '<li><a href="allocation.php">Add Allocation</a></li>';
            }
            
            ?>
            <!--<li><a href="batch.php">Batch</a></li>-->

            <div class="menu_heading"><label>REPORTS</label></div>
            <?php
            if(Functions::check_privilege_by_module_action("Category","view")){
              echo '<li><a href="allocation_management.php">Allocation Management</a></li>';
            }
            
            
            ?>
          </ul>
        </li>

       


        <li><a><i class="fa fa-user-circle"></i> Supplier Management <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <!--<i class="fa fa-table"></i>-->
            <div class="menu_heading"><label>EDIT</label></div>
            <?php
            if(Functions::check_privilege_by_module_action("Supplier","ins")){
              echo '<li><a href="supplier.php">Add Supplier</a></li>';
            }
            ?>

            <div class="menu_heading"><label>REPORTS</label></div>
            <?php
            if(Functions::check_privilege_by_module_action("Supplier","view")){
              echo '<li><a href="supplier_management.php">Supplier Management</a></li>';
            }
            ?>
          </ul>
        </li>

         



        <li><a><i class="fa fa-archive"></i> Inventory Management <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <div class="menu_heading"><label >EDIT</label></div>
            <?php
            if(Functions::check_privilege_by_module_action("ProductPO","view")){
              echo '<li><a href="product_purchase_order.php">Add Product Purchase Order</a></li>';
            }
            if(Functions::check_privilege_by_module_action("ProductGRN","view")){
              echo '<li><a href="product_grn.php">Add Product GRN</a></li> ';
            }
            ?>

            <div class="menu_heading"><label>REPORTS</label></div>
            <?php
            if(Functions::check_privilege_by_module_action("ProductPO","view") || Functions::check_privilege_by_module_action("MaterialPO","view")){
              echo '<li><a href="purchase_order_management.php">Purchase Order Management</a></li>';
            }
            if(Functions::check_privilege_by_module_action("ProductGRN","view") || Functions::check_privilege_by_module_action("MaterialGRN","view")){
              echo '<li><a href="grn_management.php">GRN Detailed Report</a></li>';
            }

            if(Functions::check_privilege_by_module_action("Inventory","view")){
              echo '<li><a href="inventory_management.php">All Inventory Management</a></li>';
            }

            if(Functions::check_privilege_by_module_action("Inventory","view")){
              echo '<li><a href="main_inventory_management.php">Main Inventory Management</a></li>';
            }

            if(Functions::check_privilege_by_module_action("Inventory","view")){
              echo '<li><a href="bin_card.php">Bin Card</a></li>';
            }
            ?>
          </ul>
        </li>


        <li><a><i class="fa fa-user-secret"></i>User Administration <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <div class="menu_heading"><label >EDIT</label></div>
            <?php
            if(Functions::check_privilege_by_module_action("User","ins")){
              echo '<li><a href="user.php">Add User</a></li>';
            }
            if(Functions::check_privilege_by_module_action("Role","ins")){
              echo '<li><a href="role.php">Add Role</a></li>';
            }
            if(Functions::check_privilege_by_module_action("Designation","ins")){
              echo '<li><a href="designation.php">Add Designation</a></li>';
            }
            if(true){
              echo '<li><a href="privilege_management.php">Privilege Management</a></li>';
            }

            ?>

            <div class="menu_heading"><label>REPORTS</label></div>
            <?php
            if(Functions::check_privilege_by_module_action("User","view")){
              echo '<li><a href="user_management.php">User Management</a></li>';
            }
            if(Functions::check_privilege_by_module_action("Role","view")){
              echo '<li><a href="role_management.php">Role Management</a></li>';
            }
            if(Functions::check_privilege_by_module_action("Designation","view")){
              echo '<li><a href="designation_management.php">Designation Management</a></li>';
            }


            ?>
          </ul>
        </li>

      </ul>
    </div>
  </div>
  <div class="sidebar-footer hidden-small">
    <small style="color:white;">Advanced Information Technology (Pvt) Ltd.</small>
  </div>
  <!-- /menu footer buttons -->
</div>
</div>
