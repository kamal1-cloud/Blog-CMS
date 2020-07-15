<?php require_once('./includes/header.php'); ?>
<!-- Navigation -->
<?php require_once('./includes/nav.php'); ?>
<?php
if (isset($_POST['btn_add_post'])) {
    $Post_Title = $_POST['post_title'];
    $Post_Cat_id = $_POST['cat_name'];
    $Post_Author = $_POST['post_author'];
    $Post_Status = $_POST['post_status'];

    $Post_Image = $_FILES['image']['name']; //the type of file (img) and the name of the file
    $Post_Temp = $_FILES['image']['tmp_name']; //temperary for the process

    $Post_Tags = $_POST['post_tags'];
    $Post_Content = $_POST['post_content'];
    
    // $Post_Date = date('d-m-y');  //is a function date // now is a date function (current time)
 

    $sql = "insert into posts (post_cat_id, post_title, post_author, post_date, post_img, post_content, post_tags, post_status) values ('$Post_Cat_id', '$Post_Title', '$Post_Author', now(), '$Post_Image', '$Post_Content', '$Post_Tags','$Post_Status')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Record has been saved in the database";
        move_uploaded_file($Post_Temp, "../img/$Post_Image"); // when u want to store the img
    } else {
        echo "Query Failed";
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
                    <input type="text" name="post_title" placeholder="Post Title" class="form-control pb-2">
                </div>

                <select name="cat_name" id="" class="form-control">
                    <?php

                    $sql = "select * from categories";
                    $value = mysqli_query($conn, $sql);

                    while($row = mysqli_fetch_assoc($value))
                     {
                          $cat_id = $row['cat_id'];
                          $cat_title = $row['cat_title'];
 
                    ?>
                          <option value="<?php echo $cat_id ;?>"> <?php echo $cat_title ;?></option>
                    <?php
                    }
                     
                    ?>
                </select>






                <div class="form-group">
                    <label for=""> Post Author</label>
                    <input type="text" name="post_author" placeholder="Post Author" class="form-control pb-2">
                </div>
                <div class="form-group">
                    <label for=""> Post Status</label>
                    <input type="text" name="post_status" placeholder="Post Status" class="form-control pb-2">
                </div>
                <div class="form-group">
                    <label for=""> Image</label>
                    <input type="file" name="image" placeholder="Post Image" class="form-control pb-2">
                </div>
                <div class="form-group">
                    <label for=""> Post Tags</label>
                    <input type="text" name="post_tags" placeholder="Post Tags" class="form-control pb-2">
                </div>
                <div class="form-group">
                    <label for=""> Post Content</label>
                    <textarea name="post_content" class="form-control" placeholder="Content" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group ">
                    <button class="btn btn-success" type="submit" name="btn_add_post"> Add Post</button>
                </div>
            </form>

        </div>


    </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->


<?php require_once('./includes/footer.php'); ?>