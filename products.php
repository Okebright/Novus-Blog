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
    <a href="posts.php" class="nav-item">Posts</a>
    <a href="products.php" class="nav-item active">Products</a>
    <a href="comments.php" class="nav-item">Comments</a>
    <a href="categories.php" class="nav-item">Categories</a>
    <a href="users.php" class="nav-item">Users</a>
  </nav>

  <!-- MAIN -->
  <div class="main">
    <!-- ===== POSTS ===== -->
    <section class="page ">
      <div class="panel">
        <div class="panel-header">
          <h1>Products</h1>
          <a href="add_product.php">
            <button class="btn-outline">New Product</button>
          </a>
        </div>
      </div>

      <div class="panel">
        <div class="section-row">
          <h3>All Products</h3>
          <a href="add_product.php" class="view-all">Add New</a>
        </div>


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



        <table>
          <thead>
            <tr>
              <th>S/N</th>
              <th>Image</th>
              <th>Title</th>
              <th>Price</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>

            <!-- COLLECT CATEGORIES FROM DATABASE -->
            <?php
            $row_numbering = 1; // Initialize a variable to keep track of the row number
            $sql = "SELECT * FROM products";
            $query = mysqli_query($conn, $sql);
            while ($product = mysqli_fetch_assoc($query)) { ?>


              <tr>
                <td><?php echo $row_numbering++; ?></td>
                <td class="post-thumb-cell">
                  <div class="post-thumb">
                    <img src="<?php echo $product['image']; ?>" alt="Post thumbnail">
                  </div>
                </td>
                <td>
                  <div class="post-title"><?php echo $product['title']; ?></div>
                  <div class="post-sub"><?php
                                        if ($product['status'] == 1) {
                                          echo "Published";
                                        } else {
                                          echo "Draft";
                                        }
                                        ?> on <?php echo $product['timestamp'];
                                              ?></div>
                </td>
                <td>₦<?php echo number_format($product['price'], 2); ?></td>
                <td><span class="badge published"><?php
                                                  if ($product['status'] == 1) {
                                                    echo "Published";
                                                  } else {
                                                    echo "Draft";
                                                  }
                                                  ?></span></td>
                <td>
                  <a href="edit_product.php?edit_product=<?php echo $product['id']; ?>" class="action-link edit">Edit</a>
                  <a href="products.php?delete_product=<?php echo $product['id']; ?>">
                    <button class="action-link delete">Delete</button>

                  </a>
                </td>
              </tr>
            <?php } ?>


          </tbody>
        </table>
      </div>
    </section>

  </div>
</div>

<?php
require 'pages/footer_all.php';
?>