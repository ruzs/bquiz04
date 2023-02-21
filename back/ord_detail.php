<?php
$order = $Order->find($_GET['id']);
?>
<h2 class="ct">訂單編號
  <span style='color:red'>
    <?= $order['no']; ?>
  </span>的詳細資料
</h2>

<table class="all" style="margin:0 auto 0 auto;">
  <tr>
    <td class="tt ct">登入帳號</td>
    <td class="pp"><?= $order['acc']; ?></td>
  </tr>
  <tr>
    <td class="tt ct">姓名</td>
    <td class="pp"><input style="border:0;background-color:transparent" type="text" name="name" id="name" value="<?= $order['name']; ?>"></td>
  </tr>
  <tr>
    <td class="tt ct">電子信箱</td>
    <td class="pp"><input style="border:0;background-color:transparent" type="text" name="email" id="email" value="<?= $order['email']; ?>"></td>
  </tr>
  <tr>
    <td class="tt ct">聯絡地址</td>
    <td class="pp"><input style="border:0;background-color:transparent" type="text" name="addr" id="addr" value="<?= $order['addr']; ?>"></td>
  </tr>
  <tr>
    <td class="tt ct">聯絡電話</td>
    <td class="pp"><input style="border:0;background-color:transparent" type="text" name="tel" id="tel" value="<?= $order['tel']; ?>"></td>
  </tr>
</table>
<table class="all" style="margin:0 auto 0 auto;">
  <tr class="tt ct">
    <td>商品名稱</td>
    <td>編號</td>
    <td>數量</td>
    <td>單價</td>
    <td>小計</td>

  </tr>
  <?php
  $sum = 0;
  $cart = unserialize($order['cart']);
  foreach ($cart as $id => $qt) {
    $row = $Goods->find($id);
  ?>
    <tr class="pp ct">
      <td><?= $row['name']; ?></td>
      <td><?= $row['no']; ?></td>
      <td><?= $qt; ?></td>
      <td><?= $row['price']; ?></td>
      <td><?= $row['price'] * $qt; ?></td>

    </tr>
  <?php
    $sum += $row['price'] * $qt;
  }
  ?>
</table>
<table class="all ct" style="margin:0 auto 0 auto;">
  <tr class="tt">
    <td>總價:<?= $sum; ?></td>
    <input type="hidden" name="total" id="total" value="<?= $sum; ?>">
  </tr>
</table>
<div class="ct"><button onclick="history.go(-1)">返回</button></div>