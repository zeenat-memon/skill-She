<?php
include("config/db.php");
include("includes/navbar.php");
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
body {
font-family:'Poppins',sans-serif;
background: linear-gradient(135deg, #3F1D5A, #6A1B9A, #C2185B);
    background-size: 400% 400%;
    animation: gradientShift 25s ease infinite;
    color: #2a2a2a;
    overflow-x: hidden;
    position: relative;
    min-height: 100vh;
}

@keyframes gradientShift {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}
/* SIRF 1 BAAR BIG BUTTERFLY CSS */
.big-butterfly {
    position: fixed;
    right: -200px;
    top: 5%;
    width: 800px;
    opacity: 0.28;
    filter: drop-shadow(0 0 120px rgba(194, 24, 91, 0.6)) drop-shadow(0 0 200px rgba(194, 24, 91, 0.3));
    animation: floatSlow 20s ease-in-out infinite;
    z-index: 0;
    pointer-events: none;
}
@keyframes floatSlow {
    0%, 100% { transform: translateY(0) rotate(-5deg) scale(1); }
    50% { transform: translateY(-60px) rotate(5deg) scale(1.05); }
}

.hero-section{
position:relative;
padding:150px 0 120px;
text-align:center;
overflow:hidden;
}

.hero-section::before{
content:"";
position:absolute;
width:450px;
height:450px;
background:#ff9ecb;
filter:blur(150px);
opacity:.35;
left:-120px;
top:-120px;
border-radius:50%;
}

.hero-section::after{
content:"";
position:absolute;
width:350px;
height:350px;
background:#8be9fd;
filter:blur(140px);
opacity:.30;
right:-80px;
bottom:-80px;
border-radius:50%;
}
.hero-section h1{


font-family:'Great Vibes',cursive;

font-size:clamp(42px,8vw,75px);

font-weight:800;

letter-spacing:2px;

background:linear-gradient(90deg,#fff,#ffd3e3,#7fffd4);

-webkit-background-clip:text;

-webkit-text-fill-color:transparent;

text-shadow:0 10px 40px rgba(255,255,255,.3);

}

.hero-section p { 
    font-weight: 500;
    color:#ffffff;
    text-shadow:0 2px 12px rgba(255,255,255,.3);
}


.category-card {
    background: rgba(255, 255, 255, 0.75);
    border: 2px solid rgba(194, 24, 91, 0.25);
    border-radius: 25px;
    padding: 30px 20px;
    backdrop-filter: blur(15px);
    transition: all 0.4s;
    cursor: pointer;
    height: 100%;
}
.category-card:hover {
    border-color: #c2185b;
    background: rgba(255, 228, 236, 0.9);
    transform: translateY(-10px)scale(1.02);
    box-shadow: 0 15px 40px rgba(194, 24, 91, 0.35);
}
.category-card h5 { 
    margin: 0; 
    font-weight: 700; 
    font-size: 18px;
    color: #2a2a2a;
}

.floating-bug {
    position: fixed;
    width: 40px;
    opacity: 0.6;
    animation: floatRandom 12s infinite ease-in-out;
    filter: drop-shadow(0 0 20px rgba(233, 30, 99, 0.8));
    z-index: 1;
    pointer-events: none;
}
@keyframes floatRandom {
    0%, 100% { transform: translate(0, 0) rotate(0deg); }
    33% { transform: translate(40px, -40px) rotate(15deg); }
    66% { transform: translate(-30px, 30px) rotate(-15deg); }
}

.search-box {
    background: rgba(255, 255, 255, 0.8);
    border: 2px solid rgba(194, 24, 91, 0.3);
    box-shadow:0 15px 40px rgba(0,0,0,.15);
    border-radius: 25px;
    padding: 35px;
    backdrop-filter: blur(15px);
}
.btn-pink {
    background: #c2185b;
    border: none;
    border-radius: 15px;
    font-weight: 700;
    font-size: 18px;
     height:56px;
    transition: 0.3s;
    padding: 14px 30px;
}
.btn-pink:hover {
    background: #ad1457;
    box-shadow: 0 0 30px rgba(194, 24, 91, 0.6);
    transform: scale(1.05);
}
h2,h3{
color:#ffffff;
}

.category-icon{
    font-size:50px;
    margin-bottom:15px;
    transition:0.3s;
}

.category-card:hover .category-icon{
    transform:scale(1.15);
}

</style>

<!-- SIRF 1 BAAR IMAGE TAG - LOCAL PATH -->
<img src="assets/butterfly.png" class="big-butterfly" alt="butterfly">

<!-- HERO SECTION -->
<section class="hero-section text-center">
    <div class="container">
        <h1 class="display-2">SkillsShe</h1>
        <p>Where Talents Meet Opportunities 🦋</p>
        <div class="mt-4">
    <a href="buyers/buyer_services.php" class="btn btn-pink px-4 py-3 me-3">
        Explore Services
    </a>

    <a href="auth/signup.php" class="btn btn-light px-4 py-3">
        Become a Seller
    </a>
</div>
    </div>
</section>
<!-- CATEGORIES -->
 <section class="container py-5" style="position: relative; z-index: 1;">
    <h2 class="text-center fw-bold mb-5">Popular Categories</h2>

    <div class="row g-4">

        <div class="col-6 col-md-3">
            <div class="category-card text-center">
                <a href="buyers/buyer_services.php?category=Cooking Classes" class="text-decoration-none">
                    <div class="category-icon">🍳</div>
                    <h5>Cooking Classes</h5>
                </a>
            </div>
        </div>

        <div class="col-6 col-md-3">
            <div class="category-card text-center">
                <a href="buyers/buyer_services.php?category=Graphic Design" class="text-decoration-none">
                    <div class="category-icon">🎨</div>
                    <h5>Graphic Design</h5>
                </a>
            </div>
        </div>

        <div class="col-6 col-md-3">
            <div class="category-card text-center">
                <a href="buyers/buyer_services.php?category=Baking" class="text-decoration-none">
                    <div class="category-icon">🧁</div>
                    <h5>Baking</h5>
                </a>
            </div>
        </div>

        <div class="col-6 col-md-3">
            <div class="category-card text-center">
                <a href="buyers/buyer_services.php?category=Silahi Karhai" class="text-decoration-none">
                    <div class="category-icon">🧵</div>
                    <h5>Silahi Karhai</h5>
                </a>
            </div>
        </div>

        <div class="col-6 col-md-3">
            <div class="category-card text-center">
                <a href="buyers/buyer_services.php?category=Beauty Zone" class="text-decoration-none">
                    <div class="category-icon">💄</div>
                    <h5>Beauty Zone</h5>
                </a>
            </div>
        </div>

        <div class="col-6 col-md-3">
            <div class="category-card text-center">
                <a href="buyers/buyer_services.php?category=Academic" class="text-decoration-none">
                    <div class="category-icon">📚</div>
                    <h5>Academic</h5>
                </a>
            </div>
        </div>

        <div class="col-6 col-md-3">
            <div class="category-card text-center">
                <a href="buyers/buyer_services.php?category=Hand Craft" class="text-decoration-none">
                    <div class="category-icon">✂️</div>
                    <h5>Hand Craft</h5>
                </a>
            </div>
        </div>

        <div class="col-6 col-md-3">
            <div class="category-card text-center">
                <a href="buyers/buyer_services.php?category=Patient Care" class="text-decoration-none">
                    <div class="category-icon">🏥</div>
                    <h5>Patient Care</h5>
                </a>
            </div>
        </div>

    </div>
</section>
<!-- SEARCH BOX -->
<section class="container py-5" style="position: relative; z-index: 2;">
    <div class="search-box">
        <h3 class="text-center mb-4 fw-bold" style="color: #e91e63;">Kya dhoond rahi ho?</h3>
        <form action="search.php" method="GET">
            <div class="row justify-content-center">
                <div class="col-md-8 mb-3">
                    <input type="text" name="keyword" class="form-control form-control-lg rounded-4" style="border: 2px solid #e91e63; padding: 15px;" placeholder="Service search karo...">
                    
                </div>
                <div class="col-md-3 mb-3">
                    <button class="btn btn-pink w-100 text-white">Search Karo</button>
                </div>
            </div>
        </form>
    </div>
</section>

<!-- CHOTI BUTTERFLIES - LOCAL PATH -->
<img src="assets/butterfly.png" class="floating-bug" style="left:8%; top:25%; animation-delay:0s;">
<img src="assets/butterfly.png" class="floating-bug" style="left:88%; top:55%; animation-delay:4s;">
<img src="assets/butterfly.png" class="floating-bug" style="left:45%; top:85%; animation-delay:8s;">
<img src="assets/butterfly.png" class="floating-bug" style="left:45%; top:85%; animation-delay:8s;">

<?php include 'includes/footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>