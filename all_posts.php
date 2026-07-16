
<?php
session_start();
    require 'pages/header_homepage.php';
?>


<header class="home-hero">
  <div class="hero-minimal">
    <h1>Thoughts worth sharing</h1>
    <p>A simple, elegant platform for writers and creators</p>
    <a href="#featured" class="hero-cta">Read Latest →</a>
  </div>
</header>

<main class="home-main">

  <!-- Main Content with Sidebar -->
  <div class="content-layout">
    <!-- Latest Posts -->
    <section class="latest-posts">
      <div class="posts-header">
        <div>
          <h2>All Articles</h2>
          <p>Fresh content from our writers</p>
        </div>
        <!-- <a href="all_posts.php" class="view-all-link">View All →</a> -->
      </div>

      <div class="posts-grid">


        <?php
        $sql = "SELECT * FROM posts WHERE status = 1 ORDER BY timestamp ";
        $post_query = mysqli_query($conn, $sql);
        $post = mysqli_fetch_assoc($post_query);
        while ($post = mysqli_fetch_assoc($post_query)) { ?>

          <article class="post-card">
            <div class="post-image">
              <img src="<?php echo $post['thumbnail']; ?>" alt="Post">
            </div>
            <div class="post-body">
              <div class="post-header">
                <span class="post-cat">

                  <?php
                  $cat_id = $post['category_id'];
                  $sql = "SELECT * FROM categories WHERE id = '$cat_id'";
                  $cat_query = mysqli_query($conn, $sql);
                  $category = mysqli_fetch_assoc($cat_query);
                  echo $category['name'];
                  ?>


                </span>
                <span class="post-date">Date : <?php echo date("F j, Y", strtotime($post['timestamp'])) ?> </span>
              </div>
              <h3>
                <a href="single_post.php?single_post=<?php echo $post['id'] ?>" </a>
                <?php echo $post['title']; ?>
              </a>
            </h3>
              <p><?php echo substr($post['content'], 0, 100) . '...'; ?></p>
              <a href="single_post.php?single_post=<?php echo $post['id'] ?>">
                <button class="btn-primary">Read More</button>
              </a>
            </div>
          </article>
        <?php } ?>





      </div>


    </section>

    <!-- Sidebar -->
    <aside class="sidebar">

          <!-- Search Widget -->
      <div class="widget newsletter-box">
        <h3 class="widget-title"> Search Post</h3>
        <!-- <p>Subscribe to receive new articles and insights in your inbox.</p> -->
        <form action="search.php" method="GET" class="newsletter-subscribe">
          <input type="text" placeholder="Search posts..." name="search-items" required>
          <button type="submit" class="btn-primary" name ="search" >Search</button>
        </form>
      </div>
      <!-- About Widget -->
      <div class="widget">
        <div class="widget-header">
          <h3 class="widget-title">About Novus</h3>
        </div>
        <div class="widget-body">
          <p>A modern publishing platform for creators, writers, and developers who want to share their ideas with the world.</p>
        </div>
      </div>

      <!-- Categories Widget -->
      <div class="widget">
        <div class="widget-header">
          <h3 class="widget-title">Explore Topics</h3>
        </div>
        <div class="categories-list">
          <?php
          $sql = "SELECT * FROM categories";
          $cat_query = mysqli_query($conn, $sql);
          while ($category = mysqli_fetch_assoc($cat_query)) { ?>
            <a href="post_category.php?category_id=<?php echo $category['id']; ?>" class="category-item">
              <span class="cat-name"><?php echo $category['name']; ?></span>
              <?php
              $cat_id = $category['id'];
              $count_sql = "SELECT COUNT(*) AS post_count FROM posts WHERE category_id = $cat_id";
              $count_query = mysqli_query($conn, $count_sql);
              $post_count = mysqli_fetch_assoc($count_query);
              ?>
              <span class="cat-post-count"><?php echo $post_count['post_count']; ?></span>
            </a>
          <?php } ?>



        </div>
      </div>

      <!-- Popular Posts Widget -->
      <div class="widget">
        <div class="widget-header">
          <h3 class="widget-title">Trending Now</h3>
        </div>
        <div class="trending-list">

          <?php
          $sql = "SELECT * FROM posts ORDER BY timestamp DESC LIMIT 6";
          $post_query = mysqli_query($conn, $sql);
          $post = mysqli_fetch_assoc($post_query);
          $row_numbering = 1; // Initialize a variable to keep track of the row number  
          while ($post = mysqli_fetch_assoc($post_query)) { ?>
            <a href="single_post.php?single_post=<?php echo $post['id'] ?>" class="trending-item">
              <div class="trending-rank">
                <?php echo  $row_numbering++; ?>
              </div>
              <div class="trending-info">
                <h4><?php echo $post['title']; ?></h4>
                <!-- <span> views</span> -->
              </div>
            </a>
          <?php   } ?>



        </div>
      </div>

      <!-- Newsletter Widget -->
      <div class="widget newsletter-box">
        <h3 class="widget-title">Get Updates</h3>
        <p>Subscribe to receive new articles and insights in your inbox.</p>
        <form class="newsletter-subscribe">
          <input type="email" placeholder="Enter your email" required>
          <button type="submit" class="btn-primary">Subscribe</button>
        </form>
      </div>
    </aside>
  </div>
</main>



<?php     require "pages/footer_all.php";
?>