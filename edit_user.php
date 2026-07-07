<?php
require 'pages/header_admin.php';

if (isset($_GET['edit_user']) && !empty($_GET['edit_user'])) {
    $user_id = $_GET['edit_user'];

    // Fetch the user details from the database
    $sql = "SELECT * FROM users WHERE id = '$user_id'";
    $query = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($query);
}else {
    // Redirect to categories.php if no category ID is provided
    header("Location: users.php");
    exit();
}

?>


<div class="layout">
  <!-- SIDEBAR -->
  <nav class="sidebar">
    <h2>Novus Admin</h2>
    <a href="overview.php" class="nav-item ">Overview</a>
    <a href="posts.php" class="nav-item ">Posts</a>
    <a href="comments.php" class="nav-item">Comments</a>
    <a href="categories.php" class="nav-item ">Categories</a>
    <a href="users.php" class="nav-item active">Users</a>
  </nav>

  <!-- MAIN -->
  <div class="main">



    <!-- ===== ADD POSTS ===== -->
    <section class="page ">
      <div class="panel">
        <div class="panel-header">
          <h1>Edit User</h1>

        </div>
      </div>

      <div class="panel">
        <!-- <div class="section-row">
          <h3>Manage Categories</h3>
          <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModal" class="view-all">Add New</a>
        </div> -->

        <!-- INSERT ALERT MESSAGES -->
        <?php include 'inc/process.php'; ?>
        <div class="alert-container" id="alertBox">
          <?php if (isset($success)): ?>
            <div class="alert-msg success">

              <p><?php echo $success; ?></p>
            </div>
          <?php endif; ?>
          <?php if (isset($error)): ?>
            <div class="alert-msg error" id="alertBox">
              <p><?php echo $error; ?></p>
            </div>
          <?php endif; ?>
        </div>


        <div class="form-panel">
          <form action="" method="POST">
            <label>
              Full name
              <input type="text" name="name" placeholder="Your full name" value="<?php echo $user['name'] ?>" required>
            </label>
            <label>
              Email address
              <input type="email" name="email" placeholder="you@example.com" value="<?php echo $user['email'] ?>" disabled >
            </label>
            <label>
              Role
              <select name="role" id="">
                <option value="user" <?php echo ($user['role'] == 'user') ? 'selected' : ''; ?>>User</option>
                <option value="author" <?php echo ($user['role'] == 'author') ? 'selected' : ''; ?>>Author</option>
                <option value="admin" <?php echo ($user['role'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
              </select>
            </label>
            <label>
              Password
              <input type="password" name="password" placeholder="Create a password" required>
            </label>
            <label>
              Confirm password
              <input type="password" name="confirm_password" placeholder="Repeat your password" required>
            </label>
            <button type="submit" class="btn-primary" name="edit_user" value="edit_user">Submit</button>
          </form>
        </div>
      </div>
    </section>





  </div>
</div>

<?php
require 'pages/footer_all.php';
?>