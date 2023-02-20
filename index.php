<?php include_once "./api/base.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0039) -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <title>┌精品電子商務網站」</title>
  <link href="./css/css.css" rel="stylesheet" type="text/css">
  <script src="./js/jquery-3.4.1.min.js"></script>
  <script src="./js/js.js"></script>
</head>

<body>
  <iframe name="back" style="display:none;"></iframe>
  <div id="main">
    <div id="top">
      <a href="index.php">
        <img src="./icon/0416.jpg" style="width:50%">
      </a>
      <div style="padding:10px;">
        <a href="?">回首頁</a> |
        <a href="?do=news">最新消息</a> |
        <a href="?do=look">購物流程</a> |
        <a href="?do=buycart">購物車</a> |
        <?php
        if (!isset($_SESSION['mem'])) {
        ?>
          <a href="?do=login">會員登入</a> |
        <?php
        } else {
        ?>
          <a href="./api/logout.php?table=mem">登出</a> |
        <?php
        }
        if (!isset($_SESSION['admin'])) {
        ?>
          <a href="?do=admin">管理登入</a>
        <?php
        } else {
        ?>
          <a href="back.php?do=admin">返回管理</a>
        <?php
        }
        ?>
      </div>
      <marquee>情人節特惠活動 &nbsp; 為了慶祝七夕情人節，將舉辦情人兩人到現場有七七折之特惠活動~</marquee>

    </div>
    <div id="left" class="ct">
      <div style="min-height:400px;">
        <a href="">全部商品(<?= $Goods->count(['sh' => 1]); ?>)</a>
        <?php
        $bigs = $Type->all(['parent' => 0]);
        foreach ($bigs as $big) {
          echo "<div class='ww'><a href=''>";
          echo $big['name'];
          echo "(" . $Goods->count(['sh' => 1, 'big' => $big['id']]) . ")";
          echo "</a>";
          if ($Type->count(['parent' => $big['id']]) > 0) {
            $mids = $Type->all(['parent' => $big['id']]);
            foreach ($mids as $mid) {
              echo "<div class='s'><a href=''>";
              echo $mid['name'];
              echo "(" . $Goods->count(['sh' => 1, 'mid' => $mid['id']]) . ")";
              echo "</a></div>";
            }
          }
          echo "</div>";
        }
        ?>
      </div>
      <span>
        <div>進站總人數</div>
        <div style="color:#f00; font-size:28px;"> 00005 </div>
      </span>
    </div>
    <div id="right">
      <?php
      $do = $_GET['do'] ?? 'main';
      $file = "./front/" . $do . ".php";
      if (file_exists($file)) {
        include $file;
      } else {
        include "./front/main.php";
      }
      ?>
    </div>
    <div id="bottom" style="line-height:70px;background:url(icon/bot.png); color:#FFF;" class="ct">
      <?= $Bottom->find(1)['bottom']; ?>
    </div>
  </div>

</body>

</html>