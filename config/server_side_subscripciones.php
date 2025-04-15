<?php

/*
 * مثال على نص خادم معالجة DataTables.
 *
 * يرجى ملاحظة أن هذا النص بسيط للغاية ليوضح كيف يمكن
 * تنفيذ معالجة الخادم، ومن المحتمل ألا ينبغي استخدامه كأساس
 * لنظام كبير ومعقد. إنه مناسب لحالات الاستخدام البسيطة 
 * ولأغراض التعلم.
 *
 * راجع http://datatables.net/usage/server-side للحصول على التفاصيل الكاملة
 * حول متطلبات معالجة الخادم لـ DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * تعيين المتغيرات بسهولة
 */

// جدول قاعدة البيانات للاستخدام
$table = 'suscripcion';

// المفتاح الأساسي للجدول
$primaryKey = 'id';

// مصفوفة من أعمدة قاعدة البيانات التي يجب قراءتها وإرسالها إلى DataTables.
// تمثل معلمة `db` اسم العمود في قاعدة البيانات، بينما تمثل معلمة `dt` 
// معرف عمود DataTables. في هذه الحالة، أسماء معلمات الكائن
$columns = array(
    array( 'db' => 'Id', 'dt' => 'Id' ),
    array( 'db' => 'Costo',  'dt' => 'Costo' ),
    array( 'db' => 'Caracteristicas',   'dt' => 'Caracteristicas' ),
    array( 'db' => 'Id_Company',     'dt' => 'Id_Company' )
);

// معلومات اتصال خادم SQL
$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db'   => 'crm',
    'host' => 'localhost'
);


/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * إذا كنت تريد فقط استخدام التكوين الأساسي لـ DataTables مع PHP
 * على الخادم، فلا حاجة لتحرير ما دون هذا السطر.
 */

require( 'ssp.class.php' );

echo json_encode(
    SSP::simple( $_POST, $sql_details, $table, $primaryKey, $columns )
);