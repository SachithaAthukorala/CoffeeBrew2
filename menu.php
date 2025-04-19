<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Restaurant Menu</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/coffee-icon.png" type="image/x-icon">
</head>

<body>
    <?php
    require "connection.php";
    ?>
    <div class="custom-background">
        <div class="custom-menu-container">

            <div class="custom-menu-header fixed-top mb-5">
                <div class="d-flex justify-content-between align-items-center px-3">
                    <span class="fs-2">Our Menu</span>
                    <a href="index.php" class="back-link text-light text-decoration-none fs-6">Back</a>
                </div>
            </div>


            <div class="mb-4 mt-lg-5">
                <h5>Top Items</h5>
                <?php
                $popular_rs = Database::search("SELECT * FROM `menu` WHERE `menu_status_id` = 1 AND `menu_rating_top_id` = 1 ORDER BY `id` ASC");
                $popular_num = $popular_rs->num_rows;
                ?>

                <div class="custom-row row g-4">
                    <?php
                    for ($x = 0; $x < $popular_num; $x++) {
                        $popular_data = $popular_rs->fetch_assoc();
                        $name = $popular_data["name"];
                        $img_path = $popular_data["img_path"];
                        $price = $popular_data["price"];
                        $description = $popular_data["description"];
                    ?>
                        <div class="col-6 col-md-6">
                            <div class="custom-menu-item w-75">
                                <img src="<?php echo ($img_path); ?>" alt="Item 1">
                                <div class="custom-details">
                                    <strong style="color:rgb(161, 161, 161);"><?php echo ($name); ?></strong>
                                    <p class="mt-2"><?php echo ($description) ?></p>
                                </div>
                                <span class="custom-price">Rs.<?php echo ($price); ?>.00</span>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>


            </div>

            <div class="mb-4">
                <h5>Beverages</h5>
                <?php
                $bev_rs = Database::search("SELECT * FROM `menu` WHERE `menu_status_id` = 1 AND `menu_type_id` = 2 ORDER BY `id` DESC");
                $bev_num = $bev_rs->num_rows;
                ?>
                <div class="custom-row row g-4">
                    <?php
                    for ($x = 0; $x < $bev_num; $x++) {
                        $bev_data = $bev_rs->fetch_assoc();
                        $name = $bev_data["name"];
                        $img_path = $bev_data["img_path"];
                        $price = $bev_data["price"];
                        $description = $bev_data["description"];
                    ?>
                        <div class="col-6 col-md-6">
                            <div class="custom-menu-item w-75">
                                <img src="<?php echo ($img_path); ?>" alt="Item 1">
                                <div class="custom-details">
                                    <strong style="color:rgb(161, 161, 161);"><?php echo ($name); ?></strong>
                                    <p class="mt-2"><?php echo ($description) ?></p>
                                </div>
                                <span class="custom-price">Rs.<?php echo ($price); ?>.00</span>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                </div>

            </div>

            <div class="mb-4">
                <h5>Food Items</h5>
                <?php
                $food_rs = Database::search("SELECT * FROM `menu` WHERE `menu_status_id` = 1 AND `menu_type_id` = 1 ORDER BY `id` DESC");
                $food_num = $food_rs->num_rows;
                ?>
                <div class="custom-row row g-4">
                    <?php
                    for ($x = 0; $x < $food_num; $x++) {
                        $food_data = $food_rs->fetch_assoc();
                        $name = $food_data["name"];
                        $img_path = $food_data["img_path"];
                        $price = $food_data["price"];
                        $description = $food_data["description"];
                    ?>
                        <div class="col-6 col-md-6">
                            <div class="custom-menu-item w-75">
                                <img src="<?php echo ($img_path); ?>" alt="Item 1">
                                <div class="custom-details">
                                    <strong style="color:rgb(161, 161, 161);"><?php echo ($name); ?></strong>
                                    <p class="mt-2"><?php echo ($description) ?></p>
                                </div>
                                <span class="custom-price">Rs.<?php echo ($price); ?>.00</span>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/script.js"></script>
</body>

</html>