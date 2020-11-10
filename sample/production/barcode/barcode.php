<?php
require_once './../../util/initialize.php';
?>
<html>
<head>
  <style>
  p.inline {display: inline-block;}
  span { font-size: 13px;}
</style>
<style type="text/css" media="print">
@page
{
  size: auto;   /* auto is the initial value */
  margin: 0mm;  /* this affects the margin in the printer settings */

}
</style>
</head>
<body onload="window.print();">
  <div style="width:600px;" style="padding-top:20px;">
    <?php
    include 'barcode128.php';
    // $product = $_POST['product'];
    $product1 = Product::find_by_id($_POST['product_id']);
    $product = $product1->name;
    $product = mb_substr($product, 0, 10);
    $product_id = $_POST['product_id'];
    $rate = $_POST['rate'];

    $count = 2;
    for($i=1;$i<=$_POST['print_qty'];$i++){

        echo "<p class='inline' style='margin-right:40px;margin-top:-5px;margin-bottom:30px;'><span ><b style='font-size:15px;'>".$product."</b></span>".bar128(stripcslashes($_POST['product_id']))."<span><b style='font-size:16px;margin-left:0px;'>".number_format($rate,2)." LKR </b><span></p>&nbsp&nbsp&nbsp&nbsp";

      $count++;

    }

    ?>
  </div>
</body>
</html>
