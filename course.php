<!DOCTYPE html>
<html lang="th">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หลักสูตร</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/course.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Navbar -->
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center text-white" href="index.php" style="margin-right: 1rem;">
            <img src="img/ดีไซน์ที่ยังไม่ได้ตั้งชื่อ (1).png" alt="Logo" class="d-inline-block align-text-top me-3 logo-circle">
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

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ทดสอบ Carousel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

  <!-- เกี่ยวกับหลักสูตร สไลด์ซ้ายขวา -->
<div class="container mt-5">
    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
        
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"></button>
        </div>

        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="3000">
                <img src="img/6.png" class="d-block w-100" alt="รูปที่ 1">
                <div class="carousel-caption d-none d-md-block">
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="3000">
                <img src="img/7.png" class="d-block w-100" alt="รูปที่ 2">
                <div class="carousel-caption d-none d-md-block">
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="3000">
                <img src="img/8.png" class="d-block w-100" alt="รูปที่ 3">
                <div class="carousel-caption d-none d-md-block">
                </div>
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<figure style="margin-top: 50px;">
  
</figure>

<!-- รหัส/ชื่อปริญญา/ผลลัพธ์ -->
 <!-- ชื่อปริญญา -->
<div class="d-flex flex-wrap justify-content-center gap-4">
  
  <div class="card shadow-sm" style="min-width: 20rem; flex-shrink: 0; border-radius: 15px; border: 1px solid #dee2e6; overflow: hidden; scroll-snap-align: start;">
    <div class="card-header border-0 py-3 text-center" style="background-color: #DA2128; color: white;">
      <h6 class="m-0 fw-bold">ชื่อปริญญาและสาขาวิชา</h6>
    </div>
    <div class="card-body p-3">
      <div class="mb-3">
        <span class="badge rounded-pill mb-2" style="background-color: #fce8e8; color: #DA2128; padding: 0.5em 1em;">ภาษาไทย</span>
        <div class="fw-bold text-dark ps-1" style="font-size: 0.95rem;">
          ชื่อเต็ม: ศิลปศาสตรบัณฑิต (สารสนเทศศึกษา)<br>
          <span class="text-secondary small">ชื่อย่อ : ศศ.บ. (สารสนเทศศึกษา)</span>
        </div>
      </div>
      <div>
        <span class="badge rounded-pill mb-2" style="background-color: #fce8e8; color: #DA2128; padding: 0.5em 1em;">English</span>
        <div class="fw-bold text-dark ps-1" style="font-size: 0.95rem;">
          ชื่อเต็ม: Bachelor of Arts (Information Studies)<br>
          <span class="text-secondary small">ชื่อย่อ : B.A. (Information Studies)</span>
        </div>
      </div>
    </div>
  </div>

  <div class="card shadow-sm" style="min-width: 20rem; flex-shrink: 0; border-radius: 15px; border: 1px solid #dee2e6; overflow: hidden; scroll-snap-align: start;">
    <div class="card-header border-0 py-3 text-center" style="background-color: #DA2128; color: white;">
      <h6 class="m-0 fw-bold">ข้อมูลหลักสูตร</h6>
    </div>
    <div class="card-body p-3">
      <div class="mb-3 p-2 bg-light rounded-3">
        <span class="badge rounded-pill mb-1" style="background-color: #fce8e8; color: #DA2128;">รหัสหลักสูตร</span>
        <div class="fw-bold text-dark d-block" style="font-size: 1.1rem;">25520091104002</div>
      </div>
      <div class="mb-3">
        <span class="badge rounded-pill mb-1" style="background-color: #fce8e8; color: #DA2128;">ภาษาไทย</span>
        <div class="fw-bold text-dark ps-1">หลักสูตรศิลปศาสตรบัณฑิต</div>
        <div class="text-secondary small ps-1">สาขาวิชาสารสนเทศศึกษา</div>
      </div>
      <div>
        <span class="badge rounded-pill mb-1" style="background-color: #fce8e8; color: #DA2128;">English</span>
        <div class="fw-bold text-dark ps-1">Bachelor of Arts Program</div>
        <div class="text-secondary small ps-1">Information Studies</div>
      </div>
    </div>
  </div>
</div>

<figure style="margin-top: 50px;">
  
</figure>
  <!-- PLO1 -->
<h1 class="text-center mb-2 fw-bold" style="color: brown; font-size: 2rem;">ผลลัพธ์การเรียนรู้ที่คาดหวังของหลักสูตร</h1>
<section class="py-3">
<div class="container">
<div class="d-flex flex-nowrap gap-3 pb-4" style="overflow-x: auto; -webkit-overflow-scrolling: touch; scroll-snap-type: x mandatory;"></div>
   <div class="card-container plo-item">
    <div class="card h-100">
        <div class="plo-accent-line"></div> 
        <div class="card-body p-4">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <div class="plo-dot"></div> 
              </div>
            <h6 class="plo-title mb-2">ผลลัพธ์การเรียนรู้ที่คาดหวังของหลักสูตร</h6>
            <span class="plo-label">PLO1</span>
            <p class="plo-text">สามารถให้บริการสารสนเทศได้อย่างมีจิตสำนึกสาธารณะ</p>
        </div>
    </div>
</div>
<!-- PLO2 -->
 <div class="card-container plo-item">
    <div class="card h-100 plo-minimal-card">
        <div class="plo-accent-line"></div> 
        <div class="card-body p-4">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <div class="plo-dot"></div> 
            </div>
            <h6 class="plo-title mb-2">ผลลัพธ์การเรียนรู้ที่คาดหวังของหลักสูตร</h6>
            <span class="plo-label">PLO2</span>
            <p class="plo-text">สามารถจัดระบบสารสนเทศได้อย่างถูกต้องและเหมาะสม</p>
        </div>
    </div>
