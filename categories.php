<?php
require 'pages/header_admin.php';
?>
// COLLECT CATEGORIES FROM DATABASE
 <?php 
            $categories = "SELECT * FROM categories";
            $result = mysqli_query($conn, $categories);
            $category_title = mysqli_fetch_assoc($result);
            echo "<pre>";
            print_r($category_title);
            echo "</pre>";
            ?>

<div class="layout">
  <!-- SIDEBAR -->
  <nav class="sidebar">
    <h2>Novus Admin</h2>
      <a href="overview.php" class="nav-item " >Overview</a>
      <a href="posts.php" class="nav-item" >Posts</a>
      <a href="comments.php" class="nav-item" >Comments</a>
      <a href="categories.php" class="nav-item active" >Categories</a>
      <a href="users.php" class="nav-item" >Users</a>
    </nav>

  <!-- MAIN -->
  <div class="main">



<!-- ===== CATEGORIES ===== -->
<section class="page ">
  <div class="panel">
    <div class="panel-header">
      <h1>Categories</h1>
      <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <button class="btn-outline">New Category</button>

      </a>

    </div>
  </div>

  <div class="panel">
    <div class="section-row">
      <h3>Manage Categories</h3>
      <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModal" class="view-all">Add New</a>
    </div>

        <!-- INSERT ALERT MESSAGES -->
         <?php include 'inc/process.php'; ?>
    <div class="alert-container">
        <?php if (isset($success)): ?>
                <div class="alert-msg success">

            <p><?php echo $success; ?></p>
        </div>
        <?php endif; ?>
        <?php if (isset($error)): ?>
            <div class="alert-msg error">
                <p><?php echo $error; ?></p>
            </div>
        <?php endif; ?>
    </div>


    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Slug</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
                 
          <?php
        for ($i =0; $i <=2; $i++){ ?>
      <tr>
  

          <td>1</td>
          <td>Technology</td>
          <td>technology</td>
          <td><button class="action-link edit">Edit</button><button class="action-link delete">Delete</button></td>
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
<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" >
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog auth-panel  ">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class=" eyebrow" id="exampleModalLabel">Add Category</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>


      <div class="modal-body ">
        <?php include 'inc/process.php'; ?>

        <form action="" method="POST">
          <label>
            Category Title
            <input type="text" name="category_name" placeholder="Category title" required>
          </label>

          <button type="submit" class="btn-primary" name="add_category" value="add_category">Add Category</button>
        </form>
      </div>

    </div>
  </div>
</div>


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