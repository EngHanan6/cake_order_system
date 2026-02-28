<?php
// تفعيل عرض الأخطاء أثناء التطوير
ini_set('display_errors', 1);
error_reporting(E_ALL);

// إعدادات الاتصال
$servername = "localhost";   // أو 127.0.0.1
$username = "root";          // اسم المستخدم الافتراضي في WAMP
$password = "";              // بدون كلمة مرور غالبًا في WAMP
$dbname = "cake_store";      // اسم قاعدة البيانات

// إنشاء الاتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}
?>
