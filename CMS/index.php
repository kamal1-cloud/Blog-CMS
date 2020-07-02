<?php require_once "./includes/header.php" ?>

<!-- Navigation -->

<?php require_once "./includes/nav.php" ?>
<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <?php
            $query = "SELECT * FROM posts";
            $data = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($data)) {
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_img = $row['post_img'];
                $post_content = $row['post_content'];
                $post_tags = $row['post_tags'];


            ?>
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="img/<?php echo $post_img ?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>


            <?php
            }
            ?>
        </div>
        <!-- Blog Sidebar Widgets Column -->

        <?php require_once "./includes/side_bar.php" ?>

        <hr>

        <!-- Footer -->
        <?php require_once "./includes/footer.php" ?>