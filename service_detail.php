<?php

session_start();
include("./config/db.php");
include("./includes/header.php");
include("./includes/navbar.php");


//  if(isset($_SESSION['user_id']) && $_SESSION['user_role'] == 'buyer'){
//     header("Location: auth/login.php");
//     exit();
//  }

 
// CHECK SERVICE ID

if(!isset($_GET['id'])){

    echo "Service ID Missing";
    exit();

} 

$id = intval($_GET['id']);

// FETCH SERVICE

$query = "SELECT * FROM services WHERE id='$id'";

$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0){

    $service = mysqli_fetch_assoc($result);

}else{

    echo "Service Not Found";
    exit();

}

// AVERAGE RATING

$avg_query = "SELECT AVG(rating) as avg_rating FROM reviews WHERE service_id='$id'";

$avg_result = mysqli_query($conn, $avg_query);

$avg = mysqli_fetch_assoc($avg_result);

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
.service-img{
    width:70%;
    max-width:500px;
    max-height:400px;
    object-fit:contain;
    background:#f8f8f8;
    display:block;
    margin:0 auto;
    border-radius:15px;
}

</style>

<!DOCTYPE html>
<html>
<head>

    <title>Service Details</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container py-5">

<div class="row">

    <!-- Image -->
    <div class="col-lg-6">

        <img src="uploads/<?php echo $service['image']; ?>" class="service-img">

    </div>

    <!-- Details -->
    <div class="col-lg-6">

        <div class="card shadow p-4">

            <h2><?php echo htmlspecialchars($service['title']); ?></h2>

            <h3 class="text-success">
                Rs. <?php echo $service['price']; ?>
            </h3>

            <p class="fs-5">
                ⭐ <?php echo round($avg['avg_rating'],1); ?>/5
            </p>

            <hr>

            <h5>Description</h5>

            <p>
                <?php echo htmlspecialchars($service['description']); ?>
            </p>

            <a href="buyers/buyer_services.php"
               class="btn btn-dark">
               Back
            </a>

        </div>

    </div>

</div>

<hr class="my-5">

<h3>Customer Reviews</h3>
<?php

$review_query = "SELECT r.*, u.full_name
                 FROM reviews r
                 JOIN users u ON r.user_id = u.id
                 WHERE r.service_id='$id'
                 ORDER BY r.id DESC";

$review_result = mysqli_query($conn, $review_query);

if(mysqli_num_rows($review_result) > 0){

    while($review = mysqli_fetch_assoc($review_result)){

?>

<div class="card mb-3 shadow-sm">

    <div class="card-body">

        <h5>

            <?php echo htmlspecialchars($review['full_name']); ?>

        </h5>

        <!-- STAR RATING -->

        <p class="text-warning fs-4">

        <?php

        for($i = 1; $i <= 5; $i++){

            if($i <= $review['rating']){

                echo "⭐";

            }else{

                echo "☆";

            }

        }

        ?>

        </p>

        <!-- COMMENT -->

        <p>

            <?php echo htmlspecialchars($review['comment']); ?>

        </p>

    </div>

</div>

<?php

    }

}else{

    echo "<p>No reviews yet.</p>";

}

?>

<!-- REVIEW FORM -->

<?php if(isset($_SESSION['user_id'])){ ?>

<div class="card mt-5 shadow">

    <div class="card-body">

        <h4 class="mb-4">

            Leave a Review

        </h4>

        <form action="submit_reviews.php" method="POST">

            <input
                type="hidden"
                name="service_id"
                value="<?php echo $service['id']; ?>"
            >

            <!-- RATING -->

            <div class="mb-3">

                <label class="form-label">

                    Rating

                </label>

                <select name="rating" class="form-select" required>

                    <option value="">Select Rating</option>

                    <option value="5">5 Star</option>
                    <option value="4">4 Star</option>
                    <option value="3">3 Star</option>
                    <option value="2">2 Star</option>
                    <option value="1">1 Star</option>

                </select>

            </div>

            <!-- COMMENT -->

            <div class="mb-3">

                <label class="form-label">

                    Comment

                </label>

                <textarea
                    name="comment"
                    class="form-control"
                    rows="4"
                    required
                ></textarea>

            </div>

            <!-- BUTTON -->

            <button class="btn btn-dark">

                Submit Review

            </button>

        </form>

    </div>

</div>

<?php } else { ?>

<div class="alert alert-warning mt-5">

    Please login to leave a review.

</div>

<?php } ?>

</div>

<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->

</body>
</html>