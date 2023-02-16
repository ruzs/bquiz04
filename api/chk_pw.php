<?php include_once "base.php";

$table = $_GET['table'];
unset($_GET['table']);
switch ($table) {
  case 'mem':
    if ($Mem->count($_GET)) {
      $_SESSION['mem'] = $_GET['acc'];
      echo 1;
    } else {
      echo 0;
    }
    break;
  case 'admin':
    if ($Admin->count($_GET)) {
      $_SESSION['admin'] = $_GET['acc'];
      echo 1;
    } else {
      echo 0;
    }
    break;
}
