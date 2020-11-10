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
              <form method="post" action="pnl.php">
              <div class="container-fluid divBackTopTable ">
                
				<div class="form-group col-md-5 col-sm-5 col-xs-5">
                  <label>From :</label>
                  <input type="text" class="form-control" name="dtpFrom" autocomplete="off" required />
                </div>

                <div class="form-group col-md-5 col-sm-5 col-xs-5">
                  <label>To :</label>
                  <input type="text" class="form-control" name="dtpTo" autocomplete="off" required />
                </div>

                <div class="form-group col-md-2 col-sm-2 col-xs-2 ">
                  <label>&nbsp;</label>
                  <div class="ui-widget">
                    <button type="submit" name="btnShow" class="btn btn-default">Show <i class="glyphicon glyphicon-arrow-down"></i></button>
                  </div>
                </div>

              </form>

              </div>
              <br/>

            </div>
          </div>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12" id="print_div">
          <div class="x_panel">
            <div class="x_title" style="background-color: gray;color:white;border-radius: 5px 5px 0px 0px;"><h3><center>PROFIT AND LOSS REPORT</center></h3></div>
            <?php
            if(isset($_POST['dtpFrom']) && isset($_POST['dtpTo'])){
            ?>
            <div class="x_content">

              <label>Sales Profit</label>
              <div class="table-responsive">
                <table id="sata_table" class="table table-striped " cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>Invoice Cost Total</th>
                      <th>Invoice Whole Sale Total</th>
                      <th>Profit</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $InvoiceTotal = 0;
                    $start = $_POST['dtpFrom'];
                    $to = $_POST['dtpTo'];

                    $costtot = 0;
                    $wholetot = 0;
                    foreach(InvoiceInventory::find_all() as $invoicedata){
                      if( $start <= $invoicedata->invoice_id()->date_time && $to >= $invoicedata->invoice_id()->date_time){
                        $costtot = $costtot + $invoicedata->inventory_id()->batch_id()->cost;
                        $wholetot = $wholetot + $invoicedata->inventory_id()->batch_id()->wholesale_price;
                      }
                    }
                    echo "<tr>";
                    echo "<td>".number_format($costtot,2)."</td>";
                    echo "<td>".number_format($wholetot,2)."</td>";
                    echo "<td>".number_format($wholetot - $costtot,2)."</td>";
                    echo "</tr>";
                    $InvoiceTotal = $InvoiceTotal + $wholetot - $costtot;
                    ?>
                  </tbody>

                </table>
              </div>

              <hr/>

              <label>Expences</label>
              <div class="table-responsive">
                <table id="sata_table" class="table table-striped " cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>Date</th>
                      <th>Expences Name</th>
                      <th>Amount</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                  <?php
                  $expencetotal = 0;
                  foreach(DailyExpences::find_all() as $expdata){
                    if( $start <= $expdata->exp_date && $to >= $expdata->exp_date ){
                      echo "<tr>";
                      echo "<td>".$expdata->exp_date."</td>";
                      echo "<td>".$expdata->expence_cat()->cat_name."</td>";
                      echo "<td>".number_format($expdata->amount,2)."</td>";
                      echo "</tr>";
                      $expencetotal = $expencetotal + $expdata->amount;
                    }
                  }

                  ?>
                </table>
              </div>


            </div>
          <?php } ?>
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
        trHTML += "<tr ><td>" + value["code"] +"</td><td>" + value["date_time"] + "</td><td>" + value["customer_name"] + "</td><td>" + value["net_amount"] +" LKR</td><td>" + value["invoice_cost"] + " LKR</td><td></tr>";

      });


      //                   var trFootHTML = "";
      $.each(data, function (index, value) {
        var total_cost = 0;
        $('#invoiced_total').html(value["invoice_total"]+" LKR");
        //
        var total_cost =total_cost+(value["final_cost"]);
        $('#total_cost').html(total_cost+" LKR");
        var profit = (value["invoice_total"])-(total_cost);
        //
        $('#profit').html(profit+ " LKR");

      });

      $('#table_body').append(trHTML);
      //
    },
    error: function (xhr){
      alert(xhr.responseText);
    }
  });
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
