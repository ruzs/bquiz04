<?php

if(isset($_GET['type']) && $_GET['type'] != 0){
    $type=$Type->find($_GET['type']);
    if($type['parent']==0){
        $nav=$type['name'];
    }else{
        $type_big=$Type->find($type['parent']);
        $nav=$type_big['name'] . " > " . $type['name'];
    }


}else{
    $nav='全部商品';

}
?>


<h1><?=$nav;?></h1>


<?php

foreach($rows as $row){

}
?>