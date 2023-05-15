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
    <title>EduSpace</title>
    <link rel="stylesheet" href="./../../View/styles.css">

    <style>
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
    </style>
</head>

<body>
    <?php include "./../../View/Shared/Navbar.php" ?>
    <div class="dashboard_container">
        <div class="drawer_section">
            <?php include "./../../View/Shared/dashboardDrawer.php" ?>
        </div>

        <div class="dashboard_content_section">
            <!-- teacher -->

            <table class="customers">
                <tr>
                    <th>Course Name</th>
                    <th>Student Name</th>
                    <th>Enrolled In</th>
                </tr>
                <?php
                $userMail = $_SESSION['email'];
                include('../../Controller/db_connect.php');
                $sql = "SELECT c.course_id, c.course_name, u.username, ec.date
                FROM enrolled_courses ec
                JOIN courses c ON ec.course_id = c.course_id
                JOIN users u ON ec.user_email = u.email
                WHERE c.instructor_email = $userMail;
                ";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>
                                <td>' . $row["course_name"] . '</td>
                                <td>' . $row["username"] . '</td>
                                <td>' . $row["date"] . '</td>
                                <td><button><a href="showCourseDetails.php?course_id=' . $row["course_id"] . '">Show</a></button></td>
                                </tr>';
                        }
                    }
                }
                ?>

            </table>


            <!--  -->




            <!-- admin -->


            <!--  -->


            <!-- student -->


            <!--  -->
        </div>
    </div>
    <!-- for Navbar Responsive -->
    <script src="./../../View/Shared/navbarScript.js"></script>
</body>

</html>