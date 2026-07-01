<?php
require 'pages/header_homepage.php';
?>

<section class="auth-page">
  <div class="auth-panel">
    <span class="eyebrow">Welcome back</span>
    <h1>Log in to Novus Blog</h1>
    <p>Access your dashboard, manage posts, and stay connected with your readers.</p>

    <form action="login.php" method="POST">
      <label>
        Email address
        <input type="email" name="email" placeholder="you@example.com" required>
      </label>
      <label>
        Password
        <input type="password" name="password" placeholder="Enter your password" required>
      </label>
      <button type="submit" class="btn-primary">Sign In</button>
    </form>

    <div class="auth-switch">
      Don’t have an account? <a href="register.php">Register here</a>
    </div>
  </div>
</section>

<?php
require 'pages/footer_all.php';
?>