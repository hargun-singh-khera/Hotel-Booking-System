<?php
    session_start();
    if(!isset($_SESSION['adminloggedin']) || $_SESSION['adminloggedin']!=true) {
        echo  "Redirecting";
        header('Location: login.php');
        exit;
    }
    
    $showSubmitSuccess = false;
    $showDeleteSuccess = false;
    $showUpdateSuccess = false;
    $showSubmitAlert = false;
    $showDeleteAlert = false;
    $showUpdateAlert = false;
    $isUpdate = false;
    include '../partials/dbconnect.php';
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST["form1_submit"])) {
            $roomtype = $_POST["roomtype"];
            $_SESSION['room'] = $roomtype;
            // echo 'Room Type: ' .$_SESSION["room"];
            $sql = "INSERT INTO room_master(room_type) VALUES('$roomtype')";
            // echo "<br/> " .$sql; 
            $result = mysqli_query($conn, $sql);
            if(!$result) {
                $showSubmitSuccess = false;
            } 
            else {
                $showSubmitSuccess = true;
            }
            $showSubmitAlert = true;
        }

        if(isset($_POST["form2_delete"])) {
            $id = $_POST["id"];
            $sql = "DELETE FROM room_master WHERE roomid='$id'";
            // echo "<br/>" .$sql;
            try {
                $deleteResult  = mysqli_query($conn, $sql);
                if(!$deleteResult) {
                    $showDeleteSuccess = false;
                    // echo "Error message: " .mysqli_error($conn);
                }
                else {
                    $showDeleteSuccess = true;
                }
            }
            catch(Exception $e) {}
            // echo "Hello delete <br/>";
            $showDeleteAlert = true;
        }
        if(isset($_POST["form3_update"])) {
            $isUpdate = true;
            $id = $_POST["id"];
            // echo "Hello update";
            $_SESSION['roomid'] = $id;
        }

        if(isset($_POST["form4_update"])) {
            $roomtype = $_POST['roomtype'];
            $roomid = $_SESSION['roomid'];
            $sql = "UPDATE room_master SET room_type='$roomtype' WHERE roomid='$roomid'";
            // echo "<br/>" .$sql;
            $result = mysqli_query($conn, $sql);
            if(!$result) {
                $showUpdateSuccess = false;
            }
            else {
                $showUpdateSuccess = true;
            }
            $showUpdateAlert = true;
        }
    }
    

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Room Master</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <main class="d-flex flex-nowrap">
        <?php include 'nav.php';?>
            <div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-body-tertiary ms-2" style="width:76em;">
                <?php
                    if($showSubmitSuccess && $showSubmitAlert) {
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> New Room has been added to the database.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                        // header('Refresh: 1; room_master.php');
                    }
                    else if($showSubmitAlert && !$showSubmitSuccess) {
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error!</strong> Room Type already exists in the database.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                        // header('Refresh: 1; room_master.php'); 
                    }
                    else if($showDeleteAlert && $showDeleteSuccess) {
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> Record has been deleted successfully.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                        // header('Refresh: 1; room_master.php'); 
                    }
                    else if($showDeleteAlert && !$showDeleteSuccess) {
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error!</strong> Record was not deleted.
                                <ul><li>Possible resason: You may have alloted this room type to a hotel.</li> 
                                <li>Fix: Please de-allocate this room type from all hotels before proceeding.</li></ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                        // header('Refresh: 1; room_master.php'); 
                    }
                    else if($showUpdateAlert && $showUpdateSuccess) {
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> Record updated successfully.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                        // header('Refresh: 1; room_master.php'); 
                    }
                    else if($showUpdateAlert && !$showUpdateSuccess) {
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error!</strong> Record was not updated.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                        // header('Refresh: 1; room_master.php'); 
                    }
                ?>
        <div class="container" style="margin-top:5rem;">
            <div class="row d-flex align-items-center justify-content-center mb-5">
                <div class="col-md-8 ">
                    <div class="card shadow p-5 border-0 rounded me-5">
                        <h2 >Manage Rooms</h2>
                        <form action="/HotelBookingSystem/admin/room_master.php" method="POST">
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Room Type</label>
                                <?php
                                    if(!$isUpdate) {
                                        echo '<input type="text" class="form-control" id="roomtype" name="roomtype" required>
                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn btn-primary w-100" name="form1_submit" style="background-color: #ff6537ff; border:none;">Add Entry</button>
                                        </div>';
                                    }
                                    else {
                                        if(isset($_SESSION['roomid'])) {
                                            $roomid = $_SESSION['roomid'];
                                            $sql = "SELECT * FROM room_master WHERE roomid='$roomid'";
                                            // echo "<br/>" .$sql;
                                            $result = mysqli_query($conn, $sql);
                                            $num = mysqli_num_rows($result);
                                            if($num) {
                                                while($row = mysqli_fetch_assoc($result)) {
                                                    echo '<input type="text" class="form-control" id="roomtype" name="roomtype" value="' .$row["Room_Type"] .'" required>
                                                    <div class="text-center mt-4">
                                                        <button type="submit" class="btn btn-primary w-100" name="form4_update" style="background-color: #ff6537ff; border:none;">Save Entry</button>
                                                    </div>';
                                                }
                                            }
                                        }
                                    }
                                ?>
                                
                            </div>
                        </form>
                        <?php
                            $sql = "SELECT * FROM room_master ORDER BY RoomId ASC";
                            $result = mysqli_query($conn, $sql);
                            $num = mysqli_num_rows($result);
                            if($num) {
                                echo '
                                <hr />
                                <h4>Recently Added Rooms</h4>
                                <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">S.No.</th>
                                    <th scope="col">Rooms</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>';
                                $i=1;
                                while($row=mysqli_fetch_assoc($result)) {
                                    $roomId = $row["RoomId"];
                                    echo '<tr>
                                    <th scope="row">' .$i . '</th>
                                    <td>' .$row["Room_Type"] . '</td>';
                                    echo '<form action="/HotelBookingSystem/admin/room_master.php" method="POST">
                                            <input type="hidden" name="id" value="' . $roomId .'" />
                                            <td><button type="submit" class="btn btn-sm rounded-pill px-3 btn-warning w-100" name="form3_update">Update</button></td>
                                        </form>';
                                    echo '<form action="/HotelBookingSystem/admin/room_master.php" method="POST">
                                            <input type="hidden" name="id" value="' . $roomId .'" />
                                            <td><button type="submit" class="btn btn-sm rounded-pill px-3 btn-danger w-100" name="form2_delete">Delete</button></td>
                                        </form>
                                        </tr>';
                                    $i++;
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