<?php require_once "./includes/header.php" ?>

<!-- Navigation -->

<?php require_once "./includes/nav.php" ?>
<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <?php

                if(isset($_GET['p_id']))
                {
                    $Post_ID = $_GET['p_id'];
                }

            $query = "SELECT * FROM posts where post_id = $Post_ID";
            $data = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($data)) {
                $post_id = $row['post_id'];
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
                    <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title ?></a>
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
           

            if(isset($_POST['btn_submit']))
            {
                $Post_ID = $_GET['p_id'];
                $Author = $_POST['author'];
                $Email = $_POST['email'];
                $Comment = $_POST['comment'];

                $sql = "insert into comments (comment_post_id, comment_author, comment_email, comment_content, comment_status,comment_date ) values('$Post_ID', '$Author', '$Email', '$Comment', 'approved', now())";

                $data = mysqli_query($conn,$sql);
                
                if($data) 
                {
                    echo'<div class= "alert alert-success"> Your Comment Has been submitted </div>';
                }
                else
                {
                    echo'<div class= "alert alert-danger">Something wrong </div>';    
                }
                $update_comment_count = "update posts set post_comment_count = post_comment_count + 1 where post_id= '$Post_ID'";
                mysqli_query($conn,$update_comment_count);
               
            }





            ?>





                    <!-- Comments Form -->
                    <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form action="" method="POST" role="form">
                    <div class="form-group">
                        <label for="Author">Author</label>
                           <input type="text" name="author" placeholder="Author" class="form-control">
                        </div>
                        <div class="form-group">
                        <label for="Email">Email</label>
                           <input type="text" name="email" placeholder="Email" class="form-control">
                        </div>
                        <div class="form-group">
                        <label for="Comment">Comment</label>
                            <textarea class="form-control" rows="3" name="comment"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="btn_submit">Submit</button>
                    </form>
                </div>

                <hr>
                
                <?php 
                   $comment_query ="select * from comments where comment_post_id = '$Post_ID' AND comment_status = 'approve' order by comment_id DESC";
                   $comment_result = mysqli_query($conn, $comment_query);
                   while($data = mysqli_fetch_assoc($comment_result))
                   {
                       $comment_author = $data['comment_author'];
                       $comment_date = $data['comment_date'];
                       $comment_content = $data['comment_content'];
                  
                
                ?>
                <!-- Posted Comments -->

                <!-- Comment -->
                <div class="media">
                   
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author ; ?>
                            <small><?php echo $comment_date ;?></small>
                        </h4>
                        <?php echo $comment_content ; ?>
                    </div>
                </div>

                <?php 
                }
                
            ?>





        </div>
        <!-- Blog Sidebar Widgets Column -->

        <?php require_once "./includes/side_bar.php" ?>

        <hr>

        <!-- Footer -->
        <?php require_once "./includes/footer.php" ?>