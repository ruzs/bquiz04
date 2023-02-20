<?php include_once "base.php";


if(!isset($_POST['id'])){
  $_POST['reg_date']=date("Y-m-d");
  $Mem->save($_POST);
  exit();
}

$Mem->save($_POST);