<?php
session_start();
include('db_connect.php');

if (!isset($_SESSION['role'])) {
    header("Location: login.php"); exit();
}

$request_id = $_GET['id'];

// ดึงข้อมูลจากตาราง supervision
$sql = "SELECT sr.*, ir.student_id, st.fullname, c.company_name, sf.fullname as teacher_name
        FROM supervision sr
        JOIN internship_request ir ON sr.request_id = ir.request_id
        JOIN student st ON ir.student_id = st.student_id
        LEFT JOIN company c ON ir.company_id = c.company_id
        JOIN staff sf ON sr.staff_id = sf.staff_id
        WHERE sr.request_id = ?";

$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Error SQL: " . $conn->error);
}

$stmt->bind_param("i", $request_id);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows === 0) {
    echo "<script>alert('ยังไม่มีข้อมูลการนิเทศสำหรับคำขอนี้'); window.location.href='view_all.php';</script>";
    exit();
}

$data = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ผลการนิเทศสหกิจศึกษา</title>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./style_php.css">
</head>
<body class="sv-body-bg">

<nav class="navbar">
    <div class="nav-name">
            <img src="img\Srinakharinwirot_Logo_TH_White.png" alt="logo" class="nav-logo">
            <div class="nav-text">ระบบจัดการข้อมูลการฝึกงานนิสิต <br><p class="is">คณะมนุษยศาสตร์ สาขาวิชาสารสนเทศศึกษา</p></div>
    </div>
    <div class="nav-links">
        <?php
            if (isset($_SESSION['role']) && $_SESSION['role'] === 'student') {
            $back_link = 'view_status.php';
            } else {
            // staff / admin / role อื่นๆ
            $back_link = 'view_all.php';
            }
        ?>
    <a href="<?= $back_link ?>" class="btn btn-outline">ย้อนกลับ</a>
</div>
</nav>
    
<div class="sv-main-container">
    <div class="sv-header-title">
        <h2>ผลการนิเทศสหกิจศึกษา</h2>
    </div>

    <div class="sv-detail-card">
        <div class="sv-info-grid">
            <div class="sv-info-box">
                <label>รหัสนิสิต</label>
                <p><?= htmlspecialchars($data['student_id']) ?></p>
            </div>
            <div class="sv-info-box">
                <label>ชื่อ-นามสกุล</label>
                <p><?= htmlspecialchars($data['fullname']) ?></p>
            </div>
            <div class="sv-info-box">
                <label>บริษัทที่ฝึกงาน</label>
                <p><?= htmlspecialchars($data['company_name'] ?: '-') ?></p>
            </div>
            <div class="sv-info-box">
                <label>อาจารย์ผู้นิเทศ</label>
                <p><?= htmlspecialchars($data['teacher_name']) ?></p>
            </div>
        </div>

        <hr class="sv-divider">

        <div class="sv-result-section">
            <div class="sv-result-row">
                <span class="sv-label">วันที่นิเทศ:</span>
                <span class="sv-date-text"><?= date('d/m/Y', strtotime($data['supervision_date'])) ?></span>
            </div>
            <div class="sv-result-row">
                <span class="sv-label">ผลการประเมิน:</span>
                <?php if ($data['supervision_result'] == 'ผ่านการนิเทศ'): ?>
                    <span class="sv-badge sv-badge-pass">ผ่านการนิเทศ</span>
                <?php else: ?>
                    <span class="sv-badge sv-badge-fail">ไม่ผ่านการนิเทศ</span>
                <?php endif; ?>
            </div>
        </div>

        <div class="sv-comment-wrapper">
            <label class="sv-label">รายละเอียด / ความคิดเห็นเพิ่มเติม:</label>
            <div class="sv-comment-box">
                <?= nl2br(htmlspecialchars($data['result_detail'])) ?>
            </div>
        </div>

        <div class="sv-action-bar">

            <?php if (!empty($data['file_path'])): ?>
                <div>
                    <a href="uploads/supervision/<?= htmlspecialchars($data['file_path']) ?>" target="_blank" class="btn btn-primary sv-btn-file">
                        ดูไฟล์เอกสาร
                    </a>
                </div>
            <?php endif; ?>
        </div>

    </div>
</div>

</body>
</html>