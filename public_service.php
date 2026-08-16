<?php
include("config/db.php");
include("includes/navbar.php");


$query = "SELECT s.*, u.full_name AS seller_name
          FROM services s
          JOIN users u ON s.seller_id = u.id
          ORDER BY s.id DESC";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>All Services</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f5f5f5;
        }

        .service-card{
            border:none;
            border-radius:15px;
            overflow:hidden;
            box-shadow:0 3px 10px rgba(0,0,0,0.1);
            transition:0.3s;
        }

        .service-card:hover{
            transform:translateY(-5px);
        }

        .service-card img{
            height:220px;
            object-fit:cover;
        }

        .seller{
            color:#666;
            font-size:14px;
        }

        .price{
            color:green;
            font-size:20px;
            font-weight:bold;
        }
        .service-card{
    transition:.3s;
}

.service-card:hover{
    transform:translateY(-8px);
    box-shadow:0 15px 35px rgba(0,0,0,.15);
}

.service-card{
    height:100%;
}

.btn-dark,
.btn-primary{
    border-radius:10px;
}
    </style>

</head>
<body>

<div class="container mt-5">

<h2 class="text-center fw-bold mb-5">
🌸 Explore Our Services
</h2>

    <div class="row">

        <?php if(mysqli_num_rows($result) > 0): ?>

            <?php while($row = mysqli_fetch_assoc($result)): ?>

            <div class="col-md-4 mb-4">

                <div class="card service-card">
               <?php
                          $image = !empty($row['image']) ? $row['image'] : 'no-image.png';
                       ?>

                    <img src="uploads/<?php echo $row['image']; ?>"
                         class="card-img-top">

                         

                    <div class="card-body">

                        <h5 class="card-title">
                            <?php echo $row['title']; ?>
                        </h5>
<p class="text-muted">
<?php echo substr($row['description'],0,80); ?>...
</p>
                        <p class="seller">
                            Seller:
                            <?php echo $row['seller_name']; ?>
                        </p>

                        <p>
                            Category:
                            <?php echo $row['category']; ?>
                        </p>

                        <p class="price">
                            Rs. <?php echo $row['price']; ?>
                        </p>

                        <a href="buyers/orders.php?service_id=<?php echo $row['id']; ?>"
                           class="btn btn-primary w-100">
                            Order Now
                        </a>

                      <a href="service_detail.php?id=<?php echo $row['id']; ?>"
                      class="btn btn-dark w-100 mb-2">
                        View Details
                       </a>

                        
                    </div>

                </div>

            </div>

            <?php endwhile; ?>

        <?php else: ?>

            <div class="alert alert-warning">
                No Services Found
            </div>

        <?php endif; ?>

    </div>

</div>

</body>
</html>