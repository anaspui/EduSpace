<?php
session_start();

require_once './../../Controller/db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Icon Link -->
    <link rel="stylesheet" href="https://kit.fontawesome.com/4bd420869f.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="./../../View/styles.css">
    <style>
    .heading h1 {
        margin-bottom: 1em;
        color: var(--text);
    }

    .dashboard_container {
        height: calc(100vh - 60px);
        display: grid;
        grid-template-columns: 300px auto;
    }

    .dashboard_content_section {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
    }

    .dashboard_input_container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 5%;
    }

    .dashboard_left_side_input input,
    .dashboard_right_side_input input,
    .dashboard_right_side_input textarea {
        width: 100%;
        border-radius: 4px;
        padding: 7px 10px;
        font-size: 14px;
        outline: none;
        margin-bottom: 20px;
        border-top: none;
        border-right: none;
        border-bottom: 2px solid var(--secondaryText2);
        resize: vertical;
    }

    .dashboard_left_side_input input:hover,
    .dashboard_left_side_input input:focus,
    .dashboard_right_side_input input:hover,
    .dashboard_right_side_input input:focus,
    .dashboard_right_side_input textarea:hover,
    .dashboard_right_side_input textarea:focus {
        border-bottom: 2px solid var(--text);
    }

    .dashboard_right_side_input button {
        padding: 9px;
        background-color: var(--tertiary);
        border: none;
        border-radius: 7px;
        width: 100%;
        cursor: pointer;
        color: var(--primary);
        font-weight: 500;
        font-size: 15px;
        border-bottom: 2px solid var(--secondaryText2);
        transition: 200ms;
    }

    .dashboard_right_side_input button:hover {
        border-bottom: 2px solid var(--tertiary);
        background-color: var(--text);
    }


    /* Dashboard Navbar Section */
    .dashboard_quick_links {
        color: var(--primary);
        height: 100%;
        padding: 20px;
        box-shadow: 0px 0px 5px var(--secondaryText2);
    }

    .dashboard_quick_links .drawer_nav_link {
        display: block;
        text-decoration: none;
        margin-block: 10px;
        background-color: var(--tertiary);
        padding: 10px;
        border-radius: 10px;
        font-weight: 500;
        color: var(--primary);
        transition: 200ms;
    }

    .dashboard_quick_links .drawer_nav_link:hover,
        {
        background-color: var(--text);
    }

    .error {
        color: red;
        font-size: 14px;
        font-weight: bold;
        margin: 5px 0;
    }

    .success {
        color: green;
        font-size: 14px;
        font-weight: bold;
    }
    </style>
    <title>EduSpace</title>
</head>

