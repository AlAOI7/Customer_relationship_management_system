<?php include 'config/head.php'; ?>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="index.html"><b>Segurin</b>CRM</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg">قم بالتسجيل لبدء الجلسة</p>

      <form action="create-account.php" method="post">
        <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="الاسم" name="name">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="email" class="form-control" placeholder="البريد الإلكتروني" name="email">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="كلمة المرور" name="password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">سجل</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <br>
      <a href="index.php" class="text-center">تسجيل الدخول</a>
    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->
<?php include 'config/body.php'; ?>
</body>

</html>
