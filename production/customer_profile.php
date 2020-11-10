<?php
require_once './../util/initialize.php';
include 'common/upper_content.php';

if (isset($_GET["id"])) {
    $id= Functions::custom_crypt($_GET["id"], 'd');
    if($customer = Customer::find_by_id($id)){

    }else{
        Session::set_error("Entry not available...");
        Functions::redirect_to("index.php");
    }
}else{
    Functions::redirect_to("index.php");
}

?>

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Customer Profile</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><?php echo $customer->name; ?></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-12 col-sm-12 col-xs-12 profile_left">


                            <div class="col-md-6 col-sm-6 col-xs-6 profile_left">
                                <div class="tile-stats" style="padding: 0px 10px;">
                                    <ul class="list-unstyled user_data">
                                        <li><i class="fa fa-user-circle user-profile-icon"></i> <?php echo $customer->code ?></li>
                                        <li><i class="fa fa-map user-profile-icon"></i> <?php echo $customer->route_id()->name; ?></li>
                                        <li><i class="fa fa-home user-profile-icon"></i> <?php echo $customer->address; ?></li>
                                        <li><i class="fa fa-phone user-profile-icon"></i> <?php echo $customer->phone; ?></li>
                                        <li><i class="fa fa-at user-profile-icon"></i> <?php echo $customer->email; ?></li>
                                    </ul>
                                </div>
                            </div>
                            
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                    <!--                                    <li role="presentation" class="active">
                                                                            <a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Overview</a>
                                                                        </li>-->
                                                                        <li role="presentation" class="active">
                                                                            <a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Invoices</a>
                                                                        </li>
                                                                        <li role="presentation" class="">
                                                                            <a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Payments</a>
                                                                        </li>
                                                                        <li role="presentation" class="">
                                                                            <a href="#tab_content4" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Cheques</a>
                                                                        </li>
                                                                    </ul>
                                                                    <div id="myTabContent" class="tab-content">
                                    <!--                                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                                                                            <div class="x_panel">
                                                                                <div class="x_title">
                                                                                    <h2>Total Purchases <small>Sessions</small></h2>
                                                                                    <div class="clearfix"></div>
                                                                                </div>
                                                                                <div class="x_content2">
                                                                                    <div id="graph_line1" style="width:100%; height:300px;"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>-->
                                                                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content2" aria-labelledby="profile-tab">
                                                                            <div class="container-fluid">
                                                                                <table class="table dt table-striped dt-button-collection table-condensed"  width="100%">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>Invoice</th>
                                                                                            <th>Date & Time</th>
                                                                                            <th>Status</th>
                                                                                            <th>Gross Amount(LKR)</th>
                                                                                            <th>Net Amount(LKR)</th>
                                                                                            <th>Outstanding(LKR)</th>
                                                                                            <th>User</th>
                                                                                            <th class="col-sm-2">Action</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <?php
                                                                                        $customerinvoices = Invoice::find_all_by_customer_id($customer->id);
                                                                                        foreach ($customerinvoices as $customerinvoice) {
                                                                                            ?>

                                                                                            <tr>
                                                                                                <td><a target="_blank" href="invoice_prev.php"><?php echo $customerinvoice->code ?></a></td>
                                                                                                <td><?php echo $customerinvoice->date_time ?></td>
                                                                                                <td><?php echo $customerinvoice->invoice_status_id()->name ?></td>
                                                                                                <td><?php echo $customerinvoice->gross_amount ?></td>
                                                                                                <td><?php echo $customerinvoice->net_amount ?></td>
                                                                                                <td><?php echo $customerinvoice->balance ?></td>
                                                                                                <td><a target="_blank" href="user_profile.php"><?php echo $customerinvoice->user_id()->username ?></a></td>
                                                                                                <td>
<!--                                                                <div>
                                                                    <a href="invoice_prev.php" target="_blank"><button type="button" class="btn btn-primary btn-xs" ><i class="glyphicon glyphicon-new-window"></i> View</button></a>
                                                                </div>-->
                                                                <form action="invoice_prev.php" method="post" target="_blank" style="float: left;">
                                                                    <input type="hidden" name="invoice_id" value="<?php echo $customerinvoice->id ?>"/>
                                                                    <button type="submit" class="btn btn-primary btn-xs" ><i class="glyphicon glyphicon-edit"></i> View</button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                                        <div class="container-fluid">
                                            <table class=" dt table table-striped dt-button-collection table-condensed"  width="100%">                                                <!--<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive " cellspacing="0" width="100%">-->
                                                <thead>
                                                    <tr>
                                                        <th>Payment</th>
                                                        <th>Invoice</th>
                                                        <th>Paying Method</th>
                                                        <th>Date</th>
                                                        <th>Amount</th>
                                                        <th>Status</th>
                                                        <th>User</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    foreach (Payment::find_all_by_customer_id($customer->id) as $payment) {
                                                        ?>
                                                        <tr id="<?php echo $payment->id ?>">
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
                                                            <td><a target="_blank" href="user_profile.php"><?php echo $customerinvoice->user_id()->username ?></a></td>
                                                            <td>
                                                                <form action="payment_prev.php" method="post" target="_blank" style="float: left;">
                                                                    <input type="hidden" name="payment_id" value="<?php echo $payment->id ?>"/>
                                                                    <button type="submit" name="view" class="btn btn-primary btn-xs" ><i class="fa fa-external-link-square"></i> View</button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
                                        <div class="container-fluid">
                                            <table class="dt table table-striped dt-button-collection table-condensed"  width="100%">                                                <!--<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive " cellspacing="0" width="100%">-->
                                                <!--<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">-->
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <!-- <th>Bank</th> -->
                                                            <th style='text-align:center;'>Cheque No</th>
                                                            <th style='text-align:right;'>Amount</th>
                                                            <th style='text-align:center;'>Date</th>
                                                            <th style='text-align:center;'>Cheque Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        foreach (Payment::find_all_by_customer_id($customer->id) as $payment_cheque) {

                                                            foreach (PaymentInvoice::find_all_by_invoice_id($payment_cheque->id) as $payment_inv_data) {

                                                                foreach (PaymentCheque::find_all_by_payment_id($payment_inv_data->id) as $payment_inv_cheque) {

                                                                    echo "<tr>";
                                                                    echo "<td>".$payment_inv_cheque->cheque_id()->id."</td>";
                                                                    // echo "<td>".$payment_inv_cheque->cheque_id()->bank_id->name()."</td>";
                                                                    echo "<td style='text-align:center;'>".$payment_inv_cheque->cheque_id()->cheque_no."</td>";
                                                                    echo "<td style='text-align:right;'>".$payment_inv_cheque->cheque_id()->amount."</td>";
                                                                    echo "<td style='text-align:center;'>".$payment_inv_cheque->cheque_id()->date."</td>";
                                                                    echo "<td style='text-align:center;'>".$payment_inv_cheque->cheque_id()->cheque_status_id()->name."</td>";
                                                                    echo "</tr>";

                                                                }

                                                            }
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
            </div>
        </div>
    </div>
    <!-- /page content -->
    <?php include './common/bottom_content.php'; ?><!-- bottom content -->
    <script>

        $(document).ready(function () {
            $('.dt').DataTable();
        });
        $(document).ready(function () {
            $('.dt').DataTable();
        });
        $(document).ready(function () {
            $('.dt').DataTable();
        });

        if ($('#graph_bar1').length) {
            Morris.Bar({
                element: 'graph_bar1',
                data: [
                {device: 'iPhone 4', geekbench: 380},
                {device: 'iPhone 4S', geekbench: 655},
                {device: 'iPhone 3GS', geekbench: 275},
                {device: 'iPhone 5', geekbench: 1571},
                {device: 'iPhone 5S', geekbench: 655},
                {device: 'iPhone 6', geekbench: 2154},
                {device: 'iPhone 6 Plus', geekbench: 1144},
                {device: 'iPhone 6S', geekbench: 2371},
                {device: 'iPhone 6S Plus', geekbench: 1471},
                {device: 'Other', geekbench: 1371}
                ],
                xkey: 'device',
                ykeys: ['geekbench'],
                labels: ['Geekbench'],
                barRatio: 0.4,
                barColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB'],
                xLabelAngle: 35,
                hideHover: 'auto',
                resize: true
            });

            if ($('#graph_line1').length) {

                Morris.Line({
                    element: 'graph_line1',
                    xkey: 'year',
                    ykeys: ['value'],
                    labels: ['Value'],
                    hideHover: 'auto',
                    lineColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB'],
                    data: [
                    {year: '2012', value: 20},
                    {year: '2013', value: 10},
                    {year: '2014', value: 5},
                    {year: '2015', value: 5},
                    {year: '2016', value: 20}
                    ],
                    resize: true
                });

                $MENU_TOGGLE.on('click', function () {
                    $(window).resize();
                });

            }
        }
    </script>