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
    <a href="categories.php" class="nav-item">Categories</a>
    <a href="users.php" class="nav-item">Users</a>
  </nav>

  <!-- MAIN -->
  <div class="main">
    <!-- ===== POSTS ===== -->
    <section class="page ">
      <div class="panel">
        <div class="panel-header">
          <h1>Posts</h1>
          <a href="add_post.php">
            <button class="btn-outline">New Post</button>
          </a>
        </div>
      </div>

      <div class="panel">
        <div class="section-row">
          <h3>All Posts</h3>
          <a href="add_post.php" class="view-all">Add New</a>
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
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>

            <!-- COLLECT CATEGORIES FROM DATABASE -->
            <?php
            $row_numbering = 1; // Initialize a variable to keep track of the row number
            $sql = "SELECT * FROM posts";
            $query = mysqli_query($conn, $sql);
            while ($post = mysqli_fetch_assoc($query)) { ?>


              <tr>
                <td><?php echo $row_numbering++; ?></td>
                <td class="post-thumb-cell">
                  <div class="post-thumb">
                    <img src="<?php echo $post['thumbnail']; ?>" alt="Post thumbnail">
                  </div>
                </td>
                <td>
                  <div class="post-title"><?php echo $post['title']; ?></div>
                  <div class="post-sub"><?php
                                        if ($post['status'] == 1) {
                                          echo "Published";
                                        } else {
                                          echo "Draft";
                                        }
                                        ?> on <?php echo $post['timestamp'];
                                              ?></div>
                </td>
                <td><span class="badge published"><?php
                                                  if ($post['status'] == 1) {
                                                    echo "Published";
                                                  } else {
                                                    echo "Draft";
                                                  }
                                                  ?></span></td>
                <td>
                  <a href="edit_post.php?edit_post=<?php echo $post['id']; ?>" class="action-link edit">Edit</a>
                  <a href="posts.php?delete_post=<?php echo $post['id']; ?>">
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