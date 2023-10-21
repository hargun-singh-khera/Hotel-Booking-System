<?php
    include '../partials/dbconnect.php';
    $showSuccess = true;
    $showAlert = false;
    $hotelnameselected = NULL;
    $showDefault = false;
    $hotelname = NULL;
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST["form1_submit"])) {
            $hotelnameselected = $_POST["hotelname"];
            $roomtypeselected = $_POST["roomtype"];
            $noofrooms = $_POST["noofrooms"];
            $sql = "SELECT * FROM hotel_master WHERE hotelid='$hotelnameselected'";
            $result = mysqli_query($conn, $sql);
            $numRows = mysqli_num_rows($result);
            if($numRows) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "Inside while loop<br/>";
                    $hotelname = $row['Hotel_Name']; 
                }
            }
            $sql = "SELECT * FROM room_master WHERE roomid = '$roomtypeselected'";
            $result = mysqli_query($conn, $sql);
            $numRows = mysqli_num_rows($result);
            $roomtype=NULL;
            if($numRows) {
                while($row=mysqli_fetch_assoc($result)) {
                    echo "Under while loop";
                    $roomtype = $row['Room_Type'];
                }
            }
            $sql = "INSERT INTO hotel_room_alloted (hotelid, roomid, no_of_rooms) VALUES ('$hotelnameselected', '$roomtypeselected', '$noofrooms')";
            $result = mysqli_query($conn, $sql);
            if(!$result) {
                $showSuccess = false;
            }
            else {
                $showDefault = true;
            }
            $showAlert = true;
            echo "Hotel Name: " . $hotelname . ", Room Type: " . $roomtype . ", No of rooms: " .$noofrooms;
        }
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Room Allotment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <main class="d-flex flex-nowrap">
        <?php include 'nav.php';?>
        <div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-body-tertiary ms-2" style="width:76em;">
            <?php
                if($showSuccess && $showAlert) {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> Room Type and No of rooms has been added to the database.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    // header('Refresh: 2; room_allot.php');
                }
                if($showAlert && !$showSuccess) {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> Hotel already exists in the database.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    // header('Refresh: 2; room_allot.php'); 
                }
            ?>
            <div class="container"  style="margin-top: 5rem;">
          <div class="row d-flex align-items-center justify-content-center mb-5">
            <div class="col-md-8 ">
              <div class="card shadow p-5 border-0 rounded me-5">
                <h2 >Room Allotment to Hotels</h2>
                <form action="/HotelBookingSystem/admin/room_allot.php" method="POST">
                  <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Hotel Name</label>
                      <select class="form-select mb-2" id="hotelname" name="hotelname" aria-label="Default select example">
                          <?php
                            if($showDefault) {
                                echo '<option selected>' .$hotelname. '</option>';
                            }
                            else {
                                echo '<option selected>Choose from Hotel Names</option>';
                            }
                            $sql = "SELECT * FROM hotel_master ORDER BY HotelId";
                            $result = mysqli_query($conn, $sql);
                            $numRows = mysqli_num_rows($result);
                            if($numRows) {
                                while($row=mysqli_fetch_assoc($result)) {
                                    echo '<option value="' . $row["HotelId"] .'">' .$row["Hotel_Name"] . '</option>'; 
                                }
                            }
                        ?>
                      </select>
                      <hr />
                      <label for="exampleInputPassword1" class="form-label">Room Type</label>
                      <select class="form-select mb-2" id="roomtype" name="roomtype" aria-label="Default select example">
                        <option selected>Choose from Room Types</option>
                        <?php
                            $sql = "SELECT * FROM room_master ORDER BY RoomId";
                            $result = mysqli_query($conn, $sql);
                            $numRows = mysqli_num_rows($result);
                            if($numRows) {
                                while($row=mysqli_fetch_assoc($result)) {
                                    echo '<option value="' . $row["RoomId"] .'">' .$row["Room_Type"] . '</option>'; 
                                }
                            }
                        ?>
                      </select>
                      <label for="exampleInputPassword1" class="form-label ">No of Rooms Available</label>
                      <input type="number" class="form-control mb-2" id="noofrrooms" name="noofrooms" value="1" min="0" aria-describedby="emailHelp">
                      <!-- <label for="exampleInputPassword1" class="form-label ">No of Guests</label>
                      <input type="number" class="form-control" id="noofrrooms" name="noofrooms" aria-describedby="emailHelp"> -->
                      <div class="text-center mt-4">
                          <button type="submit" class="btn btn-primary w-100" name="form1_submit" style="background-color: #ff6537ff; border:none;">Add Entry</button>
                      </div>
                  </div>
                </form>
                <?php
                    $sql = "SELECT * FROM hotel_room_alloted WHERE hotelid='$hotelnameselected'";
                    $result = mysqli_query($conn, $sql);
                    $num = mysqli_num_rows($result);
                    if($num) {
                        echo '<hr />
                        <h4>Rooms Alloted to Hotels</h4>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">S.No.</th>
                                    <th scope="col">Room Type</th>
                                    <th scope="col">No of Rooms Available</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                        <tbody>';
                        while($row=mysqli_fetch_assoc($result)) {
                            $sql = "SELECT * FROM room_master WHERE roomid='" . $row["RoomId"] . "'";
                            $result = mysqli_query($conn, $sql);
                            $num = mysqli_num_rows($result);
                            $noofrooms = $row["No_Of_Rooms"];
                            echo '<tr>
                                    <th scope="row">' .$row["RoomId"] . '</th>';
                            while($row = mysqli_fetch_assoc($result)) {
                                echo '<td>' .$row["Room_Type"] .'</td>';
                            }
                            echo '<td>' .$noofrooms .'</td>
                            <td><button type="submit" class="btn btn-sm rounded-pill px-3 btn-warning w-100" name="form1_submit">Update</button></td>
                            <td><button type="submit" class="btn btn-sm rounded-pill px-3 btn-danger w-100" name="form1_submit">Delete</button></td>
                            </tr>';
                        }
                        echo '</tbody>
                      </table>';
                    }
                ?>
              </div>
            </div>
          </div>
        </div>

      </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>