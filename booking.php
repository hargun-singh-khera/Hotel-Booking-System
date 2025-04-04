<?php
    // echo "<br/>" .$_SESSION["hotelid"];
    // echo "<br/>" .$_SESSION["roomid"];
    // echo "<br/>" .$_SESSION["CheckInDate"];
    // echo "<br/>" .$_SESSION["CheckOutDate"];
    // echo "<br/>" .$_SESSION["Guests"];
    // echo "<br/>" .$_SESSION["Rooms"];
    include "includes/partials/header.php";
    $showSuccessAlert = false;
    $showError = false;
    $showWarning = false;
    // echo "userid: " .$_SESSION["userid"];
    // echo "<br/>hotelid: " .$_SESSION["hotelid"];
    // echo "<br/>Roomid: " .$_SESSION["roomid"];
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST["paybtn"])) {
            if(isset($_SESSION["CheckInDate"]) && isset($_SESSION["CheckOutDate"])) {
                // echo "<br/>" .$_SESSION["CheckInDate"];
                // echo "<br/>" .$_SESSION["CheckOutDate"];
                $number = $_POST["number"];
                // echo "Length: " .strlen($number);
                if(strlen($number) > 10) {
                    $showWarning = "Mobile Number should be less than or equal to 10 characters.";
                }
                else {
                    if(isset($_SESSION["Guests"]) && isset($_SESSION["Rooms"])) {
                        $sql = "INSERT INTO booking_master(`userid`, `hotelid`, `roomid`, `dateofcheckin`, `dateofcheckout`, `mobilenumber`) VALUES ('".$_SESSION["userid"]."', '".$_SESSION["hotelid"]."', '".$_SESSION["roomid"]."', '".$_SESSION["CheckInDate"]."', '".$_SESSION["CheckOutDate"]."', '$number')";
                        // echo "<br/> " .$sql;
                        $result = mysqli_query($conn, $sql);
                        if($result) {
                            $showSuccessAlert = true;
                        }
                        else {
                            $showError = "We are facing some technical issues and we are working on it. Please try again later.";
                        }
                    }
                }
            }
            else {
                $showError = "Please provide your Check In Date, Check Out & No of Guests Date before proceeding for payment";
            }
        }
        if(isset($_POST["search"])) {
            $checkin = $_POST["checkin"];
            $checkout = $_POST["checkout"];
            $guests = $_POST["guests"];
            $rooms = $_POST["rooms"];
            $_SESSION["CheckInDate"] = $checkin;
            $_SESSION["CheckOutDate"] = $checkout;
            $_SESSION["Guests"] = $guests;
            $_SESSION["Rooms"] = $rooms;
        }
    }
?>
<main>
    <?php
        if($showSuccessAlert && isset($_SESSION["CheckInDate"])) {
            $hotelname = NULL;
            $roomname = NULL;
            if(isset($_SESSION["hotelid"])) {
                // echo "<br/>" .$_SESSION["hotelid"];
                $hotelid = $_SESSION["hotelid"];
                $sql = "SELECT * FROM hotel_master WHERE hotelid='$hotelid'";
                $result = mysqli_query($conn, $sql);
                $num = mysqli_num_rows($result);
                if($num) {
                    while($row = mysqli_fetch_assoc($result)) {
                        $hotelname = $row["Hotel_Name"];
                    }
                }
            }
            if(isset($_SESSION["roomid"])) {
                // echo "<br/>" .$_SESSION["roomid"];
                $roomid = $_SESSION["roomid"];
                $sql = "SELECT * FROM room_master WHERE roomid='$roomid'";
                $result = mysqli_query($conn, $sql);
                $num = mysqli_num_rows($result);
                if($num) {
                    while($row = mysqli_fetch_assoc($result)) {
                        $roomname = $row["Room_Type"];
                    }
                }
            }
            echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your booking has been successfully  confirmed for <strong>'.date('d M Y', strtotime($_SESSION["CheckInDate"])) .'</strong> at <strong>'.$hotelname.'</strong>. You have reserved a <strong>'.$roomname.'</strong> Room for your stay. Thank you for choosing <strong>'.$hotelname.'</strong> for your accommodation needs.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
        else if($showWarning) {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Warning!</strong> '.$showWarning.'
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
        else if($showError) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> ' .$showError .'
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            include "includes/sections/bookings/search_box.php";
        }
    ?>
    <?php include "includes/sections/bookings/booking.php"; ?>
</main>

<?php include "includes/partials/footer.php"; ?>