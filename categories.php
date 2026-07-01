<?php 
require 'inc/header.php';
?>



<!-- ===== CATEGORIES ===== -->
      <section id="categories" class="page hidden">
        <div class="panel">
          <div class="panel-header">
            <h1>Categories</h1>
            <button class="btn-outline">New Category</button>
          </div>
        </div>

        <div class="panel">
          <div class="section-row">
            <h3>Manage Categories</h3>
            <a href="#" class="view-all">Add New</a>
          </div>
          <table>
            <thead>
              <tr><th>ID</th><th>Name</th><th>Slug</th><th>Actions</th></tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Technology</td>
                <td>technology</td>
                <td><button class="action-link edit">Edit</button><button class="action-link delete">Delete</button></td>
              </tr>
              <tr>
                <td>2</td>
                <td>Design</td>
                <td>design</td>
                <td><button class="action-link edit">Edit</button><button class="action-link delete">Delete</button></td>
              </tr>
            </tbody>
          </table>
        </div>
      </section>
