<table class="all">
  <tr>
    <td class="tt ct">帳號</td>
    <td class="pp"><input type="text" name="acc" id="acc"></td>
  </tr>
  <tr>
    <td class="tt ct">密碼</td>
    <td class="pp"><input type="text" name="pw" id="pw"></td>
  </tr>
  <tr>
    <td class="tt ct">驗證碼</td>
    <td class="pp">
      <?php
      $a = rand(10, 99);
      $b = rand(10, 99);
      $_SESSION['cert'] = $a + $b;
      echo $a . "+" . $b . "=";
      ?>
      <input type="text" name="cert" id="cert">
    </td>
  </tr>
</table>
<div class="ct"><button onclick="login('admin')">確認</button></div>

<script>
  function login(table) {
    $.get("./api/chk_cert.php", {
      cert: $('#cert').val()
    }, (res) => {
      if (parseInt(res) == 1) {
        $.get("./api/chk_pw.php", {
          table,
          acc: $("#acc").val(),
          pw: $("#pw").val()
        }, (res) => {
          if (parseInt(res)) {
            location.href = 'index.php';
          } else {
            alert("帳號或密碼錯誤,請重新輸入");
          }
        })
      } else {
        alert("驗證碼錯誤,請重新輸入");
      }
    })

  }
</script>