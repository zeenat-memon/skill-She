<?php

include("config/db.php");

$query = "SELECT * FROM services ORDER BY id DESC";

$result = mysqli_query($conn, $query);

?>

<table class="table table-bordered">

    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Seller</th>
        <th>Price</th>
        <th>Image</th>
        <th>Action</th>
    </tr>

<?php

if(mysqli_num_rows($result) > 0){

    while($row = mysqli_fetch_assoc($result)){

?>

<tr>

    <td><?php echo $row['id']; ?></td>

    <td><?php echo htmlspecialchars($row['title']); ?></td>

    <td><?php echo htmlspecialchars($row['seller']); ?></td>

    <td>Rs. <?php echo $row['price']; ?></td>

    <td>

        <img
            src="uploads/<?php echo $row['image']; ?>"
            width="80"
        >

    </td>

    <td>

        <a
            href="delete-service.php?id=<?php echo $row['id']; ?>"
            class="btn btn-danger btn-sm"
        >
            Delete
        </a>

    </td>

</tr>

<?php

    }

}else{

    echo "<tr><td colspan='6'>No services found</td></tr>";

}

?>

</table>