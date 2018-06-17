
            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">
                




                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="POST">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control">
                        <span class="input-group-btn">
                            <button name="submit" class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form>
                    <!-- /.input-group -->
                </div>




                    <?php 

                        $cat_query = "SELECT * FROM categories";
                        $cat_result = mysqli_query($conn, $cat_query);

                        if (!mysqli_num_rows($cat_result)) {
                            die(mysqli_error($cat_result));
                        } else {
                            
                        
                     ?>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                                
                                <?php 
                                    while ( $cat_row = mysqli_fetch_assoc($cat_result)) {
                                        
                                        $cat_title = $cat_row['cat_title'];
                                        echo "<li><a href='#'>{$cat_title}</a>
                                </li>";
                                    }
                                }


                                 ?>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>




                <!-- Side Widget Well -->
                <?php   include_once 'widget.php'; ?>

            </div>