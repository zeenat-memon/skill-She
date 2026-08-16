<?php

include("../config/db.php");
include("../includes/header.php");
include("../includes/navbar.php");

if(!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 'admin')
{
    header("Location: ../auth/login.php");
    exit();
}

// Delete message
if(isset($_GET['delete']))
{
    $id = intval($_GET['delete']);

    $delete = "DELETE FROM messages WHERE id=$id";
    mysqli_query($conn, $delete);

    header("Location: messages.php");
    exit();
}

// Fetch messages with sender info
$query = "SELECT m.*, u.name AS sender_name
          FROM messages m
          JOIN users u ON m.sender_id = u.id
          ORDER BY m.id DESC";

$result = mysqli_query($conn, $query);

?>

<section class="admin-messages">

    <div class="container">

        <h1>Manage Messages</h1>

        <table border="1" width="100%" cellpadding="10">

            <tr>
                <th>ID</th>
                <th>Sender</th>
                <th>Message</th>
                <th>Date</th>
                <th>Action</th>
            </tr>

            <?php if(mysqli_num_rows($result) > 0): ?>

                <?php while($msg = mysqli_fetch_assoc($result)): ?>

                    <tr>

                        <td><?php echo $msg['id']; ?></td>

                        <td><?php echo $msg['sender_name']; ?></td>

                        <td><?php echo $msg['message']; ?></td>

                        <td><?php echo $msg['created_at']; ?></td>

                        <td>

                            <a href="messages.php?delete=<?php echo $msg['id']; ?>"
                               onclick="return confirm('Delete this message?');">
                                Delete
                            </a>

                        </td>

                    </tr>

                <?php endwhile; ?>

            <?php else: ?>

                <tr>
                    <td colspan="5">No messages found</td>
                </tr>

            <?php endif; ?>

        </table>

    </div>

</section>

<?php include("../includes/footer.php"); ?>