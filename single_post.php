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

<header class="home-hero" style="background: linear-gradient(135deg, #fff 0%, rgba(249, 248, 248, 0.83) 70%), url('<?php echo $post['thumbnail']; ?>'); background-size: cover; background-position: center; background-repeat: no-repeat; ;">
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
                <div class="posts-header single-post-image">
                    <img src="<?php echo $post['thumbnail']; ?>" alt="Post">
                </div>
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
                <div class="post-body">
                    <h2><?php echo $post['title']; ?></h2>
                    <p><?php echo $post['content']; ?></p>
                </div>
                <div class="posts-cta">
                    <a href="all_posts.php?" class="btn-outline">Load More Articles</a>
                </div>
            </div>


            <!-- COMMENT SECTION -->


            <section class="latest-posts">
                <div class="posts-header">
                    <div>
                        <h2> Comments</h2>
                        <!-- <p>Fresh content from our writers</p> -->
                    </div>
                    <!-- <a href="all_posts.php" class="view-all-link">View All →</a> -->
                </div>


                <!-- COMMENT FORM -->

                <?php if (isset($_SESSION['user_id'])) { ?>
                    <!-- COMMENT LAYOUT -->
                    <div class="single-post">


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


                        <div class="form-panel">

                            <form action="" method="POST">

                                <label>
                                    Add Comment
                                    <textarea name="message" id="" placeholder="Add Comment"></textarea>

                                    <button type="submit" class="btn-primary" name="add_comment" value="add_comment">Submit </button>
                            </form>
                        </div>


                        <!-- COMMENT DISPLAYLSPID -->

                        <div class="comment-displayed">



                            <div class="post-header">
                                <span class="post-cat">
                                    <?php
                                    echo $user['name'];
                                    ?>
                                </span>
                                <span class="post-date">Date : <?php echo date("F j, Y", strtotime($comment['timestamp'])) ?> </span>
                            </div>
                            <div class="post-body">
                                comment
                            </div>
                        </div>


                    </div>
                <?php } else { ?>
                    <div class="auth-switch">
                        <a href="login.php">Log in</a> to add Comment
                    </div>
                <?php } ?>



            </section>

        </section>



        <!-- Sidebar -->
        <aside class="sidebar">

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
</main>



<?php require "pages/footer_all.php"; ?>