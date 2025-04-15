<?php
session_start();
?>
<?php include 'config/head.php'; ?>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="index.html"><b>Segurin</b>CRM</a>
    </div>
    <!-- /.login-logo -->
  </div>
  <div class="container">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">ملفي الشخصي</h3>
      </div>
      <!-- /.box-header -->
      <?php
      if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
      {
      } else {
          echo "<div class='alert alert-danger' role='alert'>
          <h4>يجب تسجيل الدخول للوصول إلى هذه الصفحة.</h4>
          <p><a href='login.html'>سجل الدخول هنا!</a></p></div>";
          exit;
      }
          // التحقق من الوقت الحالي عند بدء الصفحة الرئيسية
          $now = time();
          if ($now > $_SESSION['expire'] )
          {
              session_destroy();
              echo "<div class='alert alert-danger' role='alert'>
              <h4>انتهت صلاحية جلستك!</h4>
              <p><a href='login.html'>سجل الدخول هنا</a></p></div>";
              exit;
          }
      ?>
      <!-- بدء النموذج -->
      <form role="form">
        <div class="box-body">
          <div class="form-group">
            <label for="Email">البريد الإلكتروني:</label>
            <input type="email" class="form-control" id="Email" placeholder="أدخل البريد الإلكتروني">
          </div>
          <div class="form-group">
            <label for="Password">كلمة المرور:</label>
            <input type="password" class="form-control" id="Password" placeholder="كلمة المرور">
          </div>
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
          <button type="submit" class="btn btn-primary">حفظ التغييرات</button>
        </div>
      </form>
      <p><a href="crm.php">العودة إلى نظام CRM</a></p>
      <p><a href="logout.php">تسجيل الخروج</a></p>
    </div>
  </div>
  <?php include 'config/body.php'; ?>
</body>

</html>
