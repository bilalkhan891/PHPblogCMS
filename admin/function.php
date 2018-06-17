<?php 


// insert funtion
function insert_categories() {

	global $conn;
	if (isset($_POST['submit'])) {
	   
	   $cat_title = mysqli_escape_string($conn, $_POST['cat_title']);


	   if ($cat_title == "" || empty($cat_title)) {
	       echo "<script> alert('Category field should not be empty!');</script>";
	   } else {

	       $query = "INSERT INTO categories(cat_title)";
	       $query .= "VALUE('{$cat_title}')";

	       $result = mysqli_query($conn, $query);

	       if (!$result) {
	           die('QUERY FAILD' . mysqli_error($conn));
	       }
	   }

	}
}


function findAll_categories () {
	global $conn;

	$query = "SELECT * FROM categories";
    $run_query = mysqli_query($conn, $query);
    if (mysqli_num_rows($run_query)) {
        while ($row = mysqli_fetch_assoc($run_query)) {
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];

            echo "<tr>";
            echo "<td>{$cat_id}</td>";
            echo "<td>{$cat_title}</td>";
            echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
            echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
            echo "<tr>";
        }
    } 
}

function deleteCategories () {
	global $conn;

    if (isset($_GET['delete'])) {
        $cat_id = $_GET['delete'];
        $query = "DELETE FROM categories WHERE cat_id = {$cat_id}";
        $result = mysqli_query($conn, $query);
        header("Location: categories.php?success");                        
    }
}


function update_categories () {
	global $conn;

    if (isset($_POST['edit_submit'])) {
    $cat_id = mysqli_escape_string($conn,  $_POST['cat_id']);
    $title = mysqli_escape_string($conn,  $_POST['cat_title']);

    $query = "UPDATE categories SET cat_title = '{$title}' WHERE cat_id = '$cat_id'";
    $result = mysqli_query($conn, $query);
	    if (!$result) {
	        die("query failed" . mysqli_error($conn));
	    }
	}
}



 ?>