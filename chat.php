<?php
session_start();
include("config/db.php");

// login check
if(!isset($_SESSION['user_id']) || !in_array($_SESSION['role'], ['buyer', 'seller'])){ 
    header('Location: auth/login.php'); 
    exit; 
}


$user_id = (int)$_SESSION['user_id'];
$role = $_SESSION['role'];
$order_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if($order_id <= 0){
    die("Invalid Order ID");
}

// 📦 Order + seller_id fetch
$query = "SELECT o.*,
                 o.buyer_id,
                 s.seller_id,
                 s.title AS service_title,
                 b.full_name AS buyer_name,
                 se.full_name AS seller_name
          FROM orders o
          JOIN services s ON o.service_id = s.id
          JOIN users b ON o.buyer_id = b.id
          JOIN users se ON s.seller_id = se.id
          WHERE o.id = $order_id
          AND (s.seller_id = $user_id OR o.buyer_id = $user_id)";

$result = mysqli_query($conn, $query);
if(!$result) die("Order query error: " . mysqli_error($conn));

$order = mysqli_fetch_assoc($result);
if(!$order){ 
    die("Order nahi mila ya permission nahi hai"); 
}

$seller_id = $order['seller_id'];
$service_title = $order['service_title'];

// 💬 Message send - receiver_id hata diya
if(isset($_POST['send'])){
    $msg = mysqli_real_escape_string($conn, trim($_POST['message']));
    if($msg != ''){
        $sender_type = ($role == 'seller') ? 'seller' : 'buyer';
        $insert = "INSERT INTO order_messages (order_id, seller_id, sender_type, sender_id, message, created_at) 
                   VALUES ($order_id, $seller_id, '$sender_type', $user_id, '$msg', NOW())";
        $run = mysqli_query($conn, $insert);
        if(!$run) die("Insert error: " . mysqli_error($conn));
    }
    header("Location: chat.php?id=$order_id");
    exit;
}

// 💬 Chat fetch
$chat_query = "SELECT * FROM order_messages WHERE order_id=$order_id ORDER BY created_at ASC";
$chats = mysqli_query($conn, $chat_query);
if(!$chats) die("Chat query error: " . mysqli_error($conn));
?>


