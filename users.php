<?php
require 'pages/header_admin.php';
?>

<div class="layout">
  <!-- SIDEBAR -->
  <nav class="sidebar">
    <h2>Novus Admin</h2>
      <a href="overview.php" class="nav-item " >Overview</a>
      <a href="posts.php" class="nav-item" >Posts</a>
      <a href="comments.php" class="nav-item" >Comments</a>
      <a href="categories.php" class="nav-item" >Categories</a>
      <a href="users.php" class="nav-item active" >Users</a>
    </nav>

  <!-- MAIN -->
  <div class="main">



<!-- ===== USERS ===== -->
      <section class="page ">
        <div class="panel">
          <div class="panel-header">
            <h1>Users</h1>
            <button class="btn-outline">Add User</button>
          </div>
        </div>

        <div class="panel">
          <div class="section-row">
            <h3>User Directory</h3>
            <a href="#" class="view-all">Manage Roles</a>
          </div>
          <table>
            <thead>
              <tr><th>#</th><th>Name</th><th>Email</th><th>Role</th><th>Actions</th></tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Jane Doe</td>
                <td>jane@example.com</td>
                <td>Admin</td>
                <td><button class="action-link edit">Edit</button><button class="action-link delete">Delete</button></td>
              </tr>
              <tr>
                <td>2</td>
                <td>John Smith</td>
                <td>john@example.com</td>
                <td>Author</td>
                <td><button class="action-link edit">Edit</button><button class="action-link delete">Delete</button></td>
              </tr>
            </tbody>
          </table>
        </div>
      
      </section>




  </div>
</div>

<?php
  require 'pages/footer_all.php';
  ?>

