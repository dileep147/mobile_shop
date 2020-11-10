<?php
require_once './../util/initialize.php';
include 'common/upper_content.php';
?>

<!--page content-->

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Batch Management</h3>
            </div>

            <div class="title_right">

            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Product</th>
                                    <th>MFD</th>
                                    <th>Expire</th>
                                    <th>Cost</th>
                                    <th>Retail Price</th>
                                    <th>Whole sale Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php


                                $objects = Batch::find_all();

                                foreach ($objects as $batch) {
                                    ?>
                                    <tr>
                                        <td><?php echo $batch->code ?></td>
                                        <td><?php echo $batch->product_id()->name ?></td>
                                        <td><?php echo $batch->mfd ?></td>
                                        <td><?php echo $batch->exp ?></td>
                                        <td><?php echo $batch->cost ?></td>
                                        <td><?php echo $batch->retail_price ?></td>
                                        <td><?php echo $batch->wholesale_price ?></td>
                                        <td>
<!--                                            <form action="batch.php" method="post" target="_blank" style="float: left;">
                                                <input type="hidden" name="id" value="<?php // echo $batch->id ?>"/>
                                                <button type="submit" name="view" class="btn btn-primary btn-xs" ><i class="glyphicon glyphicon-edit"></i> Edit</button>
                                            </form>-->
                                            <a href="batch.php?id=<?php echo Functions::custom_crypt($batch->id); ?>">
                                                <button class="btn btn-primary btn-xs" ><i class="glyphicon glyphicon-edit"></i> Edit</button>
                                            </a>
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
                    <div onclick="window.location.href:''" class="x_content">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->

<?php include 'common/bottom_content.php'; ?>

<script>

$('#datatable-responsive').dataTable( {
  "paging": false
} );

</script>
