``<?php
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
      <ul class="nav side-menu">

        <!-- BARCODE MANAGEMENT -->
        <li><a><i class="fa fa-shopping-cart"></i> Barcode Management <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <div class="menu_heading"><label >EDIT</label></div>
            <?php
            echo '<li><a href="barcode_gen.php">BarCode Generate</a></li>';
            ?>
          </ul>
        </li>

        <!-- CUSTOMER MANAGEMENT -->
        <li><a><i class="fa fa-group"></i> Customer Management<span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <div class="menu_heading"><label >EDIT</label></div>
            <?php


            if(Functions::check_privilege_by_module_action("Customer","view")){
              echo "<li><a href='customer.php'>Add Customer</a></li>";
            }

            ?>
            <div class="menu_heading"><label>REPORTS</label></div>
            <?php
            

            if(Functions::check_privilege_by_module_action("Customer","view")){
              echo "<li><a href='customer_management.php'>Customer Detailed Report</a></li>";
            }

            ?>
          </ul>
        </li>

        <!-- PRODUCT MANAGEMENT -->
        <li><a><i class="fa fa-shopping-cart"></i> Product Management <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <div class="menu_heading"><label >EDIT</label></div>
            <?php
            if(Functions::check_privilege_by_module_action("Category","ins")){
              echo '<li><a href="category.php">Add Category</a></li>';
            }
            if(Functions::check_privilege_by_module_action("Supplier","ins")){
              echo '<li><a href="supplier.php">Add Supplier</a></li>';
            }
            if(Functions::check_privilege_by_module_action("Product","ins")){
              echo '<li><a href="product.php">Add Product</a></li>';
            }
            ?>
            <div class="menu_heading"><label>REPORTS</label></div>
            <?php
            if(Functions::check_privilege_by_module_action("Category","view")){
              echo '<li><a href="category_management.php">Category Detailed Report</a></li>';
            }
            if(Functions::check_privilege_by_module_action("Supplier","view")){
              echo '<li><a href="supplier_management.php">Supplier Management</a></li>';
            }
            if(Functions::check_privilege_by_module_action("Product","view")){
              echo '<li><a href="product_management.php">Product Detailed Report</a></li>';
            }
            if(Functions::check_privilege_by_module_action("Batch","view")){
              echo '<li><a href="batch_management.php">Batch Management</a></li>';
            }
            ?>
          </ul>
        </li>

        <!-- INVENTORY MANAGEMENT -->
        <li><a><i class="fa fa-archive"></i> Inventory Management <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <div class="menu_heading"><label >EDIT</label></div>
            <?php
            if(Functions::check_privilege_by_module_action("ProductGRN","view")){
              echo '<li><a href="product_grn.php">Add Product GRN</a></li> ';
              echo '<li><a href="product_invoice.php">Add Invoice</a></li> ';
            }
            ?>

            <div class="menu_heading"><label>REPORTS</label></div>
            <?php
            if(Functions::check_privilege_by_module_action("ProductGRN","view") || Functions::check_privilege_by_module_action("MaterialGRN","view")){
              echo '<li><a href="grn_management.php">GRN Detailed Report</a></li>';
            }
            if(Functions::check_privilege_by_module_action("Inventory","view")){
              echo '<li><a href="inventory_management.php">All Inventory Management</a></li>';
            }
            if(Functions::check_privilege_by_module_action("Inventory","view")){
              echo '<li><a href="repair_inventory_management.php">Repair Inventory Management</a></li>';
              echo '<li><a href="main_inventory_management.php">Main Inventory Management</a></li>';
            }
            if(Functions::check_privilege_by_module_action("Inventory","view")){
              echo '<li><a href="bin_card.php">Bin Card</a></li>';
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
