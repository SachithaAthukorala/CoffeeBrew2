<?php
require "connection.php";
session_start();

if (isset($_SESSION["ud"])) {
    $user_data = $_SESSION["ud"];

    if (isset($_GET["txt"])) {
        $name = $_GET["txt"];

        $menu_search_rs = Database::search("SELECT * FROM `menu` WHERE `name` LIKE '%" . $name . "%'");
        $menu_search_num = $menu_search_rs->num_rows;

        if ($menu_search_num >= 1) {

            // Pagination
            $pageno = isset($_GET["page"]) ? intval($_GET["page"]) : 1;
            if ($pageno < 1) {
                $pageno = 1;
            }

            $results_per_page = 6;

            $menu_rs = Database::search("SELECT * FROM `menu` WHERE `name` LIKE '%" . $name . "%'");
            $menu_num = $menu_rs->num_rows;

            $number_of_pages = ceil($menu_num / $results_per_page);
            $page_results = ($pageno - 1) * $results_per_page;

            $selected_rs = Database::search("SELECT * FROM `menu` WHERE `name` LIKE '%" . $name . "%' ORDER BY `id` DESC LIMIT $results_per_page OFFSET $page_results");
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

                                        <input class="form-check-input form-check-input-box mb-2 mt-1" type="checkbox"
                                            id="dswitch<?php echo ($id); ?>" name="dswitch2"
                                            <?php if ($rating == 1) echo 'checked'; ?>
                                            onclick="changeRating(<?php echo ($id); ?>);">
                                        <label class="form-check-label fw-bold text-info mb-2"
                                            for="dswitch2" id="popu<?php echo ($id); ?>">
                                            <?php echo ($rating == 1 ? "Popular" : "Not Popular"); ?>
                                        </label><br />

                                        <div class="row">
                                            <div class="col-12 d-grid">
                                                <button class="btn btn-outline-success fw-bold"
                                                    onclick="updateMenuItem(0,<?php echo ($id); ?>,2);">
                                                    <i class="bi bi-arrow-up-right-circle"></i>&nbsp;&nbsp;Update
                                                </button>
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
                    <div class="modal-content" style="background-color:rgba(60, 60, 60, 0.87); color: white; border-radius: 10px; padding: 20px;">
                        <div class="modal-header" style="border-bottom: none;">
                            <h4 class="modal-title text-center w-100 fw-bold" id="modelTitle">Item Insert / Update</h4>
                            <button type="button" class="btn-close" style="filter: invert(1);" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" id="modelBody"></div>
                        <div class="modal-footer" style="border-top: none;">
                            <button class="btn btn-dark w-100" id="modelButton" onclick="saveData();">Insert / Update</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <div class="col-12 text-center mt-5">
                <nav aria-label="Page navigation">
                    <ul class="pagination pagination-lg justify-content-center">
                        <li class="page-item <?php if ($pageno <= 1) echo 'disabled'; ?>">
                            <a class="page-link"
                                <?php if ($pageno > 1) echo 'onclick="searchManageProduct(' . ($pageno - 1) . ');"'; ?>>
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>

                        <?php for ($x = 1; $x <= $number_of_pages; $x++) { ?>
                            <li class="page-item <?php if ($x == $pageno) echo 'active'; ?>">
                                <a class="page-link" onclick="searchManageProduct('<?php echo $x; ?>')"><?php echo $x; ?></a>
                            </li>
                        <?php } ?>

                        <li class="page-item <?php if ($pageno >= $number_of_pages) echo 'disabled'; ?>">
                            <a class="page-link"
                                <?php if ($pageno < $number_of_pages) echo 'onclick="searchManageProduct(' . ($pageno + 1) . ');"'; ?>>
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
<?php
        }
    }
} else {
    header("Location: index.php");
}
?>