<?php $bigs = $Type->all(['parent' => 0]); ?>

<h2 class="ct">商品分類</h2>
<div class="ct">
  新增大分類
  <input type="text" name="big" id="big">
  <button onclick="addType('big')">新增</button>
</div>
<div class="ct">
  新增中分類
  <select name="b" id="b">
    <?php
    foreach ($bigs as $big) {
      echo "<option value='{$big['id']}'>{$big['name']}</option>";
    }
    ?>
  </select>
  <input type="text" name="mid" id="mid">
  <button onclick="addType('mid')">新增</button>
</div>
<table class="all">
  <?php
  // $bigs=$Type->all(['parent'=>0]);
  foreach ($bigs as $big) {
  ?>
    <tr class="tt">
      <td><?= $big['name']; ?></td>
      <td class="ct">
        <button data-id="<?= $big['id']; ?>" onclick="editType(this)">修改</button>
        <button onclick="del('Type',<?= $big['id']; ?>)">刪除</button>
      </td>
    </tr>
    <?php
    if ($Type->count(['parent' => $big['id']]) > 0) {
      $mids = $Type->all(['parent' => $big['id']]);
      foreach ($mids as $mid) {
    ?>
        <tr class="pp ct">
          <td><?= $mid['name']; ?></td>
          <td>
            <button data-id="<?= $mid['id']; ?>" onclick=" editType(this)"">修改</button>
            <button onclick="del('Type',<?= $mid['id']; ?>)">刪除</button>
          </td>
        </tr>
  <?php
      }
    }
  }
  ?>
</table>

<script>
  function addType(type) {
    let parent = (type == 'big') ? 0 : $("#b").val();
    let name = (type == 'big') ? $("#big").val() : $("#mid").val()
    $.post("./api/add_type.php", {
      parent,
      name
    }, () => {
      location.reload()
    })
  }

  function editType(dom) {
    let id = $(dom).data('id')
    let name = prompt('請輸入你要修改的分類名稱', $(dom).parent().prev().text());
    if (name != null) {
      $.post('./api/add_type.php', {
        id,
        name
      }, () => {
        location.reload();
      })
    }
  }

  // $.get("./api/get_bigs.php",(bigs)=>{
  //     $("#b").html(bigs);
  // })
</script>

<h2 class="ct">商品管理</h2>