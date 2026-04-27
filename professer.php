<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>คณะบุคลากร</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/professer.css">
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

<section class="container py-5">
    <h1 class="text-center mb-5" style="color: brown;">คณะบุคลากร</h1>
    
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
        
        <div class="col">
            <div class="card h-100 shadow-sm">
                <img src="img/dit.jpg" class="card-img-top" alt="อาจารย์ ดร.ดิษฐ์" data-bs-toggle="modal" data-bs-target="#modal1">
                <div class="card-body text-center">
                    <p class="card-text">
                        <strong>อาจารย์ ดร.ดิษฐ์ สุทธิวงศ์</strong><br>
                        <small class="text-muted">(ประธานกรรมการบริหารหลักสูตร)</small>
                    </p>
                    <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal1">ดูข้อมูลเพิ่มเติม</button>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 shadow-sm">
                <img src="img/thiti-scaled.jpg" class="card-img-top" alt="..." data-bs-toggle="modal" data-bs-target="#modal2">
                <div class="card-body text-center">
                    <p class="card-text">
                        <strong>อาจารย์ ดร.ฐิติ อติชาติชยากร</strong><br>
                        <small class="text-muted">(เลขานุการหลักสูตร)</small>
                    </p>
                    <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal2">ดูข้อมูลเพิ่มเติม</button>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 shadow-sm">
                <img src="img/Vipakorn-200x300.jpg" class="card-img-top" alt="..." data-bs-toggle="modal" data-bs-target="#modal3">
                <div class="card-body text-center">
                    <p class="card-text">
                        <strong>ผู้ช่วยศาสตราจารย์ <br>ดร.วิภากร วัฒนสินธุ์</strong>
                    </p>
                    <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal3">ดูข้อมูลเพิ่มเติม</button>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 shadow-sm">
                <img src="img/Chokthamrong.jpg" class="card-img-top" alt="..." data-bs-toggle="modal" data-bs-target="#modal4">
                <div class="card-body text-center">
                    <p class="card-text">
                        <strong>อาจารย์ ดร.โชคธำรงค์ จงจอหอ</strong><br>
                    </p>
                    <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal4">ดูข้อมูลเพิ่มเติม</button>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 shadow-sm">
                <img src="img/Chotima.jpg" class="card-img-top" alt="..." data-bs-toggle="modal" data-bs-target="#modal5">
                <div class="card-body text-center">
                    <p class="card-text">
                        <strong>อาจารย์โชติมา วัฒนะ</strong><br>
                    </p>
                    <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal5">ดูข้อมูลเพิ่มเติม</button>
                </div>
            </div>
        </div>
         <div class="col">
            <div class="card h-100 shadow-sm">
                <img src="img/Dussadee-683x1024.jpg" class="card-img-top" alt="..." data-bs-toggle="modal" data-bs-target="#modal6">
                <div class="card-body text-center">
                    <p class="card-text">
                        <strong>ผู้ช่วยศาสตราจารย์ <br> ดร.ดุษฎี สีวังคำ</strong>
                    </p>
                    <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal6">ดูข้อมูลเพิ่มเติม</button>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 shadow-sm">
                <img src="img/Sasipimol-683x1024.jpg" class="card-img-top" alt="..." data-bs-toggle="modal" data-bs-target="#modal7">
                <div class="card-body text-center">
                    <p class="card-text">
                        <strong>ผู้ช่วยศาสตราจารย์ <br>ดร.ศศิพิมล ประพินพงศกร</strong>
                    </p>
                    <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal7">ดูข้อมูลเพิ่มเติม</button>
                </div>
            </div>
        </div>
            <div class="col">
            <div class="card h-100 shadow-sm">
                <img src="img/Sumattra-683x1024.jpg" class="card-img-top" alt="..." data-bs-toggle="modal" data-bs-target="#modal8">
                <div class="card-body text-center">
                    <p class="card-text">
                        <strong>อาจารย์ ดร. ศุมรรษตรา แสนวา</strong><br>
                    </p>
                    <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal8s">ดูข้อมูลเพิ่มเติม</button>
                </div>
            </div>
        </div>

     </div>
</section>

<div class="modal fade" id="modal1" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">รายละเอียดบุคลากร</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img src="img/dit.jpg" class="img-fluid rounded mb-3" alt="...">
                <h4>อาจารย์ ดร.ดิษฐ์ สุทธิวงศ์</h4>
                <p class="text-muted">ประธานกรรมการบริหารหลักสูตร</p>
                <hr>
                <p>ดร. ดิษฐ์ สุทธิวงศ์ Dit Suthiwong,Ph.D. <br> ประธานกรรมการบิหารหลักสูตร <br>
                    เบอร์โทรศัพท์ 081-5550581 <br> Email : dit.suthi@gmail.com <br>
                    </p>
                    <div class="mt-3 text-end">
                        <a href="https://is.hu.swu.ac.th/cv/dit.pdf" target="_blank" class="btn btn-danger btn-sm" style="width: 60px;">
                            more
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal2" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">รายละเอียดบุคลากร</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img src="img/thiti-scaled.jpg" class="img-fluid rounded mb-3" alt="...">
                <h4>อาจารย์ ดร.ฐิติ อติชาติชยากร</h4>
                <p class="text-muted">เลขานุการหลักสูตร</p>
                <hr>
                <p>ดร.ฐิติ อติชาติชยากร Thiti Atichartachayakorn,Ph.D. <br> เลขานุการหลักสูตร
                    <br>เบอร์โทรศัพท์: 02-649-5000 ต่อ 16087 <br> Email: thitik@g.swu.ac.th
                </p>
                <div class="mt-3 text-end">
                        <a href="https://sites.google.com/g.swu.ac.th/thitia" target="_blank" class="btn btn-danger btn-sm" style="width: 60px;">
                            more
                        </a>
                    </div>
            </div>
    </div>
