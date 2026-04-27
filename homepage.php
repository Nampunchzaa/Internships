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

// 🛠️ ตอบกลับ (แอดมิน)
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
<html>
<head>
<meta charset="UTF-8">
<title>Q&A</title>
<link rel="stylesheet" href="style.css">
<link href="https://fonts.googleapis.com/css2?family=Srinakharinwirot:wght@400;700&display=swap" rel="stylesheet">

</head>

<body>

<div class="container">
    <h2>💬 ถาม - ตอบ</h2>

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
    <div class="box">
        <b>👤 ผู้ถาม:</b>
        <?php echo htmlspecialchars($row['message']); ?>

        <?php if($row['reply']){ ?>
            <div class="reply">
                ↳ ผู้ตอบ: <?php echo htmlspecialchars($row['reply']); ?>
            </div>
        <?php } ?>

        <!-- ฟอร์มตอบ -->
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <input type="text" name="reply" placeholder="ตอบ...">
            <button name="reply_btn">ตอบ</button>
        </form>
    </div>
<?php } ?>

</div>

</div>

</body>
</html>