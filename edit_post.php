<?php

session_start();

if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'user') {
  header("Location: /novusblog/index.php");
  exit();
}
require 'pages/header_admin.php';


if (isset($_GET['edit_post']) && !empty($_GET['edit_post'])) {
  $post_id = $_GET['edit_post'];

  // Fetch the post details from the database
  $sql = "SELECT * FROM posts WHERE id = '$post_id'";
  $query = mysqli_query($conn, $sql);
  $post = mysqli_fetch_assoc($query);
} else {
  // Redirect to posts.php if no post ID is provided
  header("Location: posts.php");
  exit();
}
?>





<div class="layout">
  <!-- SIDEBAR -->
  <nav class="sidebar">
    <h2>Novus Admin</h2>
    <a href="overview.php" class="nav-item ">Overview</a>
    <a href="posts.php" class="nav-item active">Posts</a>
    <a href="comments.php" class="nav-item">Comments</a>
    <a href="categories.php" class="nav-item ">Categories</a>
    <a href="users.php" class="nav-item">Users</a>
  </nav>

  <!-- MAIN -->
  <div class="main">



    <!-- ===== ADD POSTS ===== -->
    <section class="page ">
      <div class="panel">
        <div class="panel-header">
          <h1>Edit Post</h1>

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

          <form action="" method="POST" enctype="multipart/form-data">
            <label>
              Post Title
              <input type="text" name="post_title" placeholder=" Post Title" value="<?php echo $post['title']; ?>" required>
            </label>

            <div class="row">

              <div class="col-6">
                <label>
                  Category
                  <select name="category_id" id="">

                    <?php
                    // Fetch categories from the database
                    $sql = "SELECT * FROM categories ORDER BY id DESC";
                    $query = mysqli_query($conn, $sql);

                    while ($category = mysqli_fetch_assoc($query)) {
                      echo '<option value="' . $category['id'] . '" ' . (($category['id'] == $post['category_id']) ? 'selected' : '') . '>' . $category['name'] . '</option>';
                    }
                    ?>
                  </select>
                </label>
              </div>

              <div class="col-6">`
                <label>
                  Status
                  <select name="post_status" id="">
                    <option value="0" <?php echo ($post['status'] == 0) ? 'selected' : ''; ?>>Draft</option>
                    <option value="1" <?php echo ($post['status'] == 1) ? 'selected' : ''; ?>>Published</option>
                  </select>
                </label>
              </div>


            </div>

            <label>
              Post Content
              <textarea name="post_content" id="" placeholder="Post Content" value=""><?php echo $post['content']; ?></textarea>
            </label>
            <label>
              Thumbnail
              <input type="file" name="thumbnail" placeholder=" Thumbnail " value="<?php echo $post['thumbnail']; ?>" required">
                     <div class="post-thumb">
                    <img src="<?php echo $post['thumbnail']; ?>" alt="Post thumbnail">
                  </div>
            </label>
            <button type="submit" class="btn-primary" name="edit_post" value="edit_post">Submit </button>
          </form>
        </div>



      </div>
    </section>





  </div>
</div>

<?php
require 'pages/footer_all.php';
?>