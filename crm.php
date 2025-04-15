<?php
// بدء جلسة المستخدم
session_start();
// تضمين ملف التحقق من الجلسة
include ('verificar.php');
?>
<?php include 'config/head.php'; ?>
<!--
خيارات وسم BODY:
=================
إضافة واحد أو أكثر من الفئات التالية للحصول على
التأثير المطلوب
|---------------------------------------------------------|
| ألوان التصميم         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|خيارات التصميم | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-black sidebar-mini">
  <div class="wrapper">

    <!-- الرأس الرئيسي -->
    <header class="main-header">

      <!-- الشعار -->
      <a href="index2.html" class="logo">
        <!-- شعار صغير للعرض الجانبي -->
        <span class="logo-mini"><b>س</b>CRM</span>
        <!-- شعار كامل للأجهزة العادية -->
        <span class="logo-lg"><b>Segurin</b>CRM</span>
      </a>

      <!-- شريط التنقل -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- زر لعرض الشريط الجانبي -->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">تبديل التنقل</span>
        </a>
        <!-- قائمة المستخدم -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">

            <!-- قائمة حساب المستخدم -->
            <li class="dropdown user user-menu">
              <!-- زر تبديل القائمة -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- صورة المستخدم -->
                <img src="<?php echo $_SESSION['image'];?>" class="user-image" alt="صورة المستخدم">
                <!-- اسم المستخدم -->
                <span class="hidden-xs"><?php echo $_SESSION['name']; ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- صورة المستخدم في القائمة -->
                <li class="user-header">
                  <img src="<?php echo $_SESSION['image'];?>" class="img-circle" alt="صورة المستخدم">
                  <p>
                    <?php echo $_SESSION['name']; ?>
                    <small><?php echo $_SESSION['email']; ?></small>
                  </p>
                </li>
                <!-- قائمة الخيارات -->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="edit-profile.php" class="btn btn-default btn-flat">تعديل الملف الشخصي</a>
                  </div>
                  <div class="pull-right">
                    <a href="logout.php" class="btn btn-default btn-flat">تسجيل الخروج</a>
                  </div>
                </li>
              </ul>
            </li>
            <!-- زر التحكم في الإعدادات -->
            <li>
              <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!-- العمود الجانبي -->
    <aside class="main-sidebar">

      <!-- شريط القوائم الجانبي -->
      <section class="sidebar">

        <!-- معلومات المستخدم -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src=" <?php echo $_SESSION['image'];?>" class="img-circle" alt="صورة المستخدم">
          </div>
          <div class="pull-left info">
            <p><?php echo $_SESSION['name']; ?></p>
            <!-- الحالة -->
            <a href="#"><i class="fa fa-circle text-success"></i> متصل</a>
          </div>
        </div>
        <!-- قائمة القوائم الجانبية -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">القائمة الرئيسية</li>
          <!-- إضافة روابط أو رموز -->
          <li class="active"><a href="#" id="Inicio"><i class="fa fa-home"></i> <span>الرئيسية</span></a></li>
          <li class="treeview menu-open">
          <a href="#">
            <i class="fa fa-plus"></i> <span>التسجيل</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: block;">
            <li><a href="#" id="R_Clientes"><i class="fa fa-users"></i>العملاء</a></li>
            <li><a href="#" id="R_Companias"><i class="fa fa-building"></i>الشركات</a></li>
            <li><a href="#" id="R_Susbcripciones"><i class="fa fa-id-card"></i>الاشتراكات</a></li>
            <li><a href="#" id="R_Reportes"><i class="fa fa-flag"></i>التقارير</a></li>
          </ul>
          <li class="treeview menu-open">
          <a href="#">
            <i class="fa fa-database"></i> <span>استعلام</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: block;">
            <li><a href="#" id="Clientes"><i class="fa fa-users"></i>العملاء</a></li>
            <li><a href="#" id="Companias"><i class="fa fa-building-o"></i>الشركات</a></li>
            <li><a href="#" id="Susbcripciones"><i class="fa fa-id-card"></i>الاشتراكات</a></li>
            <li><a href="#" id="Reportes"><i class="fa fa-flag"></i>التقارير</a></li>
          </ul>
        </li>
        </ul>
        <!-- نهاية القائمة الجانبية -->
      </section>
      <!-- نهاية الشريط الجانبي -->
    </aside>

    <!-- محتوى الصفحة -->
    <div class="content-wrapper">
      <!-- رأس الصفحة -->
      <section class="content-header">
        <h1>
          الرئيسية
          <small>المعلومات</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
          <li class="active">هنا</li>
        </ol>
      </section>

      <!-- المحتوى الرئيسي -->
      <div>
        <section class="content container-fluid" id="central">
          <!--------------------------
            | إضافة المحتوى هنا |
          -------------------------->
        </section>
      </div>
      <!-- نهاية المحتوى -->
    </div>
    <!-- نهاية المحتوى الرئيسي -->

    <!-- تذييل الصفحة -->
    <footer class="main-footer">
      <!-- اليمين -->
      <div class="pull-right hidden-xs">
        أي شيء تريد
      </div>
      <!-- اليسار -->
      <strong>حقوق النشر &copy; 2016 <a href="#">SegurinCRM</a>.</strong> جميع الحقوق محفوظة.
    </footer>


  </div>
  <!-- نهاية التخطيط -->
<?php include 'config/body.php'; ?>
<!-- استدعاء وظائف جيكويري -->
<script src="js/calls.js" charset="utf-8"></script>

</body>

</html>
