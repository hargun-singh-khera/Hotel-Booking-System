<div class="container">
        <h4>Rooms Available</h4>
        <div id="select_room" class="row">
          <?php
            $sql = "SELECT * FROM hotel_room_alloted AS HRA
            INNER JOIN room_master AS RM
            ON HRA.RoomId = RM.RoomId
            WHERE HRA.HotelId='" .$_SESSION["hotelid"] ."'";
            $result = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($result);
            if($num) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="col-md-4 mt-4">
                      <div class="card mb-5 shadow border-0" style="width: 25rem; border-radius:12px;">
                        <img src="./images/RoomImages/' .$row["RoomImage"] .'" class="card-img-top" alt="..." height="230px" style="border-top-left-radius:12px; border-top-right-radius:12px;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                <h5 class="card-title" style="margin-top: -5px">' .$row["Room_Type"] .'</h5>

                                </div>
                                <div class="col text-end">
                                    <h5 class="m-auto" style="color:#ff6537ff;"><b>₹ '.$row["RatePerNight"] .'</b></h5>
                                    <small class="text-body-secondary m-auto"><strong>1 room</strong> per night</small>
                                
                                </div>
                            
                            </div>
                          <form action="./hotel.php" method="POST">
                                <input type="hidden" name="roomid" id="roomid" value="' .$row["RoomId"] .'" />
                                <button class="btn btn-primary mb-3 mt-3 w-100" name="bookroom" id="booknow" style="background-color: #ff6537ff;border:none;">Book Now</button>
                          </form>
                        </div>
                      </div>
                    </div>';
                }
            }
          
          ?>
          
        </div>
    </div>