<?php
if ($_SESSION) {
    if ($_SESSION['Rol'] != 'Admin') {
        echo "<script> 
                alert('ليس لديك الصلاحيات اللازمة');  
                window.location.href=\"http://localhost/crm-master/\";
              </script>";
    }
} else {
    echo "<script> 
            alert('أنت غير مسجل الدخول');  
            window.location.href=\"http://localhost/crm-master/\";
          </script>";
}
?>
