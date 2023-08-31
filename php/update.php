<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?php 
    require_once('connect.php');
    if (isset($_POST['submit'])) {
        $sql = "UPDATE equipment_borrowing SET 
                equipment = '".htmlspecialchars($_POST['equipment'], ENT_QUOTES, 'UTF-8')."',
                amount = '".htmlspecialchars($_POST['amount'], ENT_QUOTES, 'UTF-8')."',
                borrower = '".htmlspecialchars($_POST['borrower'], ENT_QUOTES, 'UTF-8')."',
                name = '".htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8')."',
                created_at = '".htmlspecialchars($_POST['created_at'], ENT_QUOTES, 'UTF-8')."',
                updated_at = '".$_POST['updated_at']."'
                WHERE id = '".$conn->real_escape_string($_POST['id'])."' ";
        if ($conn->query($sql)) {
            echo '<script> alert("แก้ไขข้อมูลเสร็จเรียบร้อย ✅")</script>';
            header('Refresh:0; url= ../');
        } else {
            echo '<script> alert("แก้ไขข้อมูลไม่สำเร็จ ❌")</script>';
            header('Refresh:0; url= ../form-update.php');
        }
    }
    $conn->close();
?>
</body>
</html>