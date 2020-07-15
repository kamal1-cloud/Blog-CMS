<?php require_once('./includes/header.php'); ?>
<!-- Navigation -->
<?php require_once('./includes/nav.php'); ?>


            <?php
            if (isset($_GET['p_id']))
            {
                $Post_ID = $_GET['p_id'];
                $sql = "select * from posts where post_id = '$Post_ID'";
                $result = mysqli_query($conn,$sql);

                while($row = mysqli_fetch_assoc($result))
                {
                    $post_id = $row['post_id'];
                    $post_author = $row['post_author'];
                    $post_title = $row['post_title'];
                    $post_cat_id = $row['post_cat_id'];
                    $post_status = $row['post_status'];
                    $img = $row['post_img'];
                    $post_tags = $row['post_tags'];
                    $post_content = $row['post_content'];
                }
            }
              //Update Record
              if(isset($_POST['btn_edit_post']))
              {
                $Post_Title = $_POST['post_title'];
                $Post_Cat_id = $_POST['cat_name'];
                $Post_Author = $_POST['post_author'];
                $Post_Status = $_POST['post_status'];
            
                $Post_Image = $_FILES['image']['name']; //the type of file (img) and the name of the file
                $Post_Temp = $_FILES['image']['tmp_name']; //temperary for the process

                if(empty($Post_Image))
                {
                    $query = "select * from posts where post_id = '$Post_ID'";
                    $result = mysqli_query($conn,$query);

                    while($row =mysqli_fetch_assoc($result))
                    {
                        $Post_Image =$row['post_img'];
                    }
                }
            
                $Post_Tags = $_POST['post_tags'];
                $Post_Content = $_POST['post_content'];
                $sql = " update posts set post_cat_id ='$Post_Cat_id', post_title = '$Post_Title', post_author = '$Post_Author', post_date = now(), post_img = '$Post_Image', post_tags = '$Post_Tags ', post_content = '$Post_Content', post_status = '$Post_Status' where post_id = '$Post_ID '";

                $result =mysqli_query($conn,$sql);

                if($result)
                {
                    header("location: ./posts.php");
                    move_uploaded_file($Post_Temp, "../img/$Post_Image");
                }
              }

             ?>







<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for=""> Post title</label>
                    <input type="text" name="post_title" placeholder="Post Title" class="form-control pb-2" value="<?php echo $post_title ?> ">
                </div>
                <div class="form-group">
                   <select name="cat_name" id="" class="form-control">
                       <?php 
                          $query = "select * from categories";
                          $data = mysqli_query($conn,$query);

                          while($row = mysqli_fetch_assoc($data))
                          {
                              $cat_id = $row['post_cat_id'];
                              ?>
                              <option value="<?php echo $row['cat_id'] ;?>"><?php echo $row['cat_title']; ?> </option>
                              <?php

                          }
                       ?>
                   </select>
                </div>
                <div class="form-group">
                    <label for=""> Post Author</label>
                    <input type="text" name="post_author" placeholder="Post Author" class="form-control pb-2" value="<?php echo $post_author ?>">
                </div >
                <div class="form-group">
                    <label for=""> Post Status</label>
                    <input type="text" name="post_status" placeholder="Post Status" class="form-control pb-2" value="<?php echo $post_status ?>"  >
                </div>
                <div class="form-group">
                    <label for=""> Image</label>
                    <img width="100" height="80" class="img-resposive" src="../img/<?php echo $img ;?>" >
                    <input type="file" name="image" placeholder="Post Image" class="form-control pb-2">
                </div>
                <div class="form-group">
                    <label for=""> Post Tags</label>
                    <input type="text" name="post_tags" placeholder="Post Tags" class="form-control pb-2" value="<?php echo $post_tags ?>"  >
                </div>
                <div class="form-group">
                    <label for=""> Post Content</label>
                    <textarea name="post_content" class="form-control" placeholder="Content" cols="30" rows="10"><?php echo $post_content ?></textarea>
                </div>
                <div class="form-group ">
                    <button class="btn btn-success" type="submit" name="btn_edit_post"> Edit Post </button>
                </div>
            </form>

        </div>


    </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->


<?php require_once('./includes/footer.php'); ?>