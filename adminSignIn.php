<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Admin SignIn | CoffeeBrew</title>

<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
<link rel="stylesheet" href="css/style.css" />

<link rel="icon" href="img/coffee-icon.png" type="image/x-icon">
</head>

<body class="admin-mainbody">

    <?php
    session_start();
    if (isset($_SESSION["ud"])) {
        header("Location:menuMng.php");
    } else {
    ?>
        <div class="container-fluid vh-100 d-flex justify-content-center">
            <div class="row align-content-center">

                <div class="col-12">
                    <div class="row">

                        <?php
                        $email = "";
                        $pass = "";

                        if (isset($_COOKIE["email"])) {
                            $email = $_COOKIE["email"];
                        }
                        if (isset($_COOKIE["password"])) {
                            $pass = $_COOKIE["password"];
                        }
                        ?>

                        <div class="offset-1 col-10 offset-lg-3 offset-md-3 mt-3 mb-3 col-lg-6 col-md-6 p-4 admin-bgdivcolor rounded-5"
                            id="signInPart">
                            <div class="row g-2">

                                <div class="col-12">
                                    <p class="text-center fnt-1">Admin Sign In</p>
                                </div>

                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label">Email</label>
                                        </div>
                                        <div class="col-12 d-grid">
                                            <input type="email" class="overflow-hidden formstyle"
                                                placeholder="example@gmail.com" id="adsignin_email" value="<?php echo $email ?>" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label">Password</label>
                                        </div>
                                        <div class="col-12 d-grid">
                                            <input type="password" class="formstyle overflow-hidden" placeholder="Password"
                                                id="adsignin_pass" value="<?php echo $pass ?>" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 mt-3">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="rememberme"
                                                    style="cursor: pointer;" checked />
                                                <label class="form-check-label" for="rememberme"
                                                    style="cursor: pointer;">Remember Me</label>
                                            </div>
                                        </div>

                                        <div class="col-6 text-end">
                                            <a href="#" class="link-primary" onclick="resetAdPasswordModal();">Forgot
                                                Password?</a>
                                        </div>

                                        <div class="col-12 text-end">
                                            <a href="index.php" class="link-warning">Customer ?</a>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center mt-1">
                                        <label class="form-label fs-6 text-center" style="cursor: pointer;"
                                            onclick="showAdSignInPassword();"><i class="bi bi-eye-slash-fill"
                                                id="eye_sign_in"></i>&nbsp;&nbsp;&nbsp;<span
                                                id="sign_in_show_pass_label">Show Password</span></label>
                                    </div>
                                </div>

                                <div class="col-12 mt-3 mb-1 d-grid">
                                    <button class="btn buttonstyle bu1" onclick="adminsignIn();">Sign In</button>
                                </div>

                            </div>
                        </div>


                        <div class="modal modal-bg-w admin-bgdivcolo fade" tabindex="-1" id="adForgotPasswordModal">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content modal-bg admin-fogot">
                                    <div class="modal-header">
                                        <h4 class="modal-title text-center text-white">Forgot Password ?</h4>
                                        <button type="button" class="btn-close bg-body" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <div class="col-12">
                                                    <div class="row">
                                                        <span class="fw-bold fs-4 text-center text-warning">Please Contact
                                                            Manager to Reset the Password</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-danger btn-dark text-center rounded-5"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    <?php
    }
    ?>

    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/script.js"></script>
</body>

</html>