<?php
include_once "base.php";

$mids=$Type->all(['parent'=>$_POST['big']]);
foreach($mids as $mid){
    echo "<option value='{$mid['id']}'>{$mid['name']}</option>";
}