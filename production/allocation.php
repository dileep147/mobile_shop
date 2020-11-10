<?php
require_once './../util/initialize.php';
include 'common/upper_content.php';

if (!(isset($_POST["id"]) && $allocation = Allocation::find_by_id($_POST["id"]))) {
    $allocation = new Allocation();
}
?>

<!--page content-->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Allocation</h3>
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
                        <h2 id="title"><?php echo (empty($allocation->id)) ? 'Add' : 'Edit'; ?> Allocation</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form id="formRole" action="proccess/allocation_process.php" method="post" class="form-horizontal form-label-left" >
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="hidden" class="form-control" id="txtId" name="id" value="<?php echo $allocation->id; ?>" />
                                
                                <div class="col-md-4 col-sm-4 col-xs-4 ">
                                    <div class="form-group">
                                        <label>Job No:</label>
                                       
                                            <select class="form-control" name="repair_id">
                                            
                                            <?php
                                                foreach(DeviceRepair::find_all() as $data){
                                                    if( $allocation->repair_id == $data->id ){
                                                        echo "<option value='".$data->id."' selected>".$data->job_no."</option>";

                                                    }else{
                                                    echo "<option value='".$data->id."'>".$data->job_no."</option>";

                                                    }
                                                }
                                            ?>
                                            </select>
                                    </div>
                                </div>        
                 
                                

                                <div class="col-md-4 col-sm-4 col-xs-4 ">
                                    <div class="form-group">
                                    <label>Device Products:</label>
                    
                                        <select class="form-control" name="batch_id">
                                            <?php
                                                foreach(Batch::find_all() as $data){
                                                    $inv_data = Inventory::find_by_batch_id($data->id);

                                                    if($inv_data->qty > 0){
                                                        if( $allocation->batch_id == $data->id ){
                                                            echo "<option value='".$data->id."' selected>".$data->product_id()->name."</option>";

                                                        }else{
                                                            echo "<option value='".$data->id."'>".$data->product_id()->name."</option>";

                                                        }
                                                    }

                                                    

                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group col-md-6 col-sm-6 col-xs-6">
                                    <label>Quantity</label>
                                        <input type="number" id="numQty" name="quantity" value="1" required="required" min="1" max="5000" class="form-control col-md-7 col-xs-12">
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-6 ">
                                    <div class="form-group">
                                        <label>Price (LKR):</label>
                                            <input type="text" class="form-control" placeholder="Price" name="price" value="<?php echo $allocation->price; ?>" required>
                                    </div>
                                </div>

                                <div class="modal-footer col-md-12 col-sm-12 col-xs-12">
                                    <div class=" col-md-4 col-sm-4 col-xs-12">
                                        <!--<button id="btnSave" type="submit" name="save" class="btn btn-block btn-success" onclick="return validateForm()"><i class="fa fa-floppy-o"></i> Save</button>-->
                                        <button id="btnSave" type="button" name="save" class="btn btn-block btn-success"><i class="fa fa-floppy-o"></i> Save</button>
                                    </div>
                                    <div class=" col-md-4 col-sm-4 col-xs-12" style="display: <?php echo (empty($allocation->id)) ? 'none' : 'initial'; ?>">
                                        <!--<button id="btnDelete" type="submit" name="delete" class="btn btn-block btn-danger" onclick="return confirmDelete(this);"><i class="fa fa-trash"></i> Delete</button>-->
                                        <button id="btnDelete" type="button" name="delete" class="btn btn-block btn-danger" ><i class="fa fa-trash"></i> Delete</button>
                                    </div>
                                    <div class=" col-md-4 col-sm-4 col-xs-12">
                                        <a href="allocation.php"><button type="button" name="reset" class="btn btn-block btn-primary"><i class="fa fa-history"></i> Reset</button></a>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/page content-->
<?php include 'common/bottom_content.php'; ?> bottom content
<script>
    window.onload = function () {
//        $.alert({
//            type: 'red',
//            title: 'Welcome!',
//            content: 'Mahesh!',
//        });
    };

    function getErrors(){
        var errors = new Array();
        var element;
        var element_value;

        element=$("#txtName");
        element_value=element.val();
        if ( element_value === "") {
            errors.push("Name - Invalid");
            element.css({"border": "1px solid red"});
        }else{
            element.css({"border": "1px solid #ccc"});
        }

        return errors;
    }

    function validateForm() {
        var errors = getErrors();
        if (errors === undefined || errors.length === 0) {
            return true;
        } else {
            $.alert({
                icon: 'fa fa-exclamation-circle',
                backgroundDismiss: true,
                type: 'red',
                title: 'Validation error!',
                content: errors.join("</br>")
            });
            return false;
        }
    }

    $("#btnSave").click(function () {
        var id = <?php echo ($allocation->id) ? 1 : 0; ?>;

        if (id) {
            if (UserPrivileges.checkPrivilege("proccess/privileges_authenticate.php", "Role", "upd")) {
                FormOperations.confirmSave(validateForm(), "#formRole", id, null);
            }
        } else {
            if (UserPrivileges.checkPrivilege("proccess/privileges_authenticate.php", "Role", "ins")) {
                FormOperations.confirmSave(validateForm(), "#formRole", id, null);
            }
        }
    });

    $("#btnDelete").click(function () {

        if (UserPrivileges.checkPrivilege("proccess/privileges_authenticate.php", "Role", "del")) {
            FormOperations.confirmDelete("#formRole");
        }
    });
</script>
