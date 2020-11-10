<?php
require_once './../util/initialize.php';
include 'common/upper_content.php';
?>

<!--page content-->

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>User Management</h3>
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
                        <a href="user.php" target="_blank"><button id="btnNew" type="button" class="btn btn-round btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="glyphicon glyphicon-plus"></i> Add New</button></a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Full Name</th>
                                    <th>Username</th>
                                    <th>NIC</th>
                                    <th>Contact No</th>
                                    <th>e-Mail</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                    <th class="col-sm-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php


                                $objects = User::find_all();

                                foreach ($objects as $user) {
                                    ?>
                                    <tr>
                                        <td><?php echo $user->id ?></td>
                                        <td><?php echo $user->name ?></td>
                                        <td><?php echo $user->username ?></td>
                                        <td><?php echo $user->nic ?></td>
                                        <td><?php echo $user->contact_no ?></td>
                                        <td><?php echo $user->email ?></td>
                                        <td><?php echo $user->address ?></td>
                                        <?php if($user->soft_delete == 1){ ?>
                                          <td><b style="color:red;">DELETED</b></td>
                                        <?php }else{ ?>
                                        <td><?php echo $user->user_status_id()->name ?></td>
                                        <?php } ?>
                                        <td>
                                            <form action="user.php" method="post" style="float: left;">
                                                <input type="hidden" name="id" value="<?php echo $user->id ?>"/>
                                                <button type="submit" name="view" class="btn btn-primary btn-xs" ><i class="glyphicon glyphicon-edit"></i> Edit</button>
                                            </form>
                                            <form action="user_profile.php" method="post" >
                                                <input type="hidden" name="user_id" value="<?php echo $user->id ?>"/>
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
