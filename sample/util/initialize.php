<?php
    date_default_timezone_set('Asia/Colombo');

//    defined("DS")? null : define("DS", DIRECTORY_SEPARATOR);
//    defined("SITE_ROOT")?null:define("SITE_ROOT", DS."xampp".DS."htdocs".DS."backend");
//    defined("LIB_PATH")? null : define("LIB_PATH", SITE_ROOT.DS."util");

//util
//    require_once __DIR__."/validate_login.php";
    require_once __DIR__."/config.php";
    require_once __DIR__."/project_config.php";
    require_once __DIR__."/functions.php";
    require_once __DIR__."/session.php";
    require_once __DIR__."/database.php";
    require_once __DIR__."/databaseobject.php";
    require_once __DIR__."/image_upload.php";
    require_once __DIR__."/validate.php";
    require_once __DIR__."/Pagination.php";


//class - modal
    require_once __DIR__."/../modal/User.php";
    require_once __DIR__."/../modal/UserStatus.php";
    require_once __DIR__."/../modal/Designation.php";
    require_once __DIR__."/../modal/Role.php";
    require_once __DIR__."/../modal/UserRole.php";
    require_once __DIR__."/../modal/Product.php";
    require_once __DIR__."/../modal/Category.php";
    require_once __DIR__."/../modal/Material.php";
    require_once __DIR__."/../modal/Supplier.php";
    require_once __DIR__."/../modal/Route.php";
    require_once __DIR__."/../modal/Customer.php";
    require_once __DIR__."/../modal/PurchaseOrder.php";
    require_once __DIR__."/../modal/PurchaseOrderType.php";
    require_once __DIR__."/../modal/PurchaseOrderProduct.php";
    require_once __DIR__."/../modal/Role.php";
    require_once __DIR__."/../modal/Module.php";
    require_once __DIR__."/../modal/Privilege.php";
    require_once __DIR__."/../modal/GRN.php";
    require_once __DIR__."/../modal/GRNProduct.php";
    require_once __DIR__."/../modal/Batch.php";
    require_once __DIR__."/../modal/Inventory.php";
//    require_once __DIR__."/../modal/InventoryGrnProduct.php";
    require_once __DIR__."/../modal/Material.php";
    require_once __DIR__."/../modal/MaterialStock.php";
    require_once __DIR__."/../modal/PurchaseOrderMaterial.php";
    require_once __DIR__."/../modal/Cheque.php";
    require_once __DIR__."/../modal/ChequeStatus.php";
    require_once __DIR__."/../modal/Production.php";
    require_once __DIR__."/../modal/ProductionProduct.php";
    require_once __DIR__."/../modal/ProductionStatus.php";
    require_once __DIR__."/../modal/Invoice.php";
    require_once __DIR__."/../modal/InvoiceStatus.php";
    require_once __DIR__."/../modal/PaymentStatus.php";
    require_once __DIR__."/../modal/Payment.php";
    require_once __DIR__."/../modal/PaymentMethod.php";
    require_once __DIR__."/../modal/PaymentCheque.php";
    require_once __DIR__."/../modal/CustomerPayment.php";
    require_once __DIR__."/../modal/PaymentType.php";
    require_once __DIR__."/../modal/PaymentInvoice.php";
    require_once __DIR__."/../modal/InvoiceType.php";
    require_once __DIR__."/../modal/InvoiceInventory.php";
    require_once __DIR__."/../modal/ProductionMaterial.php";
    require_once __DIR__."/../modal/CustomerOrder.php";
    require_once __DIR__."/../modal/CustomerOrderProduct.php";
    require_once __DIR__."/../modal/CustomerOrderStatus.php";
    require_once __DIR__."/../modal/Activity.php";
    require_once __DIR__."/../modal/Deliverer.php";
    require_once __DIR__."/../modal/DelivererInventory.php";
    require_once __DIR__."/../modal/DelivererUser.php";
    require_once __DIR__."/../modal/GRNType.php";
    require_once __DIR__."/../modal/GRNMaterial.php";
    require_once __DIR__."/../modal/Target.php";
    require_once __DIR__."/../modal/TargetMonth.php";
    require_once __DIR__."/../modal/Bank.php";
//    require_once __DIR__."/../modal/InventoryGRNProduct.php";
//    require_once __DIR__."/../modal/InventoryProductionProduct.php";
    require_once __DIR__."/../modal/InventoryType.php";
    require_once __DIR__."/../modal/InvoiceReturn.php";
    require_once __DIR__."/../modal/InvoiceReturnInventory.php";
    require_once __DIR__."/../modal/ReturnReason.php";
    require_once __DIR__."/../modal/ProductionMaterialStock.php";
    require_once __DIR__."/../modal/ProductReturn.php";
    require_once __DIR__."/../modal/ProductReturnBatch.php";
    require_once __DIR__."/../modal/InvoiceCondition.php";
    require_once __DIR__."/../modal/ProductReturnInvoice.php";
    require_once __DIR__."/../modal/ExpenceCat.php";
    require_once __DIR__."/../modal/DailyExpences.php";
    require_once __DIR__."/../modal/PettyCash.php";
    require_once __DIR__."/../modal/DayStart.php";
?>
