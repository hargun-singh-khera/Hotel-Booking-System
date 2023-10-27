<?php

    session_start();
    include 'partials/dbconnect.php';
    // echo "<br/>" .$_SESSION["hotelid"];
    // echo $_SESSION["roomid"];
    // echo "<br/>" .$_SESSION["CheckInDate"];
    // echo "<br/>" .$_SESSION["CheckOutDate"];
    // echo "<br/>" .$_SESSION["Guests"];
    // echo "<br/>" .$_SESSION["Rooms"];
    $showSuccessAlert = false;
    $showError = false;
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST["paybtn"])) {
            if(isset($_SESSION["CheckInDate"]) && isset($_SESSION["CheckOutDate"])) {
                $showSuccessAlert = true;
            }
            else {
                $showError = "Please provide your Check In Date, Check Out & No of Guests Date before proceeding for payment";
                
            }
            // echo "Hello";
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

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <?php include 'partials/nav.php';?>
    <?php
        if($showSuccessAlert && isset($_SESSION["CheckInDate"])) {
            echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your booking has been confirmed for <strong>'.date('d M Y', strtotime($_SESSION["CheckInDate"])) .'</strong>. Thanks for choosing us.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
        else if($showError) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> ' .$showError .'
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            echo '<form action="/HotelBookingSystem/booking.php" method="POST">
                    <div class="d-flex align-items-center justify-content-center">
                        <div class="card shadow-lg p-3 mb-5 rounded border-0 mb-3 w-80 " >
                            <div class="row g-0">
                                <div class="col">
                                    <div class="d-flex card-body">
                                        <span class="leading-none inline-flex items-center justify-center h-full w-full transform mt-4 me-2" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="pointer-events-none max-h-full max-w-full"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2"><path d="M10 3a7 7 0 107 7 7 7 0 00-7-7zM21 21l-6-6" vector-effect="non-scaling-stroke"></path></g></svg></span>
                                        <div class="">
                                            <label for="check_in">Check In</label>  
                                            <input type="date" class="form-control" name="checkin" id="checkin" aria-describedby="emailHelp">
                                        </div>
                                        <div class="d-flex ms-3 me-3 h-auto">
                                            <div class="vr"></div>
                                        </div>
                                        <div class="">
                                            <label for="check_out">Check Out</label>  
                                            <input type="date" class="form-control" name="checkout" id="checkout" aria-describedby="emailHelp">
                                        </div>
                                        <div class="d-flex ms-3 me-3 h-auto">
                                            <div class="vr"></div>
                                        </div>
                                        <div class="">
                                            <label for="guests">Guests</label>  
                                            <input type="number" class="form-control" name="guests" id="guests" aria-describedby="emailHelp" placeholder="No. of Guests">
                                        </div>
                                        <div class="d-flex ms-3 me-3 h-auto">
                                            <div class="vr"></div>
                                        </div>
                                        <div class="me-5">
                                            <label for="location">Rooms</label>  
                                            <input type="number" class="form-control" name="rooms" id="rooms" aria-describedby="emailHelp" placeholder="No. of Rooms">
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-3" name="search" id="search" style="background-color: #ff6537ff; border:none; max-height:50px;width:100px;">Enter</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>';
        }
        else {
            echo '<hr/>';

        }
    ?>
    
    <div class="container">
        <div class="row">
            <?php
                if(isset($_SESSION["hotelid"]) && $_SESSION["roomid"]) {
                    $sql ="SELECT * FROM hotel_room_alloted AS HRA
                    INNER JOIN room_master AS RM 
                    ON HRA.RoomId = RM.RoomId
                    INNER JOIN hotel_master AS HM 
                    ON HM.HotelId = HRA.HotelId
                    INNER JOIN location_master AS LM 
                    ON HM.LocationId = LM.LocationId
                    WHERE HRA.HotelId='" .$_SESSION["hotelid"] ."' AND HRA.RoomId='" .$_SESSION["roomid"] ."'";
                    $result = mysqli_query($conn, $sql);
                    $num = mysqli_num_rows($result);
                    if($num) {
                        while($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="col-md-8 mt-3">
                                <div class="card shadow-lg border-0" style="border-radius: 12px;">
                                <div class="card-body">
                                        <h4 class="ms-2">HOTEL INFO</h4>
                                        <hr/>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <img src="./images/'.$row["HotelImage"] .'" class="card-img-top" alt="..." style="border-radius: 12px;">
                                            </div>
                                            <div class="col-md-6">
                                                Rating<br/>
                                                <h4 class="card-title mt-1" style="margin-bottom:2px;">'.$row["Hotel_Name"] .'</h4>
                                                <small>'.$row["Location"] .'</small>
                                            </div>
                                        </div>
                                    </div>';
                                    if(isset($_SESSION["CheckInDate"]) && isset($_SESSION["CheckOutDate"])) {
                                        echo '<div class="card ms-5 me-5 mt-3 mb-3 shadow-sm border-0" style="background-color: #e8f3ffff; border-radius:15px;">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <small>Check In</small>
                                                        <h5 class="card-title">' .date('d M Y', strtotime($_SESSION["CheckInDate"])) .'</h5>
                                                        <small style="margin-top: -55rem;">12:00 PM</small>
                                                    </div>
                                                    <div class="col">
                                                        <small>Check Out</small>
                                                        <h5 class="card-title">'.date('d M Y', strtotime($_SESSION["CheckOutDate"])) .'</h5>
                                                        <small style="margin-top: -55rem;">11:00 AM</small>
                                                    </div>
                                                    <div class="col">
                                                        <small>Guests</small>
                                                        <h5 class="card-title">'.$_SESSION["Guests"] .' Guests | '.$_SESSION["Rooms"] .' Room</h5>
                                                        <small style="margin-top: -55rem;">1 Night</small>
                                                    </div>
                                                    <div class="col">
                                                        <small>Room Selected</small>
                                                        <h5 class="card-title">'.$row["Room_Type"].'</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>';
                                    }
                                echo '</div>
                            </div>
                            <div class="col-md-4 mt-3 ">
                                <div class="card shadow-lg border-0" style="border-radius: 12px;">
                                    <div class="card-body">
                                        <h4 class="card-title">Price Summary</h4>
                                    </div>
                                    <hr style="margin-top:-12px;"/>
                                    <div class="card-body" style="margin-top: -20px;">
                                        <div class="row">
                                            <div class="col">
                                                Room Charges
                                            </div>
                                            <div class="col text-end">
                                                ₹ '.$row["RatePerNight"].'
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                Taxes &amp; Fees
                                                <small style="color: rgba(0, 0, 0, 0.752);">(GST @18%)</small>
                                            </div>
                                            <div class="col text-end">
                                                ₹ '.$row["RatePerNight"]*(0.18).'
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-auto"/>
                                    <div class="card-body" style="margin-top: -10px; margin-bottom:-10px;">
                                        <div class="row">
                                            <div class="col">
                                                <h5>Amount Payable</h5>
                                            </div>
                                            <div class="col text-end">
                                                <h5>₹ '.$row["RatePerNight"]+$row["RatePerNight"]*(0.18).'</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                        }
                    }

                }
            ?>
            
        </div>
        <form action="/HotelBookingSystem/booking.php" method="POST">
            <div class="row mt-4">
                <div class="col-md-8">
                    <div class="card shadow-lg border-0" style="border-radius: 12px;">
                        <div class="card-body">
                        <h4 class="ms-2">GUESTS INFO</h4>
                        <hr/>
                        <div class="mb-3 ms-2">
                            <label for="name" class="form-label mt-2">Your Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter your full name" required>
                        </div>
                        <div class="mb-3 ms-2">
                            <label for="email" class="form-label">Your Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
                        </div>
                        <div class="mb-3 ms-2">
                            <label for="number" class="form-label">Your Mobile Number</label>
                            <input type="tel" class="form-control" id="number" placeholder="Enter your mobile number" required>
                        </div>
                        </div>
                    </div>
                    <button class="btn btn-primary w-100 mt-3 mb-4" name="paybtn" id="paybtn" style="background-color: #ff6537ff; border:none; height:65px; border-radius:1.2rem;font-size:1.6rem;font-family: Quicksand;font-weight:bold; ">Proceed to Payment</button>
                </div>
            </div>
        </form>
    </div>

      <!-- Include footer -->
      <?php ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>