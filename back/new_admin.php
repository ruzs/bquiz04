<h2 class="ct">新增管理帳號</h2>
<form action="./api/new_admin.php" method="post">
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
      <td class="tt ct">權限</td>
      <td class="pp"><input type="text" name="pr" id="pr"></td>
    </tr>
  </table>
  <div class="ct">
    <input type="submit" value="新增">
    <input type="reset" value="reset">
  </div>
</form>