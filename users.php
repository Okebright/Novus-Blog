<?php
require 'pages/header_admin.php';
?>

<div class="layout">
  <!-- SIDEBAR -->
  <nav class="sidebar">
    <h2>Novus Admin</h2>
    <a href="overview.php" class="nav-item ">Overview</a>
    <a href="posts.php" class="nav-item">Posts</a>
    <a href="comments.php" class="nav-item">Comments</a>
    <a href="categories.php" class="nav-item">Categories</a>
    <a href="users.php" class="nav-item active">Users</a>
  </nav>

  <!-- MAIN -->
  <div class="main">



    <!-- ===== USERS ===== -->
    <section class="page ">
      <div class="panel">

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

        <div class="panel-header">
          <h1>Users</h1>
          <a href="add_user.php">
            <button class="btn-outline">Add User</button>
          </a>
        </div>
      </div>

      <div class="panel">
        <div class="section-row">
          <h3>User Directory</h3>
          <!-- <a href="#" class="view-all">Manage Roles</a> -->
        </div>
        <table>
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Email</th>
              <th>Role</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>

            <!-- READ USERS FROM DATABASE -->
            <?php
            include 'inc/process.php';
            $row_numbering = 1; // Initialize a variable to keep track of the row number
            $sql = "SELECT * FROM users";
            $query = mysqli_query($conn, $sql);
            while ($user = mysqli_fetch_assoc($query)) { ?>

              <tr>
                <td><?php echo  $row_numbering++; ?></td>
                <td><?php echo $user["name"]; ?> </td>
                <td><?php echo  $user['email']; ?></td>
                <td><?php echo  $user['role']; ?></td>
                <td>
                  <a href="edit_user.php?edit_user=<?php echo $user['id'] ?>">
                    <button class="action-link edit">Edit</button>
                  </a>
                  <a href="?delete_user=<?php echo $user['id'] ?>">
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