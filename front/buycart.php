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
    <td><img src="./icon/0415.jpg" alt=""></td>
  </tr>
  <?php
}
  ?>
</table>
