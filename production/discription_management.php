<?php
require_once './../util/initialize.php';
include 'common/upper_content.php';
?>

<!--page content-->

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3 style="font-weight:800;">Discription Management</h3>
            </div>

            <div class="title_right">

            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
          <?php Functions::output_result(); ?>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <a href="discription.php"><button id="btnNew" type="button" class="btn btn-round btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="glyphicon glyphicon-plus"></i> Add New</button></a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Discription</th>
                                    <th>Price Discription</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php


                                $objects = Discription::find_all();

                                foreach ($objects as $data) {
                                    ?>
                                    <tr>
                                        <td><?php echo $data->id ?></td>
                                        <td><?php echo $data->discription ?></td>
                                        <td><?php echo $data->price_discription ?></td>
                                        <td>
                                            <form action="discription.php" method="post" style="float: left;">
                                                <input type="hidden" name="id" value="<?php echo $data->id ?>"/>
                                                <button type="submit" name="view" class="btn btn-primary btn-xs" ><i class="glyphicon glyphicon-edit"></i> Edit</button>
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


<?php include 'common/bottom_content.php'; ?> bottom content
<script>

$('#datatable-responsive').dataTable( {
  "paging": false
} );

</script>
