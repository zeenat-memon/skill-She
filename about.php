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
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>About Us | SkillsHe</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#f5f7fa;
    font-family:Arial, sans-serif;
}

.hero{
    background:#6A1B9A;
    color:#fff;
    padding:70px 20px;
    text-align:center;
}

.hero h1{
    font-size:45px;
    font-weight:bold;
}

.hero p{
    font-size:18px;
    margin-top:10px;
}

.about{
    padding:60px 0;
}

.card-box{
    background:#fff;
    border-radius:12px;
    padding:30px;
    box-shadow:0 5px 15px rgba(0,0,0,.1);
    height:100%;
}

.card-box h3{
    color:#6A1B9A;
    margin-bottom:15px;
}

.btn-main{
    background:#6A1B9A;
    color:#fff;
    padding:12px 30px;
    border-radius:30px;
    text-decoration:none;
}

.btn-main:hover{
    background:#4A148C;
    color:#fff;
}

</style>

</head>
<body>

<section class="hero">
    <h1>About SkillsHe</h1>
    <p>Connecting talented women with people who need their skills.</p>
</section>

<div class="container about">

<div class="row align-items-center">

<div class="col-md-6">

<img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=800"
class="img-fluid rounded shadow">

</div>

<div class="col-md-6">

<h2>Who We Are</h2>

<p>
SkillsHe is an online marketplace where women can showcase their skills
and offer services such as cooking, tailoring, graphic design, beauty,
teaching, baking and many more.
</p>

<p>
Our goal is to help skilled women earn income by connecting them with
buyers in a simple and secure way.
</p>

<a href="auth/signup.php" class="btn-main">
Join SkillsHe
</a>

</div>

</div>

<hr class="my-5">

<div class="row g-4">

<div class="col-md-4">
<div class="card-box">
<h3>🎯 Our Mission</h3>
<p>
Empower women by providing equal opportunities to earn through their skills.
</p>
</div>
</div>

<div class="col-md-4">
<div class="card-box">
<h3>🌟 Our Vision</h3>
<p>
Build Pakistan's trusted platform for women entrepreneurs and freelancers.
</p>
</div>
</div>

<div class="col-md-4">
<div class="card-box">
<h3>🤝 Why SkillsHe?</h3>
<p>
Easy to use, secure, and designed to connect buyers with talented women.
</p>
</div>
</div>

</div>

</div>

<?php include("includes/footer.php"); ?>

</body>
</html>