<?php
require_once './../util/initialize.php';
include 'common/upper_content.php';

if (!(isset($_POST["id"]) && $cheque = Cheque::find_by_id($_POST["id"]))) {
    $cheque = new Cheque();
}
?>

<!--page content--> 
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Cheque</h3>
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
                        <h2 id="title"><?php echo (empty($cheque->id)) ? 'Add' : 'Edit'; ?> Cheque</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form id="formCheque" action="proccess/cheque_proccess.php" method="post" class="form-horizontal form-label-left" >
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="hidden" class="form-control" id="txtId" name="id" value="<?php echo $cheque->id; ?>" />
                                <div class="form-group">
                                    <label>Bank</label>
                                    <!--<input type="text" class="form-control" placeholder="Bank" id="txtBank" name="bank" value="<?php echo $cheque->bank; ?>" required="">-->
                                    <select class="form-control" id="cmbBank" name="bank_id" required="">
                                        <option disabled="" selected="">Select Bank</option>

                                        <?php
                                        foreach (Bank::find_all() as $bank) {
                                            if ($bank->id == $cheque->bank_id) {
                                                ?>
                                                <option selected="" value="<?php echo $bank->id; ?>"><?php echo $bank->name; ?></option>
                                                <?php
                                            } else {
                                                ?>
                                                <option value="<?php echo $bank->id; ?>"><?php echo $bank->name; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Cheque</label>
                                    <input type="text" class="form-control" placeholder="Cheque No" id="txtChequeNo" name="chequeno" value="<?php echo $cheque->cheque_no; ?>" required="">
                                </div>
                                <div class="form-group">
                                    <label>Amount</label>
                                    <input type="text" class="form-control" placeholder="Amount" id="txtAmount" name="amount" value="<?php echo $cheque->amount; ?>" required="">
                                </div>
                                <div class="form-group">
                                    <label>Date</label>
                                    <input type="text" class="form-control" placeholder="yyyy-mm-dd" id="cdate" name="cdate" value="<?php echo $cheque->date; ?>" required="">
                                </div>
<!--                                <div class="form-group">
                                    <label>Cheque Status</label>
                                    <select class="form-control" id="cmbStatus" name="cheque_status_id" required="">
                                        <option disabled="" selected="">Select Status</option>
                                        <?php
//                                        foreach (ChequeStatus::find_all() as $category) {
//                                            if ($category->id == $cheque->cheque_status_id) {
                                                ?>
                                                <option selected="" value="<?php // echo $category->id; ?>"><?php // echo $category->name; ?></option>
                                                <?php
//                                            } else {
                                                ?>
                                                <option value="<?php // echo $category->id; ?>"><?php // echo $category->name; ?></option>
                                                <?php
//                                            }
//                                        }
                                        ?>
                                    </select>
                                </div>-->

                                <div class="modal-footer col-md-12 col-sm-12 col-xs-12">
                                    <div class=" col-md-4 col-sm-4 col-xs-12">
                                        <button id="btnSave" type="button" name="save" class="btn btn-block btn-success"><i class="fa fa-floppy-o"></i> Save</button>
                                    </div>
                                    <div class=" col-md-4 col-sm-4 col-xs-12" style="display: <?php echo (empty($cheque->id)) ? 'none' : 'initial'; ?>">
                                        <button id="btnDelete" type="button" name="delete" class="btn btn-block btn-danger" ><i class="fa fa-trash"></i> Delete</button>
                                    </div>
                                    <div class=" col-md-4 col-sm-4 col-xs-12">
                                        <a href="cheque.php"><button type="button" name="reset" class="btn btn-block btn-primary"><i class="fa fa-history"></i> Reset</button></a>
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
        $("#cdate").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'yy-mm-dd'
        });
    });

    function getErrors() {
        var errors = new Array();
        var element;
        var element_value;

        element = $("#cmbBank");
        element_value = element.val();
        if (element_value) {
            element.css({"border": "1px solid #ccc"});
        } else {
            errors.push("Bank - Not selected");
            element.css({"border": "1px solid red"});            
        }

        element = $("#txtChequeNo");
        element_value = element.val();
        if (element_value === "") {
            errors.push("Cheque - Invalid");
            element.css({"border": "1px solid red"});
        } else {
            element.css({"border": "1px solid #ccc"});
        }

        element = $("#txtAmount");
        element_value = element.val();
        if (element_value === "" || !(new RegExp("^[0-9]+\.[0-9]{0,2}$").test(element_value))) {
            errors.push("Amount - Invalid");
            element.css({"border": "1px solid red"});
        } else {
            element.css({"border": "1px solid #ccc"});
        }

        element = $("#cdate");
        element_value = element.val();
        if (element_value === "") {
            errors.push("Cheque Date - Invalid");
            element.css({"border": "1px solid red"});
        } else {
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
//        confirmSave();
        var id = <?php echo ($cheque->id) ? 1 : 0; ?>;
        FormOperations.confirmSave(validateForm(), "#formCheque", id);
    });

    $("#btnDelete").click(function () {
//        confirmDelete();
        FormOperations.confirmDelete("#formCheque");
    });

</script>
