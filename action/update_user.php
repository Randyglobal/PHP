<?php
include('../dbconnect/dbconnect.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.2/css/bootstrap.min.css" integrity="sha512-b2QcS5SsA8tZodcDtGRELiGv5SaKSk1vDHDaQRda0htPYWZ6046lr3kJ5bAAQdpV2mmA/4v0wQF9MyU6/pDIAg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/style.css">

</head>

<body>


    <?php
    if (isset($_GET['id'])) {
        # code...
        $id = $_GET['id'];
        // query
        $query = "select * from `student` where `id` = '$id'";

        $result = mysqli_query($connection, $query);

        if (!$result) {
            # code...
            die("query Failed");
        } else {
            // echo "Success <br>";
            // print_r($result);

            // for the info to display
            $row = mysqli_fetch_assoc($result);
            // print_r($row);
        }
    }

    ?>

    <?php
    if (isset($_POST['update_user'])) {
        # code...

        if (isset($_GET['idNew'])) {
            # code...
            $idnew = $_GET['idNew'];
        }
        $newName = $_POST['firstName'];
        $newLastName = $_POST['lastName'];
        $newAge = $_POST['age'];
        $newAddress = $_POST['address'];


        $query = "update `student` set `first_name` = '$newName', `last_name` = '$newLastName', `age` = '$newAge', `Address` = '$newAddress' where `id` = '$idnew'";

        $result = mysqli_query($connection, $query);

        if (!$result) {
            # code...
            die("query Failed");
        } else {
            header('location:../index.php?update_msg=You have successfully Updated Php');
        }
    }
    ?>



    <div class="container" style="margin-top: 90px;">

        <!-- Modal -->
        <div class="" tabindex="-1" aria-labelledby="enrollLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fs-5" id="enrollLabel">Contact App Update</h5>
                    </div>
                    <div class="modal-body">
                        <p class="lead">Please fill in the following info</p>
                        <form action="update_user.php?idNew=<?php echo $id; ?>" method="post">
                            <div class="mb-3">
                                <label for="first-name" class=" col-form-label">First Name:</label>
                                <input type="text" name="firstName" class="form-control" id="first-name" value="<?php echo $row['first_name'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="last-name" class=" col-form-label">Last Name:</label>
                                <input type="text" name="lastName" class="form-control" id="last-name" value="<?php echo $row['last_name'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="age" class=" col-form-label">Age:</label>
                                <input type="text" name="age" class="form-control" id="email" value="<?php echo $row['age'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="address" class=" col-form-label">Address:</label>
                                <input type="text" name="address" class="form-control" value="<?php echo $row['Address'] ?>">
                            </div>
                            <div class="modal-footer">
                                <input type="submit" value="Update" name="update_user" class="btn btn-primary" />
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.2/js/bootstrap.bundle.min.js" integrity="sha512-X/YkDZyjTf4wyc2Vy16YGCPHwAY8rZJY+POgokZjQB2mhIRFJCckEGc6YyX9eNsPfn0PzThEuNs+uaomE5CO6A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- script tag for api -->
    <script src="https://api,mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl-js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> -->
</body>

</html>