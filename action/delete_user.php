<?php
include('../dbconnect/dbconnect.php')
?>

<?php
if (isset($_GET['id'])) {
    # code...
    $id = $_GET['id'];

    $query = "delete from `student` where `id` = '$id'";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        # code...
       die("Failed to delete");
    }
    else{
        header("location:../index.php?delete_msg = You have Deleted Successfully");
    }
}

?>