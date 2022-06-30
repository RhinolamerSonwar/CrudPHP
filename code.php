<?php
session_start();
require 'dbcon.php';
$name = $email = $phone = $course = '';
$nameErr = $emailErr = $phoneErr = $courseErr = '';

//Delete Student
if (isset($_POST['delete_student'])) {
    $student_id = mysqli_real_escape_string($conn, $_POST['delete_student']);
    $sql = "DELETE FROM Students WHERE id = '$student_id' ";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['message'] = "Student Deleted Successfully";
        header('Location: index.php');
        exit(0);
    } else {
        $_SESSION['message'] = "Student Not Deleted";
        header('Location: index.php');
        exit(0);
    }
}


//Update Student
if (isset($_POST['update_student'])) {
    $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $course = mysqli_real_escape_string($conn, $_POST['course']);


    $sql = "UPDATE Students SET name = '$name', email = '$email', phone = '$phone', course = '$course' WHERE id = '$student_id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $_SESSION['message'] = "Student Updated Successfully";
        header("location: index.php");
    } else {
        $_SESSION['message'] = "Student Update Failed";
        header("location: index.php");
    }
}

if (isset($_POST['save_student'])) {
    //Validate the name
    if (empty($_POST['name'])) {
        $_SESSION['nameErr'] = 'Name is required';
    } else {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
    }

    //Validate the email
    if (empty($_POST['email'])) {
        $_SESSION['emailErr'] = 'Email is required';
    } else {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
    }

    //Validate the phone
    if (empty($_POST['phone'])) {
        $_SESSION['phoneErr'] = 'Phone is required';
    } else {
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    }

    //Validate the course
    if (empty($_POST['course'])) {
        $_SESSION['courseErr'] = 'Course is required';
    } else {
        $course = mysqli_real_escape_string($conn, $_POST['course']);
    }




    $sql = "INSERT INTO Students (name, email, phone, course) VALUES ('$name', '$email', '$phone', '$course')";
    $query_run = mysqli_query($conn, $sql);
    if ($query_run) {
        $_SESSION['message'] = "Student Added Successfully";
        header('Location: student-create.php');
    } else {
        $_SESSION['message'] = "Student Not Added " . mysqli_error($conn);
        header('Location: student-create.php');
    }
}
