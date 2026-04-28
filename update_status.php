<?php
session_start();
include('db_connect.php');

// 1. ตรวจสอบ Login และสิทธิ์
if (!isset($_SESSION['role']) || !isset($_SESSION['staff_id'])) {
    header("Location: login.php");
    exit();
}

// กำหนดตัวแปรผู้ใช้งานที่เปลี่ยนสถานะ (เพื่อใช้เก็บบันทึก Log)
$changed_by = $_SESSION['staff_id'];

// 2. รับค่า ID จาก URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<script>alert('ไม่พบรหัสคำขอ'); window.location='view_all.php';</script>";
    exit();
}

$request_id = mysqli_real_escape_string($conn, $_GET['id']);

// 3. ดึงข้อมูลคำขอปัจจุบันมาแสดง และเตรียมข้อมูลสำหรับส่ง Webhook 
// *** เพิ่ม st.year, c.contact_name, c.address ใน SQL ***
$sql = "SELECT ir.*, ir.remark as comment, st.fullname, st.email, st.student_id, st.year, 
               c.company_name, c.contact_name, c.address 
        FROM internship_request ir
        JOIN student st ON ir.student_id = st.student_id
        LEFT JOIN company c ON ir.company_id = c.company_id
        WHERE ir.request_id = '$request_id'";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    echo "<script>alert('ไม่พบข้อมูลคำขอในระบบ'); window.location='view_all.php';</script>";
    exit();
}

$old_status = $data['status']; // เก็บสถานะเดิมไว้เพื่อบันทึก Log

// 4. ถ้ามีการกด Submit บันทึกข้อมูล
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_status = $_POST['status'];
    $comment = mysqli_real_escape_string($conn, $_POST['comment']); 

    // อัปเดตสถานะในฐานข้อมูล
    $update_sql = "UPDATE internship_request SET status = ?, remark = ? WHERE request_id = ?";
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param("isi", $new_status, $comment, $request_id);

    if ($stmt->execute()) {
        
        // =========================================================
        // 4.1 บันทึกลงตาราง Log
        // =========================================================
        $log_stmt = $conn->prepare("INSERT INTO status_log (request_id, old_status, new_status, changed_by) VALUES (?, ?, ?, ?)");
        $log_stmt->bind_param("iiis", $request_id, $old_status, $new_status, $changed_by);
        $log_stmt->execute();

        // =========================================================
        // 4.2 เตรียมและส่งข้อมูล Webhook ไป Make.com
        // =========================================================
        // ดึงชื่อสถานะใหม่
        $status_query = $conn->query("SELECT status_name FROM status WHERE status_id = '$new_status'");
        $status_data = $status_query->fetch_assoc();
        $status_name = $status_data ? $status_data['status_name'] : 'ไม่ทราบสถานะ';

        $webhook_url = "https://hook.eu1.make.com/xk5motvkh4wnm6pku3rpjyq551bswb6v"; 

        $webhook_data = array(
            "request_id" => $request_id,
            "fullname" => $data['fullname'],
            "email" => $data['email'], // ดึงมาจากฐานข้อมูลนักศึกษา
            "status_name" => $status_name,
            "comment" => $comment
        );

        $ch = curl_init($webhook_url);
        $payload = json_encode($webhook_data);
        
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
        
        $result = curl_exec($ch);
        
        // เช็คว่ามี Error จากการยิง cURL หรือไม่
        if(curl_errno($ch)){
            error_log('Curl error: ' . curl_error($ch));
        }
        
        curl_close($ch);
        // แจ้งเตือนและกลับไปหน้า view_all.php
        echo "<script>alert('บันทึกสถานะเรียบร้อยแล้ว'); window.location='view_all.php';</script>";
        exit();
    } else {
        echo "<script>alert('เกิดข้อผิดพลาดในการบันทึก');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขสถานะคำขอ | Internship Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./style_php.css">
    <style>
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: 500; }
        select, textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-family: 'Kanit', sans-serif;
        }
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
    <!-- ส่วนจัดเก็บข้อมูล -->
    <div class="container" style="max-width: 800px; margin-top: 50px;">
        <div class="card">
            <h2 class="mb-4">จัดการสถานะคำขอ #<?= htmlspecialchars($data['request_id']) ?></h2>
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px; margin-top:20px; margin-bottom: 30px;">
            
                <div style="background: var(--gray-light, #f8f9fa); padding: 20px; border-radius: 8px;">
                    <h4 style="margin-top: 0; margin-bottom: 15px;">ข้อมูลนิสิต</h4>
                    <p><strong>ชื่อ:</strong> <?= htmlspecialchars($data['fullname']) ?></p>
                    <p><strong>รหัสนิสิต:</strong> <?= htmlspecialchars($data['student_id']) ?></p>
                    <p><strong>ชั้นปี:</strong> <?= htmlspecialchars($data['year']) ?></p>
                    <p><strong>อีเมล:</strong> <?= htmlspecialchars($data['email']) ?></p>
                </div>

                <div style="background: var(--gray-light, #f8f9fa); padding: 20px; border-radius: 8px;">
                    <h4 style="margin-top: 0; margin-bottom: 15px;">ข้อมูลบริษัท</h4>
                    <p><strong>บริษัท:</strong> <?= htmlspecialchars($data['company_name'] ?: '-') ?></p>
                    <p><strong>ผู้ติดต่อ:</strong> <?= htmlspecialchars($data['contact_name'] ?: '-') ?></p>
                    <p><strong>ที่อยู่:</strong> <?= htmlspecialchars($data['address'] ?: '-') ?></p>
                </div>
            </div>
            <!-- ฟอร์มปรับเปลี่ยนสถานะ -->
            <form method="POST">
                <div class="form-group">
                    <label>ปรับเปลี่ยนสถานะ</label>
                    <select name="status" required>
                        <?php
                        // กำหนดสิทธิ์: admin เห็นบางสถานะ, teacher เห็นบางสถานะ
                        $allowed = ($_SESSION['role'] == 'admin') ? [1, 3, 4, 9] : [2, 9];
                        
                        $statuses = $conn->query("SELECT * FROM status");
                        while ($s = $statuses->fetch_assoc()) {
                            if (in_array($s['status_id'], $allowed)) {
                                $selected = ($s['status_id'] == $data['status']) ? 'selected' : '';
                                echo "<option value='{$s['status_id']}' $selected>" . htmlspecialchars($s['status_name']) . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>หมายเหตุ :</label>
                    <textarea name="comment" rows="4" placeholder="เช่น กรุณาแก้ไขเอกสาร..."><?= htmlspecialchars($data['comment'] ?? '') ?></textarea>
                </div>

                <div style="display: flex; gap: 10px; margin-top: 20px;">
                    <button type="submit" class="btn btn-primary" style="flex: 2;">บันทึกการเปลี่ยนแปลง</button>
                    <a href="view_all.php" class="btn btn-outline" style="flex: 1; text-align: center;">ยกเลิก</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>