<?php
require 'pages/header_homepage.php';
?>

<section class="auth-page">
  <div class="auth-panel">
    <span class="eyebrow">Welcome back</span>
    <h1>Log in to Novus Blog</h1>
    <p>Access your dashboard, manage posts, and stay connected with your readers.</p>
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
        Email address
        <input type="email" name="email" placeholder="you@example.com" required>
      </label>
      <label>
        Password
        <input type="password" name="password" placeholder="Enter your password" required>
      </label>
      <button type="submit" class="btn-primary" name="login" value="login">Sign In</button>
    </form>

    <div class="auth-switch">
      Don’t have an account? <a href="register.php">Register here</a>
    </div>
  </div>
</section>

<?php
require 'pages/footer_all.php';
?>