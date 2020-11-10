<?php
require_once './../util/initialize.php';

unset($_SESSION["item_batch_barcode"]);
unset($_SESSION["item_grid"]);
unset($_SESSION["invoice_item_grid"]);

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
            <form id="formGRN" action="proccess/invoice_proccess.php" method="post" class="form-horizontal form-label-left" >

              <div class="form-group col-md-4 col-sm-4 col-xs-6">
                <input type="hidden" class="form-control" id="txtGRNId" name="grn_id" value="<?php echo $grn->id; ?>"/>
                <label>Invoice Code</label>
                <input type="text" id="txtGRNCode" name="grn_code" class="form-control" value="<?php echo (empty($grn->id)) ? GRN::getNextCode() : $grn->code; ?>" required="required" readonly=""/>
              </div>

              <div class="form-group col-md-4 col-sm-4 col-xs-6">
                <label>Date</label>
                <input type="text" id="txtDateTime" name="date_time" placeholder="yyyy-mm-dd HH:mm:ss" class="form-control"  />
              </div>

              <div class="form-group col-md-4 col-sm-4 col-xs-6">
                <label>Customer <a href="customer.php" class="btn btn-sm btn-primary"> NEW CUSTOMER </a></label>
                <select class="form-control selectpicker"  data-live-search="true" id="cmbSupplier" name="supplier_id" required="" autofocus='on'>
                  <?php
                  foreach (Customer::find_all_id_desc() as $db_supplier) {
                    if ($grn->supplier_id == $db_supplier->id) {
                      ?>
                      <option value="<?php echo $db_supplier->id; ?>"> <?php echo $db_supplier->id; ?> |<?php echo $db_supplier->name; ?> | <?php echo $db_supplier->phone; ?> | <?php echo $db_supplier->address; ?></option>
                      <?php
                    } else {
                      ?>
                      <option value="<?php echo $db_supplier->id; ?>"><?php echo $db_supplier->id; ?> |<?php echo $db_supplier->name; ?> | <?php echo $db_supplier->phone; ?> | <?php echo $db_supplier->address; ?></option>
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
                <label> BARCODE </label>
                <input type="text" class="form-control" name="barcode" id="barcode" onchange="barcodeCheck(this.value)" placeholder="Barcode" />
              </div>

              <div class="form-group col-md-2 col-sm-2 col-xs-2">
                <label> QTY </label>
                <input type="text" class="form-control" name="qty" id="qty" value="1" />
              </div>

              <div class="form-group col-md-2 col-sm-2 col-xs-2">
                <label> DISCOUNT </label>
                <input type="text" class="form-control" name="discount" id="discount" value="0" />
              </div>

              <div class="form-group col-md-4 col-sm-4 col-xs-4">
                <label> SALES PERSON </label>
                <input type="text" class="form-control" name="sales_person" id="sales_person" placeholder="Sales Person" />
              </div>

              <div class="col-sm-12 col-md-12 col-xs-12" id='txtHintbarocdecheck'></div>

              <div class="form-group col-md-12 col-sm-12 col-xs-12">
                <input class="btn btn-primary btn-block" value="ADD TO GRID" onkeypress="addToGrid()" />
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
                  <th style="text-align:center;">Batch</th>
                  <th style="text-align:right;">Price</th>
                  <th style="text-align:right;">Discount</th>
                  <th style="text-align:right;">Qty</th>
                  <th style="text-align:right;">Line Total</th>
                  <th style="width:100px;">Action</th>
                </tr>
              </thead>
              <tbody id="txtHint">

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

            <div class="form-group col-md-4 col-sm-4 col-xs-4">
              <label> PAYMENT </label>
              <input type="text" class="form-control" name="payment" id="payment" placeholder="Payment" required />
            </div>

          </div>
        </div>
      </div>

      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
          </div>
          <div class="x_content">

            <button type="submit" name="invoice_finalize" class="btn btn-primary btn-block"> - FINALIZE - </button>
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

function itemgridRemove(str){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtHint").innerHTML = this.responseText;
      document.getElementById("barcode").focus();
    }
  };
  xmlhttp.open("GET", "proccess/invoice_proccess.php?itemgridremove=" + str, true);
  xmlhttp.send();
}

function barcodeCheck(str){

  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtHintbarocdecheck").innerHTML = this.responseText;

    }
  };
  xmlhttp.open("GET", "proccess/invoice_proccess.php?barcodecheck=" + str, true);
  xmlhttp.send();

}

function addToGrid(){
  // alert("done");
  var barcode = document.getElementById("barcode").value;
  var qty = document.getElementById("qty").value;
  var sales_person = document.getElementById("sales_person").value;
  var discount = document.getElementById("discount").value;

  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtHint").innerHTML = this.responseText;
      document.getElementById("barcode").focus();
      document.getElementById("barcode").value = "";
      document.getElementById("qty").value = "1";
      document.getElementById("discount").value = "0";
      document.getElementById("sales_person").value = "";
    }
  };
  xmlhttp.open("GET", "proccess/invoice_proccess.php?invoice_grid=1&&barcode=" + barcode + "&&qty=" + qty + "&&discount="+ discount +"&&sales_person=" + sales_person, true);
  xmlhttp.send();


}


$('input').keypress(function(event) {
  if (event.keyCode == 13) {
    event.preventDefault();
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
