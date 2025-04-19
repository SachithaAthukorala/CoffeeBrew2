<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Settings | CoffeeBrew</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">

    <link rel="icon" href="img/coffee-icon.png" type="image/x-icon">
</head>

<body class="adminBg-1">
    <?php
    session_start();
    if (isset($_SESSION["ud"])) {
        $email = $_SESSION["ud"]["email"];
        $pass = $_SESSION["ud"]["password"];
    ?>
        <nav class="navbar navbar-dark bg-dark fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand text-uppercase font1" href="#">
                    <img src="img/coffee-icon.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
                    Coffee Brew
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar"
                    aria-labelledby="offcanvasDarkNavbarLabel">
                    <div class="offcanvas-header">
                        <a class="navbar-brand text-uppercase font1" href="#">
                            <img src="img/coffee-icon.png" alt="Logo" width="30" height="30"
                                class="d-inline-block align-text-top"> Coffee Brew
                        </a>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link" href="menuMng.php">Menu</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="booking.php">Bookings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="settings.php">Settings</a>
                            </li>
                        </ul>
                        <hr class="bg-warning" />
                        <div style="margin-top: 100%;">
                            <div class="d-grid ps-4 pe-4" style="margin-top: 100%;">
                                <button class="btn btn-danger mt-5" onclick="adminLogout();">Log Out</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <!-- need to include to php -->


        <div class="container mt-4">

            <div class="row mb-5">

            </div>

            <div class="row text-center mb-4 mt-5">
                <div class="col-12">
                    <div class="bg-transparent py-2">
                        <h2 class="text-white">Account Settings</h2>
                    </div>
                </div>
            </div>


            <div class="col-12">
                <div class="row">


                    <div class="offset-1 col-10 offset-lg-3 offset-md-3 mt-3 mb-3 col-lg-6 col-md-6 p-4 admin-bgdivcolor rounded-5"
                        id="signInPart">
                        <div class="row g-2">

                            <div class="col-12">
                                <p class="text-center fnt-1">Change Password</p>
                            </div>

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label">Email</label>
                                    </div>
                                    <div class="col-12 d-grid">
                                        <input type="email" class="overflow-hidden formstyle"
                                            placeholder="example@gmail.com" id="adsignin_email" readonly value="<?php echo $email ?>" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label">New Password</label>
                                    </div>
                                    <div class="col-12 d-grid">
                                        <input type="password" class="formstyle overflow-hidden" placeholder="New Password"
                                            id="adrePass1" value="<?php echo $pass ?>" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label">Re-Enter Password</label>
                                    </div>
                                    <div class="col-12 d-grid">
                                        <input type="password" class="formstyle overflow-hidden"
                                            placeholder="Re-Enter Password" id="adrePass2" value="<?php echo $pass ?>" />
                                    </div>
                                </div>
                            </div>

                            <div class=" col-12 text-center mt-2">
                                <label class="form-label fs-6 text-center mt-1" style="cursor: pointer;"
                                    onclick="showAdResetPassword();"><i class="bi bi-eye-slash-fill"
                                        id="eye_sign_in"></i>&nbsp;&nbsp;&nbsp;<span id="sign_in_show_pass_label">Show
                                        Password</span></label>
                            </div>

                            <div class="col-12 mt-3 mb-1 d-grid">
                                <button class="btn buttonstyle bu1" onclick="adminSettings();">Change</button>
                            </div>

                        </div>
                    </div>

                </div>
            </div>



        </div>
        </div>
    <?php
    } else {
        header("Location:adminsignIn.php");
    }

    ?>


    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/script.js"></script>
</body>

</html>
