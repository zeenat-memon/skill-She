<?php

include("config/db.php");
include("includes/header.php");

$message = "";

if(isset($_POST['reset']))
{
    $email = cleanInput($_POST['email']);

    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1)
    {
        // Simple demo reset (no email system yet)
        $newPassword = "123456";
        $hashed = password_hash($newPassword, PASSWORD_DEFAULT);

        $update = "UPDATE users SET password = '$hashed' WHERE email = '$email'";

        if(mysqli_query($conn, $update))
        {
            $message = "Password reset successfully! New password is: 123456";
        }
        else
        {
            $message = "Error resetting password!";
        }
    }
    else
    {
        $message = "Email not found!";
    }
}

?>

<section class="auth-section">

    <div class="container">

        <h1>Forgot Password</h1>

        <?php if($message != ""): ?>
            <div class="alert">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <form method="POST" class="auth-form">

            <input type="email"
                   name="email"
                   placeholder="Enter your email"
                   required>

            <button type="submit"
                    name="reset"
                    class="btn btn-primary">

                Reset Password

            </button>

        </form>

    </div>

</section>

<?php include("../includes/footer.php"); ?>