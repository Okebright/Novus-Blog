<?php
require 'pages/header_admin.php';
?>

<div class="layout">
  <!-- SIDEBAR -->
  <nav class="sidebar">
    <h2>Novus Admin</h2>
    <a href="overview.php" class="nav-item active" >Overview</a>
    <a href="posts.php" class="nav-item" >Posts</a>
    <a href="comments.php" class="nav-item" >Comments</a>
    <a href="categories.php" class="nav-item">Categories</a>
    <a href="users.php" class="nav-item" >Users</a>
  </nav>

  <!-- MAIN -->
  <div class="main">

<!-- ===== OVERVIEW ===== -->
<section class="page">
  <div class="panel">
    <div class="panel-header">
      <div>
        <div class="eyebrow">Overview</div>
        <h1>Dashboard</h1>
        <div class="welcome">Welcome, bright</div>
      </div>
<a href="add_post.php">
        <button class="btn-outline">New Post</button>
</a>
    </div>
  </div>

  <div class="stats-grid">
    <div class="stat-card">
      <div class="label">Posts</div>
      <div class="value">128</div>
    </div>
    <div class="stat-card">
      <div class="label">Comments</div>
      <div class="value">54</div>
    </div>
    <div class="stat-card">
      <div class="label">Categories</div>
      <div class="value">12</div>
    </div>
    <div class="stat-card">
      <div class="label">Users</div>
      <div class="value">24</div>
    </div>
  </div>

  <div class="panel">
    <div class="section-row">
      <h3>Recent Activity</h3>
      <a href="#" class="view-all">View all</a>
    </div>
    <div class="activity-item"><b>Admin</b> published a new post.</div>
    <div class="activity-item"><b>Sarah</b> added a new category.</div>
    <div class="activity-item"><b>Mike</b> left a comment on the latest article.</div>
  </div>
</section>
  </div>
</div>

<?php
  require 'pages/footer_all.php';
  ?>
