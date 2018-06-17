<!-- db connection -->
<?php include 'includes/db.php';

#<!-- header included -->
 include_once 'includes/header.php';

#<!-- navbar included -->
include_once 'includes/navbar.php';



?>

                   <!-- Page Content -->
                    <div class="container">

                        <div class="row">

                            <?php

                                if (isset($_POST['submit'])) {
                                    $search = $_POST['search'];

                                    $SearchQuery = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";
                                    $searchResult = mysqli_query($conn, $SearchQuery);
                                    $count = mysqli_num_rows($searchResult);

                                    if (!$count) {
                                        ?>

                            <!-- Blog Entries Column -->
                            <div class="col-md-8">
                                <h1 class="page-header">
                                    NO RESULTS!
                                </h1>
                            </div>
                        </div>
                    </div>



            <?php
        } else {


            ?>


                
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>


                <?php

                    while ($row = mysqli_fetch_assoc($searchResult)) {
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = $row['post_content'];
                      
                        ?>


             
                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php $post_image; ?>" alt="">
                <hr>
                <p><?php echo $post_content; ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                

                <hr>
                    <?php }  }   }  ?>


                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>
            
            <?php include_once 'includes/sidebar.php'; ?>

        </div>
        <!-- /.row -->

        <hr>



   




<?php include_once('includes/footer.php'); ?>



