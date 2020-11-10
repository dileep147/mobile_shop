<?php
require_once './../util/validate_login.php';
require_once './../util/initialize.php';
include 'common/upper_content.php';

unset($_SESSION["transfer_return_item"]);

?>

<!--page content-->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Stock Transfer</h3>
            </div>
            <div class="title_right">
            </div>
        </div>

        <div class="clearfix"></div>

        <?php Functions::output_result(); ?>

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="x_panel">

                    <div class="x_content">
                        <form class="form-horizontal" method="post" action="proccess/stock_transfer_process_new.php">

                            <div class="col-sm-7" style="padding:5px;">
                                <div class="form-group">
                                    <label>Transfer Date</label>
                                    <input type="text" id="txtDateTime" name="date_time" placeholder="yyyy-mm-dd HH:mm:ss" class="form-control" value="<?php echo date("Y-m-d h:i:s"); ?>" autocomplete="off" />
                                </div>
                            </div>

                            <div class="col-sm-6" style="padding:5px;">
                                <div class="form-group">
                                    <label>From</label>
                                    <select class="form-control selectpicker" name="transfer_from"  data-live-search="true" >
                                        <option value="0" selected disabled> Select From</option>
                                        <?php
                                        foreach (Deliverer::find_all() as $data) {
                                            ?>
                                            <option value="<?php echo $data->id; ?>"><?php echo $data->name; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-6" style="padding:5px;">
                                <div class="form-group">
                                    <label>To</label>
                                    <select class="form-control selectpicker" name="transfer_to"  data-live-search="true" >
                                        <option value="0" selected disabled> Select To</option>
                                        <?php
                                        foreach (Deliverer::find_all() as $data) {
                                            ?>
                                            <option value="<?php echo $data->id; ?>"><?php echo $data->name; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>


                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Products</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">



                            <div class="col-sm-12" style="padding:5px;">
                                <div class="form-group">
                                    <label>Item Name</label>
                                    <select class="form-control selectpicker"  data-live-search="true" id="cmbFilter" >
                                        <option value="0" selected disabled> Select Item</option>
                                        <?php
                                        foreach (Product::find_all() as $product) {
                                            ?>
                                            <option value="<?php echo $product->id; ?>"><?php echo $product->name; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Batch</label> <br/>
                                    <select class="form-control" id="cmbBatch" name="invoice_id">
                                        <option value="0" selected disabled> Select Batch</option>

                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Qty</label> <br/>
                                    <input class="form-control" type="text" id="cmbQty" name="qty">
                                </div>
                            </div>


                            <div class="col-sm-12" style="padding:5px;">
                                <button id="btnAdd" type="button" class="btn btn-primary"><i class="fa fa-arrow-circle-down"></i> Add</button>
                            </div>



                            <div class="col-sm-12" id="txtHint">

                            </div>


                            <div class="clearfix"></div>


                        </div>

                    </div>
                </div>


                <div class="col-md-12 col-sm-12 col-xs-12">

                    <div class="x_panel">

                        <div class="x_content">
                            <button type="submit" id="btnAdd" class="btn btn-primary btn-block"><i class="fa fa-arrow-circle-right"></i> Transfer </button>
                        </div>
                    </div>
                </form>
            </div>


        </div>
    </div>
</div>
<!--/page content-->

<?php include 'common/bottom_content.php'; ?>

<script>

    $('#txtDateTime').datetimepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd',
        timeFormat: 'HH:mm:ss'
    });


    // product table complete

    function showHint(str) {

        if (str.length == 0) {
            document.getElementById("txtHint").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("txtHint").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "proccess/LiveData/Tranfer_item_table.php?q=" + str, true);
            xmlhttp.send();
        }
    }


    // first section errors start

    function getInvoiceErrors() {
        var errors = new Array();
        var element;
        var element_value;


        element = $("#cmbQty");
        element_value = element.val();
        if (element_value !== "") {
            var invoice_id = $("#cmbInvoice").val();

        } else {
            errors.push("Invoice Amount - Invalid");
            element.css({"border": "1px solid red"});
        }

        return errors;
    }

    // first section error ends


    $("#cmbFilter").change(function () {
        var filter_id = $("#cmbFilter").val();
        loadInvoices(filter_id);
    });

    function loadInvoices(filter_id) {
        $('#cmbBatch').empty();
        var trHTML = "";
        trHTML += "<option value=''>Select Bacth</option>";
        $.ajax({
            type: 'POST',
            url: "proccess/stock_transfer_process_new.php",
            data: {invoice_request: true, filter_id: filter_id},
            dataType: 'json',
            async: false,
            success: function (data) {
                $.each(data, function (index, value) {
                    trHTML += "<option value='" + value["id"] + "'> Batch: " + value["code"] + " ( Retail: " + value["retail_price"] + ") ( Wholesale: " + value["wholesale_price"] + ") </option>";
                });
            }
        });
        $('#cmbBatch').append(trHTML);
    }


    $("#btnAdd").click(function (e) {
        e.preventDefault;
        addInvoice();
    });

    function addInvoice() {
        var errors = getInvoiceErrors();
        if (errors === undefined || errors.length === 0) {

            var customer_id = $("#cmbFilter").val();
            var batch_id = $("#cmbBatch").val();
            var qty = $("#cmbQty").val();
            var return_reason = $("#cmbReturnReason").val();
            var discount = $("#cmbDiscount").val();

            $.ajax({
                type: "POST",
                url: "proccess/stock_transfer_process_new.php",
                data: {add_invoice_payment: true, batch_id: batch_id, qty:qty },
                success: function (data) {
                    loadInvoiceForm();
                    new PNotify({
                        title: 'Success',
                        text: 'Product added to the table!',
                        type: 'success',
                        styling: 'bootstrap3'
                    });
                },
                error: function (xhr) {
                    $.alert(xhr.responseText);
                }
            });

            showHint(1);
        } else {
            $.alert({
                icon: 'fa fa-exclamation-circle',
                backgroundDismiss: true,
                type: 'red',
                title: 'Validation error!',
                content: errors.join("</br>")
            });
        }
    }





    function loadInvoiceForm() {
        $("#cmbQty").val(null);
        $("#cmbBatch").val(0);
        $("#cmbFilter").val(0);
        $("#cmbDiscount").val(0);
    }


    function removeReload(element) {
        $.ajax({
            type: "POST",
            url: "proccess/stock_transfer_process_new.php",
            data: {remove_reload: true, index: element.id},
            success: function (data) {

               showHint(1);

             // $("#cmbBatch").val(data.batch_id);
             // $("#cmbReturnReason").val(data.return_reason_id);
             // $("#numQty").val(data.qty);
             // $('#txtReturningPrice').val(data.unit_price);
             // setReasonColor(data.return_reason_id);
         }
     });
    }

</script>
