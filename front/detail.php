<?php
$goods=$Goods->find($_GET['id']);
$goods_type = $Type->find($goods['big'])['name'];
$goods_type .= " > ";
$goods_type .= $Type->find($goods['mid'])['name']
?>
<h2 class="ct"><?=$goods['name'];?></h2>
<div style="display:flex" class="all pp">
    <div>
        <img src="./upload/<?=$goods['img'];?>" style="width:400px;height:300px">
    </div>
    <div>
        <div class="pp">分類:<?=$goods_type;?></div>
        <div class="pp">編號:<?=$goods['no'];?></div>
        <div class="pp">價格:<?=$goods['price'];?></div>
        <div class="pp">詳細說明:<?=$goods['intro'];?></div>
        <div class="pp">庫存量:<?=$goods['stock'];?></div>
    </div>
</div>
<div class="tt ct">
    購買數量
    <input type="number" name="qt" id="qt" value='1'>
    <img src="./icon/0402.jpg" alt="">
</div>
<div class="ct">
    <button onclick="location.href='index.php'">返回</button>
</div>