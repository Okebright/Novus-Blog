<?php
require 'pages/header_homepage.php';
?>

<section class="auth-page">
    <div class="auth-panel">
        <span class="eyebrow">Create account</span>
        <h1>Register for Novus Blog</h1>
        <p>Join Novus Blog to publish, edit, and manage content with ease.</p>
    <?php include 'inc/process.php'; ?>

    <!-- INSERT ALERT MESSAGES -->
    <div class="alert-container">
        <?php if (isset($success)): ?>
                <div class="alert-msg success">

            <p><?php echo $success; ?></p>
        </div>
        <?php endif; ?>
        <?php if (isset($error)): ?>
            <div class="alert-msg error">
                <p><?php echo $error; ?></p>
            </div>
        <?php endif; ?>
    </div>
        <form action="" method="POST">
            <label>
                Full name
                <input type="text" name="name" placeholder="Your full name" required>
            </label>
            <label>
                Email address
                <input type="email" name="email" placeholder="you@example.com" required>
            </label>
            <label>
                Password
                <input type="password" name="password" placeholder="Create a password" required>
            </label>
            <label>
                Confirm password
                <input type="password" name="confirm_password" placeholder="Repeat your password" required>
            </label>
            <button type="submit" class="btn-primary" name="register" value="register">Register</button>
        </form>

        <div class="auth-switch">
            Already have an account? <a href="login.php">Log in</a>
        </div>
    </div>
</section>

<?php
require 'pages/footer_all.php';
?>