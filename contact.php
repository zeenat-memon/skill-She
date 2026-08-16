
<?php include("includes/navbar.php"); ?>
<style>
.custom-navbar{
    background:#ffffff !important;
}

.custom-navbar .nav-link{
    color:#333 !important;
}

.custom-navbar .nav-link:hover{
    color:#ff4f81 !important;
}

.custom-navbar .nav-link.active{
    color:#ff4f81 !important;
}
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us - SkillsHe</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body{
    font-family: 'Poppins', sans-serif;
    background: #f4f8fc;
    color: #333;
}
        /* ===== CONTACT BOX CSS ===== */
.contact-btn{
    display: inline-block;
    margin-top: 20px;
    padding: 12px 30px;
    background: #0d6efd;
    color: #fff;
    text-decoration: none;
    border-radius: 30px;
    transition: .3s;
}

.contact-btn:hover{
    background: #0b5ed7;
}
        .contact-wrapper {
            min-height: calc(100vh - 70px);
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
        }

        .contact-box{
    width:100%;
    max-width:800px;
    background:#fff;
    border-radius:18px;
    padding:40px;
    box-shadow:0 10px 30px rgba(0,0,0,.08);
}

.map-section{
    width:90%;
    max-width:900px;
    margin:50px auto;
    border-radius:18px;
    overflow:hidden;
    box-shadow:0 10px 25px rgba(0,0,0,.1);
}
.contact-box h2{
    color: #0d6efd;
    font-weight: 700;
}

.contact-box:hover{
    transform:translateY(-8px);
}
        
.contact-box p{
    color:#aaa;
    margin-bottom:35px;
}

   .info-item{
    display: flex;
    align-items: center;
    gap: 18px;
    background: #f8f9fa;
    padding: 18px;
    border-radius: 12px;
    margin-bottom: 18px;
    transition: .3s;
    border: 1px solid #e9ecef;
}     

.info-item:hover{
    background: #eaf4ff;
    transform: translateY(-3px);
}

.info-item i{
    color: #0d6efd;
    font-size: 24px;
}


.info-item:hover i,
.info-item:hover a,
.info-item:hover strong{
    color:#000;
}

.info-item strong{
    color: #666;
}

.info-item a{
    color: #333;
    text-decoration: none;
}

.info-item a:hover{
    color: #0d6efd;
}

.map-section{
    width: 90%;
    max-width: 1200px;
    margin: 50px auto;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 10px 25px rgba(0,0,0,.1);
}
.map-section iframe{
    display:block;
}

.hero{
    background:#6A1B9A;
    color:white;
    text-align:center;
    padding:70px 20px;
}

.hero h1{
    font-size:45px;
    font-weight:bold;
}

.hero p{
    font-size:18px;
    margin-top:10px;
}
    </style>
</head>
<body>
<section class="hero">
    <h1>Contact Us</h1>
    <p>We're always here to help you.</p>
</section>
<!-- ===== CONTACT INFO BOX ===== -->

        
    </div>
</div>

<div class="info-item">
    <i class="fas fa-phone"></i>
    <div>
        <strong>Phone</strong>
        <a href="tel:+923001998887">
            +92 300 1998887
        </a>
    </div>
</div>

<div class="info-item">
    <i class="fas fa-location-dot"></i>
    <div>
        <strong>Address</strong>
         karachi, Lahore, Punjab, Pakistan
    </div>
</div>

<section>

    <iframe
        src="https://maps.google.com/maps?q=karachi&t=&z=13&ie=UTF8&iwloc=&output=embed"
        width="100%"
        height="450"
        style="border:0;">
    </iframe>

</section>

</body>
</html>
