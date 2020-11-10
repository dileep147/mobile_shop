<?php
require_once './../util/initialize.php';
include 'common/upper_content.php';
?>

<!--page content-->

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Expences Report</h3>
            </div>

            <div class="title_right">

            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        
                        
                        
                        <div class="x_content">
                            
                            <form method="post" action="expences_report.php">
                            <div class="container-fluid ">
                                <div class="form-group col-md-3 col-sm-3 col-xs-3">
                                    <label>Expence Category :</label>
                                    <select class="form-control" name="category" >
                                        <?php 
                                            foreach(ExpenceCat::find_all() as $data){
                                                echo "<option value='".$data->id."'>".$data->cat_name."</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                                
                                <div class="form-group col-md-3 col-sm-3 col-xs-3">
                                    <label>From :</label>
                                    <input type="text" class="form-control" id="dtpFrom" name="dtpFrom" autocomplete="off" />
                                </div>

                                <div class="form-group col-md-3 col-sm-3 col-xs-3">
                                    <label>To :</label>
                                    <input type="text" class="form-control" id="dtpTo" name="dtpTo" autocomplete="off" />
                                </div>

                                <div class="form-group col-md-3 col-sm-3 col-xs-3 ">
                                    <label>&nbsp;</label>
                                    <div class="ui-widget">
                                        
                                        <input type="submit" class="btn btn-primary" value="Submit">
                                        
                                    </div>
                                </div>

                            </div>
                            
                            </form>
                            <br/>

                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12" id="print_div">
                    <div class="x_panel">
                        <div class="x_title" style="background-color: gray;color:white;border-radius: 5px 5px 0px 0px;"><h3><center>Expences Report</center></h3></div>
                        <div class="x_content">
                            <div class="table-responsive">

                                <table id="sata_table" class="table table-striped " cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Note</th>
                                            <th>Expence Category</th>
                                            <th>Expence Date</th>
                                            <th style='text-align:right;'>Amount</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php
                                        $total = 0;
                                        if( isset($_POST['category']) ){
                                            
                                            $cat = $_POST['category'];
                                            $from = $_POST['dtpFrom'];
                                            $to = $_POST['dtpTo'];
                                            
                                        foreach(DailyExpences::find_by_cat_range($cat,$from,$to) as $data){
                                            echo "<tr>";
                                            echo "<td>".$data->Note."</td>";
                                            echo "<td>".$data->expence_cat()->cat_name."</td>";
                                            echo "<td>".$data->exp_date."</td>";
                                            echo "<td style='text-align:right;'>".number_format($data->amount,2)."</td>";
                                            echo "</tr>";
                                            $total =$total + $data->amount;
                                        }
                                        
                                        echo "<tr><td colspan='3' style='text-align:right;' ><b>TOTAL:</b> </td><td style='text-align:right;' ><b>".number_format($total,2)."</b></td></tr>";
                                        
                                        }
                                        ?>
                                        
                                    </tbody>
                                    
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
