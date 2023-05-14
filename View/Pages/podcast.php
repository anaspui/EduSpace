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
    <title>EduSpace | Podcast</title>
    <link rel="stylesheet" href="./../../View/styles.css">
    <!-- font awesome link -->
    <script src="https://kit.fontawesome.com/9a6693ad48.js" crossorigin="anonymous"></script>

    <style>
    .card_wrapper {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        margin-block: 20px;
        margin-top: 90px;
        width: 100%;
        justify-items: center;
    }

    .card_container {
        margin: 10px;
        box-shadow: 1px 1px 5px var(--secondaryText2);
        width: 270px;
        padding: 20px;
        border-radius: 7px;
    }

    .card_image img {
        width: 120px;
        border-radius: 5px;
    }

    .card_body {
        font-size: 15px;
    }

    .card_body i {
        color: #ffdd00;
    }

    .card_footer button {
        background-color: var(--tertiary);
        border: none;
        border-radius: 5px;
        margin-top: 10px;
        padding: 3px 20px;
        color: var(--primary);
        cursor: pointer;
        transition: all 200ms;
    }

    .card_footer button:hover {
        background-color: var(--text);
    }

    .card_footer i {
        margin-right: 7px;
    }
    </style>
</head>

<body>
    <?php include "./../../View/Shared/Navbar.php" ?>
    <div class="container">
        <!-- <div class="card_container">
            <div class="card_image">
                <img id="pic"
                    src="https://img.freepik.com/free-psd/live-streaming-influencer-social-media_1419-2416.jpg?w=740&t=st=1678662551~exp=1678663151~hmac=a7cb2c7482a6e08e77ffdb0e618ae8f856b2796e5234e9afe17d97b0a6ac51e1"
                    alt="book">
            </div>

            <div class="card_body_details">
                <div class="card_body">
                    <p><strong>Author:</strong></p>
                    <p><strong>Published:</strong></p>
                    <p><strong>Rating:</strong>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </p>
                </div>

                <div class="card_footer">
                    <button><i class="fa-solid fa-play"></i>Play</button>
                </div>
            </div>
        </div> -->
    </div>
    <div id="data"></div>

    </div>
    <?php include "./../../View/Shared/Footer.php" ?>
    <!-- for Navbar Responsive -->
    <script src="./../../View/Pages/js/podcast.js"></script>
    <script src="./../../View/Shared/navbarScript.js"></script>
</body>

</html>