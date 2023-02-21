<?php
include_once "base.php";
// $no=date("Ymd").rand(100000,999999);
// $chk=$Order->count(['no'=>$no]);
// while($chk>0){
//   $no=date("Ymd").rand(100000,999999);
//   $chk=$Order->count(['no'=>$no]);
// }
$_POST['no']=date("Ymd").rand(100000,999999);
$_POST['acc']=$_SESSION['mem'];
$_POST['cart']=serialize($_SESSION['cart']);
$Order->save($_POST);