</div>
</div>

<div class="modal fade" id="modal3" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">รายละเอียดบุคลากร</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img src="img/Vipakorn-200x300.jpg" class="img-fluid rounded mb-3" alt="...">
                <h4>ผู้ช่วยศาสตราจารย์ ดร.วิภากร วัฒนสินธุ์</h4>
                <hr>
                <p>ดร.วิภากร วัฒนสินธุ์ Vipakorn Vadhanasin,Ph.D. <br> ตำแหน่งทางวิชาการ ผู้ช่วยศาสตราจารย์
                    <br> เบอร์โทรศัพท์ 02-649-5000 ต่อ 16508 <br>Email : vipakorn@g.swu.ac.t
                </p>
                <div class="mt-3 text-end">
                        <a href="https://is.hu.swu.ac.th/cv/vipakorn.pdf" target="_blank" class="btn btn-danger btn-sm" style="width: 60px;">
                            more
                        </a>
                    </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal4" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">รายละเอียดบุคลากร</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img src="img/Chokthamrong.jpg" class="img-fluid rounded mb-3" alt="...">
                <h4>อาจารย์ ดร.โชคธำรงค์ จงจอหอ</h4>
                <hr>
                <p>ดร.โชคธำรงค์ จงจอหอ Chokthamrong Chongchorhor,Ph.D
                    <br>เบอร์โทรศัพท์ 0-2649-5000 ต่อ 16292 <br>Email : chokthamrong@g.swu.ac.th
                </p>
                <div class="mt-3 text-end">
                        <a href="https://is.hu.swu.ac.th/cv/chokthamrong.pdf" target="_blank" class="btn btn-danger btn-sm" style="width: 60px;">
                            more
                        </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal5" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">รายละเอียดบุคลากร</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img src="img/Chotima.jpg" class="img-fluid rounded mb-3" alt="...">
                <h4>อาจารย์โชติมา วัฒนะ</h4>
                <hr>
                <p>อาจารย์ โชติมา วัฒนะ Lecture Chotima Watana <br>เบอร์โทรศัพท์ 0-2649-5000 ต่อ 16292
                    <br>E-mail: chotimaw@g.swu.ac.th
                </p>
                <div class="mt-3 text-end">
                        <a href="https://is.hu.swu.ac.th/cv/chotima.pdf" target="_blank" class="btn btn-danger btn-sm" style="width: 60px;">
                            more
                        </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal6" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">รายละเอียดบุคลากร</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img src="img/Dussadee-683x1024.jpg" class="img-fluid rounded mb-3" alt="...">
                <h4>ผู้ช่วยศาสตราจารย์ ดร. ดุษฎี สีวังคำ</h4>
                <hr>
                <p>ผู้ช่วยศาสตราจารย์ ดร.ดุษฎี สีวังคำ <br> Assistant Professor Dussadee Seewungkum,Ph.D.
                    <br>เบอร์โทรศัพท์ 02 649-5000 ต่อ 16292 <br> Email : dussadee@g.swu.ac.th</p>
                <div class="mt-3 text-end">
                        <a href="https://is.hu.swu.ac.th/cv/dussadee.pdf" target="_blank" class="btn btn-danger btn-sm" style="width: 60px;">
                            more
                        </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal7" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">รายละเอียดบุคลากร</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img src="img/Sasipimol-683x1024.jpg" class="img-fluid rounded mb-3" alt="...">
                <h4>ผู้ช่วยศาสตราจารย์ ดร. ศศิพิมล ประพินพงศกร</h4>
                <hr>
                <p>ผู้ช่วยศาสตราจารย์ดร. ศศิพิมล ประพินพงศกร <br>Assistant Professor Sasipimol Prapinpongsakorn, Ph.D.
                    <br>เบอร์โทรศัพท์ 02 649-5000 ต่อ 16292 <br>Email : sasipimol@g.swu.ac.th </p>
                    <div class="mt-3 text-end">
                        <a href="https://is.hu.swu.ac.th/cv/sasipimol.pdf" target="_blank" class="btn btn-danger btn-sm" style="width: 60px;">
                            more
                        </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal8" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">รายละเอียดบุคลากร</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img src="img/Sumattra-683x1024.jpg" class="img-fluid rounded mb-3" alt="อาจารย์ ดร. ศุมรรษตรา แสนวา">
                <h4>อาจารย์ ดร. ศุมรรษตรา แสนวา</h4>
                <hr>
                <p>อาจารย์ ดร.ศุมรรษตรา แสนวา <br>Lecturer Sumattra Saenwa, Ph.D.
                    <br>เบอร์โทรศัพท์ 085-617-9617 <br>Email: sumattra@g.swu.ac.th</p>
                <div class="mt-3 text-end">
                    <a href="https://is.hu.swu.ac.th/cv/sumattra.pdf" target="_blank" class="btn btn-danger btn-sm" style="width: 60px;">
                        more
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<figure style="margin-top: 100px;">
  
  
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
    </div>

    <div class="footer-bottom">
        <p>&copy; 2026 Information Studies SWU. All Rights Reserved.</p>
    </div>

    <script src="./js/bootstrap.min.js"></script>
</footer>
</body>
</html>