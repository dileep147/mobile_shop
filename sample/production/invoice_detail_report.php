<?php
require_once './../util/initialize.php';
include 'common/upper_content.php';
?>

<!--page content-->

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Invoice Detail By Date Range</h3>
            </div>

            <div class="title_right">

            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="row" id="divInvoice">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2 id="title">Select Date Range</h2>
                            <button type="button" id="btn_print" class="btn btn-default" style="float: right;"><i class="glyphicon glyphicon-print"></i>  Print</button>

                            <div class="clearfix"></div>
                        </div>



                        <!--========================================================-->

                        <div class="x_content">

                            <div class="container-fluid  ">

                                <ul class="nav nav-tabs bar_tabs" >
                                    <li class="active"><a data-toggle="tab" href="#div1" id="div_clear1">Customer Vise Filter</a></li>
                                    <li ><a data-toggle="tab" href="#div2" id="div_clear2">Date Range Filter</a></li>
                                </ul>

                                <div class="tab-content">
                                    <div id="div1" class="tab-pane fade in active">
                                        <!--<div class="form-group col-md-6 col-sm-6 col-xs-12 ">-->
                                        <label>Select Customer</label>
                                        <div class="ui-widget">
                                            <select class="form-control" id="cmbFilter" name="filter_id" required="">
                                                <option selected="" value="0">Select Customer</option>
                                                <option value="all">All Invoices</option>
                                                <option value="retail">Retail Invoices</option>
                                                <?php
                                                foreach (Customer::find_all() as $customer) {
                                                    ?>
                                                    <option value="<?php echo $customer->id; ?>"><?php echo $customer->name; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <!--</div>-->
                                    </div>
                                    <div id="div2" class="tab-pane fade">
                                        <div class="form-group col-md-5 col-sm-5 col-xs-5">
                                            <label>From :</label>
                                            <input type="text" class="form-control" id="dtpFrom" name="dtpFrom" placeholder="yyyy-mm-dd"/>
                                        </div>

                                        <div class="form-group col-md-5 col-sm-5 col-xs-5">
                                            <label>To :</label>
                                            <input type="text" class="form-control" id="dtpTo" name="dtpTo" placeholder="yyyy-mm-dd"/>
                                        </div>

                                        <div class="form-group col-md-2 col-sm-2 col-xs-2 ">
                                            <label>&nbsp;</label>
                                            <div class="ui-widget">
                                                <button id="btnShow" name="btnShow" class="btn btn-default">Show <i class="glyphicon glyphicon-arrow-down"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <br/>
                        </div>

                    </div>
                </div>
            </div>
            <!--<div class="col-md-12 col-sm-12 col-xs-12" >-->
            <div class="x_panel" id="print_div">
                <div class="x_title" style="background-color: gray;color:white;border-radius: 5px 5px 0px 0px;"><h3><center>Invoice Detail Report</center></h3></div>
                <div class="x_content">
                    <div class="table-responsive">

                        <table id="sata_table" class="table table-striped " cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Invoice No</th>
                                    <th>Customer</th>
                                    <th>Invoice Date</th>
                                    <th>Invoiced Amount</th>
                                    <th>Cost Amount</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody id="table_body">

                            </tbody>
                            <tfoot id="table_footer" style="background-color: gray;color:white;border-radius: 0px 0px 5px 5px;">
                                <tr>
                                    <th>Invoiced Total</th>
                                    <td id="invoiced_total"></td>
                                    <th>Total Cost</th>
                                    <td id="total_cost"></td>
                                    <th>Profit / Loss</th>
                                    <td id="profit"></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <!--</div>-->
        </div>
    </div>
</div>

<?php include 'common/bottom_content.php'; ?>

<script>



    $('#div_clear1').click(function () {
        $('#table_body').empty();
        $('#invoiced_total').html("0.00");
        $('#total_cost').html("0.00");
        $('#profit').html("0.00");
        $("#dtpFrom").val("yyyy-mm-dd");
        $("#dtpTo").val("yyyy-mm-dd");


    });

    $('#div_clear2').click(function () {
        $('#table_body').empty();
        $('#invoiced_total').html("0.00");
        $('#total_cost').html("0.00");
        $('#profit').html("0.00");
        $('#cmbFilter').prop('selectedIndex', 0);

    });

    $(function () {
        $("#dtpFrom").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'yy-mm-dd'
        });
    });

    $(function () {
        $("#dtpTo").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'yy-mm-dd'
        });
    });

    $('#btnShow').click(function () {
        submitData();


    });

    function submitData() {
        var from = $("#dtpFrom").val();
        var to = $("#dtpTo").val();

        $.ajax({
            type: 'POST',
            url: "proccess/invoice_detail_report_process.php",
            data: {invoice_report: true, from: from, to: to},
            dataType: 'json',
            async: false,
            success: function (data) {
//                alert(data);
                $('#table_body').empty();
                var trHTML = "";
                $.each(data, function (index, value) {
                    trHTML += "<tr ><td>" + value["code"] + "</td><td>" + value["date_time"] + "</td><td>" + value["customer_name"] + "</td><td>" + value["net_amount"] + " LKR</td><td>" + value["invoice_cost"] + " LKR</td><td></tr>";

                });


//                   var trFootHTML = "";
                $.each(data, function (index, value) {
                    var total_cost = 0;
                    $('#invoiced_total').html(value["invoice_total"] + " LKR");
//
                    var total_cost = value["final_cost"];
                    $('#total_cost').html(total_cost + " LKR");
                    var profit = (value["invoice_total"]) - (total_cost);
//
                    $('#profit').html(profit + ". LKR");

                });

                $('#table_body').append(trHTML);
//
            },
            error: function (xhr) {
                alert(xhr.responseText);
            }
        });
    }

    //print_div

    $('#btn_print').click(function () {
        PrintDiv();
    });

    function PrintDiv() {
        var divToPrint = document.getElementById('print_div');
        var popupWin = window.open('', '_blank', 'width=800,height=500');
        popupWin.document.open();
        popupWin.document.write('<html><head><link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"></head><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
    }

    //select customer////////////////////////////////////////

    $('#cmbFilter').change(function () {
        submitCustomerData();
    });


    function submitCustomerData() {
        var customer_id = $("#cmbFilter").val();

        $.ajax({
            type: 'POST',
            url: "proccess/invoice_detail_customer_report_process.php",
            data: {customer_invoice_report: true, customer_id: customer_id},
            dataType: 'json',
            async: false,
            success: function (data) {
//                alert(data);
                $('#table_body').empty();
                $('#invoiced_total').html("0.00");
                $('#total_cost').html("0.00");
                $('#profit').html("0.00");

                var trHTML = "";
                $.each(data, function (index, value) {
                    trHTML += "<tr ><td>" + value["code"] + "</td><td>" + value["date_time"] + "</td><td>" + value["customer"] + "</td><td>" + value["net_amount"] + " LKR</td><td>" + value["invoice_cost"] + " LKR</td><td></tr>";

                });


//                   var trFootHTML = "";
                $.each(data, function (index, value) {

                    $('#invoiced_total').html(value["invoice_total"] + " LKR");
//
                    var total_cost = value["final_cost"];
                    $('#total_cost').html(total_cost + " LKR");
                    var profit = (value["invoice_total"]) - (total_cost);
//
                    $('#profit').html(profit + ".00 LKR");

                });

                $('#table_body').append(trHTML);
//
            },
            error: function (xhr) {
                alert(xhr.responseText);
            }
        });
    }
</script>
