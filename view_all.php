<?php
session_start();
include('db_connect.php');

if (!isset($_SESSION['role']) || !isset($_SESSION['staff_id'])) {
    header("Location: login.php");
    exit();
}

// ช่องค้นหา
$search = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';
$where_clause = "";
if ($search != '') {
    $where_clause = " WHERE (st.fullname LIKE '%$search%' OR st.student_id LIKE '%$search%' OR c.company_name LIKE '%$search%') ";
}

// เรียงลำดับ
$sort_option = isset($_GET['sort_by']) ? $_GET['sort_by'] : 'request_id_desc';

switch ($sort_option) {
    case 'request_id_asc':  $order_sql = "ir.request_id ASC"; break;
    case 'request_id_desc': $order_sql = "ir.request_id DESC"; break;
    case 'student_id':      $order_sql = "st.student_id ASC"; break;
    case 'status':          $order_sql = "ir.status ASC"; break;
    case 'date_newest':     $order_sql = "ir.created_at DESC"; break;
    case 'date_oldest':     $order_sql = "ir.created_at ASC"; break;
    default:                $order_sql = "ir.request_id DESC";
}

// ดึงข้อมูลผู้ใช้ 
$staff_id = $_SESSION['staff_id'];
$stmt = $conn->prepare("SELECT * FROM staff WHERE staff_id = ?");
$stmt->bind_param("s", $staff_id);
$stmt->execute();
$staff = $stmt->get_result()->fetch_assoc();