<!DOCTYPE html>
<html>
<head>
<title>Chat - Order #<?php echo $order_id; ?></title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
<style>
    /* body{
    background:#f4f7fc;
    font-family:'Poppins',sans-serif;
    color:#333;
}

.chat-wrapper{
    max-width:850px;
    margin:40px auto;
    background:#fff;
    border-radius:18px;
    box-shadow:0 10px 30px rgba(0,0,0,.08);
    overflow:hidden;
}

.chat-header{
    background:#6A1B9A;
    color:#fff;
    padding:20px 25px;
}

.chat-header h4{
    margin:0;
    font-weight:700;
}

.chat-header p{
    color:#f3d9ff;
    margin-top:5px;
}

.btn-secondary{
    background:#fff;
    color:#6A1B9A;
    border:none;
    font-weight:600;
}

.btn-secondary:hover{
    background:#f2f2f2;
    color:#6A1B9A;
}

.chat-box{
    height:450px;
    overflow-y:auto;
    padding:20px;
    background:#f8f9fc;
    display:flex;
    flex-direction:column;
    gap:15px;
}

.chat-box::-webkit-scrollbar{
    width:8px;
}

.chat-box::-webkit-scrollbar-thumb{
    background:#c7c7c7;
    border-radius:10px;
}

.bubble{
    max-width:70%;
    padding:12px 18px;
    border-radius:18px;
    font-size:15px;
    line-height:1.5;
    box-shadow:0 2px 8px rgba(0,0,0,.08);
}

.buyer{
    align-self:flex-start;
    background:#ececec;
    color:#333;
    border-bottom-left-radius:5px;
}

.seller{
    align-self:flex-end;
    background:#6A1B9A;
    color:#fff;
    border-bottom-right-radius:5px;
}

.time{
    display:block;
    font-size:11px;
    opacity:.7;
    margin-top:6px;
}

form{
    padding:20px;
    background:#fff;
    border-top:1px solid #eee;
}

.form-control{
    border-radius:12px;
    border:1px solid #ddd;
    padding:12px;
}

.form-control:focus{
    border-color:#6A1B9A;
    box-shadow:0 0 0 .2rem rgba(106,27,154,.15);
}

.btn-gold{
    background:#6A1B9A;
    color:#fff;
    border:none;
    border-radius:12px;
    padding:12px 24px;
    font-weight:600;
}

.btn-gold:hover{
    background:#4A148C;
    color:#fff;
} */
 body{background:#f4f6fb;font-family:'Poppins',sans-serif;}
.chat-wrapper{max-width:950px;margin:40px auto;background:#fff;border-radius:18px;padding:30px; box-shadow:0 10px 25px rgba(0,0,0,.08);}
.chat-box{height:500px;overflow-y:auto; padding:20px; background:#f8f9fc;border:1px solid #dee2e6;border-radius:15px;display:flex;flex-direction:column;gap:15px;}
.bubble{padding:12px 16px; border-radius:18px; max-width:70%; word-wrap:break-word; font-size:15px;}
.bubble.buyer{background:#0d6efd;color:#fff;align-self:flex-start;border-radius:18px 18px 18px 5px;}
.bubble.seller{background:#198754;color:#fff;align-self:flex-end;border-radius:18px 18px 5px 18px;}
.bubble{
    padding:12px 18px;
    max-width:70%;
    border-radius:18px;
    box-shadow:0 4px 10px rgba(0,0,0,.08);
}
.time{
    font-size:11px;
    color:#e9ecef;
    display:block;
    margin-top:6px;
}
.admin-badge{
    background:#ffc107;
    color:#000;
    padding:3px 8px;
    border-radius:5px;
    font-size:10px;
    font-weight:bold;
}

</style>
</head>
<body>
<div class="chat-wrapper">
    <div class="chat-header">
        <h4 class="mb-1">💬 Order #<?php echo $order_id; ?></h4>
        <p class="mb-0" style="color:#ffd78a;"><?php echo ucwords($service_title); ?></p>
        <p class="mb-1">
    <strong>Buyer:</strong>
    <?php echo $order['buyer_name']; ?>

    &nbsp; | &nbsp;

    <strong>Seller:</strong>
    <?php echo $order['seller_name']; ?>
</p>
        <?php
if($role == 'seller'){
    $back_url = 'sellers/dashboard.php';
    $back_text = '← Back to Seller Dashboard';
}else{
    $back_url = 'buyers/buyer_dashboard.php';
    $back_text = '← Back to Buyer Dashboard';
}
?>

<a href="<?php echo $back_url; ?>" class="btn btn-primary mt-3">
    <?php echo $back_text; ?>
</a>
    </div>
    
    <div class="chat-box" id="chatBox">
        <?php while($row = mysqli_fetch_assoc($chats)):

$isSellerMsg = ($row['sender_type'] == 'seller');

$sender_name = $isSellerMsg
    ? $order['seller_name']
    : $order['buyer_name'];

?>

<div class="bubble <?php echo $isSellerMsg ? 'seller' : 'buyer'; ?>">

    <strong>

        <?php echo $sender_name; ?>

        <?php if($isSellerMsg){ ?>

            <span class="badge bg-success ms-2">
                Seller
            </span>

        <?php }else{ ?>

            <span class="badge bg-primary ms-2">
                Buyer
            </span>

        <?php } ?>

    </strong>

    <br>

    <?php echo htmlspecialchars($row['message']); ?>

    <span class="time">
        <?php echo date('d M, h:i A', strtotime($row['created_at'])); ?>
    </span>

</div>

<?php endwhile; ?>
    </div>
    
    <form method="POST" class="d-flex gap-2">
        <input type="text" name="message" class="form-control" placeholder="Type your message..." required autocomplete="off">
        <button name="send" class="btn btn-gold">Send ➤</button>
    </form>
</div>

<script>
document.getElementById('chatBox').scrollTop = document.getElementById('chatBox').scrollHeight;
</script>
</body>
</html>

