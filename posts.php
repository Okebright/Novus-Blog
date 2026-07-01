   <?php 
require 'inc/header.php';
?>

   
   <!-- ===== POSTS ===== -->
      <section id="posts" class="page hidden">
        <div class="panel">
          <div class="panel-header">
            <h1>Posts</h1>
            <button class="btn-outline">New Post</button>
          </div>
        </div>

        <div class="panel">
          <div class="section-row">
            <h3>All Posts</h3>
            <a href="#" class="view-all">Add New</a>
          </div>
          <table>
            <thead>
              <tr><th>S/N</th><th>Image</th><th>Title</th><th>Status</th><th>Actions</th></tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td class="post-thumb-cell">Post thumbnail</td>
                <td>
                  <div class="post-title">How to Build a Modern Blog</div>
                  <div class="post-sub">Published on 12 Jun</div>
                </td>
                <td><span class="badge published">Published</span></td>
                <td><button class="action-link edit">Edit</button><button class="action-link delete">Delete</button></td>
              </tr>
              <tr>
                <td>2</td>
                <td class="post-thumb-cell">Post thumbnail</td>
                <td>
                  <div class="post-title">Tips for Better Content Writing</div>
                  <div class="post-sub">Draft saved</div>
                </td>
                <td><span class="badge draft">Draft</span></td>
                <td><button class="action-link edit">Edit</button><button class="action-link delete">Delete</button></td>
              </tr>
              <tr>
                <td>3</td>
                <td class="post-thumb-cell">Post thumbnail</td>
                <td>
                  <div class="post-title">The Future of Web Development</div>
                  <div class="post-sub">Scheduled for 20 Jun</div>
                </td>
                <td><span class="badge scheduled">Scheduled</span></td>
                <td><button class="action-link edit">Edit</button><button class="action-link delete">Delete</button></td>
              </tr>
            </tbody>
          </table>
        </div>
      </section>
