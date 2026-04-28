<?php
session_start();
include('db_connect.php');

// ตรวจสอบสิทธิ์การ Login
if (!isset($_SESSION['student_id']) || !isset($_GET['id'])) {
    header("Location: view_status.php");
    exit();
}

$student_id_session = $_SESSION['student_id'];
$request_id = $_GET['id'];

// ดึงข้อมูล internship_request ที่สถานะ = 9
$sql_old = "SELECT ir.*, c.company_name, c.address, c.contact_name 
            FROM internship_request ir 
            LEFT JOIN company c ON ir.company_id = c.company_id 
            WHERE ir.request_id = ? AND ir.student_id = ? AND ir.status = 9";
$stmt_old = $conn->prepare($sql_old);
$stmt_old->bind_param("is", $request_id, $student_id_session);
$stmt_old->execute();
$old_data = $stmt_old->get_result()->fetch_assoc();

if (!$old_data) {
    echo "<script>alert('ไม่สามารถแก้ไขรายการนี้ได้'); window.location.href='view_status.php';</script>";
    exit();
}

// ดึงข้อมูลนิสิต
$stmt_user = $conn->prepare("SELECT * FROM student WHERE student_id = ?");
$stmt_user->bind_param("s", $student_id_session);
$stmt_user->execute();
$student = $stmt_user->get_result()->fetch_assoc();

// บันทึกข้อมูลเมื่อ Submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $company_name = $_POST['company_name'];
    $job_position = $_POST['job_position'];
    $address      = $_POST['address'];
    $contact_name = $_POST['contact_name'];
    $start_date   = $_POST['start_date'];
    $end_date     = $_POST['end_date'];
    $company_id   = $old_data['company_id'];

    $conn->begin_transaction();
    try {
        // Update ข้อมูลบริษัท
        $upd_com = $conn->prepare("UPDATE company SET company_name = ?, job_position = ?, address = ?, contact_name = ? WHERE company_id = ?");
        $upd_com->bind_param("sssss", $company_name, $job_position, $address, $contact_name, $company_id);
        $upd_com->execute();

        // Update วันที่ และเปลี่ยนสถานะกลับเป็น 1 (รอตรวจสอบ)
        $upd_req = $conn->prepare("UPDATE internship_request SET start_date = ?, end_date = ?, status = 1 WHERE request_id = ?");
        $upd_req->bind_param("ssi", $start_date, $end_date, $request_id);
        $upd_req->execute();

        $conn->commit();
        echo "<script>alert('บันทึกการแก้ไขและส่งตรวจสอบอีกครั้งเรียบร้อยแล้ว'); window.location.href='view_status.php';</script>";
    } catch (Exception $e) {
        $conn->rollback();
        echo "เกิดข้อผิดพลาด: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูลการฝึกงาน</title>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./style_php.css">
</head>
<body>
    <nav class="navbar">
        <div class="nav-name">
            <img src="img/Srinakharinwirot_Logo_TH_White.png" alt="logo" class="nav-logo">
            <div class="nav-text">ระบบจัดการข้อมูลการฝึกงานนิสิต <br><p class="is">คณะมนุษยศาสตร์ สาขาวิชาสารสนเทศศึกษา</p></div>
        </div>
        <div class="nav-links"><a href="view_status.php" class="btn btn-outline">ย้อนกลับ</a></div>
    </nav>

    <div class="container-edit">
        <div class="card">
            <h3>ข้อมูลนิสิต</h3>
            <p>รหัสนิสิต: <b><?= $student['student_id'] ?></b> | ชื่อ: <b><?= $student['fullname'] ?></b></p>
        </div>

        <div class="card-edit">
            <h2>แก้ไขรายละเอียดการฝึกงาน (สถานะ: แก้ไขข้อมูล)</h2>
            <form method="post">
                <div style="display: grid; grid-template-columns: 1fr 2fr; gap: 20px;">
                    <div class="form-group">
                        <label>รหัสบริษัท</label>
                        <input type="text" value="<?= $old_data['company_id'] ?>" readonly style="background: #f4f4f4;">
                    </div>
                    <div class="form-group">
                        <label>ชื่อบริษัท</label>
                        <input type="text" name="company_name" value="<?= $old_data['company_name'] ?>" required>
                    </div>
                </div>

                <div class="form-group">
                    <label>ตำแหน่งการทำงาน</label>
                    <input type="text" name="job_position" value="<?= $old_data['job_position'] ?>" required>
                </div>

                <div class="form-group">
                    <label>ที่อยู่บริษัท</label>
                    <textarea name="address" rows="3"><?= $old_data['address'] ?></textarea>
                </div>

                <div class="form-group">
                    <label>ชื่อผู้ติดต่อ</label>
                    <input type="text" name="contact_name" value="<?= $old_data['contact_name'] ?>">
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <div class="form-group">
                        <label>วันที่เริ่มฝึกงาน</label>
                        <input type="date" name="start_date" value="<?= $old_data['start_date'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label>วันที่สิ้นสุดการฝึกงาน</label>
                        <input type="date" name="end_date" value="<?= $old_data['end_date'] ?>" required>
                    </div>
                </div>

                <div style="display: flex; justify-content: flex-end; margin-top: 20px; gap: 10px;">
                    <button type="submit" class="btn btn-primary">ยืนยันการแก้ไขข้อมูล</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>