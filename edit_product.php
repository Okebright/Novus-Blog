<?php

session_start();

if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'user') {
  header("Location: /novusblog/index.php");
  exit();
}
require 'pages/header_admin.php';


if (isset($_GET['edit_product']) && !empty($_GET['edit_product'])) {
  $product_id = $_GET['edit_product'];

  // Fetch the product details from the database
  $sql = "SELECT * FROM products WHERE id = '$product_id'";
  $query = mysqli_query($conn, $sql);
  $product = mysqli_fetch_assoc($query);
} else {
  // Redirect to products.php if no product ID is provided
  header("Location: products.php");
  exit();
}
?>





<div class="layout">
  <!-- SIDEBAR -->
  <nav class="sidebar">
    <h2>Novus Admin</h2>
    <a href="overview.php" class="nav-item ">Overview</a>
    <a href="posts.php" class="nav-item">Posts</a>
    <a href="products.php" class="nav-item active">Products</a>
    <a href="comments.php" class="nav-item">Comments</a>
    <a href="categories.php" class="nav-item">Categories</a>
    <a href="users.php" class="nav-item">Users</a>
  </nav>

  <!-- MAIN -->
  <div class="main">



    <!-- ===== ADD POSTS ===== -->
    <section class="page ">
      <div class="panel">
        <div class="panel-header">
          <h1>Edit Product</h1>

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
              Product Title
              <input type="text" name="product_title" placeholder=" Product Title" value="<?php echo $product['title']; ?>" required>
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
                      echo '<option value="' . $category['id'] . '" ' . (($category['id'] == $product['category_id']) ? 'selected' : '') . '>' . $category['name'] . '</option>';
                    }
                    ?>
                  </select>
                </label>
              </div>

              <div class="col-6">`
                <label>
                  Status
                  <select name="product_status" id="">
                    <option value="0" <?php echo ($product['status'] == 0) ? 'selected' : ''; ?>>Draft</option>
                    <option value="1" <?php echo ($product['status'] == 1) ? 'selected' : ''; ?>>Published</option>
                  </select>
                </label>
              </div>


            </div>

                   <label>
              Price
              <input type="number" name="product_price" placeholder=" Product Price" value="<?php echo $product['price']; ?>" required>
            </label>

            <label>
              Product Content
              <textarea name="product_content" id="" placeholder="Product Content" value=""><?php echo $product['content']; ?></textarea>
            </label>
            <label>
              image
              <input type="file" name="image" placeholder=" image " value="<?php echo $product['image']; ?>" required">
                     <div class="post-thumb">
                    <img src="<?php echo $product['image']; ?>" alt="Product image">
                  </div>
            </label>
            <button type="submit" class="btn-primary" name="edit_product" value="edit_product">Submit </button>
          </form>
        </div>



      </div>
    </section>





  </div>
</div>

<?php
require 'pages/footer_all.php';
?>