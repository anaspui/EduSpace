<?php
session_start();
include('../../Controller/db_connect.php');
$userEmail = $_SESSION['email'];
$courseId = $_GET['enroll'];
$checkSql = "SELECT * FROM `enrolled_courses` WHERE `user_email` = '$userEmail' AND `course_id` = '$courseId'";
$checkResult = mysqli_query($conn, $checkSql);



if (mysqli_num_rows($checkResult) > 0) {
    // User is already enrolled in the course
    $_SESSION['enrollErr'] = "You are already enrolled in this course.";
    header("Location: showCourseDetails.php?course_id= $courseId");
} else {
    // User is not enrolled in the course, proceed with enrollment
    $enrollSql = "INSERT INTO `enrolled_courses` (`user_email`, `course_id`) VALUES ('$userEmail', '$courseId')";
    $enrollResult = mysqli_query($conn, $enrollSql);

    if ($enrollResult) {
        // Enrollment successful
        $_SESSION['enrollErr'] =  "Enrollment successful.";
        header("Location: showCourseDetails.php?course_id= $courseId");
    } else {
        // Error occurred
        $_SESSION['enrollErr'] =  "Enrollment failed.";
        header("Location: showCourseDetails.php?course_id= $courseId");
    }
}
