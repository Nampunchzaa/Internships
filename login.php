<?php
session_start();
include('db_connect.php');

$loginError = "";

if (isset($_POST['login'])) {
    $username = $_POST['Username'];
    $password = $_POST['Password'];

    // เช็คLogin Student
    $stmt = $conn->prepare("SELECT * FROM student WHERE student_id = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $user = $stmt->get_result()->fetch_assoc();

    if ($user && $password === $user['password']) {
        $_SESSION['student_id'] = $user['student_id'];
        $_SESSION['role'] = 'student';
        header("Location: view_status.php");
        exit();
    } 

    // เช็คLogin Staff
    $stmt2 = $conn->prepare("SELECT * FROM staff WHERE username = ?");
    $stmt2->bind_param("s", $username);
    $stmt2->execute();
    $staff = $stmt2->get_result()->fetch_assoc();

    if ($staff && $password === $staff['password']) {
        $_SESSION['staff_id'] = $staff['staff_id'];
        $_SESSION['role'] = $staff['role'];
        header("Location: view_all.php");
        exit();
    } else {
        $loginError = "Username หรือ Password ไม่ถูกต้อง";
    }
}
?>

<!-- หน้าhtml -->
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ Internship</title>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./style_php.css">
</head>
<body>
    <!-- ส่วนกล่อง Login -->
<div class="login">
    <div class="login-card">
        <img src="img/Logo_of_Srinakharinwirot_University.svg.png" alt="logo" class="logo-img">
        <h2 class="login-title">ระบบจัดการข้อมูลการฝึกงานนิสิต</h2>
        <?php if($loginError): ?>
            <p style="color:var(--primary-red); margin-bottom: 20px; font-weight: 500;"><?= $loginError ?></p>
        <?php endif; ?>

        <form method="post" action="login.php">
            <div class="form-group" style="text-align: left;">
                <label for="Username">รหัสนิสิต / ชื่อผู้ใช้งาน</label>
                <input type="text" name="Username" id="Username" placeholder="Username" required>
            </div>
            
            <div class="form-group" style="text-align: left;">
                <label for="Password">รหัสผ่าน</label>
                <input type="password" name="Password" id="Password" placeholder="Password" required>
            </div>

            <button type="submit" name="login" class="btn btn-primary mt-4" style="width: 100%;">เข้าสู่ระบบ</button>
        </form>
        
        <p class="mt-4" style="font-size: 0.85rem; color: var(--gray-dark); opacity: 0.6;">
           © 2026 ระบบจัดการข้อมูลการฝึกงาน | คณะมนุษยศาสตร์  สาขาวิชาสารสนเทศศึกษา มหาวิทยาลัยศรีนครินทรวิโรฒ
        </p>
    </div>
</div>
</body>
</html>