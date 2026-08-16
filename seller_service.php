
<?php
include("./config/db.php");

$query = "SELECT s.*, u.full_name AS seller_name
          FROM services s
          JOIN users u ON s.seller_id = u.id
          ORDER BY s.id DESC";

$result = mysqli_query($conn, $query);
?>

<h2>All Services</h2>

<link rel="stylesheet" href="../css/seller_service.css">

<table border="1" width="100%" cellpadding="10">

    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Seller</th>
        <th>Price</th>
        <th>Image</th>
        <th>Category</th>
        <th>Action</th>

    </tr>

    <?php if(mysqli_num_rows($result) > 0): ?>

        <?php while($row = mysqli_fetch_assoc($result)): ?>

            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['seller_name']; ?></td>
                <td>Rs. <?php echo $row['price']; ?></td>
                <td>
    <img src="../uploads/<?php echo $row['image']; ?>" width="80">
</td>
            <td><?php echo $row['category']; ?></td>
                </td>
                
                <td>
                    <a href="service.php?delete=<?php echo $row['id']; ?>"
                       onclick="return confirm('Delete this service?');">
                       Delete
                    </a>
                
                        <a href="../buyer/wishlist.php?service_id=<?php echo $row['id']; ?>">
                            
    Add to Wishlist
</a>
<button onclick="window.history.back()" class="back-btn">
  ⬅ Back
</button>
                </td>
            </tr>

        <?php endwhile; ?>

    <?php else: ?>

        <tr>
            <td colspan="6">No services found</td>
        </tr>

    <?php endif; ?>

</table>