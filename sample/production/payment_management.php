<?php
require_once './../util/initialize.php';
include 'common/upper_content.php';
?>

<!--page content--> 

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Payment Management</h3>
            </div>

            <div class="title_right">

            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <a href="payment.php" target="_blank"><button id="btnNew" type="button" class="btn btn-round btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="glyphicon glyphicon-plus"></i> Add New</button></a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Payment</th>
                                    <th>Invoice</th>
                                    <th>Paying Method</th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                
                                $total_records = Payment::row_count();
                                $pagination = new Pagination($total_records);
                                //$objects = Payment::find_all_by_limit_offset($pagination->records_per_page, $pagination->offset());
								$objects = Payment::find_all();
                                
//                                foreach (Payment::find_all_by_payment_type_id(1) as $payment) {
                                foreach ($objects as $payment) {
                                    ?>
                                    <tr id="<?php echo $payment->id; ?>">
                                        <td><?php echo $payment->code ?></td>
                                        <td>
                                            <?php
                                            $invoices = array();
                                            foreach (PaymentInvoice::find_all_by_payment_id($payment->id) as $payment_invoice) {
                                                $invoices[] = $payment_invoice->invoice_id()->code;
                                            }
                                            echo join(", ", $invoices);
                                            ?>
                                        </td>
                                        <td><?php echo $payment->payment_method_id()->name ?></td>
                                        <td><?php echo $payment->date_time ?></td>
                                        <td><?php echo $payment->amount ?></td>
                                        <td><?php echo $payment->payment_status_id()->name ?></td>
                                        <td>
                                            <form action="payment_prev.php" method="post" target="_blank" style="float: left;">
                                                <input type="hidden" name="payment_id" value="<?php echo $payment->id ?>"/>
                                                <button type="submit" name="view" class="btn btn-primary btn-xs" ><i class="fa fa-external-link-square"></i> View</button>
                                            </form>

                                            <?php
                                            if ($payment->payment_status_id != 3) {
                                                ?>
                                                <!--<form id="form_cancel" action="proccess/payment_proccess.php" method="post" target="_blank" style="float: left;">-->
                                                    <!--<input type="hidden" name="payment_id" value="<?php echo $payment->id ?>"/>-->
                                                    <button id="<?php echo $payment->id ?>" type="button" name="cancel" class="btn btn-danger btn-xs btnCancel" ><i class="fa fa-close"></i> Cancel</button>
                                                <!--</form>-->
                                                <?php
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="x_panel">
                    <div onclick="window.location.href:''" class="x_content">
                        <?php
                        //echo $pagination->get_pagination_links_html1("payment_management.php");
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->

<?php include 'common/bottom_content.php'; ?>

<script>
    window.onfocus = function () {
//        location.reload();
    };

    $(".btnCancel").click(function () {
//        submitForm(true, "#form_cancel");
//        submitForm("#form_cancel");
        
        if (UserPrivileges.checkPrivilege("proccess/privileges_authenticate.php", "Payment", "upd")) {
            submitForm(this);
        }
        
    });
    
    function submit(element) {
        var result = false;
        $.ajax({
            type: 'POST',
            url: "proccess/payment_proccess.php",
            data: {cancel_payment: true, payment_id: element.id},
            dataType: 'json',
            async: false,
            success: function (data) {
                result = data;
            },
            error: function(xhr){
                alert(xhr.responseText);
            }
        });
        return result;
    }

    function submitForm(element) {
        $.confirm({
            title: 'Cancel Payment ?',
            content: '' +
                    '<form action="" class="formName">' +
                    '<div class="form-group">' +
                    '<label>Enter login password to cancel payment</label>' +
                    '<input type="password" placeholder="Password" class="name form-control" required />' +
                    '</div>' +
                    '</form>',
            buttons: {
                formSubmit: {
                    text: 'Cancel Payment',
                    btnClass: 'btn-red',
                    action: function () {                        
                        var password = this.$content.find('.name').val();
                        if (authenticate(password)) {
                            var result = submit(element);
                            if (result) {
                                $("#datatable-responsive").find('#' + element.id).find('td:eq(5)').text("Cancelled");
                                $("#datatable-responsive").find('#' + element.id).find('td:eq(6)').empty();
                                
                                $.confirm({
                                    title: 'Successfully saved the changes!',
                                    content: '',
                                    type: 'green',
                                    typeAnimated: true,
                                    buttons: {
                                        close: function () {
                                        }
                                    }
                                });
                            } else {
                                $.confirm({
                                    title: 'Encountered an error!',
                                    content: 'Failed to save the details',
                                    type: 'red',
                                    typeAnimated: true,
                                    buttons: {
                                        close: function () {
                                        }
                                    }
                                });
                            }
                        } else {
                            $.confirm({
                                title: 'Password is incorrect!',
                                content: 'Try again..',
                                type: 'red',
                                typeAnimated: true,
                                buttons: {
                                    close: function () {
                                    }
                                }
                            });
                        }
                    }
                },
                cancel: function () {
                    //close
                },
            },
            onContentReady: function () {
                // bind to events
                var jc = this;
                this.$content.find('form').on('submit', function (e) {
                    // if the user submits the form by pressing enter in the field.
                    e.preventDefault();
                    jc.$$formSubmit.trigger('click'); // reference the button and click it
                });
            }
        });
    }
    
    
    function authenticate(password) {
        var result;
        $.ajax({
            type: 'POST',
            url: "proccess/payment_proccess.php",
            data: {authenticate: true, password: password},
            dataType: 'json',
            async: false,
            success: function (data) {
                result = data;
            }
        });
        return result;
    }
</script>

