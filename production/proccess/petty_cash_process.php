<?php

require_once './../../util/initialize.php';

// savedata function
if(isset($_POST['save'])){
    echo "ok";
  $daily_expence = new PettyCash;

  $daily_expence->reson = trim($_POST['reson']);
  $daily_expence->petty_date = trim($_POST['petty_date']);
  
  $type = trim($_POST['type']);
  
  echo $type;
  
  if($type == 1){
      $daily_expence->amount = trim($_POST['amount']);
  }else if($type == 2){
      $daily_expence->amount = (-1) * trim($_POST['amount']);
  }

  try{
    $daily_expence->save();

    Activity::log_action("Petty Cah Added " );
    $_SESSION["message"] = "Successfully Added Data.";
    Functions::redirect_to("./../petty_cash.php");

  } catch (Exception $exc) {
      $_SESSION["error"] = "Error..! Failed to add data.";
      Functions::redirect_to("./../petty_cash.php");
  }

}


// delete data function
if(isset($_GET['del'])){
  $del= Functions::custom_crypt($_GET["del"], 'd');
  echo "ok";
  $daily_expence = PettyCash::find_by_id($del);

  try {
      $daily_expence->delete();
      Activity::log_action("Petty Cash deleted");
      $_SESSION["message"] = "Successfully deleted.";
      Functions::redirect_to("./../petty_cash.php");
  } catch (Exception $exc) {
      $_SESSION["error"] = "Error..! Failed to delete data.";
      Functions::redirect_to("./../petty_cash.php");
  }

}
