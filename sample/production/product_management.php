<?php
require_once './../util/initialize.php';
include 'common/upper_content.php';
?>

<!--page content-->

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Product Management</h3>
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
                        <a href="product.php"><button id="btnNew" type="button" class="btn btn-round btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="glyphicon glyphicon-plus"></i> Add New</button></a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>ROQ</th>
                                    <th>Warrenty Period</th>
                                    <th>Image</th>
                                    <th>Max Qty</th>
                                    <th>Min Qty</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $objects = Product::find_all();

                                foreach ($objects as $product) {
                                    ?>
                                    <tr>
                                        <td><?php echo $product->id ?></td>
                                        <td><?php echo $product->code ?></td>
                                        <td><?php echo $product->name ?></td>
                                        <td><?php echo $product->category_id()->name ?></td>
                                        <td><?php echo $product->roq ?></td>
                                        <td><?php echo $product->warrenty_period ?> Months</td>
                                        <td><img src='uploads/products/<?php echo $product->image ?>' style="width:70px;"></td>
                                        <td><?php echo $product->max_qty ?></td>
                                        <td><?php echo $product->min_qty ?></td>
                                        <td>
                                            <a href="product.php?id=<?php echo Functions::custom_crypt($product->id); ?>">
                                                <button class="btn btn-primary btn-xs" ><i class="glyphicon glyphicon-edit"></i> Edit</button>
                                            </a>
<!--                                            <form action="user_profile.php" method="post" target="_blank" >
                                                <input type="hidden" name="id" value="<?php // echo $product->id ?>"/>
                                                <button type="submit" name="view" class="btn btn-primary btn-xs" ><i class="glyphicon glyphicon-new-window"></i> View</button>
                                            </form>-->
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
