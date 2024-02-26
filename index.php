<!-- created another file for the header and footer -->
<!-- importing the header -->
<?php
include('nav/header.php');
?>

<!-- importing the database file -->
<?php
include('dbconnect/dbconnect.php')
?>
<main>
    <h1 class="table-heading">Crud Application in PHP</h1>
    <div class="container">
        <div class="active-students">
            <h1>Contact App</h1>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#enroll">
                Add People
            </button>
        </div>

        <table class="table table-hover table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User First Name</th>
                    <th>User Last Name</th>
                    <th>Age</th>
                    <th>Address</th>
                    <th>
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>

                <!-- Logic for importing the data from database -->
                <?php
                // query
                $query = "select * from `student`";

                $result = mysqli_query($connection, $query);

                if (!$result) {
                    # code...
                    die("query Failed");
                } else {
                    // echo "Success <br>";
                    // print_r($result);

                    // for the info to display
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <tr>
                            <td><?php echo $row["id"] ?></td>
                            <td><?php echo $row["first_name"] ?></td>
                            <td><?php echo $row["last_name"] ?></td>
                            <td><?php echo $row["age"] ?></td>
                            <td><?php echo $row["Address"] ?></td>

                            <td>
                                <a href="./action/update_user.php?id=<?php echo $row["id"] ?>" class="text-success"><i class="fas fa-edit fa-lg mx-1"></i></a>
                                <a href="./action/delete_user.php?id=<?php echo $row["id"] ?>" class="text-danger"><i class="fas fa-trash fa-lg mx-1"></i></a>
                            </td>
                        </tr>
                <?php
                    };
                }

                ?>


                <!-- <tr>
                    <td>2</td>
                    <td>Maradona</td>
                    <td>Mala</td>
                    <td>12</td>
                </tr> -->
            </tbody>
        </table>

        <!-- displaying the message -->
        <?php
        if (isset($_GET['message'])) {
            # code...
            echo "<h6 class='message'>" . $_GET['message'] . "</h6>";
        }

        ?>

        <?php
        if (isset($_GET['insert_msg'])) {
            echo "<h6 class='message'>" . $_GET['insert_msg'] . "</h6>";
        }
        if (isset($_GET['update_msg'])) {
            echo "<h6 class='message'>" . $_GET['update_msg'] . "</h6>";
        }
        if (isset($_GET['delete_msg'])) {
            echo "<h6 class='message'>" . $_GET['delete_msg'] . "</h6>";
        }
        ?>

        <!-- Modal -->
        <div class="modal fade" id="enroll" tabindex="-1" aria-labelledby="enrollLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fs-5" id="enrollLabel">Add People</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="lead">Please fill in the following info</p>
                        <form action="./dbconnect/insert_info.php" method="post">
                            <div class="mb-3">
                                <label for="first-name" class=" col-form-label">First Name:</label>
                                <input type="text" name="firstName" class="form-control" id="first-name">
                            </div>
                            <div class="mb-3">
                                <label for="last-name" class=" col-form-label">Last Name:</label>
                                <input type="text" name="lastName" class="form-control" id="last-name">
                            </div>

                            <div class="mb-3">
                                <label for="age" class=" col-form-label">Age:</label>
                                <input type="text" name="age" class="form-control" id="email">
                            </div>
                            <div class="mb-3">
                                <label for="address" class=" col-form-label">Address:</label>
                                <input type="text" name="address" class="form-control">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                <input type="submit" value="Add" name="addStudent" class="btn btn-primary" />
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>



<!-- importing the footer -->

<?php
include('nav/footer.php')
?>