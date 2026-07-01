 <?php 
require 'inc/header.php';
?>

 
 <!-- ===== COMMENTS ===== -->
      <section id="comments" class="page hidden">
        <div class="panel">
          <div class="panel-header">
            <h1>Comments</h1>
            <button class="btn-outline">Add Comment</button>
          </div>
        </div>

        <div class="panel">
          <div class="section-row">
            <h3>Recent Comments</h3>
            <a href="#" class="view-all">View All</a>
          </div>
          <table>
            <thead>
              <tr><th>ID</th><th>Post</th><th>Author</th><th>Email</th><th>Comment</th><th>Date</th><th>Status</th><th>Actions</th></tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>How to Build a Modern Blog</td>
                <td>John Doe</td>
                <td>john.doe@example.com</td>
                <td>This is a sample comment.</td>
                <td>2023-06-12</td>
                <td><span class="badge approved">Approved</span></td>
                <td><button class="action-link edit">Edit</button><button class="action-link delete">Delete</button></td>
              </tr>
              <tr>
                <td>2</td>
                <td>Tips for Better Content Writing</td>
                <td>Jane Smith</td>
                <td>jane.smith@example.com</td>
                <td>Great tips! Thanks for sharing.</td>
                <td>2023-06-14</td>
                <td><span class="badge pending">Pending</span></td>
                <td><button class="action-link edit">Edit</button><button class="action-link delete">Delete</button></td>
              </tr>
            </tbody>
          </table>
        </div>
      </section>
