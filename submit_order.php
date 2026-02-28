<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// إعداد الاتصال بقاعدة البيانات
$servername = "localhost"; 
$username = "root";        
$password = "";            
$dbname = "cake_store";    

// إنشاء الاتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// التحقق من وجود بيانات النموذج
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $conn->real_escape_string($_POST['full_name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $address = $conn->real_escape_string($_POST['address']);
    $payment_method = $conn->real_escape_string($_POST['payment_method']);
    $cart_data = $conn->real_escape_string($_POST['cart_data']);
    $total_price = $conn->real_escape_string($_POST['total_price']);

    // إدخال البيانات في جدول الطلبات
    $sql = "INSERT INTO orders (full_name, email, phone, address, payment_method, cart_data, total_price)
            VALUES ('$full_name', '$email', '$phone', '$address', '$payment_method', '$cart_data', '$total_price')";

    if ($conn->query($sql) === TRUE) {
        // إعادة التوجيه إلى الصفحة الأصلية ل
        echo "<script>
                alert('Order placed successfully! 🎂');
                setTimeout(function() {
                    window.location.href = 'homey.html'; // عدل إلى الصفحة الرئيسية أو صفحة المنتجات
                }, 1000); // الانتظار لمدة 3 ثوانٍ قبل التوجيه
              </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // غلق الاتصال
    $conn->close();
}
?>
