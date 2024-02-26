<?php
include('dbconnect.php')
?>

<?php
// checking if the form button add is clicked
if (isset($_POST["addStudent"])) {
    # code...
    // echo "Yess You just clicked";
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $age = $_POST["age"];
    $address = $_POST["address"];

    // checking for validation
    if ($firstName == '' || empty($firstName)) {
        # code...
        // all of this will be displayed in the url using the key(location) and value(message) 
        header('location:../index.php?message=You need to fill in the First Name');
    } else {
        // inserting with the query method
        $query = "insert into `student` (`first_name`, `last_name`, `age`, `Address`) values ('$firstName', '$lastName', '$age', '$address')";

        $result = mysqli_query($connection, $query);

        if (!$result) {
            # code...
            die("Query Failed to compile");
        } else {
            header("location: ../index.php?insert_msg = Your data has been added successfully");
        }
    }

    // echo `This is the validation`;
}
