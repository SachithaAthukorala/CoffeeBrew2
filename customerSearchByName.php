<?php
require "connection.php";
if (isset($_GET["name"])) {
    $user_name = $_GET["name"];

    $booking_rs = Database::search(
        "SELECT reservation.id AS reservation_id, reservation.table AS table_number, reservation.date_time, reservation.message, reservation.email_sent_status_id, user.fname, user.lname, user.mobile 
        FROM reservation 
        INNER JOIN user ON reservation.user_id = user.id  
        WHERE CONCAT(user.fname, ' ', user.lname) LIKE '%" . $user_name . "%'
        ORDER BY reservation.date_time DESC"
    );

    $booking_num = $booking_rs->num_rows;
?>
    <tr style="height: 15px;" class="border-0">
        <td colspan="8" class="border-0 bg-transparent"></td>
    </tr>

    <?php
    if ($booking_num > 0) {
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
                <td class="fw-bold text-center text-bg-warning text-dark border-0"
                    style="cursor: pointer;" onclick="changeDeliverStatus(<?php echo htmlspecialchars($booking_data['reservation_id']); ?>, <?php echo htmlspecialchars($booking_data['email_sent_status_id']); ?>);" id="bt<?php echo htmlspecialchars($booking_data['reservation_id']); ?>">
                    <?php echo ($booking_data['email_sent_status_id'] == 2) ? 'Checked' : 'Not Checked'; ?>
                </td>
            </tr>
            <tr style="height: 15px;" class="border-0">
                <td colspan="8" class="border-0 bg-transparent"></td>
            </tr>
        <?php
        }
    } else {
        ?>
        <tr>
            <td colspan="8" class="text-center fw-bold text-danger">No bookings found for "<?php echo htmlspecialchars($user_name); ?>"</td>
        </tr>
<?php
    }
}
?>