<?php
require_once './../util/initialize.php';
include 'common/upper_content.php';
?>

<!--page content-->

<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Purchase Order Management</h3>
      </div>

      <div class="title_right">

      </div>
    </div>

    <div class="clearfix"></div>

    <?php Functions::output_result(); ?>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <a href="product_purchase_order.php"><button id="btnNew" type="button" class="btn btn-round btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="glyphicon glyphicon-plus"></i> Add Product PO</button></a>
            <!-- <a href="material_purchase_order.php" target="_blank"><button id="btnNew" type="button" class="btn btn-round btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="glyphicon glyphicon-plus"></i> Add Material PO</button></a> -->
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Code</th>
                  <th>Date</th>
                  <th>Supplier</th>
                  <th>Type</th>
                  <th>Status</th>
                  <th>User</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

                <?php


                $objects = PurchaseOrder::find_all();

                foreach ($objects as $purchase_order) {
                  ?>
                  <tr>
                    <td><?php echo $purchase_order->id ?></td>
                    <td><?php echo $purchase_order->code ?></td>
                    <td><?php echo $purchase_order->date ?></td>
                    <td><?php echo $purchase_order->supplier_id()->name ?></td>
                    <td><?php echo $purchase_order->purchase_order_type_id()->name ?></td>
                    <td><?php echo $purchase_order->purchase_order_status_id()->name ?></td>
                    <td><?php echo $purchase_order->user_id()->name ?></td>
                    <td>
                      <form action="<?php echo ($purchase_order->purchase_order_type_id == 1) ? "product_purchase_order.php" : "material_purchase_order.php" ?>" method="post" target="_blank" style="float: left;">
                        <?php
                        if ($purchase_order->purchase_order_status_id == 1) {
                          ?>
                          <input type="hidden" name="id" value="<?php echo $purchase_order->id ?>"/>
                          <button type="submit" name="view" class="btn btn-primary btn-xs" ><i class="glyphicon glyphicon-edit"></i> Edit</button>
                          <?php
                        }
                        ?>
                      </form>

                      <form action="<?php echo ($purchase_order->purchase_order_type_id == 1)?"product_grn.php":"material_grn.php";?>" method="post" target="_blank" >
                        <!--<form action="product_grn.php" method="post" target="_blank" >-->
                        <?php
                        if ($purchase_order->purchase_order_status_id == 1) {
                          if($purchase_order->purchase_order_type_id == 1) {
                            ?>
                            <input type="hidden" name="po_id" value="<?php echo $purchase_order->id ?>"/>
                            <button type="submit" name="view" class="btn btn-primary btn-xs" ><i class="glyphicon glyphicon-new-window"></i> Product GRN</button>
                            <?php
                          } else {
                            ?>
                            <input type="hidden" name="po_id" value="<?php echo $purchase_order->id ?>"/>
                            <button type="submit" name="view" class="btn btn-primary btn-xs" ><i class="glyphicon glyphicon-new-window"></i> Material GRN</button>
                            <?php
                          }
                        } else {
                          ?>
                          <label>
                            <?php echo "GRN : " . GRN::find_all_by_purchase_order_id($purchase_order->id)->code ?>
                          </label>
                          <?php
                        }
                        ?>
                      </form>
                    </td>
                  </tr>
                  <?php
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="x_panel">

        </div>
      </div>
    </div>
  </div>
</div>

<!--/page content-->
<?php include 'common/bottom_content.php'; ?>

<script>

$('#datatable-responsive').dataTable( {
  "paging": false
} );

</script>
