<h2 class="ct">訂單管理</h2>
<!-- table.all>tr.ct*2>td*6 -->
<table class="all">
  <tr class="tt ct">
    <td>訂單編號</td>
    <td>金額</td>
    <td>會員帳號</td>
    <td>姓名</td>
    <td>下單時間</td>
    <td>操作</td>
  </tr>
  <?php
  $orders = $Order->all();
  foreach ($orders as $order) {
  ?>
    <tr class="pp ct">
      <td><a href='?do=ord_detail&id=<?= $order['id']; ?>'><?= $order['no']; ?></a></td>
      <td><?= $order['total']; ?></td>
      <td><?= $order['acc']; ?></td>
      <td><?= $order['name']; ?></td>
      <td><?= date("Y/m/d", strtotime($order['ord_date'])); ?></td>
      <td>
        <button onclick="del('Order',<?= $order['id']; ?>)">刪除</button>
      </td>
    </tr>
  <?php
  }
  ?>
</table>