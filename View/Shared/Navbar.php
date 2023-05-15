<?php
// session_start();
// require_once 'Controller/UserController.php';
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
    <style>
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
        /* margin: 5px 0; */
    }
    </style>
    <title>Document</title>

    <!-- <link rel="stylesheet" href="styles.css"> -->
</head>

<body>
    <?php $page = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1); ?>
    <!-- Responsive -->
    <div class="navbar-container">
        <div class="navbar container">
            <div class="logo">
                <a href="/Project"><img src="./../../../Project/View/Assets/logo.svg" alt="" /></a>
            </div>
            <!-- Add an icon to toggle the menu -->
            <div class="icon" onclick="toggleMenu()">
                <i class="fa fa-bars"></i>
                <!-- <i class="fa fa-times"></i> -->
            </div>
            <!-- Wrap the links in a div with an id -->
            <div id="menu" class="quick-links">
                <ul>
                    <a class="nav_link <?= $page == 'index.php' ? 'active' : 'nav_link'; ?>" href="/Project">Home</a>

                    <a class="nav_link <?= $page == 'about.php' ? 'active' : 'nav_link'; ?>"
                        href="./../../../Project/View/Pages/about.php">About</a>

                    <a class="nav_link <?= $page == 'courses.php' ? 'active' : 'nav_link'; ?>"
                        href="./../../../Project/View/Pages/courses.php">courses</a>

                    <a class="nav_link <?= $page == 'audioBook.php' ? 'active' : 'nav_link'; ?>"
                        href="./../../../Project/View/Pages/audioBook.php">audioBook</a>

                    <a class="nav_link <?= $page == 'podcast.php' ? 'active' : 'nav_link'; ?>"
                        href="./../../../Project/View/Pages/podcast.php">podcast</a>

                    <a class="nav_link <?= $page == 'dashboard.php' ? 'active' : 'nav_link'; ?>"
                        href="./../../../Project/View/Pages/dashboard.php">Dashboard</a>
                </ul>
            </div>
            <!-- Move the auth links inside the menu div -->
            <div id="menu" class="navbar_auth_link">
                <!-- Icon Gula kaj kortese na... Bujhtesi na ki hoise! -->
                <!-- <ion-icon src="../../../assets/search-outline.svg"></ion-icon>
                <i class="fa-solid fa-magnifying-glass"></i>
                <ion-icon name="cart-outline"></ion-icon> -->

                <?php
                if (empty($_COOKIE['loggedUser'])) {
                ?>
                <a class="login_btn" href="./../../../Project/View/Pages/login.php">Login</a>
                <a class="registration_btn" href="./../../../Project/View/Pages/registration.php">Registration</a>

                <?php
                } else {
                    function decryptNav($data, $key)
                    {
                        // Decode the base64-encoded data
                        $encryptedDataWithIV = base64_decode($data);

                        // Extract the initialization vector and encrypted data from the decoded data
                        $iv = substr($encryptedDataWithIV, 0, openssl_cipher_iv_length('aes-256-cbc'));
                        $encryptedData = substr($encryptedDataWithIV, openssl_cipher_iv_length('aes-256-cbc'));

                        // Decrypt the data using AES-256-CBC decryption with the provided key and initialization vector
                        $decryptedData = openssl_decrypt($encryptedData, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);

                        // Return the decrypted data
                        return $decryptedData;
                    }

                    $encryptedData = $_COOKIE['loggedUser'];
                    $decryptedData = decryptNav($encryptedData, 'secret_key');
                    $userData = json_decode($decryptedData, true);

                    $_SESSION["authEvent"] = "logout";
                ?>
                <a class="registration_btn" href="./../../../Project/Controller/UserController.php">Logout</a>
                <span>
                    <a style="color:var(--darkText);" href="./../../../Project/View/Pages/profile.php">
                        <?php echo $userData['name'];
                            if (isset($userData['role']) && !empty($userData['role'])) {
                                if ($userData['role'] == 'admin' || $userData['role'] == 'teacher') {
                                    echo '(' . $userData['role'] . ')';
                                }
                            }

                            ?>
                    </a>
                </span>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>