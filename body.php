<header class="home-hero">
  <div class="hero-minimal">
    <h1>Thoughts worth sharing</h1>
    <p>A simple, elegant platform for writers and creators</p>
    <a href="#featured" class="hero-cta">Read Latest →</a>
  </div>
</header>

<main class="home-main">
  <!-- Featured Section -->
  <!-- <section id="featured" class="featured-section">
    <div class="section-intro">
      <h2>Featured This Week</h2>
      <p>Hand-picked stories and insights from our community</p>
    </div>

    <div class="featured-grid">
      <article class="featured-post featured-large">
        <div class="featured-image">
          <img src="https://via.placeholder.com/600x400?text=Featured+1" alt="Featured article">
          <span class="featured-badge">Featured</span>
        </div>
        <div class="featured-content">
          <div class="featured-meta">
            <span class="category-badge writing">Writing</span>
            <span class="read-time">8 min read</span>
          </div>
          <h3>The Art of Writing Compelling Blog Posts</h3>
          <p>Master the craft of engaging your readers with powerful storytelling, clear messaging, and strategic calls to action. Learn from successful writers.</p>
          <a href="#" class="featured-link">Read Article →</a>
        </div>
      </article>

      <article class="featured-post featured-small">
        <div class="featured-image">
          <img src="https://via.placeholder.com/400x250?text=Featured+2" alt="Featured article">
        </div>
        <div class="featured-content">
          <div class="featured-meta">
            <span class="category-badge strategy">Strategy</span>
            <span class="read-time">5 min</span>
          </div>
          <h3>Content Calendar Essentials</h3>
          <a href="#" class="featured-link">Read →</a>
        </div>
      </article>

      <article class="featured-post featured-small">
        <div class="featured-image">
          <img src="https://via.placeholder.com/400x250?text=Featured+3" alt="Featured article">
        </div>
        <div class="featured-content">
          <div class="featured-meta">
            <span class="category-badge growth">Growth</span>
            <span class="read-time">6 min</span>
          </div>
          <h3>Growing Your Audience in 2026</h3>
          <a href="#" class="featured-link">Read →</a>
        </div>
      </article>
    </div>
  </section> -->

  <!-- Main Content with Sidebar -->
  <div class="content-layout">
    <!-- Latest Posts -->
    <section class="latest-posts">
      <div class="posts-header">
        <div>
          <h2>Latest Articles</h2>
          <p>Fresh content from our writers</p>
        </div>
        <a href="#" class="view-all-link">View All →</a>
      </div>

      <div class="posts-grid">


      <?php
                $sql = "SELECT * FROM posts ORDER BY timestamp DESC LIMIT 6";
            $post_query = mysqli_query($conn, $sql);
            $post = mysqli_fetch_assoc($post_query);
            while ($post = mysqli_fetch_assoc($post_query) ){?>

     <article class="post-card">
          <div class="post-image">
            <img src="<?php echo $post['thumbnail']; ?>" alt="Post">
          </div>
          <div class="post-body">
            <div class="post-header">
              <span class="post-cat">category</span>
              <span class="post-date">Date : <?php echo date ("F j, Y", strtotime($post['timestamp'])) ?> </span>
            </div>
            <h3><a href="#"><?php echo $post['title']; ?></a></h3>
            <p><?php echo substr($post['content'], 0, 100) . '...'; ?></p>
            <a href="#">
              <button class="btn-primary">Read More</button>
            </a>
          </div>
        </article>
      <?php } ?>
   

      


 
      </div>

      <div class="posts-cta">
        <a href="#" class="btn-outline">Load More Articles</a>
      </div>
    </section>

    <!-- Sidebar -->
    <aside class="sidebar">
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
          for  ($i = 1; $i <= 5; $i++){?>
              <a href="#" class="category-item">
            <span class="cat-name">Technology</span>
            <span class="cat-post-count">28</span>
          </a>
         <?php }
        ?>

         
    
        </div>
      </div>

      <!-- Popular Posts Widget -->
      <div class="widget">
        <div class="widget-header">
          <h3 class="widget-title">Trending Now</h3>
        </div>
        <div class="trending-list">

        <?php for ($i = 1; $i<=3; $i++){?>
        <a href="#" class="trending-item">
            <div class="trending-rank">1</div>
            <div class="trending-info">
              <h4>Building Modern Blogs</h4>
              <span>2.4k views</span>
            </div>
          </a>
     <?php   }        ?>
  
  

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

