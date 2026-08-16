<?php
include("config/db.php");
include("includes/navbar.php");

$keyword = "";

if(isset($_GET['keyword']))
{
    $keyword = mysqli_real_escape_string($conn, $_GET['keyword']);
}
?>
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
<title>Search Results</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
  
    background:linear-gradient(135deg,#f8f4ff,#f5f5f5);
    font-family:'Poppins',sans-serif;
}


.service-card{
    border:none;
    border-radius:15px;
    overflow:hidden;
    box-shadow:0 5px 15px rgba(0,0,0,.1);
    transition:.3s;
    background:#fff;
}
.search-box{
    background:#fff;
    padding:25px;
    border-radius:18px;
    box-shadow:0 8px 20px rgba(0,0,0,.08);
    margin-bottom:40px;
}

.search-btn{
    background:#6A1B9A;
    color:white;
    border:none;
}

.search-btn:hover{
    background:#8E24AA;
    color:white;
}
.service-card:hover{
    transform:translateY(-5px);
}

.service-card img{
    width:100%;
    height:220px;
    object-fit:cover;
}

.price{
    color:#198754;
    font-size:20px;
    font-weight:bold;
}
</style>

</head>
<body>

<div class="container mt-5">

<div class="text-center mb-5">
    <h2 class="fw-bold" style="color:#6A1B9A;">Search Results</h2>
    <p class="text-muted">
        Find the best services that match your search.
    </p>
</div>
<form action="search.php" method="GET" class="mb-4">

<div class="input-group">

<input
type="text"
name="keyword"
class="form-control"
placeholder="Search services..."
value="<?php echo htmlspecialchars($keyword); ?>">

<button class="btn btn-primary">
Search
</button>

</div>

</form>

<div class="row">

<?php

if($keyword!="")
{

$sql="SELECT *
FROM services
WHERE title LIKE '%$keyword%'
OR description LIKE '%$keyword%'
OR category LIKE '%$keyword%'
ORDER BY id DESC";

$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0)
{

while($service=mysqli_fetch_assoc($result))
{
?>

<div class="col-md-4 mb-4">

<div class="card service-card">

<img src="uploads/<?php echo $service['image']; ?>">

<div class="card-body">

<h5>
<?php echo $service['title']; ?>
</h5>

<p>
<?php echo $service['category']; ?>
</p>

<p>
<?php echo substr($service['description'],0,80); ?>...
</p>

<p class="price">
Rs. <?php echo $service['price']; ?>
</p>

<a href="service_detail.php?id=<?php echo $service['id']; ?>" class="btn btn-primary w-100">
View Details
</a>

</div>

</div>

</div>

<?php
}

}
else
{
echo "<h4 class='text-center text-danger'>No Services Found.</h4>";
}

}
else
{
echo "<h4 class='text-center'>Please enter a keyword.</h4>";
}

?>

</div>

</div>

<?php include("includes/footer.php"); ?>

</body>
</html>