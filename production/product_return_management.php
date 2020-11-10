<?php
require_once './../util/initialize.php';
include 'common/upper_content.php';
?>

<!--page content--> 

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Product Return Management</h3>
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
                        <a href="invoice_return_by_deliverer.php" target="_blank">
                            <button id="btnNew" type="button" class="btn btn-round btn-primary" ><i class="glyphicon glyphicon-plus"></i> Add New</button>
                        </a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap " cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Date/Time</th>
                                    <th>Note</th>
                                    <th>Deliverer</th>
                                    <th>User</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody> 

                                <?php
                                
                                // $total_records = ProductReturn::row_count();
                                // $pagination = new Pagination($total_records);
                                $objects = ProductReturn::find_all();
                                
                                foreach ($objects as $product_return) {
                                    ?>
                                    <tr>
                                        <td><?php echo $product_return->id  ?></td>
                                        <td><?php echo $product_return->date_time ?></td>
                                        <td><?php echo $product_return->note ?></td>
                                        <td><?php echo $product_return->deliverer_id()->name ?></td>
                                        <td><?php echo $product_return->user_id()->name ?></td>
                                        <td>
                                            <form action="product_return_prev.php" method="post" target="_blank" style="float: left;">
                                                <input type="hidden" name="product_return_id" value="<?php echo $product_return->id ?>"/>
                                                <button type="submit" name="view" class="btn btn-primary btn-xs" ><i class="glyphicon glyphicon-new-window"></i> View</button>
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
                    <div onclick="window.location.href:''" class="x_content">
                        <?php
                        // echo $pagination->get_pagination_links_html1("product_return_management.php");
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--/page content--> 
<?php include 'common/bottom_content.php'; ?>

<script>
    window.onfocus = function () {
        // location.reload();
    };

    $('#datatable-responsive').dataTable( {
    "paging": false
} );
</script>