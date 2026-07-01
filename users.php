<?php 
require 'inc/header.php';
?>



<!-- ===== USERS ===== -->
      <section id="users" class="page hidden">
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
