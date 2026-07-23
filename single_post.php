<?php
session_start();

require 'pages/header_homepage.php';

$_SESSION['user_id'] = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;


if (isset($_GET['single_post']) && !empty($_GET['single_post'])) {
    $post_id = $_GET['single_post'];

    // Fetch the post details from the database
    $sql = "SELECT * FROM posts WHERE id = '$post_id'";
    $query = mysqli_query($conn, $sql);
    $post = mysqli_fetch_assoc($query);
} else {
    // Redirect to posts.php if no post ID is provided
    header("Location: posts.php");
    exit();
}
?>

?>

<header class="home-hero single-post-header">
    <div class="hero-minimal single-post-hero">
        <h1><?php echo $post['title'] ?></h1>
        <!-- <p>A simple, elegant platform for writers and creators</p> -->
        <!-- <a href="#featured" class="hero-cta">Read Latest →</a> -->
    </div>
</header>

<main class="home-main">

    <!-- Main Content with Sidebar -->
    <div class="content-layout">
        <!-- Latest Posts -->
        <section class="latest-posts">
            <div class="single-post">
                <div class="single-post-image">
                    <img src="<?php echo $post['thumbnail']; ?>" alt="Post">
                </div>
                <div class="post-header post-header-spacing">
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
                <div class="post-body post-body-spacing">
                    <h2 class="post-title-large"><?php echo $post['title']; ?></h2>
                    <p class="post-content-text"><?php echo $post['content']; ?></p>
                </div>
                <div class="posts-cta posts-cta-spacing">
                    <a href="all_posts.php?" class="btn-outline">Load More Articles</a>
                </div>
            </div>


            <!-- COMMENT SECTION -->
            <section class="latest-posts comments-section">
                <div class="posts-header comments-header">
                    <div>
                        <h2 class="comments-title">Comments</h2>
                    </div>
                </div>


                <!-- COMMENT FORM -->

                <!-- COMMENT LAYOUT -->
                <div class="single-post comments-container">
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

                    <?php if (isset($_SESSION['user_id'])) { ?>
                        <div class="form-panel comments-form-panel">

                            <form action="" method="POST">

                                <label>
                                    Add Comment
                                    <textarea name="message" id="" placeholder="Add Comment"></textarea>

                                    <button type="submit" class="btn-primary" name="add_comment" value="add_comment">Submit </button>
                            </form>
                        </div>

                    <?php } else { ?>
                        <div class="auth-switch comments-auth-switch">
                            <a href="login.php">Log in</a> to add Comment
                        </div>
                    <?php } ?>
                    <!-- COMMENT DISPLAY -->
                    <?php
                    $comment_sql = "SELECT * FROM comments WHERE status = '1' ORDER BY timestamp DESC";
                    $comments_query = mysqli_query($conn, $comment_sql);
                    while ($comments = mysqli_fetch_assoc($comments_query)) { ?>
                        <div class="comment-displayed  comment-bd">
                            <div class="post-header comment-bd">
                                <span class="post-cat">
                                    <?php
                                    $user_id = $comments['user_id'];
                                    $sql_user = "SELECT * FROM users WHERE id = '$user_id'";
                                    $user_query = mysqli_query($conn, $sql_user);
                                    $user = mysqli_fetch_assoc($user_query);
                                    echo $user['name'];
                                    ?>
                                </span>
                                <span class="post-date">Date : <?php echo date("F j, Y", strtotime($comments['timestamp'])) ?> </span>
                            </div>
                            <div class="post-body comment-body">
                                <p class="comment-text"><?php echo $comments['message']; ?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>

            </section>
        </section>

        <!-- Sidebar -->
        <aside class="sidebar sidebar-sticky">

    <!-- Search Widget -->
    <div class="widget newsletter-box">
        <h3 class="widget-title"> Search Post</h3>
        <!-- <p>Subscribe to receive new articles and insights in your inbox.</p> -->
        <form action="search.php" method="GET" class="newsletter-subscribe">
            <input type="text" placeholder="Search posts..." name="search-items" required>
            <button type="submit" class="btn-primary" name="search">Search</button>
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



<?php require "pages/footer_all.php"; ?>