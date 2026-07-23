<?php
session_start();

if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'user') {
  header("Location: /novusblog/index.php");
  exit();
}
require 'pages/header_admin.php';
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
          <h1>Add Post</h1>

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
              <input type="text" name="post_title" placeholder=" Post Title" required>
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
                      echo '<option value="' . $category['id'] . '">' . $category['name'] . '</option>';
                    }
                    ?>
                  </select>
                </label>
              </div>

              <div class="col-6">`
                <label>
                  Status
                  <select name="post_status" id="">
                    <option value="0">Draft</option>
                    <option value="1">Published</option>
                  </select>
                </label>
              </div>


            </div>

            <label>
              Post Content
              <textarea name="post_content" id="" placeholder="Post Content"></textarea>
            </label>
                     <label>
               Thumbnail 
              <input type="file" name="thumbnail" placeholder=" Thumbnail " required">
            </label>
            <button type="submit" class="btn-primary" name="add_post" value="add_post">Submit </button>
          </form>
        </div>



      </div>
    </section>





  </div>
</div>

<?php
require 'pages/footer_all.php';
?>