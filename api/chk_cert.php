<?php include_once "base.php";

if($_GET['cert']==$_SESSION['cert']){
    echo 1;
}else{
    echo 0;
}