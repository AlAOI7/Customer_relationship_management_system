<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>إنشاء حساب</title>
    <!-- إعداد المتصفح للاستجابة لعرض الشاشة -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="node_modules/ionicons/dist/css/ionicons.css">
    <!-- النمط العام -->
    <link rel="stylesheet" href="css/AdminLTE.min.css">

    <!-- دعم HTML5 و Respond.js للعناصر والاستعلامات في IE8 -->
    <!-- تحذير: لا يعمل Respond.js عند عرض الصفحة عبر file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- خط Google -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body>
    <?php
    session_start();
    include 'conn.php';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    // التحقق من الاتصال
    if (!$conn) {
        die("فشل الاتصال: " . mysqli_connect_error());
    }
    if (!isset($_POST['email'])) {
        if ($_SESSION['Rol'] == 'Admin') {
            header("location: crm.php");
        } else {
            header("location: index.php");
        }
    }
    // استعلام للتحقق مما إذا كان البريد الإلكتروني موجودًا بالفعل
    $checkEmail = "SELECT * FROM root WHERE Email = '$_POST[email]' ";
    // المتغير $result يحتوي على بيانات الاتصال والاستعلام
    $result = $conn->query($checkEmail);
    // المتغير $count يحتوي على نتيجة الاستعلام
    $count = mysqli_num_rows($result);
    // إذا كان $count يساوي 1، فهذا يعني أن البريد الإلكتروني موجود بالفعل في قاعدة البيانات
    if ($count == 1) {
        echo "<br />" . "البريد الإلكتروني موجود بالفعل في قاعدة البيانات." . "<br />";
        echo "<a href='index.php'>استرجع كلمة المرور هنا</a>.";
    } else {
        /*
        إذا لم يكن البريد الإلكتروني موجودًا، يتم إرسال البيانات من النموذج إلى قاعدة البيانات
        ويتم إنشاء الحساب.
        */
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        // الدالة password_hash() تحول كلمة المرور إلى صيغة مشفرة قبل إرسالها إلى قاعدة البيانات
        $passHash = password_hash($pass, PASSWORD_DEFAULT);
        // استعلام لإرسال الاسم والبريد الإلكتروني وكلمة المرور المشفرة إلى قاعدة البيانات
        $query = "INSERT INTO root (Name, Email, Password) VALUES ('$name', '$email', '$passHash')";
        if (mysqli_query($conn, $query)) {
            echo "<div class='alert alert-success' role='alert'><h3>تم إنشاء حسابك بنجاح.</h3>
            <a class='btn btn-outline-primary' href='index.php' role='button'>تسجيل الدخول</a></div>";
        } else {
            echo "خطأ: " . $query . "<br>" . mysqli_error($conn);
        }
    }
    mysqli_close($conn);
    ?>
</body>
</html>
