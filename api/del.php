<?php include_once "base.php";

/*
switch($_POST['table']){
    case "mem":
        $Mem->del($_POST['id']);
    break;
    case 'admin':
        $Admin->del($_POST['id']);
    break;
    case 'ord':
        $Ord->del($_POST['id']);
    break;
}
 */

${$_POST['table']}->del($_POST['id']);