<?php
session_start();
?>
<?php include 'config/head.php'; ?>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="index.php"><b>Segurin</b>CRM</a>
        </div>
        <!-- شعار تسجيل الدخول -->

<?php
    // ملف معلومات الاتصال
    include 'conn.php';
    // متغيرات الاتصال
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    // التحقق من الاتصال
    if (!$conn) {
        die("فشل الاتصال: " . mysqli_connect_error());
    }
    // البيانات المرسلة من نموذج login.html
    $email = $_POST['email'];
    $password = $_POST['password'];
    // الاستعلام المرسل إلى قاعدة البيانات
    $result = mysqli_query($conn, "SELECT Email, Password, Name, img_profile FROM root WHERE Email = '$email'");
    // المتغير $row يحتوي على نتيجة الاستعلام
    $row = mysqli_fetch_assoc($result);
    // المتغير $hash يحتوي على كلمة المرور المشفرة في قاعدة البيانات
    $hash = $row['Password'];

    /*
    الدالة password_verify() تتحقق مما إذا كانت كلمة المرور التي أدخلها المستخدم
    تطابق كلمة المرور المشفرة في قاعدة البيانات. إذا كان كل شيء على ما يرام، يتم
    إنشاء الجلسة لمدة دقيقة واحدة. غيّر 1 في $_SESSION['start'] إلى 5 لجلسة مدتها 5 دقائق.
    */
    if (password_verify($_POST['password'], $hash)) {
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['name'] = $row['Name'];
        $_SESSION['email'] = $row['Email'];
        $_SESSION['image'] = $row['img_profile'];
        $_SESSION['start'] = time();
        $_SESSION['Rol'] = 'Admin';
        $_SESSION['expire'] = $_SESSION['start'] + (1 * 60);
        header('Location: crm.php');
    } else {
        echo "
        <div class='login-box-body'>
            <div class='col'>
                <div class='box box-default'>
                    <div class='box-header'>
                        <i class='fa fa-bullhorn'></i>
                        <h3 class='box-title'>تنبيه</h3>
                    </div>
                    <!-- رأس الصندوق -->
                    <div class='box-body'>
                        <div class='callout callout-danger'>
                            <h4>البريد الإلكتروني أو كلمة المرور غير صحيحة!</h4>
                            <p><a href='index.php'><strong>يرجى المحاولة مرة أخرى!</strong></a></p>
                        </div>
                    </div>
                </div>
                <!-- جسم الصندوق -->
            </div>
        </div>";
    }
?>
    </div>
</div>
<?php include 'config/body.php'; ?>
</body>
</html>