</div>
<!-- PLO3 -->
 <div class="card-container plo-item">
    <div class="card h-100 plo-minimal-card">
        <div class="plo-accent-line"></div>
        <div class="card-body p-4">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <div class="plo-dot"></div> 
            </div>
            <h6 class="plo-title mb-2">ผลลัพธ์การเรียนรู้ที่คาดหวังของหลักสูตร</h6>
            <span class="plo-label">PLO3</span>
            <p class="plo-text">สามารถออกแบบและพัฒนาระบบงานสารสนเทศ</p>
        </div>
    </div>
</div>
<!-- PLO4 -->
 <div class="card-container plo-item">
    <div class="card h-100 plo-minimal-card">
        <div class="plo-accent-line"></div> 
        <div class="card-body p-4">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <div class="plo-dot"></div> 
            </div>
            <h6 class="plo-title mb-2">ผลลัพธ์การเรียนรู้ที่คาดหวังของหลักสูตร</h6>
            <span class="plo-label">PLO4</span>
            <p class="plo-text">สามารถสืบค้น วิเคราะห์ แปลผลข้อมูล เพื่อนำเสนอและสื่อสารได้เหมาะสม กับทุกระดับผู้ใช้งาน</p>
        </div>
    </div>
</div>
<!-- PLO5 -->
 <div class="card-container plo-item">
    <div class="card h-100 plo-minimal-card">
        <div class="plo-accent-line"></div> 
        <div class="card-body p-4">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <div class="plo-dot"></div> </div>
            <h6 class="plo-title mb-2">ผลลัพธ์การเรียนรู้ที่คาดหวังของหลักสูตร</h6>
            <span class="plo-label">PLO5</span>
            <p class="plo-text">สามารถบูรณาการความรู้ เพื่อการทำวิจัยและผลงานนวัตกรรม สารสนเทศได้อย่างมีจริยธรรมในวิชาชีพ มุ่งเน้นการรับใช้สังคม</p>
        </div>
    </div>
</div>
</div>
</div>
</section>
<figure style="margin-top: 30px;">
  
</figure>

<!-- ชั้นปี -->
<section class="py-5" style="background-color: #f4f4f7;">
    <div class="container">
        <h1 class="text-center mb-2 fw-bold" style="color: brown; font-size: 2rem;">แผนการศึกษา</h1>
        <p class="text-center fw-semibold mb-4" style="color: #666;">รายละเอียดแผนการศึกษา ปีการศึกษาปีที่ 1-4</p>
        
        <div class="scroll-wrapper">
 <!--card1  -->
            <div class="card-container">
                <div class="card h-100">
                    <img src="img/Srinakharinwirot-Regular.png" class="card-img-top" alt="ปี 1">
                    <div class="card-body text-center">
                        <h5 class="fw-bold">ชั้นปีที่ 1</h5>
                        <p class="text-muted small">รายวิชาพื้นฐานและทักษะดิจิทัล</p>
                        <a href="https://drive.google.com/file/d/17jvqTiEfzs4wu1mEDdbEY1Eae-FJEiC8/view?usp=sharing" target="_blank" class="semester-box">วิชาเรียน</a>
                    </div>
                </div>
            </div>
<!-- card2 -->
            <div class="card-container">
                <div class="card h-100">
                    <img src="img/13.png" class="card-img-top" alt="ปี 2">
                    <div class="card-body text-center">
                        <h5 class="fw-bold">ชั้นปีที่ 2</h5>
                        <p class="text-muted small">การวิเคราะห์สารสนเทศเบื้องต้น</p>
                        <a href="https://drive.google.com/file/d/17jvqTiEfzs4wu1mEDdbEY1Eae-FJEiC8/view?usp=sharing" target="_blank" class="semester-box">วิชาเรียน</a>
                    </div>
                </div>
            </div>
<!-- card3 -->
            <div class="card-container">
                <div class="card h-100">
                    <img src="img/14.png" class="card-img-top" alt="ปี 3">
                    <div class="card-body text-center">
                        <h5 class="fw-bold">ชั้นปีที่ 3</h5>
                        <p class="text-muted small">ฐานข้อมูลและนวัตกรรม</p>
                        <a href="https://drive.google.com/file/d/17jvqTiEfzs4wu1mEDdbEY1Eae-FJEiC8/view?usp=sharing" target="_blank" class="semester-box">วิชาเรียน</a>
                    </div>
                </div>
            </div>
<!-- card4 -->
            <div class="card-container">
                <div class="card h-100">
                    <img src="img/15.png" class="card-img-top" alt="ปี 4">
                    <div class="card-body text-center">
                        <h5 class="fw-bold">ชั้นปีที่ 4</h5>
                        <p class="text-muted small">สัมมนาและโครงงานนวัตกรรม</p>
                        <a href="https://drive.google.com/file/d/17jvqTiEfzs4wu1mEDdbEY1Eae-FJEiC8/view?usp=sharing" target="_blank" class="semester-box">วิชาเรียน</a>
                    </div>
                </div>
            </div>
        </div>
      </div>
</section>

<!-- Footer -->
 <footer class="main-footer">
    <div class="footer-container">
  <div class="footer-info">
    <img src="img/Srinakharinwirot_Logo_TH_White.png" alt="Logo" class="footer-logo">
    <p class="footer-title">สารสนเทศศึกษา</p> <p>คณะมนุษยศาสตร์ มหาวิทยาลัยศรีนครินทรวิโรฒ</p>
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
    </div>

    <div class="footer-bottom">
        <p>&copy; 2026 Information Studies SWU. All Rights Reserved.</p>
    </div>

    <script src="./js/bootstrap.min.js"></script>
</footer>
</body>
</html>