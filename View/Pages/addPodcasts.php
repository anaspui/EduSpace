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
    <?php include "./../../View/Shared/Navbar.php"; ?>
    <div class="dashboard_container">
        <div class="drawer_section">
            <?php include "./../../View/Shared/dashboardDrawer.php"; ?>
        </div>

        <div class="dashboard_content_section">

            <?php
            // Define variables and initialize with empty values
            $podcast_name = $author = $link = "";
            $podcast_image = "podcast_default.jpg";
            $pname_error = $author_error = $link_error = "";

            // Check if the form has been submitted
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Validate the podcast name
                if (empty(trim($_POST['podcast_name']))) {
                    $pname_error = 'Please enter a podcast name.';
                } else {
                    $podcast_name = trim($_POST['podcast_name']);
                }

                // Validate the author
                if (empty(trim($_POST['author']))) {
                    $author_error = 'Please enter the author name.';
                } else {
                    $author = trim($_POST['author']);
                }

                // Validate the link
                // if (empty(trim($_POST['link']))) {
                //     $link_error = 'Please enter the link.';
                // } else {
                //     $link = trim($_POST['link']);
                // }
                $link = $_POST['link']; // Assuming the link is submitted through a form using the POST method

if (empty($link)) {
    $link_error = "Please enter a link";
} elseif (!filter_var($link, FILTER_VALIDATE_URL)) {
    $link_error = "Invalid link format";
}

                // If no errors, insert the new podcast into the podcasts table
                if (empty($author_error) && empty($link_error) && empty($pname_error)) {
                    // Get the form data
                    $podcast_name = $_POST['podcast_name'];
                    $author = $_POST['author'];
                    $link = $_POST['link'];

                    // Prepare and execute the SQL query to insert the new podcast into the podcasts table
                    $query = "INSERT INTO podcasts (name, author, source, image) VALUES (?, ?, ?, ?)";
                    $stmt = mysqli_prepare($conn, $query);
                    mysqli_stmt_bind_param($stmt, 'ssss', $podcast_name, $author, $link, $podcast_image);
                    mysqli_stmt_execute($stmt);

                    // Close the database connection
                    mysqli_stmt_close($stmt);
                    mysqli_close($conn);

                    // Redirect to the podcasts page
                    // header('Location: podcast.php');
                    // exit();
                    $result = "Success";
                }
            }
            ?>

            <form method="post" action="addPodcasts.php">
                <div class="heading">
                    <h1>ADD PODCAST</h1>
                </div>
                <div class="dashboard_input_container">
                    <div class="dashboard_left_side_input">
                        <label for="podcast_name">Podcast Name:</label>
                        <input class="dashboard_input_field" type="text" id="podcast_name" name="podcast_name">
                        <?php
                                 if(isset($pname_error)){
                                    if(!empty($pname_error)){?>
                        <p> <?php echo $pname_error; ?> </p>
                        <?php
                                 $pname_error = "";
                            } }?>
                        <br>

                        <label for="author">Author:</label>
                        <input type="text" id="author" name="author">
                        <?php
                                 if(isset($author_error)){
                                    if(!empty($author_error)){?>
                        <p> <?php echo $author_error; ?> </p>
                        <?php
                                 $author_error = "";
                            } }?>
                        <br>

                        <label for="link">Link:</label>
                        <input type="text" id="link" name="link">
                        <?php
                                 if(isset($link_error)){
                                    if(!empty($link_error)){?>
                        <p> <?php echo $link_error; ?> </p>
                        <?php
                                 $link_error = "";
                            } }?>
                        <br>

                        <div class="dashboard_right_side_input">
                            <button type="submit">Add Podcast</button>
                            <?php
                                 if(isset($result)){
                                    if($result == "Success"){?>
                            <p>Podcast Added Successfully</p>
                            <?php
                                 $result = "";
                            } }?>
                        </div>
                    </div>


                </div>
            </form>
        </div>
    </div>
    <!-- for Navbar Responsive -->
    <script src="./../../View/Shared/navbarScript.js"></script>
</body>


</html>