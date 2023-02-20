<?php

if(isset($_GET['type']) && $_GET['type'] != 0){
    echo "某分類商品";

}else{
    echo "全部商品";

}