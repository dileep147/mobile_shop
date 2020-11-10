<?php
require_once './../util/initialize.php';
include 'common/upper_content.php';
?>

<!--page content-->

<div class="right_col" role="main">
  <div class="">


    <div class="clearfix"></div>

    <?php Functions::output_result(); ?>
    <div class="row">

      <div class="x_panel">

        <div class="x_content">
          <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>Code</th>
                <th>Date</th>
                <th>Type</th>
                <th>Purchase Order No</th>
                <th>Supplier</th>
                <th>User Name</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody id = "tbl_body">

              <?php
              foreach (GRN::find_all_desc() as $grn) {
                ?>
                <tr>
                  <td><?php echo $grn->id ?></td>
                  <td><?php echo $grn->date_time ?></td>
                  <td><?php echo $grn->grn_type_id()->name ?></td>

                  <td>
                    <?php
                    if (!empty($grn->purchase_order_id)) {
                      echo $grn->purchase_order_id()->code;
                    } else {
                      echo "(Direct GRN)";
                    }
                    ?>
                  </td>
                  <td><?php echo $grn->supplier_id()->name ?></td>
                  <td><?php echo $grn->user_id()->name ?></td>
                  <td>

                    <a href="barcode/grn_barcode.php?grn_id=<?php echo $grn->id; ?>" target="_blank">
                      <button class="btn btn-primary btn-xs" ><i class="glyphicon glyphicon-edit"></i> PRINT BARCODES</button>
                    </a>

                    <a href="grn_prev.php?id=<?php echo Functions::custom_crypt($grn->id); ?>">
                      <button class="btn btn-primary btn-xs" ><i class="glyphicon glyphicon-edit"></i> View</button>
                    </a>
                  </td>
                </tr>
                <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->

<?php include 'common/bottom_content.php'; ?>

<script>


$('#datatable-responsive').dataTable( {
  "paging": false,
  "order": [[ 0, "desc" ]]
} );

/////////////////////Filter By Date Range//////////////////////

$('#div_clear1').click(function () {
  $('#table_body').empty();
  $("#dtpFrom").val("yyyy-mm-dd");
  $("#dtpTo").val("yyyy-mm-dd");


});

$('#div_clear2').click(function () {
  $('#table_body').empty();
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
    url: "proccess/grn_management_process.php",
    data: {invoice_report: true, from: from, to: to},
    dataType: 'json',
    async: false,
    success: function (data) {
      $('#tbl_body').empty();
      var trHTML = "";
      $.each(data, function (index, value) {
        var btnEdit = "";
        if (value['grn_type_id'] == "1") {
          btnEdit = "<form action='product_grn.php' method='post' target='_blank' style='float: left;'><input type='hidden' name='grn_id' value='" + value["id"] + "'/><button type='submit' name='view' class='btn btn-primary btn-xs' ><i class='glyphicon glyphicon-edit'></i> Edit</button></form>";
        } else {
          btnEdit = "<form action='material_grn.php' method='post' target='_blank' style='float: left;'><input type='hidden' name='grn_id' value='" + value["id"] + "'/><button type='submit' name='view' class='btn btn-primary btn-xs' ><i class='glyphicon glyphicon-edit'></i> Edit</button></form>";
        }
        var btnView = "<form action='grn_prev.php' method='post' target='_blank' style='float: left;'><input type='hidden' name='grn_id' value='" + value["id"] + "'/><button type='submit' name='view' class='btn btn-primary btn-xs' ><i class='glyphicon glyphicon-edit'></i> View</button></form>";
        trHTML += "<tr><td>" + value["code"] + "</td><td>" + value["date_time"] + "</td><td>" + value["type_name"] + "</td><td>" + value["purchase_order_no"] + "</td><td>" + value["supplier_name"] + "</td><td>" + value["user_name"] + "</td><td>" + btnEdit + "" + btnView + "<td></tr>";
      });
      $('#tbl_body').append(trHTML);
    },
    error: function (xhr) {
      alert(xhr.responseText);
    }
  });
}
/////////////////////////////////////////Filter By Customer/////////////////////////////////////////

$('#cmbFilter').change(function () {
  submitSupplierData();
});

function submitSupplierData() {
  var supplier = $('#cmbFilter').val();
  $.ajax({
    type: 'POST',
    url: "proccess/grn_management_process.php",
    data: {invoice_supplier_report: true, supplier: supplier},
    dataType: 'json',
    async: false,
    success: function (data) {
      //                alert(data);
      $('#tbl_body').empty();
      var trHTML = "";
      $.each(data, function (index, value) {
        var btnEdit = "";
        if (value['grn_type_id'] == "1") {
          btnEdit = "<form action='product_grn.php' method='post' target='_blank' style='float: left;'><input type='hidden' name='grn_id' value='" + value["id"] + "'/><button type='submit' name='view' class='btn btn-primary btn-xs' ><i class='glyphicon glyphicon-edit'></i> Edit</button></form>";
        } else {
          btnEdit = "<form action='material_grn.php' method='post' target='_blank' style='float: left;'><input type='hidden' name='grn_id' value='" + value["id"] + "'/><button type='submit' name='view' class='btn btn-primary btn-xs' ><i class='glyphicon glyphicon-edit'></i> Edit</button></form>";
        }
        var btnView = "<form action='grn_prev.php' method='post' target='_blank' style='float: left;'><input type='hidden' name='grn_id' value='" + value["id"] + "'/><button type='submit' name='view' class='btn btn-primary btn-xs' ><i class='glyphicon glyphicon-edit'></i> View</button></form>";
        trHTML += "<tr><td>" + value["code"] + "</td><td>" + value["date_time"] + "</td><td>" + value["type_name"] + "</td><td>" + value["purchase_order_no"] + "</td><td>" + value["supplier_name"] + "</td><td>" + value["user_name"] + "</td><td>" + btnEdit + "" + btnView + "<td></tr>";
      });
      $('#tbl_body').append(trHTML);
    },
    error: function (xhr) {
      alert(xhr.responseText);
    }
  });
}

</script>
