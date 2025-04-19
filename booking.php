<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Bookings | CoffeeBrew</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">

    <link rel="icon" href="img/coffee-icon.png" type="image/x-icon">
</head>

<body class="adminBg">

    <?php require "connection.php";
    session_start();
    if (isset($_SESSION["ud"])) {

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
                                <a class="nav-link active" aria-current="page" href="booking.php">Bookings</a>
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
                        <h2 class="text-white">Booking Manage</h2>
                    </div>
                </div>
            </div>

            <div class="row mb-4 ">
                <div class="col-12 col-md-4 mb-2">
                    <label for="cus_name text-white" class="form-label text-white">Search By Name</label>
                    <input type="text" class="form-control shadow-none" id="cus_name"
                        placeholder="Search by customer name" onkeyup="bookingSearchByName();">
                </div>
                <div class="col-12 col-md-4 mb-2">
                    <label for="to_date" class="form-label text-white">Date</label>
                    <input type="date" class="form-control shadow-none" id="to_date">
                </div>
                <div class="col-12 col-md-4 mb-2 d-grid">
                    <label class="form-label">&nbsp;</label>
                    <button class="btn btn-primary" onclick="bookingSearchByDate();">
                        <i class="bi bi-search text-black"></i> Search
                    </button>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Order ID</th>
                                    <th class="text-center">Customer Name</th>
                                    <th class="text-center">Mobile</th>
                                    <th class="text-center">Table</th>
                                    <th class="text-center">Date & Time</th>
                                    <th class="text-end">Note</th>
                                    <th class="text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody id="viewArea">
                                <tr style="height: 15px;" class="border-0">
                                    <td colspan="8" class="border-0 bg-transparent"></td>
                                </tr>
                                <?php
                                $booking_rs = Database::search("SELECT reservation.id AS reservation_id, reservation.table AS table_number,user.email, reservation.date_time, reservation.message, reservation.email_sent_status_id, user.fname, user.lname, user.mobile FROM reservation INNER JOIN user ON reservation.user_id = user.id  ORDER BY reservation.date_time DESC");

                                $booking_num = $booking_rs->num_rows;

                                for ($x = 0; $x < $booking_num; $x++) {
                                    $booking_data = $booking_rs->fetch_assoc();
                                ?>

                                    <tr>
                                        <td class="fw-bold text-center text-dark border-0"><?php echo ($x + 1); ?></td>
                                        <td class="fw-bold text-center text-dark border-0"><?php echo htmlspecialchars($booking_data["reservation_id"]); ?></td>
                                        <td class="fw-bold text-center text-dark border-0"><?php echo htmlspecialchars($booking_data["fname"] . ' ' . $booking_data["lname"]); ?></td>
                                        <td class="fw-bold text-center text-dark border-0"><?php echo htmlspecialchars($booking_data["mobile"]); ?></td>
                                        <td class="fw-bold text-center text-dark border-0"><?php echo htmlspecialchars($booking_data["table_number"]); ?></td>
                                        <td class="fw-bold text-center text-dark border-0"><?php echo htmlspecialchars(date("Y-m-d h:i A", strtotime($booking_data["date_time"]))); ?></td>
                                        <td class="fw-bold text-end text-dark border-0"><?php echo htmlspecialchars($booking_data["message"]); ?></td>
                                        <td hidden id="userEmail<?php echo ($booking_data['reservation_id']); ?>"><?php echo ($booking_data["email"]); ?></td>

                                        <td class="fw-bold text-center border-0"
                                            style="cursor: pointer; 
        <?php if ($booking_data['email_sent_status_id'] == 2) {
                                        echo 'background-color: #198754; color: white;';
                                    } else {
                                        echo 'background-color: #ffc107; color: black;';
                                    } ?>"
                                            onclick="changeDeliverStatus(<?php echo htmlspecialchars($booking_data['reservation_id']); ?>, <?php echo htmlspecialchars($booking_data['email_sent_status_id']); ?>);"
                                            id="bt<?php echo htmlspecialchars($booking_data['reservation_id']); ?>">

                                            <?php echo ($booking_data['email_sent_status_id'] == 2) ? 'Checked' : 'Not Checked'; ?>
                                        </td>

                                    </tr>

                                    <tr style="height: 15px;" class="border-0">
                                        <td colspan="8" class="border-0 bg-transparent"></td>
                                    </tr>

                                <?php
                                }
                                ?>

                            </tbody>
                        </table>
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