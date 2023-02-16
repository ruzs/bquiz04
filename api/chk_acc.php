<?php include_once "base.php";

$chk=$Mem->count(['acc'=>$_GET['acc']]);

// echo $chk>0?'1':'0';
if($chk>0){
  echo 1;
}else{
  echo 0;
}
?>
