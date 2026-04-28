<?php
session_start();
include('db_connect.php');

// ✅ อนุญาตทั้ง student และ staff
if (!isset($_SESSION['role'])) {
    header("Location: login.php");
    exit();
}

// ✅ ต้องมี id
if (!isset($_GET['id'])) {
    header("Location: login.php");
    exit();
}

$request_id = $_GET['id'];

// =======================
// 🔥 แยกตาม role
// =======================

if ($_SESSION['role'] === 'student') {

    // 👉 student ดูได้เฉพาะของตัวเอง
    $student_id = $_SESSION['student_id'];

    $sql = "SELECT ir.*, st.fullname, st.email, st.phone, st.year,
                   c.company_name, c.address, c.contact_name, s.status_name
            FROM internship_request ir
            JOIN student st ON ir.student_id = st.student_id
            LEFT JOIN company c ON ir.company_id = c.company_id
            JOIN status s ON ir.status = s.status_id
            WHERE ir.request_id = ? AND ir.student_id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $request_id, $student_id);

} else {

    // 👉 staff ดูได้ทุกคน
    $sql = "SELECT ir.*, st.fullname, st.email, st.phone, st.year,
                   c.company_name, c.address, c.contact_name, s.status_name
            FROM internship_request ir
            JOIN student st ON ir.student_id = st.student_id
            LEFT JOIN company c ON ir.company_id = c.company_id
            JOIN status s ON ir.status = s.status_id
            WHERE ir.request_id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $request_id);
}

$stmt->execute();
$row = $stmt->get_result()->fetch_assoc();

// ❌ ไม่มีข้อมูล
if (!$row) {
    echo "ไม่พบข้อมูล";
    exit();
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>รายละเอียดสถานะ</title>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./style_php.css">
</head>
<body>
<!-- navbar -->
<nav class="navbar">
    <div class="nav-name">
            <img src="img\Srinakharinwirot_Logo_TH_White.png" alt="logo" class="nav-logo">
            <div class="nav-text">ระบบจัดการข้อมูลการฝึกงานนิสิต <br><p class="is">คณะมนุษยศาสตร์ สาขาวิชาสารสนเทศศึกษา</p></div>
        </div>

    <div class="nav-links">
        <?php
        // ✅ ปุ่มย้อนกลับตาม role
        if ($_SESSION['role'] === 'student') {
            $back_link = 'view_status.php';
        } else {
            $back_link = 'view_all.php';
        }
        ?>
        <a href="<?= $back_link ?>" class="btn btn-outline">ย้อนกลับ</a>
    </div>
</nav>

<div class="container" style="max-width: 800px;">
    <div class="card">
        <h2>รายละเอียดคำขอฝึกงาน</h2>
        <p>เลขที่คำขอ: #<?= $row['request_id'] ?></p>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px; margin-top:20px;">
            
            <!-- ข้อมูลนิสิต -->
            <div style="background: var(--gray-light); padding: 20px; border-radius: 8px;">
                <h4>ข้อมูลนิสิต</h4>
                <p><strong>ชื่อ:</strong> <?= $row['fullname'] ?></p>
                <p><strong>รหัสนิสิต:</strong> <?= $row['student_id'] ?></p>
                <p><strong>ชั้นปี:</strong> <?= $row['year'] ?></p>
                <p><strong>อีเมล:</strong> <?= $row['email'] ?></p>
            </div>

            <!-- ข้อมูลบริษัท -->
            <div style="background: var(--gray-light); padding: 20px; border-radius: 8px;">
                <h4>ข้อมูลบริษัท</h4>
                <p><strong>บริษัท:</strong> <?= $row['company_name'] ?: '-' ?></p>
                <p><strong>ตำแหน่งงาน:</strong> <?= $row['job_position'] ?: '-' ?></p>
                <p><strong>ผู้ติดต่อ:</strong> <?= $row['contact_name'] ?: '-' ?></p>
                <p><strong>ที่อยู่:</strong> <?= $row['address'] ?: '-' ?></p>
            </div>
        </div>

        <hr>

        <!-- สถานะ -->
        <div style="text-align:center;">
            <h3>สถานะปัจจุบัน</h3>
            
            <!-- แสดงสถานะตามค่า status -->
            <?php
            $status_class = '';
            if ($row['status'] == 1) $status_class = 'badge-pending';
            elseif ($row['status'] == 2) $status_class = 'badge-approved';
            elseif ($row['status'] == 3) $status_class = 'badge-rejected';
            ?>

            <span class="badge <?= $status_class ?>" style="padding:10px 20px; font-size:1rem;">
                <?= $row['status_name'] ?>
            </span>
        </div>

    </div>
</div>
<!-- footer -->
<footer class="friendly-footer">
    <p>© 2026 ระบบจัดการข้อมูลการฝึกงาน | คณะมนุษยศาสตร์ สาขาวิชาสารสนเทศศึกษา มหาวิทยาลัยศรีนครินทรวิโรฒ</p>
</footer>

</body>
</html>