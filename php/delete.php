<?php 

    require_once('connect.php');
    if (isset($_GET['id'])) {
        $sql = "DELETE FROM equipment_borrowing WHERE id = '". $conn->real_escape_string($_GET['id'])."' ";
        if ($conn->query($sql)) {
            echo '<script> alert("ลบข้อมูลเสร็จเรียบร้อย ✅")</script>';
            header('Refresh:0; url= ../');
        } else {
            echo '<script> alert("ลบข้อมูลไม่สำเร็จ ❌")</script>';
            header('Refresh:0; url= ../');
        }
    }
    $conn->close();
?>