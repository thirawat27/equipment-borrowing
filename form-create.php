<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบยืม-คืนอุปกรณ์</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="icon" type="image/x-icon" href="logo nvc.png">
    <style>
        .flex-container {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
    </style>
</head>

<body>
    <div class="flex-container bg-dark">
        <div class="container">
            <div class="shadow rounded p-3 bg-body h-100">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <h2 class="pb-4 text-center"><i class="bi bi-wrench-adjustable"></i> ระบบยืม-คืนอุปกรณ์</h2>
                        <h3>เพิ่มรายการอุปกรณ์</h3>
                        <form class="row gy-2" action="php/create.php" method="POST">
                            <div class="col-md-12">
                                <label for="equipment" class="form-label">ชื่ออุปกรณ์</label>
                                <select name="equipment" id="equipment" class="form-control">
                                    <?php
                                    include "php/connect.php";
                                    $sql1 = "SELECT equipment_name FROM equipment_list";
                                    $result1 = mysqli_query($conn, $sql1);
                                    while ($row1 = mysqli_fetch_array($result1)) {
                                    ?>
                                        <option value="<?php echo $row1['equipment_name']; ?>"><?php echo $row1['equipment_name']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="amount" class="form-label">จำนวนอุปกรณ์</label>
                                <input type="number" class="form-control" id="amount" name="amount" placeholder="จำนวนอุปกรณ์" required>
                            </div>
                            <div class="col-md-12">
                                <label for="borrower" class="form-label">ชื่อผู้ให้ยืม</label>
                                <input type="text" class="form-control" id="borrower" name="borrower" placeholder="ชื่อผู้ให้ยืม" required>
                            </div>
                            <div class="col-md-12">
                                <label for="name" class="form-label">ชื่อผู้ยืม</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="ชื่อผู้ยืม" required>
                            </div>
                            <div class="col-md-12">
                                <label for="created_at" class="form-label">วันยืม</label>
                                <input type="date" class="form-control" id="created_at" name="created_at" placeholder="เวลายืม" required>
                            </div>
                            <div class="col-md-12">
                                <label for="updated_at" class="form-label">วันคืน</label>
                                <input type="date" class="form-control" id="updated_at" name="updated_at" placeholder="เวลาคืน" required>
                            </div>
                            <div class="col-12">
                                <button type="submit" name="submit" class="btn btn-success d-block mx-auto">บันทึกการเปลี่ยนแปลง</button>
                            </div>
                        </form>
                        <a href="./" class="btn btn-primary"><i class="bi bi-reply-fill"></i> ย้อนกลับ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Javascript -->
    <!-- Bootstrap5 แบบ bundle คือการนำ Popper มารวมไว้ในไฟล์เดียว -->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>