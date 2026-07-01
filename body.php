<?php
require 'pages/header_homepage.php';
?>

<header class="home-hero">
  <div class="hero-copy">
    <span class="eyebrow">Novus Blog</span>
    <h1>Ideas, tutorials, and stories for modern creators.</h1>
    <p>Explore blog growth, writing best practices, and fresh content strategy guidance crafted for developers, authors, and digital publishers.</p>
    <div class="hero-actions">
      <a href="dashboard.php" class="btn-outline">Go to Dashboard</a>
      <a href="#latest" class="btn-primary">Browse Posts</a>
    </div>
  </div>

  <div class="hero-features">
    <article class="feature-card">
      <h3>Latest news</h3>
      <p>See what’s new in the blog admin and find inspiration for your next post.</p>
    </article>
    <article class="feature-card">
      <h3>Content tools</h3>
      <p>Manage categories, comments, and users from a modern dashboard experience.</p>
    </article>
    <article class="feature-card">
      <h3>Performance tips</h3>
      <p>Learn how to publish faster, engage readers, and grow your audience.</p>
    </article>
  </div>
</header>

<main class="home-main">
  <section id="latest" class="home-section">
    <div class="section-heading">
      <h2>Featured Posts</h2>
      <p>Hand-picked posts from the Novus Blog editorial team.</p>
    </div>

    <div class="post-grid">
      <article class="post-card">
        <span class="post-tag">Writing</span>
        <h3>Build a modern blog that readers love</h3>
        <p>Practical steps for designing, publishing, and promoting rich content in 2026.</p>
      </article>
      <article class="post-card">
        <span class="post-tag">Strategy</span>
        <h3>Plan content with consistency and clarity</h3>
        <p>Use a simple editorial workflow to keep ideas fresh and publishing on schedule.</p>
      </article>
      <article class="post-card">
        <span class="post-tag">Growth</span>
        <h3>Convert readers into subscribers</h3>
        <p>Optimize your blog with smart calls to action, categories, and user engagement.</p>
      </article>
    </div>
  </section>

  <section id="categories" class="home-section">
    <div class="section-heading">
      <h2>Categories</h2>
      <p>Browse the category topics powering Novus Blog articles.</p>
    </div>

    <div class="category-list">
      <article class="category-card">
        <h3>Technology</h3>
        <p>Latest updates on web development, tools, and digital innovation.</p>
      </article>
      <article class="category-card">
        <h3>Design</h3>
        <p>Guides for clean UI, content layout, and storytelling through visuals.</p>
      </article>
      <article class="category-card">
        <h3>Writing</h3>
        <p>Practical advice for better posts, clearer messaging, and stronger headlines.</p>
      </article>
      <article class="category-card">
        <h3>Marketing</h3>
        <p>Strategies for growing readership, building an audience, and promotion.</p>
      </article>
    </div>
  </section>

  <section class="home-section home-about">
    <div>
      <h2>Welcome to Novus</h2>
      <p>Novus Blog is a clean, modern publishing platform for authors, developers, and content creators. Start your writing journey from the dashboard or explore curated posts on best practices and digital storytelling.</p>
    </div>
    <div class="about-cards">
      <div class="about-card">
        <h3>Write smarter</h3>
        <p>Create compelling posts with structured categories, status tracking, and editorial clarity.</p>
      </div>
      <div class="about-card">
        <h3>Manage easily</h3>
        <p>Control comments, categories, and users from a single admin hub built for simplicity.</p>
      </div>
      <div class="about-card">
        <h3>Publish faster</h3>
        <p>Keep your audience engaged with polished publishing tools and an intuitive workflow.</p>
      </div>
    </div>
  </section>
</main>

<?php
require 'pages/footer_all.php';
?>