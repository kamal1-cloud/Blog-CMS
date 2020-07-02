<table class="table table-stripped">
                        <tr>
                            <td>ID</td>
                            <td>Author</td>
                            <td>Title</td>
                            <td>Category</td>
                            <td>Status</td>
                            <td>Img</td>
                            <td>Comment</td>
                            <td>Date</td>
                        </tr>
                        <tr>
                         <?php 
                              $query = "select * from posts";
                              $result = mysqli_query($conn,$query);

                              while($row=mysqli_fetch_assoc($result))
                              {
                                  ?>
                          


                            <td><?php echo $row['post_id'] ;?></td>
                            <td><?php echo $row['post_author'] ;?></td>
                            <td><?php echo $row['post_title'] ;?></td>
                            <td><?php echo $row['post_cat_id'] ;?></td>
                            <td><?php echo $row['post_status'] ;?></td>
                            <td><img width="50" height="50" class="img-resposive" src="../img/<?php echo $row['post_img'] ;?>" ></td>
                            <td><?php echo $row['post_comment_count'] ;?></td>
                            <td><?php echo $row['post_date'] ;?></td>
                        </tr>
                        <?php
                              }

                         ?>

                    </table>