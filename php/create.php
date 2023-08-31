<?php 
    require_once('connect.php');
    if (isset($_POST['submit'])) {
        $sql = "INSERT INTO `equipment_borrowing` (`equipment`,`amount`,`borrower`, `name`, `created_at`, `updated_at`) 
            VALUES (
                    '".htmlspecialchars($_POST['equipment'], ENT_QUOTES, 'UTF-8')."', 
                    '".htmlspecialchars($_POST['amount'], ENT_QUOTES, 'UTF-8')."', 
                    '".htmlspecialchars($_POST['borrower'], ENT_QUOTES, 'UTF-8')."',
                    '".htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8')."',
                    '".htmlspecialchars($_POST['created_at'], ENT_QUOTES, 'UTF-8')."',
                    '".htmlspecialchars($_POST['updated_at'], ENT_QUOTES, 'UTF-8')."' )";
        if ($conn->query($sql)) {
            echo '<script> alert("เพิ่มข้อมูลเสร็จเรียบร้อย ✅")</script>';
            header('Refresh:0; url= ../');
        } else {
            echo '<script> alert("เพิ่มข้อมูลไม่สำเร็จ ❌")</script>';
            header('Refresh:0; url= ../form-create.php');
        }
    }
    $conn->close();
?>