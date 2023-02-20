<?php

if (isset($_GET['type']) && $_GET['type'] != 0) {
  $type = $Type->find($_GET['type']);
  if ($type['parent'] == 0) { //大分類
    $nav = $type['name'];
    $rows = $Goods->all(['sh' => 1, 'big' => $type['id']]);
  } else {   //中分類

    $type_big = $Type->find($type['parent']);
    $nav = $type_big['name'] . " > " . $type['name'];
    $rows = $Goods->all(['sh' => 1, 'mid' => $type['id']]);
  }
} else {
  $nav = '全部商品';
  $rows = $Goods->all(['sh' => 1]);
}
?>

<h1><?= $nav; ?></h1>

<?php
foreach ($rows as $row) {
?>
  <div class='all pp goods' style="display:flex">
    <div>
      <a href="?do=detail&id=<?= $row['id']; ?>">
        <img src='./upload/<?= $row['img']; ?>' style="width:250px;height:120px">
      </a>
    </div>
    <div>
      <div class="tt ct"><?= $row['name']; ?></div>
      <div>價錢:<?= $row['price']; ?>
        <img src="./icon/0402.jpg" style="float:right">
      </div>
      <div>規格:<?= $row['spec']; ?></div>
      <div>簡介:<?= $row['intro']; ?></div>
    </div>
  </div>
<?php
}
?>