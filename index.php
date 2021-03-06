<?php session_start();
require 'dbcon.php'; ?>
<?php include('./includes/header.php'); ?>
<div class="container mt-4">
    <?php include('message.php'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Student Details
                        <a href="student-create.php" class="btn btn-primary float-end">Add Student</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Course</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM Students";
                            $result = mysqli_query($conn, $query);
                            if (mysqli_num_rows($result) > 0) {
                                while ($sudent = mysqli_fetch_assoc($result)) {
                                    echo '<tr>';
                                    echo '<td>' . $sudent['id'] . '</td>';
                                    echo '<td>' . $sudent['name'] . '</td>';
                                    echo '<td>' . $sudent['email'] . '</td>';
                                    echo '<td>' . $sudent['phone'] . '</td>';
                                    echo '<td>' . $sudent['course'] . '</td>';
                                    echo '<td>
                                            <a href="student-view.php?id=' . $sudent['id'] . '" class="btn btn-info btn-sm">View</a>
                                            <a href="student-edit.php?id=' . $sudent['id'] . '" class="btn btn-primary btn-sm">Edit</a>
                                            <form action = "code.php" method = "POST" class="d-inline">                                                
                                                <button type="submit" name="delete_student" value="' . $sudent['id'] . '" class="btn btn-danger btn-sm">Delete</button>
                                            </form>   
                                    
                                            
                                        </td>';
                                    echo '</tr>';
                                }
                            } else {
                                echo '<tr>';
                                echo '<td colspan="6">No data found</td>';
                                echo '</tr>';
                            }

                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
<?php include('./includes/footer.php'); ?>