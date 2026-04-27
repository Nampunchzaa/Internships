<?php
session_start();
include('db_connect.php');

if(isset($_POST['send'])){
    $message = $_POST['message'];

    if(!empty($message)){
        $stmt = $conn->prepare("INSERT INTO messages (message) VALUES (?)");
        $stmt->bind_param("s", $message);
        $stmt->execute();
    }
}

// ตอบกลับ 
if(isset($_POST['reply_btn'])){
    $id = $_POST['id'];
    $reply = $_POST['reply'];

    if(!empty($reply)){
        $stmt = $conn->prepare("UPDATE messages SET reply=? WHERE id=?");
        $stmt->bind_param("si", $reply, $id);
        $stmt->execute();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Information Study</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;600;700&display=swap" rel="stylesheet">
    
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg sticky-top custom-nav">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center text-white" href="index.php" style="margin-right: 1rem;">
            <img src="img/logo1.png" alt="Logo" class="d-inline-block align-text-top me-3 logo-circle">
            <div style="font-size: 1.2rem; line-height: 1.2;">
                <strong>มหาวิทยาลัยศรีนครินทรวิโรฒ</strong><br>
                <small>คณะมนุษยศาสตร์ สาขาสารสนเทศศึกษา</small>
            </div>
        </a> <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto"> 
                <li class="nav-item"><a class="nav-link text-white" href="index.php">หน้าหลัก</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="course.php">หลักสูตร</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="student.php">ข้อมูลนิสิต</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="professer.php">บุคลากร</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="login.php">Internship</a></li>
            </ul>
        </div>
    </div>
</nav>

</body>
<!-- Header -->
 <header class="py-5">
<section class="py-5">
    <h1 class="text-center mb-5" style="color: brown;">Welcome To Information Study</h1>
    <div class="container">
        <div class="bento-scroll-container" id="autoScrollContainer">
            
            <div class="bento-scroll-item" data-bs-toggle="modal" data-bs-target="#modal1">
                <img src="img/1.png" alt="Project 1">
            </div>
            <div class="bento-scroll-item" data-bs-toggle="modal" data-bs-target="#modal2">
                <img src="img/2.png" alt="Project 2">
            </div>
             <div class="bento-scroll-item" data-bs-toggle="modal" data-bs-target="#modal3">
                <img src="img/3.png" alt="Project 3">
            </div>
             <div class="bento-scroll-item" data-bs-toggle="modal" data-bs-target="#modal4">
                <img src="img/4.png" alt="Project 4">
             </div>
             <div class="bento-scroll-item" data-bs-toggle="modal" data-bs-target="#modal5">
                <img src="img/5.png" alt="Project 5">
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="modal1" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content bg-transparent border-0">
            <div class="modal-body p-0 text-center position-relative">
                <img src="img/1.png" class="img-fluid rounded-4 shadow-lg" style="max-height: 85vh;">
                <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3" data-bs-dismiss="modal"></button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal2" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content bg-transparent border-0">
            <div class="modal-body p-0 text-center position-relative">
                <img src="img/2.png" class="img-fluid rounded-4 shadow-lg" style="max-height: 85vh;">
                <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3" data-bs-dismiss="modal"></button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal3" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content bg-transparent border-0">
            <div class="modal-body p-0 text-center position-relative">
                <img src="img/3.png" class="img-fluid rounded-4 shadow-lg" style="max-height: 85vh;">
                <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3" data-bs-dismiss="modal"></button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal4" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content bg-transparent border-0">
            <div class="modal-body p-0 text-center position-relative">
                <img src="img/4.png" class="img-fluid rounded-4 shadow-lg" style="max-height: 85vh;">
                <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3" data-bs-dismiss="modal"></button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal5" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content bg-transparent border-0">
            <div class="modal-body p-0 text-center position-relative">
                <img src="img/5.png" class="img-fluid rounded-4 shadow-lg" style="max-height: 85vh;">
                <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3" data-bs-dismiss="modal"></button>
            </div>
        </div>
    </div>
</div>

  <!-- กล่องบุคลากร โฮมเพจ -->
    <section class="container py-5">
    <h1 class="text-center mb-5" style="color: brown;">คณะบุคลากร</h1>
    
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
        
        <div class="col">
            <div class="card h-100 personnel-card shadow-sm">
                <img src="img/dit.jpg" alt="อาจารย์ ดร.ดิษฐ์">
                <div class="overlay-info">
                    <strong>อาจารย์ ดร.ดิษฐ์ สุทธิวงศ์</strong> <br>
                    <small>(ประธานกรรมการบริหารหลักสูตร)</small>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 personnel-card shadow-sm">
                <img src="img/thiti-scaled.jpg" alt="...">
                <div class="personnel-info">
                    <strong>อาจารย์ ดร.ฐิติ อติชาติชยากร</strong>
                    <small>(เลขานุการหลักสูตร)</small>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 personnel-card shadow-sm">
                <img src="img/Vipakorn-200x300.jpg" alt="...">
                <div class="personnel-info">
                    <strong>ผู้ช่วยศาสตราจารย์ ดร.วิภากร วัฒนสินธุ์</strong>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 personnel-card shadow-sm">
                <img src="img/Chokthamrong.jpg" alt="...">
                <div class="personnel-info">
                    <strong>อาจารย์ ดร.โชคธำรงค์ จงจอหอ</strong>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 personnel-card shadow-sm">
                <img src="img/Chotima.jpg" alt="...">
                <div class="personnel-info">
                        <strong>อาจารย์โชติมา วัฒนะ</strong>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 personnel-card shadow-sm">
                <img src="img/Dussadee-683x1024.jpg" alt="...">
                <div class="personnel-info">
                        <strong>ผู้ช่วยศาสตราจารย์ ดร.ดุษฏี สีวังคำ</strong>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 personnel-card shadow-sm">
                <img src="img/Sasipimol-683x1024.jpg" alt="...">
                <div class="personnel-info">
                        <strong>ผู้ช่วยศาสตราจารย์ <br> ดร.ศศิพิมล ประพินพงศกร</strong>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 personnel-card shadow-sm">
                <img src="img/Sumattra-683x1024.jpg" alt="...">
                <div class="personnel-info">
                        <strong>อาจารย์ ดร.ศุมรรษตรา แสนวา</strong>
                </div>
            </div>
        </div>

    </div>
</section>


<!-- ประชาสัมพันธ์ กิจกรรม ผลงาน โครงการ -->
 <h1 class="text-center mb-4" style="color: brown;" > โครงการ ผลงานต่างๆ</h1>
<p class="subtitle text-center">ผลงาน รางวัล และโครงการต่างๆที่สาขาสารสนเทศศึกษา ได้จัดตั้งขึ้น</p>
<section class="modern-slider-section">
    <div class="container">
        <div class="slider-wrapper">
            <div class="horizontal-slider">
                
                <div class="info-card">
                    <div class="card-img">
                        <img src="img/โครงการ01.jpg" alt="Detail 1">
                    </div>
                    <div class="card-content">
                        <span class="card-number">01</span>
                        <h4 class="card-title">วิจัยระดับนานาชาติ</h4>
                        <p class="card-desc">บทความเรื่อง: “Information Services of Bangkok Metropolitan Administration’s Discovery Learning Libraries: Roles and Potential in Driving the Sustainable Development Goals (SDGs)”</p>
                        <a href="https://l.facebook.com/l.php?u=https%3A%2F%2Fso08.tci-thaijo.org%2Findex.php%2Fartssu%2Farticle%2Fview%2F5283&h=AT6SsTISY3cpgDoSGKHNxdN_G-kWcoXqx-bHmCNqM4JFOnL6OLTQ-yaMkNXFJ2qLCoabKXSGE96myTptAcYMYBwWMlUXQUQH0aOJlMNhhvLGftHA3ZzJ30DiPuye_UJs6zmb0pUBaRgEQNp50QBJimt_GGEvuLQt&__tn__=-UK-R&c[0]=AT7legRiseB-5-68PhRCcPuhTO86IEByPQYt6dAqVKHOKYZ95ymdgHMzToIpq9ojdAIZXYfrOywuHjiHa5MV2Rhh3Q-5b6Frh05wP8eFqgJAzLGwKexC6LtDKm107HWfWzcYzzVVUhDpkjYBglML3NoJZAXg26q8dkvq2wlyc8mkvSlgJ5N7wKhzsgSkycU" class="btn-more">รายละเอียดเพิ่มเติม <i class="bi bi-plus-lg"></i></a>
                    </div>
                </div>

                <div class="info-card">
                    <div class="card-img">
                        <img src="img/โครงการ2.jpg" alt="Detail 2">
                    </div>
                    <div class="card-content">
                        <span class="card-number">02</span>
                        <h4 class="card-title">จัดโครงการ Humanities Together: Forwarding Human Potential </h4>
                        <p class="card-desc">กลุ่มสาขาวิชาพัฒนาศักยภาพมนุษย์ คณะมนุษยศาสตร์ มหาวิทยาลัยศรีนครินทรวิโรฒ ได้จัดโครงการ Humanities Together: Forwarding Human Potential ณ นีรา รีทรีท โฮเทล สามพราน จ.นครปฐม 
คณาจารย์และบุคลากรได้มีโอกาสแลกเปลี่ยนเรียนรู้กับวิทยากรโดยตรง ผ่านกิจกรรมที่เน้นการมีส่วนร่วมและการออกแบบและจัดทำหลักสูตรระยะสั้นในลักษณะของ Reskill/Upskill  ที่เกิดการบูรณาการเฉพาะศาสตร์หรือการบูรณาการข้ามศาสตร์เพื่อส่งเสริมการเรียนรู้ตลอดชีวิต✌🏻</p>
                    </div>
                </div>

                <div class="info-card">
                    <div class="card-img">
                        <img src="img/โครงการ03.jpg" alt="Detail 3">
                    </div>
                    <div class="card-content">
                        <span class="card-number">03</span>
                        <h4 class="card-title">จัดโครงการ “พัฒนาระบบสารสนเทศเพื่อการบริหารจัดการองค์กร”</h4>
                        <p class="card-desc">ภายในกิจกรรมมีการอบรมเชิงปฏิบัติการเกี่ยวกับ Automation, Workflow และ Cyber Security เพื่อเสริมทักษะการใช้เทคโนโลยีในการบริหารจัดการงานและการใช้ระบบสารสนเทศอย่างปลอดภัย</p>
                    </div>
                </div>

                <div class="info-card">
                    <div class="card-img">
                        <img src="img/โครงการ04.jpg" alt="Detail 4">
                    </div>
                    <div class="card-content">
                        <span class="card-number">04</span>
                        <h4 class="card-title">ขอแสดงความยินดีกับ <br>“ผู้ช่วยศาสตราจารย์ ดร.ศศิพิมล ประพินพงศกร”</h4>
                        <p class="card-desc">หลักสูตรฯ ขอแสดงความยินดี ในโอกาสได้รับคัดเลือกเป็นผู้ทรงคุณวุฒิดีเด่น ระดับวารสาร ประจำปี 2568 (Reviewer Recognition and Certificate by Editor: RRC-E 2025) จากวารสารจำนวน 2 รายชื่อ
✅วารสาร Journal of Information Science Research and Practice
✅วารสาร Electronic Journal of Open and Distance Innovative Learning : e-JODIL
จัดโดย TCI ศูนย์ดัชนีการอ้างอิงวารสารไทย (Thai-Journal Citation Index Centre)</p>
                    </div>
                </div>

                <div class="info-card">
                    <div class="card-img">
                        <img src="img/โครงการ05.jpg" alt="Detail 5">
                    </div>
                    <div class="card-content">
                        <span class="card-number">05</span>
                        <h4 class="card-title">จัดโครงการพัฒนาห้องสมุดโรงเรียนสู่ชุมชน </h4>
                        <p class="card-desc">หลักสูตรสารสนเทศศึกษา จัดโครงการ "พัฒนาห้องสมุดโรงเรียนสู่ชุมชน" เมื่อวันที่ 23 ก.พ. 2569 ณ โรงเรียนสุเหร่าสามอิน กรุงเทพฯ เพื่อพัฒนาแหล่งเรียนรู้และจัดกิจกรรมส่งเสริมการอ่าน 4 ฐาน แก่นักเรียนชั้น ป.4 โครงการสำเร็จลุล่วงด้วยดีจากการสนับสนุนของคณะผู้บริหาร คณาจารย์ และความร่วมมือจากนักเรียนทุกคน</p>
                    </div>
                </div>

                <div class="info-card">
                    <div class="card-img">
                        <img src="img/โครงการ06.jpg" alt="Detail 6">
                    </div>
                    <div class="card-content">
                        <span class="card-number">06</span>
                        <h4 class="card-title">อบรมเชิงปฏิบัติการ: สร้างนวัตกรรมท้องถิ่นจาก Soft Power ด้วยมนุษยศาสตร์ดิจิทัล</h4>
                        <p class="card-desc">เมื่อวันที่ 23 มกราคม 2568 สาขาวิชาสารสนเทศศึกษา คณะมนุษยศาสตร์ ร่วมกับส่วนกิจการเพื่อสังคม มศว จัดกิจกรรมสร้างนวัตกรชุมชนผ่านกระบวนการ "มนุษยศาสตร์ดิจิทัล (Digital Humanities)" เพื่อผลักดัน Soft Power ท้องถิ่นสู่เศรษฐกิจสร้างสรรค์ ณ อบต.บ้านช้าง และโรงเรียนบ้านช้าง จ.พระนครศรีอยุธยา ภายใต้โครงการพัฒนาสังคมฯ และโครงการ Reinventing University ปี 2568 ของกระทรวง อว. เพื่อขับเคลื่อนการพัฒนาเชิงพื้นที่แบบองค์รวมอย่างยั่งยืน</p>
                    </div>
                </div>

                </div>
        </div>
    </div>
</section>

<!-- TCAS -->

<figure style="margin-top: 30px;">
  
</figure>

<h1 class="text-center mb-4" style="color: brown;" > IS ADMINSION</h1>
<p class="subtitle text-center">ระบบรับนิสิตใหม่ สาขาสารสนเทศศึกษา</p>

<figure style="margin-top: 30px;">
  
</figure>

<div class="container-sm card shadow-sm mb-3 mx-auto" style="flex-shrink: 0; border-radius: 15px; border: 1px solid #dee2e6; overflow: hidden; scroll-snap-align: start;">
    
    <div class="card-header border-0 p-0" style="background-color: #DA2128;">
        <ul class="nav nav-tabs card-header-tabs m-0 border-0" id="courseTab" role="tablist">
            <li class="nav-item" style="flex: 1;">
                <button class="nav-link active border-0 text-white w-100 py-3 fw-bold" id="info-tab" data-bs-toggle="tab" data-bs-target="#info-content" type="button" role="tab" style="background: rgba(255,255,255,0.1); border-radius: 0;">รายละเอียด</button>
            </li>
            <li class="nav-item" style="flex: 1;">
                <button class="nav-link border-0 text-white w-100 py-3 fw-bold" id="plan-tab" data-bs-toggle="tab" data-bs-target="#round1-content" type="button" role="tab" style="background: transparent; border-radius: 0;">รอบ1</button>
            </li>
            <li class="nav-item" style="flex: 1;">
                <button class="nav-link border-0 text-white w-100 py-3 fw-bold" id="plan-tab" data-bs-toggle="tab" data-bs-target="#round2-content" type="button" role="tab" style="background: transparent; border-radius: 0;">รอบ2</button>
            </li>
            <li class="nav-item" style="flex: 1;">
                <button class="nav-link border-0 text-white w-100 py-3 fw-bold" id="plan-tab" data-bs-toggle="tab" data-bs-target="#round3-content" type="button" role="tab" style="background: transparent; border-radius: 0;">รอบ3</button>
            </li>
            <li class="nav-item" style="flex: 1;">
                <button class="nav-link border-0 text-white w-100 py-3 fw-bold" id="plan-tab" data-bs-toggle="tab" data-bs-target="#round4-content" type="button" role="tab" style="background: transparent; border-radius: 0;">รอบ4</button>
            </li>
        </ul>
    </div>

    <div class="card-body p-3" style="font-family: 'Sarabun', sans-serif; font-size: 14px;">
        <div class="tab-content" id="courseTabContent">
            
            <div class="tab-pane fade show active" id="info-content" role="tabpanel">
                <div class="mb-3 text-dark py-2 bg-light rounded-3">
                    <span class="badge rounded-pill mb-2 ms-2" style="background-color: #fce8e8; color: #DA2128; padding: 0,5em 1em; font-size: 0.85rem;">ชื่อหลักสูตร</span>
                    <div class="ps-3">       
                        <span class="fw-bold text-dark" style="font-size: 0.85rem; letter-spacing: 1px;">หลักสูตรศิลปศาสตรบัณฑิต สาขาวิชาสารสนเทศศึกษา</span>
                    </div>
                </div>
                
                <div class="mb-3">
                    <span class="badge rounded-pill mb-2" style="background-color: #fce8e8; color: #DA2128; padding: 0.5em 1em; font-size: 0.85rem;">ชื่อหลักสูตรภาษาอังกฤษ</span>
                    <div class="ps-1">
                        <div class="fw-bold text-dark" style="font-size: 0.85rem;">Bachelor of Arts Program in Information Science</div>
                    </div>
                </div>
                
                <div class="mb-3">
                    <span class="badge rounded-pill mb-2" style="background-color: #fce8e8; color: #DA2128; padding: 0.5em 1em; font-size: 0.85rem;">ประเภทหลักสูตร</span>
                    <div class="ps-1">
                        <div class="fw-bold text-dark" style="font-size: 0.85rem;">ภาษาไทย ปกติ</div>
                    </div>
                </div>

                <div class="mb-3">
                    <span class="badge rounded-pill mb-2" style="background-color: #fce8e8; color: #DA2128; padding: 0.5em 1em; font-size: 0.85rem;">วิทยาเขต</span>
                    <div class="ps-1">
                        <div class="fw-bold text-dark" style="font-size: 0.85rem;">ประสานมิตร</div>
                    </div>
                </div>
                <div class="mb-3">
                    <span class="badge rounded-pill mb-2" style="background-color: #fce8e8; color: #DA2128; padding: 0.5em 1em; font-size: 0.85rem;">ค่าใช้จ่าย</span>
                    <div class="ps-1">
                        <div class="fw-bold text-dark" style="font-size: 0.85rem;">17,000</div>
                    </div>
                </div><div class="mb-3">
                    <span class="badge rounded-pill mb-2" style="background-color: #fce8e8; color: #DA2128; padding: 0.5em 1em; font-size: 0.85rem;">อัตราการสำเร็จการศึกษา</span>
                    <div class="ps-1">
                        <div class="fw-bold text-dark" style="font-size: 0.85rem;">ร้อยละ 86.67</div>
                    </div>
                </div><div class="mb-3">
                    <span class="badge rounded-pill mb-2" style="background-color: #fce8e8; color: #DA2128; padding: 0.5em 1em; font-size: 0.85rem;">อัตราการทำงาน</span>
                    <div class="ps-1">
                        <div class="fw-bold text-dark" style="font-size: 0.85rem;">ร้อยละ 71.79</div>
                    </div>
                </div>
                <div class="mb-3">
                    <span class="badge rounded-pill mb-2" style="background-color: #fce8e8; color: #DA2128; padding: 0.5em 1em; font-size: 0.85rem;">ค่ามัธยฐานเงินเดือน</span>
                    <div class="ps-1">
                        <div class="fw-bold text-dark" style="font-size: 0.85rem;">18,319</div>
                    </div>
                </div>
            </div> <div class="tab-pane fade" id="round1-content" role="tabpanel">

              <div class="p-3" style="font-family: 'Sarabun', sans-serif; background-color: #fff;">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="fw-bold d-flex align-items-center m-0" style="color: #DA2128;">
                            <span class="badge rounded-circle me-2" style="background-color: #DA2128; width: 30px; height: 30px; display: flex; align-items: center; justify-content: center; color: white; font-size: 0.85rem;">1</span>
                            Portfolio
                        </h4>
                    </div>
                    <div class="card mb-3" style="border: 2px solid #DA2128; border-radius: 12px; overflow: hidden;">
                        <div class="d-flex justify-content-between align-items-center p-3" style="background-color: #DA2128; color: white; cursor: pointer;" data-bs-toggle="collapse" data-bs-target="#projectDetail">
                            <h6 class="m-0 fw-bold" style="font-size: 0.85rem;">โครงการเด็กดีมีที่เรียน</h6>
                            <div class="small">รับ 10 คน <i class="bi bi-chevron-up ms-1"></i></div>
                        </div>

        <div id="projectDetail" class="collapse show">
            <div class="card-body p-4">
                
                <section class="mb-4">
                    <h6 class="fw-bold text-dark mb-3" style="font-size: 0.85rem;">ข้อมูลพื้นฐาน</h6>
                    <p class="mb-2 fw-bold text-muted small">คุณสมบัติ</p>
                    <ul class="list-unstyled">
                        <li class="mb-2 d-flex align-items-center">
                            <i class="bi bi-check-circle-fill text-success me-2"></i> รับผู้สมัครที่จบจาก รร. หลักสูตรแกนกลาง
                        </li>
                        <li class="mb-2 d-flex align-items-center">
                            <i class="bi bi-check-circle-fill text-success me-2"></i> รับผู้สมัครที่จบจาก รร. หลักสูตรนานาชาติ
                        </li>
                        <li class="mb-2 d-flex align-items-center">
                            <i class="bi bi-check-circle-fill text-success me-2"></i> รับผู้สมัครที่จบจาก รร. หลักสูตรอาชีวะ
                        </li>
                        <li class="mb-2 d-flex align-items-center">
                            <i class="bi bi-check-circle-fill text-success me-2"></i> รับผู้สมัครที่จบจาก รร. หลักสูตรตามอัธยาศัย (กศน.)
                        </li>
                        <li class="mb-3 d-flex align-items-center">
                            <i class="bi bi-check-circle-fill text-success me-2"></i> รับผู้สมัครที่จบหลักสูตร GED
                        </li>
                        <li class="mt-4 d-flex align-items-center fw-bold">
                            <i class="bi bi-check-circle-fill text-success me-2"></i> คะแนน GPAX ต่ำสุด <span class="ms-2 px-2 rounded" style="background-color: #e8f5e9; color: #2e7d32;">2.5</span>
                        </li>
                    </ul>
                </section>

                <section>
                    <h6 class="fw-bold text-dark mb-3" style="font-size: 0.85rem; border-bottom: 2px solid #eee; padding-bottom: 10px;">การคำนวณคะแนน</h6>
                    <div class="row text-center mt-3">
                        <div class="col-6 mb-3 text-start">
                             <div class="p-2 border-start border-4 border-danger bg-light">
                                <div class="small text-secondary">คะแนนแฟ้มสะสมผลงาน</div>
                                <div class="fw-bold">50%</div>
                             </div>
                        </div>
                        <div class="col-6 mb-3 text-start">
                             <div class="p-2 border-start border-4 border-danger bg-light">
                                <div class="small text-secondary">คะแนนสอบสัมภาษณ์</div>
                                <div class="fw-bold">50%</div>
                             </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
</div>
</div> <div class="tab-pane fade" id="round2-content" role="tabpanel">
  <div class="p-3" style="font-family: 'Sarabun', sans-serif; background-color: #fff;">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h4 class="fw-bold d-flex align-items-center m-0" style="color: #DA2128;">
        <span class="badge rounded-circle me-2" style="background-color: #DA2128; width: 30px; height: 30px; display: flex; align-items: center; justify-content: center; color: white; font-size: 0.8rem;">2</span>
        Quota
      </h4>
    </div>
    <div class="card mb-3" style="border: 2px solid #DA2128; border-radius: 12px; overflow: hidden;">
      <div class="d-flex justify-content-between align-items-center p-3" style="background-color: #DA2128; color: white; cursor: pointer;" data-bs-toggle="collapse" data-bs-target="#projectDetail">
        <h6 class="m-0 fw-bold">ไม่เปิดรับสมัครในรอบนี้</h6>
        <div class="small">รับ 0 คน <i class="bi bi-chevron-up ms-1"></i>
        </div>
      </div>
    </div>
  </div>
</div><div class="tab-pane fade" id="round3-content" role="tabpanel">
    
<div class="p-3" style="font-family: 'Sarabun', sans-serif; background-color: #fff;">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold d-flex align-items-center m-0" style="color: #DA2128;">
            <span class="badge rounded-circle me-2" style="background-color: #DA2128; width: 30px; height: 30px; display: flex; align-items: center; justify-content: center; color: white; font-size: 0.8rem;">3</span>
            Admisson</h4>
        </div>
        <div class="card mb-3" style="border: 2px solid #DA2128; border-radius: 12px; overflow: hidden;">
            <div class="d-flex justify-content-between align-items-center p-3" style="background-color: #DA2128; color: white; cursor: pointer;" data-bs-toggle="collapse" data-bs-target="#projectDetail">
                <h6 class="m-0 fw-bold">Admisson(รับร่วมกัน)</h6>
                <div class="small">รับ 40 คน <i class="bi bi-chevron-up ms-1"></i></div>
            </div>

        <div id="projectDetail" class="collapse show">
            <div class="card-body p-4">
                
                <section class="mb-4">
                    <h6 class="fw-bold text-dark mb-3" style="font-size: 0.85rem;">ข้อมูลพื้นฐาน</h6>
                    <p class="mb-2 fw-bold text-muted small">คุณสมบัติ</p>
                    <ul class="list-unstyled">
                        <li class="mb-2 d-flex align-items-center">
                            <i class="bi bi-check-circle-fill text-success me-2"></i> รับผู้สมัครที่จบจาก รร. หลักสูตรแกนกลาง
                        </li>
                        <li class="mb-2 d-flex align-items-center">
                            <i class="bi bi-check-circle-fill text-success me-2"></i> ไม่รับผู้สมัครที่จบจาก รร. หลักสูตรนานาชาติ
                        </li>
                        <li class="mb-2 d-flex align-items-center">
                            <i class="bi bi-check-circle-fill text-success me-2"></i> ไม่รับผู้สมัครที่จบจาก รร. หลักสูตรอาชีวะ
                        </li>
                        <li class="mb-2 d-flex align-items-center">
                            <i class="bi bi-check-circle-fill text-success me-2"></i> ไม่รับผู้สมัครที่จบจาก รร. หลักสูตรตามอัธยาศัย (กศน.)
                        </li>
                        <li class="mb-3 d-flex align-items-center">
                            <i class="bi bi-check-circle-fill text-success me-2"></i> ไม่รับผู้สมัครที่จบหลักสูตร GED
                        </li>
                        <li class="mb-3 d-flex align-items-center">
                            <i class="bi bi-check-circle-fill text-success me-2"></i> คะแนน GPAX ต่ำสุด
2.5 <br> GPA ต่ำสุดกลุ่มสาระฯภาษาไทย 2.5 <br>GPA ต่ำสุดกลุ่มสาระฯคณิตศาสตร์ 2.5 <br>GPA ต่ำสุดกลุ่มสาระฯวิทยาศาสตร์และเทคโนโลยี 2.5 <br>
GPA ต่ำสุดกลุ่มสาระฯสังคม ศาสนา และ วัฒนธรรม 2.5 <br> GPA ต่ำสุดกลุ่มสาระฯการงานอาชีพและเทคโนโลยี2.5 <br>GPA ต่ำสุดกลุ่มสาระฯภาษาต่างประเทศ2.5
<br>คะแนนขั้นต่ำวิชา A-Level ภาษาไทย1 <br>คะแนนขั้นต่ำวิชา A-Level ภาษาอังกฤษ1 <br>คะแนนขั้นต่ำวิชา ความถนัดทั่วไป (TGAT)1
<br>คะแนนขั้นต่ำวิชา A-Level สังคมศาสตร์1 <br>คะแนนขั้นต่ำของวิชาใดวิชาหนึ่งระหว่างA-Level คณิตศาสตร์ประยุกต์ 1 (พื้นฐาน+เพิ่มเติม), A-Level คณิตศาสตร์ประยุกต์ 2 (พื้นฐาน)
                        </li>
                </section>

                <section>
                    <h6 class="fw-bold text-dark mb-3" style="font-size: 0.85rem; border-bottom: 2px solid #eee; padding-bottom: 10px;">การคำนวณคะแนน</h6>
                    <div class="row text-center mt-3">
                        <div class="col-6 mb-3 text-start">
                             <div class="p-2 border-start border-4 border-danger bg-light">
                                <div class="small text-secondary">ความถนัดทั่วไป(TGAT)</div>
                                <div class="fw-bold">20%</div>
                             </div>
                        </div>
                        <div class="col-6 mb-3 text-start">
                             <div class="p-2 border-start border-4 border-danger bg-light">
                                <div class="small text-secondary">A-Level สังคมศาสตร์</div>
                                <div class="fw-bold">20%</div>
                             </div>
                        </div>
                        <div class="col-6 mb-3 text-start">
                             <div class="p-2 border-start border-4 border-danger bg-light">
                                <div class="small text-secondary">A-Level ภาษาไทย</div>
                                <div class="fw-bold">20%</div>
                             </div>
                        </div>
                        <div class="col-6 mb-3 text-start">
                             <div class="p-2 border-start border-4 border-danger bg-light">
                                <div class="small text-secondary">A-Level ภาษาอังกฤษ</div>
                                <div class="fw-bold">20%</div>
                             </div>
                        </div>
                        <div class="col-6 mb-3 text-start">
                             <div class="p-2 border-start border-4 border-danger bg-light">
                                <div class="small text-secondary">A-Level คณิตศาสตร์ประยุกต์ 1 (พื้นฐาน+เพิ่มเติม)
[หรือ]A-Level คณิตศาสตร์ประยุกต์ 2 (พื้นฐาน)</div>
                                <div class="fw-bold">20%</div>
                             </div>
                        </div>
                    </div>
                </section>
                </div>
      </div>
    </div>
  </div>
</div><div class="tab-pane fade" id="round4-content" role="tabpanel">
  <div class="p-3" style="font-family: 'Sarabun', sans-serif; background-color: #fff;">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h4 class="fw-bold d-flex align-items-center m-0" style="color: #DA2128;">
        <span class="badge rounded-circle me-2" style="background-color: #DA2128; width: 30px; height: 30px; display: flex; align-items: center; justify-content: center; color: white; font-size: 0.8rem;">4</span>
        Direct Admisson
      </h4>
    </div>
    <div class="card mb-3" style="border: 2px solid #DA2128; border-radius: 12px; overflow: hidden;">
      <div class="d-flex justify-content-between align-items-center p-3" style="background-color: #DA2128; color: white; cursor: pointer;" data-bs-toggle="collapse" data-bs-target="#projectDetail">
        <h6 class="m-0 fw-bold">ไม่เปิดรับสมัครในรอบนี้</h6>
        <div class="small">รับ 0 คน <i class="bi bi-chevron-up ms-1"></i>
        </div>
      </div>
    </div>
  </div>
</div>
</div> 
</div>
</div>
</header>

<figure style="margin-top: 50px;">
  
  
</figure>

<!-- ถามตอบ -->

<meta charset="UTF-8">
<title>Q&A</title>
<link href="https://fonts.googleapis.com/css2?family=Srinakharinwirot:wght@400;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


<div class="containerb">
    <div class="header-box" style="display: block; text-align: center;">
        <div class="logo-circle">Q&A</div>
    </div>

    <!-- ฟอร์มถาม -->
    <form method="POST">
        <textarea name="message" placeholder="พิมพ์ข้อความ..."></textarea>
        <button name="send">ส่งข้อความ</button>
    </form>

    <hr>

<!-- แสดงข้อความ -->
<div class="scroll-box">

<?php
$result = $conn->query("SELECT * FROM messages ORDER BY id DESC");

while($row = $result->fetch_assoc()){
?>
<small style="color:#999;">
<?= date("d/m/Y H:i", strtotime($row['created_at'])) ?>
</small>

    <div class="box">
        <b><i class="bi bi-person-fill"></i> ผู้ถาม :</b>
        <div style="padding: 5px 0 4px 25px; color: #555;">
        <?php echo htmlspecialchars($row['message']); ?>
        </div>

        <?php if($row['reply']){ ?>
            <div class="reply">
                <span class="reply-label">↳ ผู้ตอบ :</span>
                <?php echo htmlspecialchars($row['reply']); ?>
            </div>
        <?php } ?>

        <!-- ฟอร์มตอบ -->
        <form method="POST" class="reply-form">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <textarea name="reply" placeholder="พิมพ์คำตอบของคุณที่นี่..."></textarea>
            <button name="reply_btn">ตอบ</button>
        </form>
    </div>

<?php } ?>

</div>

</div>


<figure style="margin-top: 50px;">

</figure>

<!-- Footer -->
 <footer class="main-footer">
    <div class="footer-container">
        <div class="footer-info">
            <img src="img/Srinakharinwirot_Logo_TH_White.png" alt="Logo" class="footer-logo">
            <h3>สารสนเทศศึกษา</h3>
            <p>คณะมนุษยศาสตร์ มหาวิทยาลัยศรีนครินทรวิโรฒ</p>
        </div>

        <div class="footer-links">
            <h4>ลิงก์ที่เกี่ยวข้อง</h4>
            <ul>
                <li><a href="index.php">หน้าแรก</a></li>
                <li><a href="https://hu.swu.ac.th/">คณะมนุษยศาสตร์</a></li>
                <li><a href="https://www.swu.ac.th/">เว็บไซต์มหาวิทยาลัย</a></li>
            </ul>
        </div>

        <div class="footer-contact">
            <h4>ติดต่อเรา</h4>
            <p>อีเมล: is@g.swu.ac.th</p>
            <p>โทรศัพท์: 02-xxx-xxxx</p>
            <div class="social-icons">
                <a href="https://www.facebook.com/isswuofficial/" class="social-link">FB</a>
            </div>
        </div>
        <div class="footer-contact">
            <h4>ผู้จัดทำ</h4>
                <li>นางสาวชญาดา มหาวรรณ 67101010127</li>
                <li>นางสาวทิพทิวา เทพา 67101010622</li>
                <li>นางสาวมาติกา ศิริพิน 67101010642</li>
                <li>นางสาววรินธร ตั้งกิติวงศ์พร 67101010646</li>
                <li>นางสาววิไลลักษณ์ โฉมทอง 67101010647</li>
                <li>นางสาวสุชาดา สมอบ้าน 67101010648</li>
                <li>นางสาวอรจิรา เหล่าพิเดช 67101010651</li>
        </div>
    </div>

    <div class="footer-bottom">
        <p>&copy; 2026 Information Studies SWU. All Rights Reserved.</p>
    </div>

    <script src="./js/bootstrap.min.js"></script>
</footer>

</body>
</html>   