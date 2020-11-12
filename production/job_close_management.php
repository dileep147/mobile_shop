<?php
require_once './../util/initialize.php';
include 'common/upper_content.php';
?>

<!--page content-->

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Job Close Management</h3>
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
                        <a href="job_close.php" ><button id="btnNew" type="button" class="btn btn-round btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="glyphicon glyphicon-plus"></i> Add New</button></a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>ID</th>                                    
                                    <th>Job No</th>
                                    
                                    <th>Status</th>
                                    <th>Amount</th>
                                    <th>Warranty</th>
                                    <th>Comment</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php


                                $objects = JobClose::find_all();

                                foreach ($objects as $job) {
                                    ?>
                                    <tr>
                                        <td><?php echo $job->id ?></td>
                                        <td><?php echo $job->repair_id()->job_no?></td>
                                       
                                        <td><?php echo $job->status()->name ?></td> 
                                        <td><?php echo $job->amount ?></td> 
                                         <td><?php echo $job->warranty ?></td>               
                                        <td><?php echo $job->comment ?></td>

                                        <td>
                                            <form action="job_close.php" method="post"  style="float: left;">
                                                <input type="hidden" name="id" value="<?php echo $job->id ?>"/>
                                                <button type="submit" name="view" class="btn btn-primary btn-xs" ><i class="glyphicon glyphicon-edit"></i> Edit</button>
                                                 <a href='job_close_print.php?id=<?php echo $job->id ?>'  class='btn btn-success btn-xs' target='_blank'>Print</a>
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
