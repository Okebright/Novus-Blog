<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Novus Blog</title>
<style>
  :root{
    --navy:#0f1530;
    --navy-light:#1a2147;
    --indigo:#5b4ff5;
    --indigo-dark:#4338ca;
    --red:#ef4444;
    --red-bg:#fee2e2;
    --red-text:#dc2626;
    --green-bg:#d1fae5;
    --green-text:#059669;
    --amber-bg:#fef3c7;
    --amber-text:#b45309;
    --blue-bg:#dbeafe;
    --blue-text:#2563eb;
    --bg:#f3f4f8;
    --card:#ffffff;
    --text-dark:#111827;
    --text-muted:#6b7280;
    --border:#e5e7eb;
  }

  *{box-sizing:border-box;margin:0;padding:0;}

  body{
    font-family:'Segoe UI', Arial, sans-serif;
    background:var(--bg);
    color:var(--text-dark);
  }

  /* ---------- Top bar ---------- */
  .topbar{
    display:flex;
    align-items:center;
    justify-content:space-between;
    padding:28px 40px;
    background:var(--bg);
  }
  .logo{
    font-size:28px;
    font-weight:700;
    color:var(--text-dark);
  }
  .logout-btn{
    background:#e2231a;
    color:#fff;
    border:none;
    padding:12px 28px;
    border-radius:30px;
    font-size:15px;
    font-weight:600;
    cursor:pointer;
  }
  .logout-btn:hover{ background:#c91d15; }

  /* ---------- Layout ---------- */
  .layout{
    display:flex;
    gap:24px;
    padding:0 40px 40px;
    align-items:flex-start;
  }

  /* ---------- Sidebar ---------- */
  .sidebar{
    width:280px;
    flex-shrink:0;
    background:var(--navy);
    border-radius:18px;
    padding:36px 28px;
    display:flex;
    flex-direction:column;
    gap:8px;
  }
  .sidebar h2{
    color:#fff;
    font-size:22px;
    font-weight:700;
    margin-bottom:28px;
  }
  .nav-item{
    display:block;
    width:100%;
    text-align:center;
    padding:14px 16px;
    border-radius:12px;
    color:#cbd2e8;
    font-size:16px;
    font-weight:500;
    text-decoration:none;
    background:transparent;
    border:none;
    cursor:pointer;
    transition:background .15s, color .15s;
  }
  .nav-item:hover{
    background:rgba(255,255,255,0.06);
    color:#fff;
  }
  .nav-item.active{
    background:var(--indigo);
    color:#fff;
  }

  /* ---------- Main content ---------- */
  .main{
    flex:1;
    display:flex;
    flex-direction:column;
    gap:24px;
  }

  .panel{
    background:var(--card);
    border-radius:18px;
    padding:32px 36px;
  }

  .panel-header{
    display:flex;
    align-items:flex-start;
    justify-content:space-between;
    margin-bottom:6px;
  }
  .panel-header .eyebrow{
    color:var(--indigo);
    font-size:13px;
    font-weight:700;
    letter-spacing:.06em;
    text-transform:uppercase;
    margin-bottom:6px;
  }
  .panel-header h1{
    font-size:34px;
    font-weight:800;
  }
  .panel-header .welcome{
    color:var(--text-muted);
    font-size:14px;
    margin-top:6px;
  }

  .btn-outline{
    background:#fff;
    border:2px solid var(--indigo);
    color:var(--indigo);
    padding:12px 26px;
    border-radius:30px;
    font-size:15px;
    font-weight:700;
    cursor:pointer;
    white-space:nowrap;
  }
  .btn-outline:hover{ background:#f1f0ff; }

  /* ---------- Stat cards (Overview) ---------- */
  .stats-grid{
    display:grid;
    grid-template-columns:repeat(4, 1fr);
    gap:20px;
  }
  .stat-card{
    background:var(--card);
    border-radius:18px;
    padding:26px 28px;
  }
  .stat-card .label{
    color:#7c86a3;
    font-size:15px;
    font-weight:600;
    margin-bottom:14px;
  }
  .stat-card .value{
    font-size:34px;
    font-weight:800;
  }

  /* ---------- Recent activity ---------- */
  .section-row{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:18px;
  }
  .section-row h3{
    font-size:20px;
    font-weight:700;
  }
  .view-all{
    color:var(--indigo);
    font-weight:700;
    font-size:14px;
    text-decoration:none;
  }
  .activity-item{
    padding:18px 0;
    border-bottom:1px solid var(--border);
    font-size:15px;
  }
  .activity-item:last-child{ border-bottom:none; }
  .activity-item b{ font-weight:700; }

  /* ---------- Tables ---------- */
  table{
    width:100%;
    border-collapse:collapse;
  }
  thead th{
    text-align:left;
    color:#9aa3bd;
    font-size:13px;
    font-weight:700;
    letter-spacing:.04em;
    text-transform:uppercase;
    padding:14px 10px;
    border-bottom:1px solid var(--border);
  }
  tbody td{
    padding:18px 10px;
    border-bottom:1px solid var(--border);
    font-size:15px;
    vertical-align:middle;
  }
  tbody tr:last-child td{ border-bottom:none; }

  .post-thumb-cell{
    color:#b9c0d4;
    font-size:13px;
  }
  .post-title{ font-weight:700; }
  .post-sub{ color:var(--text-muted); font-size:13px; margin-top:4px; }

  .badge{
    display:inline-block;
    padding:6px 16px;
    border-radius:20px;
    font-size:13px;
    font-weight:700;
  }
  .badge.published, .badge.approved{ background:var(--green-bg); color:var(--green-text); }
  .badge.draft, .badge.pending{ background:var(--amber-bg); color:var(--amber-text); }
  .badge.scheduled{ background:var(--blue-bg); color:var(--blue-text); }
  .badge.admin{ font-weight:700; }

  .action-link{
    background:none;
    border:none;
    font-weight:700;
    font-size:14px;
    cursor:pointer;
    margin-right:18px;
  }
  .action-link.edit{ color:var(--indigo); }
  .action-link.delete{ color:var(--red); }

  /* ---------- responsive ---------- */
  @media (max-width: 900px){
    .layout{ flex-direction:column; }
    .sidebar{ width:100%; flex-direction:row; flex-wrap:wrap; }
    .stats-grid{ grid-template-columns:repeat(2,1fr); }
    table{ display:block; overflow-x:auto; }
  }

  .hidden{ display:none; }
</style>
</head>
<body>

  <div class="topbar">
    <div class="logo">Novus Blog</div>
    <button class="logout-btn">Log Out</button>
  </div>

  <div class="layout">
    <!-- SIDEBAR -->
    <nav class="sidebar">
      <h2>Novus Admin</h2>
      <button class="nav-item active" data-target="overview">Overview</button>
      <button class="nav-item" data-target="posts">Posts</button>
      <button class="nav-item" data-target="comments">Comments</button>
      <button class="nav-item" data-target="categories">Categories</button>
      <button class="nav-item" data-target="users">Users</button>
    </nav>

    <!-- MAIN -->
    <div class="main">

      <!-- ===== OVERVIEW ===== -->
      <section id="overview" class="page">
        <div class="panel">
          <div class="panel-header">
            <div>
              <div class="eyebrow">Overview</div>
              <h1>Dashboard</h1>
              <div class="welcome">Welcome, bright</div>
            </div>
            <button class="btn-outline">New Post</button>
          </div>
        </div>

        <div class="stats-grid">
          <div class="stat-card"><div class="label">Posts</div><div class="value">128</div></div>
          <div class="stat-card"><div class="label">Comments</div><div class="value">54</div></div>
          <div class="stat-card"><div class="label">Categories</div><div class="value">12</div></div>
          <div class="stat-card"><div class="label">Users</div><div class="value">24</div></div>
        </div>

        <div class="panel">
          <div class="section-row">
            <h3>Recent Activity</h3>
            <a href="#" class="view-all">View all</a>
          </div>
          <div class="activity-item"><b>Admin</b> published a new post.</div>
          <div class="activity-item"><b>Sarah</b> added a new category.</div>
          <div class="activity-item"><b>Mike</b> left a comment on the latest article.</div>
        </div>
      </section>

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
        <div style="text-align:center;color:var(--text-muted);font-size:13px;padding:8px 0;">
          © 2026 Novus Blog by Bright Oke. All rights reserved.
        </div>
      </section>

    </div>
  </div>

<script>
  const navItems = document.querySelectorAll('.nav-item');
  const pages = document.querySelectorAll('.page');

  navItems.forEach(item => {
    item.addEventListener('click', () => {
      navItems.forEach(i => i.classList.remove('active'));
      item.classList.add('active');
      const target = item.dataset.target;
      pages.forEach(p => p.classList.toggle('hidden', p.id !== target));
    });
  });
</script>

</body>
</html>
