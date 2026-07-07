<?php
require 'inc/header.php';
?>

<header class="site-header header-homepage">
    <div class="header-container">
        <!-- Logo -->
        <div class="logo">
            <a href="index.php">
                <h1>Novus Blog</h1>
            </a>
        </div>

        <!-- Navigation Bar -->
        <nav class="navbar">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="posts.php">Posts</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>

        <!-- Register and Login Buttons -->

        <?php if (isset($_SESSION['user_id'])) { ?>
            <div class="auth-buttons">
                <a href="overview.php" class="btn ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="white" class="bi bi-file-person-fill" viewBox="0 0 16 16">
                        <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2m-1 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0m-3 4c2.623 0 4.146.826 5 1.755V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-1.245C3.854 11.825 5.377 11 8 11" />
                    </svg> </a>
            </div>
        <?php } else { ?>

            <div class="auth-buttons">
                <a href="register.php" class="btn btn-register">Register</a>
                <a href="login.php" class="btn btn-login">Login</a>
            </div>
        <?php  } ?>
    </div>
</header>