<body>
    <?php include "./../../View/Shared/Navbar.php" ?>
    <div class="dashboard_container">
        <div class="drawer_section">
            <?php include "./../../View/Shared/dashboardDrawer.php" ?>
        </div>


        <div class="dashboard_content_section">

            <?php
            // Define variables and initialize with empty values
            $course_name = $course_category = $instructor_name = $instructor_email = $rating = $description = $course_modules = $course_fee = "";
            $course_image = "default.jpg";
            $name_error = $category_error = $instructor_error = $email_error = $rating_error = $description_error = $modules_error = $fee_error = "";


            // Check if the form has been submitted
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Validate the course name
                if (empty(trim($_POST['course_name']))) {
                    $name_error = 'Please enter a course name.';
                } else {
                    $course_name = trim($_POST['course_name']);
                }

                // Validate the course category
                if (empty(trim($_POST['course_category']))) {
                    $category_error = 'Please enter a course category.';
                } else {
                    $course_category = trim($_POST['course_category']);
                }

                // Validate the instructor name
                if (empty(trim($_POST['instructor_name']))) {
                    $instructor_error = 'Please enter an instructor name.';
                } else {
                    $instructor_name = trim($_POST['instructor_name']);
                }

                // Validate the instructor email
                if (empty(trim($_POST['instructor_email']))) {
                    $email_error = 'Please enter an instructor email.';
                } elseif (!filter_var($_POST['instructor_email'], FILTER_VALIDATE_EMAIL)) {
                    $email_error = 'Please enter a valid email address.';
                } else {
                    $instructor_email = trim($_POST['instructor_email']);
                }

                // Validate the rating
                if (empty(trim($_POST['rating']))) {
                    $rating_error = 'Please enter a rating.';
                } elseif ($_POST['rating'] < 0 || $_POST['rating'] > 5) {
                    $rating_error = 'Please enter a rating between 0 and 5.';
                } else {
                    $rating = trim($_POST['rating']);
                }

                // Validate the course description
                if (empty(trim($_POST['description']))) {
                    $description_error = 'Please enter a course description.';
                } else {
                    $description = trim($_POST['description']);
                }

                // Validate the course modules
                if (empty(trim($_POST['course_modules']))) {
                    $modules_error = 'Please enter course modules.';
                } else {
                    $course_modules = trim($_POST['course_modules']);
                }

                // Validate the course fee
                if (empty(trim($_POST['course_fee']))) {
                    $fee_error = 'Please enter a course fee.';
                } elseif ($_POST['course_fee'] < 0) {
                    $fee_error = 'Please enter a valid course fee.';
                } else {
                    $course_fee = trim($_POST['course_fee']);
                }

                // If no errors, insert the new course into the courses table
                if (empty($name_error) && empty($category_error) && empty($instructor_error) && empty($email_error) && empty($rating_error) && empty($description_error) && empty($modules_error) && empty($fee_error)) {
                    // Get the form data
                    $course_name = $_POST['course_name'];
                    $course_image = $_POST['course_image'];
                    $course_category = $_POST['course_category'];
                    $instructor_name = $_POST['instructor_name'];
                    $instructor_email = $_POST['instructor_email'];
                    $rating = $_POST['rating'];
                    $description = $_POST['description'];
                    $course_modules = $_POST['course_modules'];
                    $course_fee = $_POST['course_fee'];

                    // Prepare and execute the SQL query to insert the new course into the courses table
                    $query = "INSERT INTO courses (course_name, course_image, course_category, instructor_name, instructor_email, rating, description, course_modules, course_fee) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                    $stmt = mysqli_prepare($conn, $query);
                    mysqli_stmt_bind_param($stmt, 'sssssdsss', $course_name, $course_image, $course_category, $instructor_name, $instructor_email, $rating, $description, $course_modules, $course_fee);
                    mysqli_stmt_execute($stmt);

                    // Close the database connection
                    mysqli_stmt_close($stmt);
                    mysqli_close($conn);

                    // Redirect to the courses page
                    header('Location: courses.php');
                    exit();
                }
            }
            ?>
            <form method="post">
                <div class="heading">
                    <h1>ADD COURSES</h1>
                </div>
                <div class="dashboard_input_container">
                    <div class="dashboard_left_side_input">
                        <label for="course_name">Course name:</label>
                        <input class="dashboard_input_field" type="text" id="course_name" name="course_name" required>
                        <br>

                        <label for="course_image">Course image URL:</label>
                        <input type="text" id="course_image" name="course_image">
                        <br>

                        <label for="course_category">Course category:</label>
                        <input type="text" id="course_category" name="course_category" required>
                        <br>

                        <label for="instructor_name">Instructor name:</label>
                        <input type="text" id="instructor_name" name="instructor_name" required>
                        <br>

                        <label for="instructor_email">Instructor email:</label>
                        <input type="email" id="instructor_email" name="instructor_email" required>
                        <br>

                        <label for="rating">Rating:</label>
                        <input type="number" id="rating" name="rating" min="0" max="5" step="0.1">
                        <br>
                    </div>

                    <div class="dashboard_right_side_input">
                        <label for="description">Course description:</label>
                        <textarea id="description" name="description" rows="5" cols="30" required></textarea>
                        <br>

                        <label for="course_modules">Course modules:</label>
                        <textarea id="course_modules" name="course_modules" rows="5" cols="30" required></textarea>
                        <br>

                        <label for="course_fee">Course fee:</label>
                        <input type="number" id="course_fee" name="course_fee" min="0" step="0.01">
                        <br>

                        <button type="submit">Add course</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- for Navbar Responsive -->
    <script src="./../../View/Shared/navbarScript.js"></script>

</body>

</html>