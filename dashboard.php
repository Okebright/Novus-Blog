<?php
    require 'pages/header_admin.php';
?>

  <div class="layout">
    <!-- SIDEBAR -->
    <nav class="sidebar">
      <h2>Novus Admin</h2>
      <button class="nav-item active" data-target="overview">Overview</button>
      <button class="nav-item" data-target="posts">Posts</button>
      <button class="nav-item" data-target="comments">Comments</button>
      <button class="nav-item" data-target="categories">Categories</button>
      <button class="nav-item" data-target="users">Users</button>
    </nav>

    <!-- MAIN -->
    <div class="main">
      <?php include 'overview.php'; ?>
      <?php include 'posts.php'; ?>
      <?php include 'comments.php'; ?>
      <?php include 'categories.php'; ?>
      <?php include 'users.php'; ?>
    </div>
  </div>

<?php
  require 'pages/footer_all.php';
  ?>