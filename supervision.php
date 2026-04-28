<?php
session_start();
include('db_connect.php');

// ตรวจสอบสิทธิ์อาจารย์หรือแอดมิน
if (!isset($_SESSION['role']) || $_SESSION['role'] == 'student') {
    header("Location: login.php"); exit();
}

$request_id = $_GET['id'];
$staff_id = $_SESSION['staff_id'];

// ดึงข้อมูลนิสิตและบริษัท
$sql = "SELECT ir.*, st.fullname, c.company_name 
        FROM internship_request ir 
        JOIN student st ON ir.student_id = st.student_id 
        LEFT JOIN company c ON ir.company_id = c.company_id 
        WHERE ir.request_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $request_id);
$stmt->execute();
$data = $stmt->get_result()->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $s_date = $_POST['supervision_date'];
    $detail = $_POST['result_detail'];
    $s_result = $_POST['supervision_result']; // รับค่าจาก Dropdown
    $file_name = NULL;

    // ตรวจสอบว่ามีการอัปโหลดไฟล์หรือไม่
    if (isset($_FILES['file_path']) && $_FILES['file_path']['error'] == 0) {
        $target_dir = "uploads/supervision/";
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        
        $file_extension = pathinfo($_FILES["file_path"]["name"], PATHINFO_EXTENSION);
        $file_name = "sup_" . $request_id . "_" . time() . "." . $file_extension;
        $target_file = $target_dir . $file_name;
        
        move_uploaded_file($_FILES["file_path"]["tmp_name"], $target_file);
    }
    
    // บันทึกลงตาราง (เปลี่ยน grade_score เป็น supervision_result)
    $ins_sql = "INSERT INTO supervision (request_id, staff_id, supervision_date, result_detail, supervision_result, file_path) VALUES (?, ?, ?, ?, ?, ?)";
    $ins = $conn->prepare($ins_sql);
    
    if (!$ins) {
        die("Error Prepare INSERT: " . $conn->error);
    }

    // แก้ประเภทตัวแปร (i=int, s=string) -> id เป็น int ที่เหลือเป็น string หมด = "isssss"
    $ins->bind_param("isssss", $request_id, $staff_id, $s_date, $detail, $s_result, $file_name);
    
    if ($ins->execute()) {
        echo "<script>alert('บันทึกผลนิเทศเรียบร้อย'); window.location.href='view_all.php';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาด: " . $ins->error . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>บันทึกผลการนิเทศ</title>
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
            <a href="view_all.php" class="btn btn-outline">ย้อนกลับ</a>
        </div>
    </nav>
    <!-- บันทึกผลการนิเทศ -->
<div class="container-sv">
    <div class="card" style="width: 100%; max-width: 800px;"> 
        <h2 class="text-center" style="margin-bottom: 20px;">บันทึกผลการนิเทศการฝึกงาน</h2>
        
        <div style="background: var(--gray-light, #f4f6f9); padding: 15px; border-radius: 8px; margin-bottom: 25px;">
            <p style="margin-bottom: 5px;"><strong>นิสิต:</strong> <?= htmlspecialchars($data['fullname'] ?? '-') ?></p>
            <p style="margin-bottom: 0;"><strong>บริษัท:</strong> <?= htmlspecialchars($data['company_name'] ?? '-') ?></p>
        </div>
        <!-- ฟอร์มบันทึกผลการนิเทศ -->
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>วันที่นิเทศ:</label>
                <input type="date" name="supervision_date" required class="form-control">
            </div>
            
            <div class="form-group" style="margin-top: 15px;">
                <label>ผลการนิเทศ:</label>
                <select name="supervision_result" class="form-control" required style="padding: 10px; width: 100%; max-width: 300px; border: 2px solid var(--gray-medium); border-radius: 8px;">
                    <option value="">-- เลือกผลการนิเทศ --</option>
                    <option value="ผ่านการนิเทศ">ผ่านการนิเทศ</option>
                    <option value="ไม่ผ่านการนิเทศ">ไม่ผ่านการนิเทศ</option>
                </select>
            </div>

            <div class="form-group" style="margin-top: 15px;">
                <label>รายละเอียดการนิเทศ:</label>
                <textarea name="result_detail" rows="5" class="form-control" placeholder="ระบุผลการฝึกงาน ความคิดเห็นอาจารย์..." required style="width: 100%; padding: 10px; border: 2px solid var(--gray-medium); border-radius: 8px;"></textarea>
            </div>
            
            <div class="form-group" style="margin-top: 15px; margin-bottom: 25px;">
                <label>แนบไฟล์ผลการนิเทศ (PDF, ภาพ, ฯลฯ) *ถ้ามี:</label>
                <input type="file" name="file_path" class="form-control" style="width: 100%; padding: 10px; border: 2px solid var(--gray-medium); border-radius: 8px;">
            </div>
            
            <div style="display: flex; gap: 10px;">
                <button type="submit" class="btn btn-primary" style="flex: 2; padding: 12px;">บันทึกข้อมูล</button>
                <a href="view_all.php" class="btn btn-outline" style="flex: 1; padding: 12px; text-align: center; color: var(--gray-dark); border-color: var(--gray-medium);">ยกเลิก</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>
</body>
</html>