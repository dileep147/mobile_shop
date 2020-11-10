<?php
require_once './../util/initialize.php';

unset($_SESSION["item_batch_barcode"]);
unset($_SESSION["item_grid"]);

include './common/upper_content.php';
?>

<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
      </div>
    </div>

    <div class="clearfix"></div>
    <?php Functions::output_result(); ?>
    <div class="row">

      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
          </div>
          <div class="x_content">
            <form id="formGRN" action="proccess/product_grn_proccess.php" method="post" class="form-horizontal form-label-left" >

              <div class="form-group col-md-4 col-sm-4 col-xs-6">
                <input type="hidden" class="form-control" id="txtGRNId" name="grn_id" value="<?php echo $grn->id; ?>"/>
                <label>GRN Code</label>
                <input type="text" id="txtGRNCode" name="grn_code" class="form-control" value="<?php echo (empty($grn->id)) ? GRN::getNextCode() : $grn->code; ?>" required="required" readonly=""/>
              </div>

              <div class="form-group col-md-4 col-sm-4 col-xs-6">
                <label>Date</label>
                <input type="text" id="txtDateTime" name="date_time" placeholder="yyyy-mm-dd HH:mm:ss" class="form-control"  />
              </div>

              <div class="form-group col-md-4 col-sm-4 col-xs-6">
                <label>Supplier</label>
                <select class="form-control selectpicker"  data-live-search="true" id="cmbSupplier" name="supplier_id" required="" autofocus='on'>
                  <?php
                  foreach (Supplier::find_all() as $db_supplier) {
                    if ($grn->supplier_id == $db_supplier->id) {
                      ?>
                      <option value="<?php echo $db_supplier->id; ?>"><?php echo $db_supplier->name; ?></option>
                      <?php
                    } else {
                      ?>
                      <option value="<?php echo $db_supplier->id; ?>"><?php echo $db_supplier->name; ?></option>
                      <?php
                    }
                  }
                  ?>
                </select>
              </div>

          </div>
        </div>
      </div>


      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
          </div>
          <div class="x_content">


              <div class="form-group col-md-4 col-sm-4 col-xs-4">
                <label>BATCH </label>
                <select class="form-control selectpicker"  data-live-search="true" id="batch_id" name="batch_id" required="" onchange="newBatch(this.value)">
                  <option value="0" selected> New Batch </option>
                  <?php
                  foreach (Batch::find_all() as $batch) {
                    echo "<option value='".$batch->id."'> Batch:".$batch->code." / Product: ".$batch->product_id()->name." ( Retail Price: ".$batch->retail_price." Cost Price: ".$batch->cost." ) </option>";
                  }
                  ?>
                </select>
              </div>

              <div class="form-group col-md-2 col-sm-2 col-xs-2">
                <label>QTY</label>
                <input type="text" class="form-control" name="qty" id="qty" value="1" />
              </div>


              <div id='new_batch'>

                <div class="form-group col-md-5 col-sm-5 col-xs-5">
                  <label>ITEM NAME</label>
                  <select class="form-control selectpicker"  data-live-search="true" id="item_id" name="item_id" required="">
                    <?php
                    foreach (Product::find_all() as $product) {
                      echo "<option value='".$product->id."'>".$product->name."</option>";
                    }
                    ?>
                  </select>
                </div>



                <div class="form-group col-md-2 col-sm-2 col-xs-2">
                  <label>SUPPLIER INV PRICE</label>
                  <input type="text" class="form-control" name="supplier_invoice_price" value="0" id="supplier_invoice_price" placeholder="SUPPLIER INVOICE PRICE" />
                </div>

                <div class="form-group col-md-2 col-sm-2 col-xs-2">
                  <label>COST PRICE </label>
                  <input type="text" class="form-control" name="cost_price" id="cost_price" value="0" placeholder="COST PRICE" />
                </div>

                <div class="form-group col-md-2 col-sm-2 col-xs-2">
                  <label>WHOLE SALE PRICE</label>
                  <input type="text" class="form-control" name="wholesale_price" id="wholesale_price" value="0" placeholder="WHOLE SALE PRICE" />
                </div>

                <div class="form-group col-md-2 col-sm-2 col-xs-2">
                  <label>RETAIL PRICE</label>
                  <input type="text" class="form-control" name="retail_price" id="retail_price" value="0" placeholder="RETAIL PRICE" />
                </div>

                <div class="form-group col-md-2 col-sm-2 col-xs-2">
                  <label>MINIMUM RETAIL PRICE</label>
                  <input type="text" class="form-control" name="minimum_selling_price" value="0" id="minimum_selling_price" placeholder="MINIMUM RETAIL PRICE" />
                </div>

              </div>

              <div class="form-group col-md-2 col-sm-2 col-xs-2">
                <label>BARCODES</label><br/>
                <button type="button" class=" btn btn-info btn-sm" style="width:100%;" data-toggle="modal" data-target="#myModal">BARCODES</button>
              </div>

              <!-- MODEL DATA -->
              <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Barcode Feeder</h4>
                    </div>
                    <div class="modal-body">
                      <input type="text" placeholder="bar-code" class="form-control"  id='barcode' autocomplete="off" />


                      <div class="col-sm-12" >
                        <!-- TABLE START -->
                        <table class="table" style="margin-top:10px;">
                          <thead>
                            <tr>
                              <th colspan='3'>BARCODE</th>
                            </tr>
                          </thead>
                          <tbody id='txtHint'>

                          </tbody>
                        </table>
                        <!-- TABLE ENDS -->
                      </div>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>

              <hr/>


              <div class="form-group col-md-12 col-sm-12 col-xs-12">
                <input class="btn btn-primary btn-block" value="ADD TO GRID" onclick="addtoGrid()">
              </div>


          </div>
        </div>
      </div>



      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
          </div>
          <div class="x_content">
            <!-- table start -->

            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Item Name</th>
                  <th>Batch</th>
                  <th>Cost Price</th>
                  <th>Qty</th>
                  <th>Line Total</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody id="txtHint1">

              </tbody>
            </table>

            <!-- table ends -->
          </div>
        </div>
      </div>


      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
          </div>
          <div class="x_content">

            <button type="submit" name="finalize" class="btn btn-primary btn-block"> - FINALIZE - </button>
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
<!-- /page content -->
<?php include './common/bottom_content.php'; ?><!-- bottom content -->
<script>

