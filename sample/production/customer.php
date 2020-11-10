<?php
require_once './../util/initialize.php';

if (isset($_GET["id"])) {
    $id = Functions::custom_crypt($_GET["id"], 'd');
    if ($customer = Customer::find_by_id($id)) {

    } else {
        Session::set_error("Entry not available...");
        $customer = new Customer();
    }
} else {
    $customer = new Customer();
}

include 'common/upper_content.php';
?>

<!--page content-->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Customer</h3>
            </div>

            <div class="title_right">

            </div>
        </div>

        <div class="clearfix"></div>

        <?php Functions::output_result(); ?>

        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2 id="title"><?php echo (empty($customer->id)) ? 'Add' : 'Edit'; ?> Customer</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form id="formCustomer" action="proccess/customer_proccess.php" method="post" class="form-horizontal form-label-left" >
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="hidden" class="form-control" id="txtId" name="id" value="<?php echo $customer->id; ?>" />
                                <div class="form-group">
                                    <label>Code</label>
                                    <input type="text" id="txtCode" name="code" class="form-control" value="<?php echo (empty($customer->id)) ? Customer::getNextCode() : $customer->code; ?>" required="required" readonly=""/>
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" placeholder="Name" id="txtName" name="name" value="<?php echo $customer->name; ?>" required="" autofocus>
                                </div>
                                <div class="form-group">
                                    <label>NIC/Passport</label>
                                    <input type="text" class="form-control" placeholder="NIC/Passport" id="txtNic" name="nic" value="<?php echo $customer->nic; ?>" />
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" placeholder="Phone" id="txtPhone" name="phone" value="<?php echo $customer->phone; ?>" />
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" placeholder="Email" id="txtEmail" name="email" value="<?php echo $customer->email; ?>" />
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea class="form-control" id="txaAddress" name="address" placeholder="Enter Supplier Address"><?php echo $customer->address; ?></textarea>
                                </div>

                                <input type="hidden" name="route_id" value="1" required="">


                                <div class="modal-footer col-md-12 col-sm-12 col-xs-12">
                                    <div class=" col-md-4 col-sm-4 col-xs-12">
                                        <!--<button id="btnSave" type="submit" name="save" class="btn btn-block btn-success" onclick="return validateForm()"><i class="fa fa-floppy-o"></i> Save</button>-->
                                        <button id="btnSave" type="button" name="save" class="btn btn-block btn-success"><i class="fa fa-floppy-o"></i> Save</button>
                                    </div>
                                    <div class=" col-md-4 col-sm-4 col-xs-12" style="display: <?php echo (empty($customer->id)) ? 'none' : 'initial'; ?>">
                                        <!--<button id="btnDelete" type="submit" name="delete" class="btn btn-block btn-danger" onclick="return confirmDelete(this);"><i class="fa fa-trash"></i> Delete</button>-->
                                        <button id="btnDelete" type="button" name="delete" class="btn btn-block btn-danger" ><i class="fa fa-trash"></i> Delete</button>
                                    </div>
                                    <div class=" col-md-4 col-sm-4 col-xs-12">
                                        <a href="customer.php"><button type="button" name="reset" class="btn btn-block btn-primary"><i class="fa fa-history"></i> Reset</button></a>
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

    function getErrors() {
        var errors = new Array();
        var element;
        var element_value;
        return errors;
    }

//    function validate(element_id, regex, fail_message) {
//        var error = "";
//        var element = $("#" + element_id);
//        var element_value = element.val();
//        if (element_value) {
//            if (regex) {
//                if (element_value.test(regex)) {
//                    element.css({"border": "1px solid #ccc"});
//                    element.next().remove();
//                } else {
//                    element.after("<b style='color:red;'>" + fail_message + "</b>");
//                }
//            } else {
//                element.css({"border": "1px solid #ccc"});
//                element.next().remove();
//            }
//        } else {
//            element.css({"border": "1px solid red"});
//            element.after("<b style='color:red;'>The field is empty...</b>");
//        }
//        return error;
//    }

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
        var id = <?php echo ($customer->id) ? 1 : 0; ?>;

        if (id) {
            if (UserPrivileges.checkPrivilege("proccess/privileges_authenticate.php", "Customer", "upd")) {
                FormOperations.confirmSave(validateForm(), "#formCustomer", id);
            }
        } else {
            if (UserPrivileges.checkPrivilege("proccess/privileges_authenticate.php", "Customer", "ins")) {
                FormOperations.confirmSave(validateForm(), "#formCustomer", id);
            }
        }
    });

    $("#btnDelete").click(function () {
        if (UserPrivileges.checkPrivilege("proccess/privileges_authenticate.php", "Customer", "del")) {
            FormOperations.confirmDelete("#formCustomer");
        }
    });

////////////////////////////////////////////////////////////////////////////////////////////////////////
//
//    $("#btnSave").click(function () {
//        $.confirm({
//            icon: 'fa fa-question-circle',
//            type: 'green',
//            title: 'Save',
//            content: 'Are you sure you want to proceed ?',
//            buttons: {
//                yes: {
//                    text: 'Yes',
//                    btnClass: 'btn-green',
//                    keys: ['enter'],
//                    action: function () {
//                        var email=$("#txtEmail").val();
//                        var formData = Validatems.prepareData("#formCustomer",{ txtEmail:email });
//                        var result=Validatems.validateAndSubmit("proccess/customer_proccess.php","validateSave",formData);
//                        Validatems.displayResults(result);
//                    }
//                },
//                cancel: function () {
//                }
//            }
//        });
//    });



</script>
