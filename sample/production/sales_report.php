<?php
require_once './../util/initialize.php';
include 'common/upper_content.php';
?>

<!--page content-->

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Sales Report By Date Range</h3>
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
                        <div class="x_content">
                            <div class="container-fluid divBackTopTable ">
                                <div class="form-group col-md-5 col-sm-5 col-xs-5">
                                    <label>From :</label>
                                    <input type="text" class="form-control" id="dtpFrom" name="dtpFrom"/>
                                </div>

                                <div class="form-group col-md-5 col-sm-5 col-xs-5">
                                    <label>To :</label>
                                    <input type="text" class="form-control" id="dtpTo" name="dtpTo"/>
                                </div>

                                <div class="form-group col-md-2 col-sm-2 col-xs-2 ">
                                    <label>&nbsp;</label>
                                    <div class="ui-widget">
                                        <button id="btnShow" name="btnShow" class="btn btn-default">Show <i class="glyphicon glyphicon-arrow-down"></i></button>
                                    </div>
                                </div>

                            </div>
                            <br/>

                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12" id="print_div">
                    <div class="x_panel">
                        <div class="x_title" style="background-color: gray;color:white;border-radius: 5px 5px 0px 0px;"><h3><center>Sales Report</center></h3></div>
                        <div class="x_content">
                            <div class="table-responsive">

                                <table id="sata_table" class="table table-striped " cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Invoice No</th>
                                            <th>Invoice Date</th>
                                            <th>Customer</th>
                                            <th>Invoiced Amount</th>
                                            <th>Cost Amount</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table_body">
                                    </tbody>
                                    <!-- <tfoot id="table_footer" style="background-color: gray;color:white;border-radius: 0px 0px 5px 5px;">
                                        <tr>
                                            <th>Invoiced Total</th>
                                            <td id="invoiced_total"></td>
                                            <th>Total Cost</th>
                                            <td id="total_cost"></td>
                                            <th>Profit / Loss</th>
                                            <td id="profit"></td>
                                        </tr>
                                    </tfoot> -->
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->

<?php include 'common/bottom_content.php'; ?>

<script>

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

        var trHTML = "";
        $.ajax({
            type: 'POST',
            url: "proccess/invoice_detail_report_process.php",
            data: {invoice_report: true, from: from, to: to},
            dataType: 'json',
            async: false,
            success: function (data) {
                $('#table_body').empty();
                var style=" style='text-align: right;' ";
                var style1=" style='background-color: gray;color:white;border-radius: 0px 0px 5px 5px;' ";
                $.each(data.invoices, function (index, value) {
                    trHTML += "<tr ><td>" + value["code"] +"</td><td>" + value["date_time"] + "</td><td>" + value["customer_name"] + "</td><td "+style+">" + value["net_amount"] +"</td><td "+style+">" + value["invoice_cost"] + "</td><td></tr>";

                });

                trHTML += "<tr "+style1+">"
                        +"<td></td>"
                        +"<td></td>"
                        +"<td></td>"
                        +"<td "+style+">" + data.total_amount +"</td>"
                        +"<td "+style+">" + data.total_cost + "</td>"
                        +"</tr>";

                trHTML += "<tr "+style1+">"
                        +"<td></td>"
                        +"<td></td>"
                        +"<td></td>"
                        +"<td "+style+">Profit / Loss</td>"
                        +"<td "+style+">" + data.profit + "</td>"
                        +"</tr>";

                // $('#invoiced_total').html(data.total_amount+" LKR");
                // $('#total_cost').html(data.total_cost+" LKR");
                // $('#profit').html(data.profit+ " LKR");

            },
            error: function (xhr){
                alert(xhr.responseText);
            }
        });

        $('#table_body').append(trHTML);
    }

    //print_div

    $('#btn_print').click(function (){
      PrintDiv();
    });

    function PrintDiv() {
        var divToPrint = document.getElementById('print_div');
        var popupWin = window.open('', '_blank', 'width=800,height=500');
        popupWin.document.open();
        popupWin.document.write('<html><head><link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"></head><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
    }
</script>
