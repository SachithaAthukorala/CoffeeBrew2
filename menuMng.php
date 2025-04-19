<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Menu Manage | CoffeeBrew</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">

    <link rel="icon" href="img/coffee-icon.png" type="image/x-icon">
</head>

<body class="adminBg-1">

    <?php
    require "connection.php";
    session_start();
    if (isset($_SESSION["ud"])) {
        $pageno;
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
                                <a class="nav-link active" aria-current="page" href="menuMng.php">Menu</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="booking.php">Bookings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="settings.php">Settings</a>
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
                        <h2 class="text-white">Menu Manage</h2>
                    </div>
                </div>
            </div>

            <div class="row mb-4 ">
                <div class="col-12 col-md-8 mb-2">
                    <label for="cus_name text-white" class="form-label text-white">Search By Name</label>
                    <input type="text" class="form-control shadow-none" id="menu_name" placeholder="Seacrch by Item Name" onkeyup=" searchManageProduct(0);">
                </div>

                <div class="col-12 offset-0 offset-md-2 col-md-2 mb-2 d-grid">
                    <label class="form-label">&nbsp;</label>
                    <button class="btn btn-warning" onclick="updateMenuItem(0,0,1);">
                        <i class="bi bi-plus-circle text-black">&nbsp;</i>&nbsp;Add New Product
                    </button>
                </div>
            </div>


            <div class="row justify-content-center" id="menuViewArea">

                <?php
                if (isset($_GET["page"])) {
                    $pageno = $_GET["page"];
                } else {
                    $pageno = 1;
                }

                $menu_rs = Database::search("SELECT * FROM `menu`");
                $menu_num = $menu_rs->num_rows;

                $results_per_page = 6;
                $number_of_pages = ceil($menu_num / $results_per_page);

                $page_results = ($pageno - 1) * $results_per_page;

                $selected_rs = Database::search("SELECT * FROM `menu` ORDER BY `id` DESC LIMIT " . $results_per_page . " OFFSET " . $page_results . "");
                $selected_num = $selected_rs->num_rows;

                if ($menu_num == 0) {
                    echo ("<div class='alert alert-danger text-center'>No Items Found</div>");
                } else {


                    for ($x = 0; $x < $selected_num; $x++) {
                        $menu_data = $selected_rs->fetch_assoc();
                        $id = $menu_data["id"];
                        $name = $menu_data["name"];
                        $price = $menu_data["price"];
                        $img_path = $menu_data["img_path"];
                        $description = $menu_data["description"];
                        $category = $menu_data["menu_type_id"] == 1 ? "Food" : "Beverage";
                        $rating = $menu_data["menu_rating_top_id"];
                        $status = $menu_data["menu_status_id"] == 1 ? "Available" : "Unavailable";


                ?>

                        <div class="col-12 col-lg-4 mb-3">
                            <div class="card">
                                <div class="row">
                                    <div class="col-md-4 mt-3">
                                        <img src="<?php echo ($img_path); ?>"
                                            class="card-img-top img-thumbnail rounded mb-2 ms-3 me-4 border-0 bg-dark" />
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title fw-bold"><?php echo ($name); ?></h5>
                                            <span class="card-text fw-bold text-primary">Rs. <?php echo ($price); ?>.00</span><br />

                                            <label class="form-check-label fw-bold text-success"><?php echo ($status); ?></label><br />
                                            <input
                                                class="form-check-input form-check-input-box mb-2 mt-1" type="checkbox" role="checkbox" id="dswitch<?php echo ($id); ?>" name="dswitch2"
                                                <?php if ($rating == 1) echo 'checked'; ?> onclick="changeRating(<?php echo ($id); ?>);">
                                            <label class="form-check-label fw-bold text-info mb-2"
                                                for="dswitch2" id="popu<?php echo ($id); ?>"><?php
                                                                                                if ($rating == 1) {
                                                                                                    echo ("Popular");
                                                                                                } else if ($rating == 2) {
                                                                                                    echo ("Not Popular");
                                                                                                } ?>
                                            </label><br />
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row g-1">
                                                        <div class="col-12 d-grid">
                                                            <button class="btn btn-outline-success fw-bold"
                                                                onclick="updateMenuItem(0,<?php echo ($id); ?>,2);"><i
                                                                    class="bi bi-arrow-up-right-circle"></i>&nbsp;&nbsp;Update</button>
                                                        </div>

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
                }
                ?>


                <div class="modal fade" tabindex="-1" id="updateMenuItem">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content"
                            style="background-color:rgba(60, 60, 60, 0.87); color: white; border-radius: 10px; padding: 20px;">
                            <div class="modal-header" style="border-bottom: none;">
                                <h4 class="modal-title text-center w-100" style="font-weight: bold;" id="modelTitle">Item Insert / Update
                                </h4>
                                <button type="button" class="btn-close" style="filter: invert(1);" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body" id="modelBody">

                            </div>
                            <div class="modal-footer" style="border-top: none;">
                                <button class="btn btn-dark w-100" id="modelButton" onclick="saveData();">Insert / Update</button>
                            </div>
                        </div>
                    </div>
                </div>






                <!-- pagination -->
                <div class="col-12 text-center mt-2">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination pagination-lg justify-content-center">
                            <li class="page-item">
                                <a class="page-link" href="<?php if ($pageno <= 1) {
                                                                echo ("#");
                                                            } else {
                                                                echo ("?page=" . $pageno - 1);
                                                            }
                                                            ?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>

                            <?php

                            for ($x = 1; $x <= $number_of_pages; $x++) {
                                if ($x == $pageno) {

                            ?>
                                    <li class="page-item active">
                                        <a class="page-link" href="<?php echo ("?page=" . $x); ?>"><?php echo ($x); ?></a>
                                    </li>
                                <?php

                                } else {

                                ?>
                                    <li class="page-item">
                                        <a class="page-link" href="<?php echo ("?page=" . $x); ?>"><?php echo ($x); ?></a>
                                    </li>
                            <?php
                                }
                            }

                            ?>

                            <li class="page-item">
                                <a class="page-link" href="<?php if ($pageno >= $number_of_pages) {
                                                                echo ("#");
                                                            } else {
                                                                echo ("?page=" . $pageno + 1);
                                                            }
                                                            ?>" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!-- pagination -->

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