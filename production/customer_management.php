<?php
require_once './../util/initialize.php';
include 'common/upper_content.php';
?>

<!--page content--> 

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Customer Management</h3>
            </div>

            <div class="title_right">

            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <a href="customer.php" target="_blank"><button id="btnNew" type="button" class="btn btn-round btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="glyphicon glyphicon-plus"></i> Add New</button></a>
                        
                        <div class="clearfix"></div>
                        
                        <form method="post" action="customer_area_print.php" target="_blank">
                            <select name="area">
                                <?php 
                                    foreach(Route::find_all() as $data){
                                        echo "<option value='".$data->id."'>".$data->name."</option>";
                                    }
                                ?>
                            </select>
                            <button type="submit" class="btn btn-primary btn-xs">PRINT</button>
                        </form>
                        
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="tblMain" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Route</th>
                                    <th>Address</th>
                                    <th>Balance</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $total_records = Customer::row_count();
                                $pagination = new Pagination($total_records);
                                // $objects = Customer::find_all_by_limit_offset($pagination->records_per_page, $pagination->offset());
                                
                                $objects = Customer::find_all();

                                foreach ($objects as $customer) {
                                    ?>
                                    <tr>
                                        <td><?php echo $customer->code ?></td>
                                        <td><?php echo $customer->name ?></td>
                                        <td><?php echo $customer->phone ?></td>
                                        <td><?php echo $customer->email ?></td>
                                        <td><?php echo $customer->route_id()->name ?></td>
                                        <td><?php echo $customer->address ?></td>
                                        <td><?php echo $customer->balance ?></td>
                                        <td>
                                            <a href="customer.php?id=<?php echo Functions::custom_crypt($customer->id); ?>">
                                                <button class="btn btn-primary btn-xs" ><i class="glyphicon glyphicon-edit"></i> Edit</button>
                                            </a>
                                            <a href="customer_profile.php?id=<?php echo Functions::custom_crypt($customer->id); ?>" target='_blank'>
                                                <button class="btn btn-primary btn-xs" ><i class="glyphicon glyphicon-edit"></i> Profile</button>
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
    window.onfocus = function () {
//        location.reload(); 
    };

    $(document).ready(function () {
        $('#tblMain').DataTable({
            "paging": false,
//            "ordering": false,
            "info": false
        });
    });

</script>