// show batches
function newBatch(str){
  var x = document.getElementById("new_batch");
  x.style.display = "none";
}

// addtoGrid function

function addtoGrid(){
  var batch_id =  document.getElementById("batch_id").value;
  var qty =  document.getElementById("qty").value;
  var item_id =  document.getElementById("item_id").value;
  var minimum_selling_price =  document.getElementById("minimum_selling_price").value;
  var supplier_invoice_price =  document.getElementById("supplier_invoice_price").value;
  var cost_price =  document.getElementById("cost_price").value;
  var wholesale_price =  document.getElementById("wholesale_price").value;
  var retail_price =  document.getElementById("retail_price").value;

  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtHint1").innerHTML = this.responseText;
      document.getElementById("txtHint").innerHTML = "";
      document.getElementById("batch_id").focus();
      document.getElementById("qty").value = 1;
    }
  };
  xmlhttp.open("GET", "proccess/product_grn_proccess.php?batch_id=" + batch_id + "&&qty=" + qty + "&&item_id=" + item_id + "&&minimum_selling_price=" + minimum_selling_price + "&&supplier_invoice_price=" + supplier_invoice_price + "&&cost_price=" + cost_price + "&&wholesale_price=" + wholesale_price + "&&retail_price=" + retail_price, true);
  xmlhttp.send();

}


// remove barcode item
function barcodeRemove(str){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtHint").innerHTML = this.responseText;
      document.getElementById("barcode").value = "";
    }
  };
  xmlhttp.open("GET", "proccess/product_grn_proccess.php?show_table=" + str, true);
  xmlhttp.send();
}

// item grid remove
function itemgridRemove(str){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtHint1").innerHTML = this.responseText;
      document.getElementById("barcode").value = "";
    }
  };
  xmlhttp.open("GET", "proccess/product_grn_proccess.php?show_table_grid=" + str, true);
  xmlhttp.send();
}

// store barcode
function storeBarcode() {

  var batch_id =  document.getElementById("batch_id").value;
  var barcode = document.getElementById("barcode").value;
  var qty = document.getElementById("qty").value;

  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtHint").innerHTML = this.responseText;
      document.getElementById("barcode").value = "";
    }
  };
  xmlhttp.open("GET", "proccess/product_grn_proccess.php?batch_id=" + batch_id + "&&barcode=" + barcode + "&&qty=" + qty, true);
  xmlhttp.send();

}

function storeProduct() {

  var batch_id =  document.getElementById("batch_id").value;
  var barcode = document.getElementById("barcode").value;

  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtHint").innerHTML = this.responseText;
      document.getElementById("barcode").value = "";
    }
  };
  xmlhttp.open("GET", "proccess/product_grn_proccess.php?batch_id=" + batch_id + "&&barcode=" + barcode, true);
  xmlhttp.send();

}


$('input').keypress(function(event) {
  if (event.keyCode == 13) {
    event.preventDefault();
    storeBarcode();
  }
});

window.onload = function () {
  $("#txtDateTime").datetimepicker('setDate', new Date());
  loadForm();
};

$('#txtDateTime').datetimepicker({
  changeMonth: true,
  changeYear: true,
  dateFormat: 'yy-mm-dd',
  timeFormat: 'HH:mm:ss'
});
</script>
