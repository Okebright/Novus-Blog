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
    <a href="comments.php" class="nav-item active">Comments</a>
    <a href="categories.php" class="nav-item">Categories</a>
    <a href="users.php" class="nav-item">Users</a>
  </nav>

  <!-- MAIN -->
  <div class="main">

    <!-- ===== COMMENTS ===== -->


    <section class="page ">
      <div class="panel">
        <div class="panel-header">
          <h1>Comments</h1>
          <!-- <button class="btn-outline">Add Comment</button> -->
        </div>
      </div>

      <div class="panel">
        <div class="section-row">
          <h3>Recent Comments</h3>
          <!-- <a href="#" class="view-all">View All</a> -->
        </div>
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Post</th>
              <th>Author</th>
              <!-- <th>Email</th> -->
              <th>Comment</th>
              <th>Date</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>

            <!-- READ COMMENTS FROM DATABASE -->
            <?php
            include 'inc/process.php';
            $row_numbering = 1; // Initialize a variable to keep track of the row number
            $sql = "SELECT * FROM comments";
            $query = mysqli_query($conn, $sql);
            while ($comment = mysqli_fetch_assoc($query)) { ?>



              <tr>
                <td><?php echo $row_numbering++; ?></td>
                <td><?php
                    $post_id = $comment['post_id'];
                    $sql_post = "SELECT * FROM posts WHERE id = '$post_id'";
                    $post_query = mysqli_query($conn, $sql_post);
                    $post = mysqli_fetch_assoc($post_query);
                    echo $post['title'];

                    ?></td>
                <td>
                  <?php
                  $user_id = $comment['user_id'];
                  $sql_user = "SELECT * FROM users WHERE id = '$user_id'";
                  $user_query = mysqli_query($conn, $sql_user);
                  $user = mysqli_fetch_assoc($user_query);
                  echo $user['name'];

                  ?></td>
                <!-- <td>john.doe@example.com</td> -->
                <td><?php echo $comment['message']; ?></td>
                <td><?php echo date("F j, Y", strtotime($comment['timestamp'])); ?></td>
                <td>

                  <?php
                  if ($comment['status'] == 0) { ?>
                    <span class="badge pending">
                      Pending</span>
                  <?php   } else { ?>
                    <span class="badge approved">
                      Approved
                    </span>
                  <?php } ?>
                  </span>
                </td>
                <td>
                  <a href="?approve_comment=<?php echo $comment['id'] ?>">
                    <button class="action-link approve">Approve</button>
                  </a>
                  <a href="?delete_comment=<?php echo $comment['id'] ?>">
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