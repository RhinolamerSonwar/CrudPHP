<?php

require("dbcon.php")
?>
<?php include('./includes/header.php'); ?>
<div class="container mt-5  ">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Student View Details
                        <a href="index.php" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <?php
                    if (isset($_GET['id'])) {
                        $student_id = mysqli_real_escape_string($conn, $_GET['id']);
                        $sql = "SELECT * FROM Students WHERE id = '$student_id' ";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            $student = mysqli_fetch_array($result);
                            $name = $student['name'];
                            $email = $student['email'];
                            $phone = $student['phone'];
                            $course = $student['course'];
                    ?>

                            <form action="code.php" method="POST">

                                <div class="mb-3">
                                    <label>Student Name</label>
                                    <p class="form-control ">
                                        <?= $name; ?>
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <label>Student Email</label>
                                    <p class="form-control ">
                                        <?= $email; ?>
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <label>Student Phone</label>
                                    <p class="form-control ">
                                        <?= $phone; ?>
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <label>Student Course</label>
                                    <p class="form-control ">
                                        <?= $course; ?>
                                    </p>
                                </div>


                            </form>
                    <?php
                        } else {
                            echo "<h4>Student Not Found</h4>";
                        }
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>

<?php include('./includes/footer.php'); ?>