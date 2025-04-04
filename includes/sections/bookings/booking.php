<form action="./booking.php" method="POST">
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
                                            <div class="col-md-3 " >
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16" style="color:#FFC24A;">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16" style="color:#FFC24A;">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16" style="color:#FFC24A;">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16" style="color:#FFC24A;">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16" style="color:#FFC24A;">
                                                <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                            </svg>
                                        </div>
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
                                                        <h5 class="card-title">'.$_SESSION["Guests"] .' Guests | '.$_SESSION["Rooms"] .' Room</h5>';
                                                        if(isset($_SESSION["CheckInDate"]) && isset($_SESSION["CheckOutDate"]) && isset($_SESSION["Rooms"])) {
                                                            $date1 = new DateTime($_SESSION["CheckInDate"]);
                                                            $date2 = new DateTime($_SESSION["CheckOutDate"]);
                                                            $diff = date_diff($date1, $date2)->format('%a');
                                                            if($diff > 1)
                                                                echo '<small style="margin-top: -55rem;">'.$diff.' Nights</small>';
                                                            else 
                                                                echo '<small style="margin-top: -55rem;">'.$diff.' Night</small>';

                                                        }
                                                        else {
                                                            echo '<small style="margin-top: -55rem;">1 Night</small>';
                                                        }
                                                    echo '</div>
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
                                                Room Charges<br/>';
                                                $price = $row["RatePerNight"];
                                                // echo "Price: " .$price;
                                                if(isset($_SESSION["CheckInDate"]) && isset($_SESSION["CheckOutDate"]) && isset($_SESSION["Rooms"])) {
                                                    $date1 = new DateTime($_SESSION["CheckInDate"]);
                                                    $date2 = new DateTime($_SESSION["CheckOutDate"]);
                                                    $diff = date_diff($date1, $date2)->format('%a');
                                                    $price = $price*$diff*$_SESSION["Rooms"];
                                                    $rooms = $_SESSION["Rooms"];
                                                    if($diff > 1 && $rooms > 1)
                                                        echo '<small style="color: rgba(0, 0, 0, 0.752);">('.$_SESSION["Rooms"].' rooms X '.$diff.' nights)</small>';
                                                    else if($diff > 1) 
                                                        echo '<small style="color: rgba(0, 0, 0, 0.752);">('.$_SESSION["Rooms"].' room X '.$diff.' nights)</small>';
                                                    else if($rooms > 1) {
                                                        echo '<small style="color: rgba(0, 0, 0, 0.752);">('.$_SESSION["Rooms"].' rooms X '.$diff.' night)</small>';
                                                    }
                                                    else 
                                                        echo '<small style="color: rgba(0, 0, 0, 0.752);">('.$_SESSION["Rooms"].' room X '.$diff.' night)</small>';
                                                }else {
                                                    echo '<small style="color: rgba(0, 0, 0, 0.752);">(1 room X 1 night)</small>';
                                                }
                                            echo '</div>';
                                            if(isset($_SESSION["CheckInDate"]) && isset($_SESSION["CheckOutDate"]) && isset($_SESSION["Rooms"])) {
                                                    echo '<div class="col text-end">
                                                            ₹ ' .$price.'.00 
                                                            </div>';
                                            }
                                            else {
                                                echo '<div class="col text-end">
                                                            ₹ ' .$price.' 
                                                            </div>';
                                            }
                                        echo '</div>
                                        <div class="row">
                                            <div class="col mt-1">
                                                Taxes &amp; Fees<br/>
                                                <small style="color: rgba(0, 0, 0, 0.752);">(GST @18%)</small>
                                            </div>';
                                            $tax = $price*0.18;
                                            echo '<div class="col text-end">
                                                ₹ '.$tax.'.00
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-auto"/>
                                    <div class="card-body" style="margin-top: -10px; margin-bottom:-10px;">
                                        <div class="row">
                                            <div class="col">
                                                <h6><strong>Amount Payable</strong></h6>
                                            </div>
                                            <div class="col text-end">
                                                <h6><strong>₹ '.$price+$tax.'.00</strong></h6>
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
        
        <?php include "includes/sections/bookings/confirmation.php"; ?>
    </div>
</form>