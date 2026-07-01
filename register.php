<?php
require 'pages/header_homepage.php';
?>

<section class="auth-page">
  <div class="auth-panel">
    <span class="eyebrow">Create account</span>
    <h1>Register for Novus Blog</h1>
    <p>Join Novus Blog to publish, edit, and manage content with ease.</p>

    <form action="register.php" method="POST">
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
      <button type="submit" class="btn-primary">Register</button>
    </form>

    <div class="auth-switch">
      Already have an account? <a href="login.php">Log in</a>
    </div>
  </div>
</section>

<?php
require 'pages/footer_all.php';
?>