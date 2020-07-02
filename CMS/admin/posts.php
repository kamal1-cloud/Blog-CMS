<?php require_once('./includes/header.php'); ?>

<div id="wrapper">

    <!-- Navigation -->
    <?php require_once('./includes/nav.php'); ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        <small>Author</small>
                    </h1>

                   <?php 

                     if(isset($_GET['opt']))
                     {
                         $opt =$_GET['opt'];
                     }
                     else
                     {
                        $opt = '';
                     }
                    switch($opt)
                    {
                        case 'add_post':
                            require_once('includes/add_posts.php');
                            break;
                        case 2:
                            echo "This is case Two";
                            break;
                            default:
                            require_once('includes/view_all_posts.php');
                        break;

                    }

                   ?>
                </div>


            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
    <?php require_once('./includes/footer.php'); ?>