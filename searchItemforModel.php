<?php
require "connection.php";
session_start();
if (isset($_SESSION["ud"])) {
    $id1 = $_GET["id"];

    if ($id1 > 0) {

        $menu_rs = Database::search("SELECT * FROM `menu` WHERE `id` = '" . $id1 . "'");
        $menu_data = $menu_rs->fetch_assoc();


        $id = $menu_data["id"];
        $name = $menu_data["name"];
        $price = $menu_data["price"];
        $img_path = $menu_data["img_path"];
        $description = $menu_data["description"];
        $category = $menu_data["menu_type_id"];
        $rating = $menu_data["menu_rating_top_id"];
        $status = $menu_data["menu_status_id"];


?>
        <div class="text-center mb-3">
            <div
                style="width: 100px; height: 100px; background-color: #cfcfcf; margin: 0 auto; border-radius: 5px; display: flex; justify-content: center; align-items: center;">

                <img src="<?php echo ($img_path); ?>" class="img-fluid rounded" style="width: 100px; height: 100px;" id="img1" />
            </div>
            <input type="file" class="d-none" id="product_image_up_single" />
            <label for="product_image_up_single" class="btn btn-dark mt-2" onclick="addProductImage();">Add Image</label>
        </div>
        <div class="form-group mb-3">
            <label for="itemName">Name</label>
            <input type="text" class="form-control bg-dark text-white" id="itemName"
                placeholder="Item Name" value="<?php echo ($name); ?>" />
        </div>
        <div class="form-group mb-3">
            <label for="itemPrice">Price</label>
            <input type="text" class="form-control bg-dark text-white" id="itemPrice"
                placeholder="Price" value="<?php echo ($price); ?>" />
        </div>
        <div class="form-group mb-3">
            <label for="itemDetails">Detail</label>
            <textarea class="form-control bg-dark text-white" id="itemDetails"
                placeholder="Details"><?php echo ($description); ?></textarea>
        </div>
        <div class="row mb-3">
            <div class="col-6">
                <label for="itemCategory">Category</label>
                <select class="form-select bg-dark text-white" id="itemCategory">
                    <option value="1" <?php if ($category == 1) echo "selected"; ?>>Food</option>
                    <option value="2" <?php if ($category == 2) echo "selected"; ?>>Beverage</option>
                </select>
            </div>
            <div class="col-6">
                <label for="itemStatus">Status</label>
                <select class="form-select bg-dark text-white" id="itemStatus">
                    <option value="1" <?php if ($status == 1) echo "selected"; ?>>Available</option>
                    <option value="2" <?php if ($status == 2) echo "selected"; ?>>Unavailable</option>
                </select>
            </div>
        </div>


    <?php
    } else {
    ?>
        <div class="text-center mb-3">
            <div
                style="width: 100px; height: 100px; background-color: #cfcfcf; margin: 0 auto; border-radius: 5px; display: flex; justify-content: center; align-items: center;">

                <img src="img/thumbnail.svg" class="img-fluid rounded" style="width: 100px; height: 100px;" id="img1" />
            </div>
            <input type="file" class="d-none" id="product_image_up_single" />
            <label for="product_image_up_single" class="btn btn-dark mt-2" onclick="addProductImage();">Add Image</label>
        </div>
        <div class="form-group mb-3">
            <label for="itemName">Name</label>
            <input type="text" class="form-control bg-dark text-white" id="itemName"
                placeholder="Item Name" />
        </div>
        <div class="form-group mb-3">
            <label for="itemPrice">Price</label>
            <input type="text" class="form-control bg-dark text-white" id="itemPrice"
                placeholder="Price" />
        </div>
        <div class="form-group mb-3">
            <label for="itemDetails">Detail</label>
            <textarea class="form-control bg-dark text-white" id="itemDetails"
                placeholder="Details"></textarea>
        </div>
        <div class="row mb-3">
            <div class="col-6">
                <label for="itemCategory">Category</label>
                <select class="form-select bg-dark text-white" id="itemCategory">
                    <option value="1">Food</option>
                    <option value="2">Beverage</option>
                </select>
            </div>
            <div class="col-6">
                <label for="itemStatus">Status</label>
                <select class="form-select bg-dark text-white" id="itemStatus">
                    <option value="1">Available</option>
                    <option value="2">Unavailable</option>
                </select>
            </div>
        </div>

    <?php
    }
    ?>
<?php
} else {
    header("Location:adminsignIn.php");
}
?>