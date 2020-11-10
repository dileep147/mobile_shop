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
	<div style="width:800px;">
		<?php
		include 'barcode128.php';

    $grn_id = $_GET['grn_id'];

		foreach(GRNProduct::find_all_by_grn_id($grn_id) as $data){
      $product_code = $data->batch_id()->product_id()->code;
      $product = $data->batch_id()->product_id()->name;
      $product_id = $data->batch_id()->product_id;
      $product = mb_substr($product, 0, 10);
      $rate = $data->batch_id()->retail_price;

      echo "<p class='inline' style='margin-right:45px;margin-top:-5px;margin-bottom:30px;'><span ><b style='font-size:15px;'>".$product."</b></span>".bar128(stripcslashes($product_id))."<span><b style='font-size:16px;margin-left:0px;'>".number_format($rate,2)." LKR </b><span></p>&nbsp&nbsp&nbsp&nbsp";



  	}

		?>
	</div>
</body>
</html>
