<?php include("header.php") ?>
<title>signin</title>

<div class="signin container ez-center p-2 ez-round">
  <h3>登入系統</h3>
  <form action="" method="post">
    <div>
      <div class="input-group ez-round p-2">
        <div class="input-group-prepend">
          <i class="fas fa-user input-group-text p-2"></i>
        </div>
        <input type="text" class="form-control" name="id" placeholder="輸入帳號">
      </div>
      <div class="input-group ez-round p-2">
        <div class="input-group-prepend">
          <i class="fas fa-key input-group-text p-2"></i>
        </div>
        <input type="password" class="form-control" name="password" placeholder="輸入密碼">
      </div>
      <button type="submit" name="submit" class="btn btn-dark">登入</button>
    </div>
  </form>
</div>

<?php include("footer.php") ?>
