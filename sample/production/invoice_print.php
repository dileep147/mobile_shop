<?php
require_once './../util/initialize.php';
$invoice_id = $_GET['inv_id'];
$invoice = Invoice::find_by_id($invoice_id);

?>
<html>
<head>
  <script type="text/javascript" src="Resource/jquery.min.js"></script>
  <script src="resource/jquery.min.js"></script>
  <link rel="stylesheet" href="resource/css/bootstrap.min.css">
  <link rel="stylesheet" href="resource/css/bootstrap-theme.min.css">
  <script src="resource/js/bootstrap.min.js"></script>
  <script src="typeahead.min.js"></script>

</head>
<body>
  <div style=" width:250px;">
    <div>
      <div style="font-size:20px; text-align:center;">TITLE</div>
      <div style="font-size:10px; text-align:center;">-</div>
      <div style="font-size:10px; text-align:center;">-</div>
      <div style="font-size:10px; text-align:center;">-</div>
      <div style="font-size:12px; text-align:center;">-</div>
    </div>

    <div style="margin-bottom:-10px;margin-top:-15px;font-size:12px;">
    </br></br>
    DATE: <?php echo $invoice->date_time; ?></br>
    INVOICE NO:  <?php echo $invoice->id; ?></br>
    TERMINAL: 004</br>
  </div>

  ----------------------------------------------
  <div style="margin-bottom:-10px;font-size:12px;">
    <table width='100%'>
      <?php
      $invoice_total = 0;
      $invoice_total_qty = 0;
      $query_data = InvoiceInventory::find_all_by_invoice_id($invoice->id);
      foreach( $query_data as $invoice_data ){
        echo "<tr>";
        echo "<td colspan='4'>".$invoice_data->inventory_id()->product_id()->name."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td style='width:70px;'> </td>";
        echo "<td style='text-align:right;'>".$invoice_data->qty."</td>";
        $invoice_total_qty = $invoice_total_qty + $invoice_data->qty;
        echo "<td style='text-align:right;'>".number_format($invoice_data->price,2)."</td>";
        echo "<td style='text-align:right;'>".number_format($invoice_data->net_amount,2)."</td>";
        $invoice_total = $invoice_total + $invoice_data->net_amount;
        echo "<td></td>";
        echo "</tr>";
      }
      ?>
    </table>
  </div>
  ----------------------------------------------
<div style="margin-bottom:-10px;">
  <table style="width:100%;">
    <tr style="font-size:17px;">
      <td style='width:150px;'>GROSS AMOUNT:</td>
      <td style="text-align:right;"><?php echo number_format($invoice_total,2); ?></td>
    </tr>

    <tr style="font-size:12px;">
      <td>CASH:</td>
      <td style="text-align:right;"><?php echo number_format($invoice->payment,2); ?></td>
    </tr>

    <tr style="font-size:12px;">
      <td>BALANCE:</td>
      <td style="text-align:right;"><?php echo number_format(($invoice_total - $invoice->payment),2); ?></td>
    </tr>


  </table>
</div>
----------------------------------------------

<div>
  <table style="width:100%;">

    <tr style="font-size:12px;">
      <td>NO OF ITEMS:</td>
      <td style="text-align:right;"><?php echo count($query_data); ?></td>
    </tr>
    <tr style="font-size:12px;">
      <td>NO OF QTY:</td>
      <td style="text-align:right;"><?php echo $invoice_total_qty; ?></td>
    </tr>
  </table>
</div>

<div style="font-size:12px;font-weight:700;text-align:center;">
  SIX MONTHS WARRENTY FOR <br/>
  ELECTRICAL ITEMS (SELECTED) <br/>
  NO REFUNDABLE
</div>

</div>
</body>
</html>

<script>
  window.print();
  setTimeout(redirect, 2000)
  function redirect(){
    window.location.href = "product_invoice.php";
  }
</script>