// ดึงข้อมูลคำขอฝึกงาน
$sql = "SELECT ir.*, s.status_name, st.fullname, st.year, st.email AS student_email, c.company_name 
        FROM internship_request ir 
        JOIN status s ON ir.status = s.status_id 
        JOIN student st ON ir.student_id = st.student_id 
        LEFT JOIN company c ON ir.company_id = c.company_id 
        $where_clause
        ORDER BY $order_sql";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบจัดการคำขอฝึกงาน | Internship Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./style_php.css">
    <style>
        .filter-section {
            display: flex;
            gap: 15px;
            align-items: flex-end;
            flex-wrap: wrap;
        }
        .filter-section .form-group {
            flex: 1;
            min-width: 200px;
        }
        .btn-group-vertical {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <div class="nav-name">
            <img src="img\Srinakharinwirot_Logo_TH_White.png" alt="logo" class="nav-logo">
            <div class="nav-text">ระบบจัดการข้อมูลการฝึกงานนิสิต <br><p class="is">คณะมนุษยศาสตร์ สาขาวิชาสารสนเทศศึกษา</p></div>
        </div>
        <div class="nav-links">
            <!-- ✅ แก้จาก student เป็น staff -->
            <span style="font-weight: 500; color: var(--white); margin-right: 15px;">
                <?= htmlspecialchars($staff['fullname']) ?>
            </span>
            <a href="login.php" class="btn btn-outline">ออกจากระบบ</a>
        </div>
    </nav>

    <div class="container" style="max-width: 1200px;">
        <div class="card">
            <h2>รายการคำขอฝึกงานทั้งหมด</h2>
            
            <form method="GET" action="" class="mb-4">
                <div class="filter-section">
                    <div class="form-group">
                        <label>ค้นหาข้อมูล</label>
                        <input type="text" name="search" value="<?= htmlspecialchars($search) ?>" placeholder="ชื่อนิสิต, รหัส, หรือบริษัท">
                    </div>
                    
                    <div class="form-group">
                        <label>เรียงลำดับตาม</label>
                        <select name="sort_by" onchange="this.form.submit()">
                            <option value="request_id_desc" <?= $sort_option == 'request_id_desc' ? 'selected' : '' ?>>เลขที่คำขอ (ใหม่-เก่า)</option>
                            <option value="request_id_asc" <?= $sort_option == 'request_id_asc' ? 'selected' : '' ?>>เลขที่คำขอ (เก่า-ใหม่)</option>
                            <option value="student_id" <?= $sort_option == 'student_id' ? 'selected' : '' ?>>รหัสนิสิต</option>
                            <option value="status" <?= $sort_option == 'status' ? 'selected' : '' ?>>สถานะ</option>
                            <option value="date_newest" <?= $sort_option == 'date_newest' ? 'selected' : '' ?>>วันที่ยื่น (ล่าสุด)</option>
                        </select>
                    </div>

                    <div style="display: flex; gap: 10px;">
                        <button type="submit" class="btn btn-primary">ค้นหา</button>
                        <a href="view_all.php" class="btn btn-primary">ล้างค่า</a>
                    </div>
                </div>
            </form>

            <div class="table-container" style="overflow-x: auto;">
                <table>
                    <thead>
                        <tr>
                            <th>เลขที่</th>
                            <th>รหัสนิสิต</th>
                            <th>ชื่อ-นามสกุล</th>
                            <th>ชั้นปี</th>
                            <th>บริษัท</th>
                            <th>วันที่ยื่น</th>
                            <th>สถานะ</th>
                            <th>รายละเอียด</th> <!-- ✅ เพิ่ม -->
                            <th>จัดการสถานะ</th>
                            <th>นิเทศสหกิจศึกษา</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(mysqli_num_rows($result) > 0): ?>
                            <?php while($row = mysqli_fetch_assoc($result)): 
                                $status_class = '';
                                if ($row['status'] == 1) $status_class = 'badge-pending';
                                elseif ($row['status'] == 2) $status_class = 'badge-approved';
                                elseif ($row['status'] == 3) $status_class = 'badge-rejected';
                            ?>
                            <tr>
                                <td>#<?= $row['request_id'] ?></td>
                                <td style="font-weight: 600;"><?= htmlspecialchars($row['student_id']) ?></td>
                                <td><?= htmlspecialchars($row['fullname']) ?></td>
                                <td>ชั้นปีที่ <?= htmlspecialchars($row['year']) ?></td>
                                <td style="font-weight: 500;"><?= htmlspecialchars($row['company_name'] ?: '-') ?></td>
                                <td><?= date('d/m/Y', strtotime($row['created_at'])) ?></td>
                                <td>
                                    <span class="badge <?= $status_class ?>">
                                        <?= htmlspecialchars($row['status_name']) ?>
                                    </span>
                                </td>

                                <!-- ✅ ปุ่มรายละเอียด -->
                                <td style="text-align: center;">
                                    <a href="status_all.php?id=<?= $row['request_id'] ?>" 
                                       class="btn btn-primary"
                                       style="padding: 6px 12px; font-size: 0.8rem;">
                                        รายละเอียด
                                    </a>
                                </td>

                                <td style="text-align: center; vertical-align: middle;">
                                    <a href="update_status.php?id=<?= $row['request_id'] ?>" 
                                       class="btn btn-supervision"
                                       style="display: inline-block; white-space: nowrap; padding: 6px 12px; font-size: 0.8rem; background-color: var(--primary-red); color: var(--white); border-radius: 4px; text-decoration: none;">
                                        แก้ไขสถานะ
                                    </a>
                                </td>

                                <td>
                                    <div class="btn-group-vertical">
                                        <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'teacher'): ?>
                                            
                                            <?php if ($row['status'] == 3 || $row['status'] == 4): ?>
                                            <a href="supervision.php?id=<?= $row['request_id'] ?>" class="btn btn-success" style="padding: 6px 12px; font-size: 0.8rem; background-color: #28a745; color: white; border-radius: 4px; text-decoration: none; text-align: center;">
                                                บันทึกผล
                                            </a>
                                            <?php endif; ?>

                                            <a href="view_supervision.php?id=<?= $row['request_id'] ?>" class="btn btn-success" style="padding: 5px 10px; font-size: 0.75rem; background-color: #4310bb; color: white;border-radius: 4px; text-decoration: none; text-align: center;">
                                                ผลการนิเทศ
                                            </a>

                                        <?php else: ?>

                                            <a href="view_supervision.php?id=<?= $row['request_id'] ?>" class="btn btn-info" style="padding: 6px 12px; font-size: 0.8rem; background-color: #4310bb; color: white; border-radius: 4px; text-decoration: none; text-align: center;">
                                                ผลการนิเทศ
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <!-- ✅ แก้ colspan -->
                                <td colspan="10" class="text-center" style="padding: 40px; color: var(--gray-dark);">
                                    ไม่พบข้อมูลคำขอฝึกงาน
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <footer class="friendly-footer">
        <p>© 2026 ระบบจัดการข้อมูลการฝึกงาน | ส่วนงานเจ้าหน้าที่</p>
    </footer>

</body>
</html>