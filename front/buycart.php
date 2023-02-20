<?php

if (isset($_GET['id'])) {
  $_SESSION['cart'][$_GET['id']] = $_GET['qt'];
}

if (!isset($_SESSION['mem'])) {
  to("index.php?do=login");
}

// dd($_SESSION['cart']);
?>
<h2 class="ct"><?=$_SESSION['mem']?>的購物車</h2>
<?php
if(!isset($_SESSION['cart'])){

    echo "<h2 class='ct'>目前購物車沒有商品</h2>";

}else{
?>
<table class="all">
  <tr class="tt ct">
    <td>編號</td>
    <td>商品名稱</td>
    <td>數量</td>
    <td>庫存量</td>
    <td>單價</td>
    <td>小計</td>
    <td>刪除</td>
  </tr>
  <?php
  foreach ($_SESSION['cart'] as $id => $qt) {
    $row=$Goods->find($id);
    ?>
  <tr class="pp ct">
    <td><?=$row['no'];?></td>
    <td><?=$row['name'];?></td>
    <td><?=$qt;?></td>
    <td><?=$row['stock'];?></td>
    <td><?=$row['price'];?></td>
    <td><?=$row['price'] * $qt;?></td>
    <td><img src="./icon/0415.jpg" onclick="removeItem(<?=$row['id'];?>)"></td>
  </tr>
  <?php
}
  ?>
</table>

<div class="ct">
    <img src="./icon/0411.jpg" onclick="location.href='index.php'">
    <img src="./icon/0412.jpg" alt="">
</div>
<?php
}
?>
<script>
function removeItem(id){
    $.post("./api/remove_item.php",{id},()=>{
        location.href="?do=buycart";
    })
}
</script>