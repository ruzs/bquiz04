<h2 class="ct">會員註冊</h2>
<table class="all">
  <tr>
    <td class="tt ct">姓名</td>
    <td class="pp"><input type="text" name="name" id=""></td>
  </tr>
  <tr>
    <td class="tt ct">帳號</td>
    <td class="pp"><input type="text" name="acc" id="acc"><button id="check" onclick="chk()">檢測帳號</button></td>
  </tr>
  <tr>
    <td class="tt ct">密碼</td>
    <td class="pp"><input type="password" name="pw" id="pw"></td>
  </tr>
  <tr>
    <td class="tt ct">電話</td>
    <td class="pp"><input type="text" name="tel" id="tel"></td>
  </tr>
  <tr>
    <td class="tt ct">住址</td>
    <td class="pp"><input type="text" name=addr"" id="addr"></td>
  </tr>
  <tr>
    <td class="tt ct">電子信箱</td>
    <td class="pp"><input type="text" name="email" id="email"></td>
  </tr>
</table>
<div class="ct">
  <button onclick="reg()">註冊</button>
  <button>重置</button>
</div>

<script>
  // $("#check").on('click',function(){
  //   console.log(10);
  //   let acc =$("#acc").val();
  //   $.get("./api/chk_acc.php",{acc},(result)=>{
  //     if(parseInt(result)|| acc=='admin'){
  //       alert("此帳號已存在,請使用別的帳號")
  //     }else{
  //       alert("此帳號可使用")
  //     }
  //   })
  // })

  function chk() {
    let acc = $("#acc").val();
    $.get("./api/chk_acc.php", {
      acc
    }, (result) => {
      if (parseInt(result) || acc == 'admin') {
        alert("此帳號已存在,請使用別的帳號")
      } else {
        alert("此帳號可使用")
      }
    })
  }

  function reg() {
    let mem = {
      name: $("#name").val(),
      acc: $("#acc").val(),
      pw: $("#pw").val(),
      tel: $("#tel").val(),
      addr: $("#addr").val(),
      email: $("#email").val(),
    };
    $.get("./api/chk_acc.php", mem, (result) => {
      if (parseInt(result) || acc == 'admin') {
        alert("此帳號已存在,請使用別的帳號")
      } else {
        $.post("./api/save_mem.php", mem, () => {
          location.href='?do=login'
        })
      }
    })
  }
</script>