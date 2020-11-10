<?php
require_once './../util/initialize.php';


//if (!(isset($_POST["id"]) && $location_number = Batch::find_by_id($_POST["id"]))) {
//    $location_number = new Batch();
//}

if (!(isset($_POST["id"]) && $location_number = LocationNumber::find_by_id($_POST["id"]))) {
    $location_number = new LocationNumber();
}

include 'common/upper_content.php';
?>

<!--page content-->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Device Location and Number</h3>
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
                        <h2 id="title"><?php echo (empty($location_number->id)) ? 'Add' : 'Edit'; ?> Device Location and Number</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form id="formBatch" action="proccess/location_number_process.php" method="post" class="form-horizontal form-label-left" >
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="hidden" class="form-control" id="txtId" name="id" value="<?php echo $location_number->id; ?>" />
                                <div class="form-group">
                                    <label>Device Location or Number</label>
                                    <input type="text" class="form-control" placeholder="Name" id="txtid" name="name" value="<?php echo $location_number->name; ?>" required="">
                                </div>


                                <div class="modal-footer col-md-12 col-sm-12 col-xs-12">
                                    <div class=" col-md-4 col-sm-4 col-xs-12">
                                        <!--<button id="btnSave" type="submit" name="save" class="btn btn-block btn-success" onclick="return validateForm()"><i class="fa fa-floppy-o"></i> Save</button>-->
                                        <button id="btnSave" type="button" name="save" class="btn btn-block btn-success"><i class="fa fa-floppy-o"></i> Save</button>
                                    </div>
                                    <div class=" col-md-4 col-sm-4 col-xs-12" style="display: <?php echo (empty($location_number->id)) ? 'none' : 'initial'; ?>">
                                        <!--<button id="btnDelete" type="submit" name="delete" class="btn btn-block btn-danger" onclick="return confirmDelete(this);"><i class="fa fa-trash"></i> Delete</button>-->
                                        <button id="btnDelete" type="button" name="delete" class="btn btn-block btn-danger" ><i class="fa fa-trash"></i> Delete</button>
                                    </div>
                                    <div class=" col-md-4 col-sm-4 col-xs-12">
                                        <a href="location_number.php"><button type="button" name="reset" class="btn btn-block btn-primary"><i class="fa fa-history"></i> Reset</button></a>
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
<?php include 'common/bottom_content.php'; ?>

<script>
    window.onload = function () {
//        $.alert({
//            type: 'red',
//            title: 'Welcome!',
//            content: 'Mahesh!',
//        });
    };

    $(function () {
        $("#txtMfd").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'yy-mm-dd'
        });
    });

    $(function () {
        $("#txtExp").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'yy-mm-dd'
        });
    });

    function getErrors() {
        var errors = new Array();
        var element;
        var element_value;

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
        var id = <?php echo ($location_number->id) ? 1 : 0; ?>;
        if (id) {
            if (UserPrivileges.checkPrivilege("proccess/privileges_authenticate.php", "Batch", "upd")) {
                FormOperations.confirmSave(validateForm(), "#formBatch", id);
            }
        } else {
            if (UserPrivileges.checkPrivilege("proccess/privileges_authenticate.php", "Batch", "ins")) {
                FormOperations.confirmSave(validateForm(), "#formBatch", id);
            }
        }
    });

    $("#btnDelete").click(function () {
        if (UserPrivileges.checkPrivilege("proccess/privileges_authenticate.php", "Batch", "del")) {
            FormOperations.confirmDelete("#formBatch");
        }
    });



</script>
