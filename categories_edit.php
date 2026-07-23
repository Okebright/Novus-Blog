<?php
session_start();

if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'user') {
  header("Location: /novusblog/index.php");
  exit();
}
require 'pages/header_admin.php';


if (isset($_GET['edit_category']) && !empty($_GET['edit_category'])) {
    $category_id = $_GET['edit_category'];

    // Fetch the category details from the database
    $sql = "SELECT * FROM categories WHERE id = '$category_id'";
    $query = mysqli_query($conn, $sql);
    $category = mysqli_fetch_assoc($query);
}else {
    // Redirect to categories.php if no category ID is provided
    header("Location: categories.php");
    exit();
}
?>


<div class="layout">
  <!-- SIDEBAR -->
  <nav class="sidebar">
    <h2>Novus Admin</h2>
    <a href="overview.php" class="nav-item ">Overview</a>
    <a href="posts.php" class="nav-item">Posts</a>
    <a href="comments.php" class="nav-item">Comments</a>
    <a href="categories.php" class="nav-item active">Categories</a>
    <a href="users.php" class="nav-item">Users</a>
  </nav>

  <!-- MAIN -->
  <div class="main">



    <!-- ===== EDIT CATEGORIES ===== -->
    <section class="page ">
      <div class="panel">
        <div class="panel-header">
          <h1>Edit Category</h1>

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


        <div class="auth-panel  ">

          <form action="" method="POST">
            <label>
               Edit Category 
              <input type="text" name="edited_category_name" placeholder="Edit Category title" required value="<?php echo $category['name']; ?>">
            </label>

            <button type="submit" class="btn-primary" name="edit_category" value="edit_category">Edit Category</button>
          </form>
        </div>



      </div>
    </section>





  </div>
</div>

<?php
require 'pages/footer_all.php';
?>
<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" >
  Launch demo modal
</button> -->

<!-- Modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog auth-panel  ">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class=" eyebrow" id="exampleModalLabel">Add Category</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>


      <div class="modal-body ">

      </div>

    </div>
  </div>
</div>
 -->

<!-- <section class="auth-page modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="auth-panel">
    <span class="eyebrow"> Add Category</span>
    <h1>Add Category</h1>


    <form action="" method="POST">
      <label>
        Category Title
        <input type="text" name="category_name" placeholder="Category title" required>
      </label>

      <button type="submit" class="btn-primary" name="add_category" value="add_category">Sign In</button>
    </form>

  </div>
</section> -->