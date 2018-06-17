<?php 

include_once 'db.php';

// edit insert
if (isset($_POST['edit_submit'])) {
    $name = mysqli_escape_string($conn, $_POST['cat_title']);

    $query = "UPDATE categories SET cat_title = '{$name}' WHERE cat_id = '$cat_id'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        die("query failed" . mysqli_error($conn));
    }
}




 ?>