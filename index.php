<?php
require_once('php/connect.php');
$sql = "SELECT * FROM equipment_borrowing";
$result = $conn->query($sql);
?>
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
            <div class="shadow rounded p-5 bg-body h-100">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <h2 class="pb-4 text-center"><i class="bi bi-wrench-adjustable"></i> ระบบยืม-คืนอุปกรณ์</h2>
                        <a href="form-create.php" class="btn btn-primary"><i class="bi bi-plus-circle"></i>
                            เพิ่มรายการอุปกรณ์</a><br>
                        <span class="float-end mb-2">มีข้อมูลทั้งหมด <?php echo $result->num_rows ?> รายการ </span>
                    </div>
                    <div class="col-lg-10">
                        <div class="table-responsive">
                            <?php if ($result->num_rows > 0) : ?>
                                <table class="table table-bordered ">
                                    <thead>
                                        <tr class="text-center text-light bg-dark">
                                            <th>#</th>
                                            <th>อุปกรณ์</th>
                                            <th>จำนวน</th>
                                            <th>ชื่อผู้ให้ยืม</th>
                                            <th>ชื่อผู้ยืม</th>
                                            <th>วันยืม</th>
                                            <th>วันคืน</th>
                                            <th>คืนล่าช้า</th>
                                            <th>จัดการ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 0;
                                        while ($row = $result->fetch_assoc()) :
                                            $i++;
                                        ?>
                                            <tr class="text-center">
                                                <td> <?php echo $i ?> </td>
                                                <td> <?php echo $row['equipment'] ?> </td>
                                                <td> <?php echo $row['amount'] ?> </td>
                                                <td> <?php echo $row['borrower'] ?> </td>
                                                <td> <?php echo $row['name'] ?> </td>
                                                <td> <?php echo dateThai($row['created_at']) ?> </td>
                                                <td> <?php echo dateThai($row['updated_at']) ?> </td>
                                                <td>
                                                <?php
                                                    $current_date = time();
                                                    $borrowed_date = strtotime($row['created_at']);
                                                    $due_date = strtotime($row['updated_at']);

                                                    $days_late = ($current_date - $due_date) / (60 * 60 * 24);

                                                    if ($days_late > 0) {
                                                        echo "<b class='text-danger'>เลยกำหนด</b>";
                                                    } elseif ($days_late == 0) {
                                                        echo "<b>ถึงกำหนด</b>";
                                                    } else {
                                                        echo "<b>--</b>";
                                                    }
                                                    ?>

                                                </td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#my-modal<?php echo $row['id'] ?>" style="width: 75px;"> เพิ่มเติม </button>
                                                        <a href="form-update.php?id=<?php echo $row['id'] ?>" class="btn btn-warning"> แก้ไข </a>
                                                        <a href="php/delete.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">
                                                            ลบ </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <!-- Modal -->
                                            <div class="modal fade" id="my-modal<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">รายละเอียด</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>ชื่ออุปกรณ์: <?php echo $row['equipment'] ?></p>
                                                            <p>ชื่อผู้ยืม: <?php echo $row['name'] ?></p>
                                                            <hr>
                                                            <p>วันที่สร้าง: <?php echo dateThai($row['created_at']) ?></p>
                                                            <p>วันที่แก้ไข: <?php echo dateThai($row['updated_at']) ?></p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ออก</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            <?php
                            else :
                                echo "<p class='mt-5'>ไม่มีข้อมูลในฐานข้อมูล</p>";
                            endif;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap5 แบบ bundle คือการนำ Popper มารวมไว้ในไฟล์เดียว -->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <?php $conn->close() ?>
</body>

</html>