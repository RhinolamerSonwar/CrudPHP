<?php
session_start();
require("dbcon.php")
?>
<?php include('./includes/header.php'); ?>
<div class="container mt-5  ">
    <?php include('message.php'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Student Edit
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
                                <input type="hidden" name="student_id" value="<?= $student['id']; ?>
                                    ">
                                <div class="mb-3">
                                    <label>Student Name</label>
                                    <input type="text" name="name" value="<?= $name; ?>" class="form-control ">
                                </div>
                                <div class="mb-3">
                                    <label>Student Email</label>
                                    <input type="text" name="email" value="<?= $email; ?>" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Student Phone</label>
                                    <input type="text" name="phone" value="<?= $phone; ?>" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Student Course</label>
                                    <input type="text" name="course" value="<?= $course; ?>" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary" name="update_student">Update Student</button>
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