<?php
require_once './../util/initialize.php';
include 'common/upper_content.php';
?>

<!--page content-->

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Location Management</h3>
            </div>

            <div class="title_right">

            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <a href="deliverer.php"><button id="btnNew" type="button" class="btn btn-round btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="glyphicon glyphicon-plus"></i> Add New</button></a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>ID </th>
                                    <th>Name </th>
                                    <th>Vehicle No </th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                $total_records = Deliverer::row_count();
                                $pagination = new Pagination($total_records);
                                $objects = Deliverer::find_all_by_limit_offset($pagination->records_per_page, $pagination->offset());

                                foreach ($objects as $deliverer) {
                                    $deliverer_users=array();
                                    if($db_deliverer_users= DelivererUser::find_all_by_deliverer_id($deliverer->id)){
                                        foreach ($db_deliverer_users as $deliverer_user) {
                                            $deliverer_users[]=$deliverer_user->user_id()->name;
                                        }
                                    }
                                    ?>
                                    <tr>
                                        <td><?php echo $deliverer->id ?></td>
                                        <td><?php echo $deliverer->name ?></td>
                                        <td><?php echo $deliverer->number ?></td>
                                        <td>
                                            <a href="deliverer.php?id=<?php echo Functions::custom_crypt($deliverer->id); ?>">
                                                <button class="btn btn-primary btn-xs" ><i class="glyphicon glyphicon-edit"></i> Edit</button>
                                            </a>
                                            <a href="invoice.php?deliverer_id=<?php echo Functions::custom_crypt($deliverer->id); ?>">
                                                <button class="btn btn-primary btn-xs" ><i class="glyphicon glyphicon-edit"></i> Invoice</button>
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
