<div class="sidebar">

    <ul class="sidebar-menu">

        <!-- Dashboard -->
        <li>
            <a href="dashboard.php">
                <i class="fa fa-home"></i>
                Dashboard
            </a>
        </li>

        <!-- Profile -->
        <li>
            <a href="profile.php">
                <i class="fa fa-user"></i>
                Profile
            </a>
        </li>

        <!-- Seller Menu -->
        <?php if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'seller'): ?>

            <li>
                <a href="upload-service.php">
                    <i class="fa fa-upload"></i>
                    Upload Service
                </a>
            </li>

            <li>
                <a href="my-services.php">
                    <i class="fa fa-briefcase"></i>
                    My Services
                </a>
            </li>

            <li>
                <a href="orders.php">
                    <i class="fa fa-shopping-cart"></i>
                    Orders
                </a>
            </li>

        <?php endif; ?>


        <!-- Buyer Menu -->
        <?php if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'buyer'): ?>

            <li>
                <a href="my-orders.php">
                    <i class="fa fa-list"></i>
                    My Orders
                </a>
            </li>

            <li>
                <a href="wishlist.php">
                    <i class="fa fa-heart"></i>
                    Wishlist
                </a>
            </li>

        <?php endif; ?>


        <!-- Messages -->
        <li>
            <a href="messages.php">
                <i class="fa fa-envelope"></i>
                Messages
            </a>
        </li>

        <!-- Logout -->
        <li>
            <a href="/skillshe/auth/logout.php">
                <i class="fa fa-sign-out-alt"></i>
                Logout
            </a>
        </li>

    </ul>

</div>