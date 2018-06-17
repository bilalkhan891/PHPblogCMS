<?php include_once  "inc/header.php"; ?>
    <div id="wrapper">

        <!-- Navigation -->
        
        <?php include_once "inc/navbar.php"; ?>

    <?php insert_categories(); ?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Categories
                            <small> </small>
                        </h1>
                        <!-- insert -->
                        <div class="col-xs-6">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Category</label>
                                    <input class="form-control" type="text" name="cat_title">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit">
                                </div>
                            </form>
                        </div>
                        

                         <!-- edit -->
                        <div class="col-xs-6">
                            <form action="" method="post">
                                
                                                    <?php 

                    if (isset($_GET['edit'])) {
                        $cat_id = $_GET['edit'];
                        $query = "SELECT * FROM categories WHERE cat_id = {$cat_id}";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            $cat_id = $row['cat_id'];
                            $cat_title = $row['cat_title']; ?>
                        

                        <div class="form-group">
                            <label> Edit Category </label>
                            <input value="<?php if(isset($cat_id)){ echo $cat_id;} ?>" class="form-control" type="text" name="cat_id" style="display:none;">
                        </div>
                        <div class="form-group">
                            <label> Edit Category </label>
                            <input value="<?php if(isset($cat_title)){ echo $cat_title;} ?>" class="form-control" type="text" name="cat_title">
                        </div>


                            <?php   } ?>                        
                   
                                
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit" name="edit_submit">Update Category</button>
                                </div>
                            <?php     } ?>



                 <?php           // edit insert
                    update_categories();


                            ?>

                            </form>
                        </div>
                <!-- END edit php -->




                        <div class="col-xs-6">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Title</th>
                                    </tr>
                                    <tbody>
                                        

                <?php 

                   findAll_categories ();
                   deleteCategories ();

                  ?>

                                    </tbody>

                                </thead>
                            </table>
                        </div>
                    </div>

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


<?php include_once "inc/footer.php"; ?>
 