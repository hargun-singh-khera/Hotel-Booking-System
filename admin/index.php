<?php 
    session_start();
    if(!isset($_SESSION['adminloggedin']) || $_SESSION['adminloggedin']!=true) {
        // echo  "Redirecting";
        header('Location: login.php');
        exit;
    }

    $showError = false;
    $showEmptyField = false;
    $showSuccess = false;
    $roomTypeExists = false;
    $hotelNameExists = false;
    $roomNumberExists = false;
    // $roomtype = null;
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        include '../partials/dbconnect.php';
        if(isset($_POST["form1_submit"])) {
            $roomtype = $_POST["roomtype"];
            // echo "Room Type: " . "$roomtype";
            if(!isset($roomtype)) {
                echo "Please enter all fields";
                $showEmptyField = true;
            }
            else {
                $sql = "SELECT * FROM room_master WHERE room_type='$roomtype'";
                $result = mysqli_query($conn, $sql);
                $numRows1 = mysqli_num_rows($result);
                if($numRows1 > 0) {
                    $roomTypeExists = true;
                }
                else {
                    $sql = "INSERT INTO room_master(room_type) VALUES ('$roomtype')";
                    $result = mysqli_query($conn, $sql);
                    if(!$result) {
                        $showError = true;
                        die("Error!");
                    }
                    $showSuccess = true;
                }
                header("Refresh:1, index.php");
            }
        }
        if(isset($_POST["form3_sumbit"])) {
            echo "Hello 3";
            $sql = "DELETE FROM room_master";
            $result = mysql_query($conn, $sql);
            if($_POST["select_catalog"]) {
                echo "I am set";
            }

        }
        if(isset($_POST["form2_submit"])) {
            $hotelname = $_POST["hotelname"];
            $noofrooms = $_POST["noofrooms"];
        
            if(!isset($hotelname) || !isset($noofrooms)) {
                echo "Please enter all fields";
                $showEmptyField = true;
            }
            else {
                
                $sql = "SELECT * FROM hotel_master WHERE hotel_name='$hotelname'";
                $result = mysqli_query($conn, $sql);
                $numRows2 = mysqli_num_rows($result);
                if($numRows2 > 0) {
                    $hotelNameExists = true;
                }
                else {
                    $sql = "INSERT INTO hotel_master(hotel_name) VALUES ('$hotelname')";
                    $result = mysqli_query($conn, $sql);
                    if(!$result) {
                        $showError = true;
                        // die("Error!");
                    }
                    
                    $sql = "SELECT hotelid FROM hotel_master WHERE hotel_name = '$hotelname'";
                    $result = mysqli_query($conn, $sql);
                    $hotelId=NULL;
                    while($row=mysqli_fetch_assoc($result)) {
                        $hotelId = $row['hotelid'];
                    }
        
                    echo "Hotel ID: " . $hotelId . "<br/>";
                    
                    if(isset($_POST["checkbox"])) {
                        foreach ($_POST["checkbox"] as $roomId) {
                            $noofrooms = $_POST[$roomId];
                            echo "The checkbox with ID: $roomId is checked.<br>";
                            // if($noofrooms) {
                                echo "Hello<br/>";
                                echo "No of rooms: " . $noofrooms;
                                $sql = "INSERT INTO hotel_room_alloted(hotelid, roomid, no_of_rooms) VALUES ('$hotelId','$roomId','$noofrooms')";
                                $result = mysqli_query($conn, $sql);
                                if(!$result) {
                                    $showError = true;
                                }else {
                                    $showSuccess = true;
                                }
                            // }
                        }
                    }
                    echo "Hotel name: " . $hotelname ; 
                }
            }
        }
    }
    // echo "Show Error: " . $showError . "showSuccess: " . $showSuccess;
    
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome - <?php echo $_SESSION['name']?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <?php 
        if($showSuccess) {
            echo '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Entries added successfully into the database.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
        else if($showError) {
            echo '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error Adding Entries into the database! </strong>' . $showError. '
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
        else if($roomTypeExists) {
            echo '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error! Room Type already exists in the database! </strong>' . $showError. '
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
        else if($hotelNameExists) {
            echo '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error! Hotel Name already exists in the database! </strong>' . $showError. '
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
        else if($showEmptyField) {
            echo '
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <strong>Please enter all the fields! </strong>' . $showError. '
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
        
    ?>
    <main class="d-flex flex-nowrap"> 
        <?php include 'nav.php';?>
        <div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-body-tertiary ms-2" style="width:76em;">
            <div class="alert alert-success" role="alert" >
                <h4 class="alert-heading">Welcome Admin!</h4><hr>
                <p class="mb-0">Your contributions are the backbone of our organization. Welcome! <?php echo $_SESSION["name"];?></p>
            </div>
        </div>
      </main>
    <div class="container " style="margin-top:5rem;" >
        <div class="row d-flex w-auto align-items-center justify-content-center mb-5">
            <div class="col-md-4 ">
                <div class="card shadow p-5 border-0 rounded me-5">
                    <h2 >Add Rooms</h2>
                    <form action="/HotelBookingSystem/admin/index.php" method="POST">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Room Type</label>
                            <input type="text" class="form-control" id="roomtype" name="roomtype" required>
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary w-100" name="form1_submit" style="background-color: #ff6537ff; border:none;">Add Entry</button>
                            </div>
                        </div>
                    </form>
                    <hr />
                    <h2 >Delete Rooms</h2>
                    <form action="/HotelBookingSystem/admin/index.php" method="POST">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Remove Room</label>
                            <select class="form-select" name="select_catalog" id="select_catalog" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <?php
                                    $sql = "SELECT * FROM room_master ORDER BY RoomId ASC";
                                    $result = mysqli_query($conn, $sql);
                                    $num = mysqli_num_rows($result);
                                    if($num > 0) {
                                        while($row=mysqli_fetch_assoc($result)) {
                                            echo '<option id="' .$row["RoomId"] .'" value="' .$row["Room_Type"] .'">' . $row["Room_Type"] . '</option>';
                                        }
                                    }
                                ?>
                            </select>
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary w-100" name="form3_submit" style="background-color: #ff6537ff; border:none;">Remove Entry</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow p-5 border-0 rounded ms-5">
                    <h2>Add Hotels</h2>
                    <form action="/HotelBookingSystem/admin/index.php" method="POST">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Hotel Name</label>
                            <input type="text" class="form-control" id="hotelname" name="hotelname" aria-describedby="emailHelp" required>
                        </div>
                        <hr/>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">S.No.</th>
                                    <th scope="col">Room Type</th>
                                    <th scope="col">No of Rooms</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sql = "SELECT * FROM room_master ORDER BY RoomId ASC";
                                    $result = mysqli_query($conn, $sql);
                                    $numRows = mysqli_num_rows($result);
                                    if($numRows > 0) {
                                        if($result) {
                                            while($row=mysqli_fetch_assoc($result)) {
                                                echo '<tr><th scop="row">' .$row["RoomId"] . '<td>' .
                                                '<input class="form-check-input me-2" type="checkbox" name="checkbox[]" value="' .$row["RoomId"] .'" id="' .$row["RoomId"] .'" .  />' . $row["Room_Type"] .'<br />' .
                                                '<td>' . '<input type="number" class="form-control" id="' .$row["RoomId"] . '" name="' .$row["RoomId"] . '" min="1">' . '</td>' .
                                                '</td></th></tr>';
                                            }
                                        }
                                        else {
                                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    <strong>Error! Unable to fetch room types. </strong>' . $showError. '
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>';
                                        }
                                    }
                                    else {
                                        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                <strong>Please add a entry for room type! </strong>' . $showError. '
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>';
                                    }
                                ?>
                            </tbody>
                        </table>
                        
                        <div class="mb-3">
                            <!-- <label for="exampleInputPassword1" class="form-label">No of Rooms</label>
                            <input type="number" class="form-control" id="noofrooms" name="noofrooms" required> -->
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary w-100" name="form2_submit" style="background-color: #ff6537ff; border:none;">Add Entry</button>
                            </div>
                            <div class="text-center mt-2">
                                <a href="logout.php" style="color:#ff6537ff;text-decoration:none;">Logout</Link>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>