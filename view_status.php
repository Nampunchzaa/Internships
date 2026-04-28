<?php
session_start();
include('db_connect.php');

// 1. ตรวจสอบสิทธิ์ (Security Check)
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'student' || !isset($_SESSION['student_id'])) {
    header("Location: login.php");
    exit();
}

$student_id = $_SESSION['student_id'];

// 2. ดึงข้อมูลนิสิต
$stmt_user = $conn->prepare("SELECT * FROM student WHERE student_id = ?");
$stmt_user->bind_param("s", $student_id);
$stmt_user->execute();
$student = $stmt_user->get_result()->fetch_assoc();

// 3. ดึงรายการคำขอฝึกงาน และดึงข้อมูลการนิเทศ (supervision_record) มาด้วย
$sql = "SELECT ir.*, s.status_name, c.company_name, 
               sv.supervision_id, sv.file_path 
        FROM internship_request ir
        JOIN status s ON ir.status = s.status_id
        LEFT JOIN company c ON ir.company_id = c.company_id
        LEFT JOIN supervision sv ON ir.request_id = sv.request_id
        WHERE ir.student_id = ?
        ORDER BY ir.created_at DESC";

$stmt_req = $conn->prepare($sql);
$stmt_req->bind_param("s", $student_id);
$stmt_req->execute();
$result = $stmt_req->get_result();

$requests = [];
while ($row = $result->fetch_assoc()) {
    $requests[] = $row;
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สถานะการฝึกงาน | Internship System</title>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./style_php.css">
    <style>
        .alert-remark { background-color: #fff3cd; color: #856404; padding: 20px; border-radius: 8px; border-left: 6px solid #ffc107; margin-bottom: 25px; }
        .badge-warning { background-color: #ffc107; color: #000; }
        .btn-success { background-color: #28a745; color: white; border: none; text-decoration: none; border-radius: 4px; }
        .btn-success:hover { background-color: #218838; }
        .file-link { font-size: 0.75rem; color: #007bff; text-decoration: underline; display: block; margin-top: 5px; }
    </style>
</head>
<body>
    <!-- navbar -->
    <nav class="navbar">
        <div class="nav-name">
            <img src="img\Srinakharinwirot_Logo_TH_White.png" alt="logo" class="nav-logo">
            <div class="nav-text">ระบบจัดการข้อมูลการฝึกงานนิสิต <br><p class="is">คณะมนุษยศาสตร์ สาขาวิชาสารสนเทศศึกษา</p></div>
        </div>
        <div class="nav-links">
            <span style="font-weight: 500; color: var(--white); margin-right: 15px;"><?= htmlspecialchars($student['fullname']) ?></span>
            <a href="login.php" class="btn btn-outline">ออกจากระบบ</a>
        </div>
    </nav>
    <!-- ข้อมูลส่วนตัวนิสิต -->
    <div class="container">
        <div class="card">
            <h2>ข้อมูลส่วนตัวนิสิต</h2>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px;">
                <div><label>รหัสนิสิต</label><p style="font-weight: 600;"><?= $student['student_id'] ?></p></div>
                <div><label>ชื่อ-นามสกุล</label><p style="font-weight: 600;"><?= $student['fullname'] ?></p></div>
                <div><label>ชั้นปี</label><p style="font-weight: 600;"><?= $student['year'] ?></p></div>
                <div><label>อีเมล</label><p style="font-weight: 600;"><?= $student['email'] ?></p></div>
            </div>
        </div>
        <!-- ตรวจสอบสถานะการฝึกงาน -->
        <div class="mb-4" style="display: flex; justify-content: space-between; align-items: center;">
            <h2>ตรวจสอบสถานะการฝึกงาน</h2>
            <a href="register.php" class="btn btn-primary">+ กรอกข้อมูลการฝึกงาน</a>
        </div>
        <!-- แจ้งเตือนหากต้องแก้ไขข้อมูล -->
        <?php foreach ($requests as $req): ?>
            <?php if ($req['status'] == 9): ?>
                <div class="alert-remark">
                    <strong>รายการที่ต้องแก้ไข(#<?= $req['request_id'] ?>)</strong>
                    <div>หมายเหตุ: <?= htmlspecialchars($req['remark'] ?: 'โปรดแก้ไขข้อมูล') ?></div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
        <!-- ตารางแสดงสถานะการฝึกงาน -->
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>เลขที่</th>
                        <th>บริษัท</th>
                        <th>ระยะเวลา</th>
                        <th>สถานะปัจจุบัน</th>
                        <th>หมายเหตุ</th> 
                        <th style="text-align: center;">รายละเอียด</th> 
                        <th style="text-align: center;">นิเทศน์สหกิจศึกษา</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- รายการคำร้อง -->
                    <?php if (count($requests) > 0): ?>
                        <?php foreach ($requests as $row): 
                            $status_class = '';
                            if ($row['status'] == 1) $status_class = 'badge-pending';
                            elseif ($row['status'] == 2) $status_class = 'badge-approved';
                            elseif ($row['status'] == 3) $status_class = 'badge-rejected';
                            elseif ($row['status'] == 9) $status_class = 'badge-warning';
                        ?>
                            <tr>
                                <td style="font-weight: 600;">#<?= $row['request_id'] ?></td>
                                <td><?= $row['company_name'] ?: '-' ?></td>
                                <td style="font-size: 0.85rem;"><?= date('d/m/Y', strtotime($row['start_date'])) ?> - <?= date('d/m/Y', strtotime($row['end_date'])) ?></td>
                                <td>
                                    <span class="badge <?= $status_class ?>"><?= $row['status_name'] ?></span>
                                </td>
                                <td style="font-size: 0.85rem; color: #dc3545;">
                                    <?= htmlspecialchars($row['remark'] ?: '-') ?>
                                </td>
                                <td style="text-align: center;">
                                    <a href="status_all.php?id=<?= $row['request_id'] ?>" class="btn btn-primary" style="padding: 5px 10px; font-size: 0.75rem;">รายละเอียด</a>
                                </td>
                                <td style="text-align: center;">
                                    <div style="display: flex; flex-direction: column; gap: 5px; align-items: center;">
                                        <?php if ($row['status'] == 9): ?>
                                            <a href="edit_register.php?id=<?= $row['request_id'] ?>" class="btn btn-warning" style="padding: 5px 10px; font-size: 0.75rem;">แก้ไขข้อมูล</a>
                                        <?php endif; ?>

                                        <?php if ($row['supervision_id']): ?>
                                            <a href="view_supervision.php?id=<?= $row['request_id'] ?>" class="btn btn-success" style="padding: 5px 10px; font-size: 0.75rem; background-color: #4310bb; color: white;">ผลการนิเทศ</a>
                                            <?php if ($row['file_path']): ?>
                                                <a href="uploads/supervision/<?= $row['file_path'] ?>" target="_blank" class="file-link">ดาวน์โหลดไฟล์แนบ</a>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <span style="color: #ccc; font-size: 0.75rem;">- ไม่มีข้อมูลนิเทศ -</span>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="7" class="text-center" style="padding: 40px;">ยังไม่มีข้อมูลการยื่นคำร้อง</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>