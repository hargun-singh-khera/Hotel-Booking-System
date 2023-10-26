<?php
    include '../partials/dbconnect.php';

    
    session_start();
    $showSubmitSuccess = false;
    $showDeleteSuccess = false;
    $showUpdateSuccess = false;
    $showSubmitAlert = false;
    $showDeleteAlert = false;
    $showUpdateAlert = false;
    $hotelnameselected = NULL;
    $roomtypeselected = NULL;
    $showDefault = false;
    $hotelname = NULL;
    $itemSelected = false;
    $hotelSelectedId = NULL;
    $isUpdate = false;

    
    // $_SESSION['hotelid'] = $hotelSelectedId;
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["hotelname"])) {
            $hotelSelectedId = $_POST["hotelname"];  
            $_SESSION['hotelid'] = $hotelSelectedId;
        }
        if(isset($_POST["form1_submit"])) {
            $hotelnameselected = $_POST["hotelname"];
            $roomtypeselected = $_POST["roomtype"];
            $noofrooms = $_POST["noofrooms"];
            $sql = "SELECT * FROM hotel_master WHERE hotelid='$hotelnameselected'";
            $result = mysqli_query($conn, $sql);
            $numRows = mysqli_num_rows($result);
            if($numRows) {
                while($row = mysqli_fetch_assoc($result)) {
                    // echo "Inside while loop<br/>";
                    $hotelname = $row['Hotel_Name']; 
                }
            }
            $sql = "SELECT * FROM room_master WHERE roomid = '$roomtypeselected'";
            $result = mysqli_query($conn, $sql);
            $numRows = mysqli_num_rows($result);
            $roomtype=NULL;
            if($numRows) {
                while($row=mysqli_fetch_assoc($result)) {
                    $roomtype = $row['Room_Type'];
                }
            }
            $sql = "INSERT INTO hotel_room_alloted (hotelid, roomid, no_of_rooms) VALUES ('$hotelnameselected', '$roomtypeselected', '$noofrooms')";
            // echo $sql;
            $result = mysqli_query($conn, $sql);
            if(!$result) {
                $showSubmitSuccess = false;
            } 
            else {
                $showSubmitSuccess = true;
            }
            $showSubmitAlert = true;
            // echo "Hotel Name: " . $hotelname . ", Room Type: " . $roomtype . ", No of rooms: " .$noofrooms;
        }
        if(isset($_POST["form2_update"])) {
            echo 'Hello update' .$_SESSION["hotelid"];
            $id = $_POST["id"];
            $_SESSION["id"] = $id;
            $isUpdate = true;
        }
        if(isset($_POST["form3_delete"])) {
            // echo "Hello form 2";
            $id = $_POST["id"];
            $sql = "DELETE FROM hotel_room_alloted WHERE roomid='$id'";
            $deleteResult  = mysqli_query($conn, $sql);
            if(!$deleteResult) {
                $showDeleteSuccess = false;
            }
            else {
                $showDeleteSuccess = true;
            }
            $showDeleteAlert = true;
        }
        if(isset($_POST["form4_update"])) {
            $hotelid = $_SESSION["hotelid"];
            $roomid = $_POST["roomtype"];
            $noofrooms = $_POST["noofrooms"];
            $id = $_SESSION["id"];
            // echo "Hotelid: " .$hotelid . ", RoomId for set: " .$roomid .  ", Id: " .$id ."<br/>";
            $sql = "UPDATE hotel_room_alloted SET RoomId='$roomid', No_Of_Rooms='$noofrooms' WHERE HotelId='$hotelid' AND RoomId='$id'";
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
    <title>Room Allotment</title>
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
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    // header('Refresh: 1; room_master.php'); 
                }
                else if($showUpdateSuccess && $showUpdateAlert) {
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
        <div class="container"  style="margin-top: 5rem;">
          <div class="row d-flex align-items-center justify-content-center mb-5">
            <div class="col-md-8 ">
              <div class="card shadow p-5 border-0 rounded me-5">
                <h2 >Room Allotment to Hotels</h2>
                
                <form id="myForm" action="room_allot_test.php" method="POST">
                    <div class="mb-3">
                      <form id="myForm" action="room_allot_test.php" method="POST">
                        <label for="exampleInputPassword1" class="form-label">Hotel Name</label>
                        <?php
                            if(!$isUpdate) {
                                echo '<select class="form-select mb-2" id="hotelname" name="hotelname" aria-label="Default select example">';
                                
                                $hotelid = $_SESSION["hotelid"];
                                if($hotelid) {
                                    $sql = "SELECT * FROM hotel_master WHERE hotelid='$hotelid'";
                                    echo "<br/> " .$sql;
                                    $result = mysqli_query($conn, $sql);
                                    $num = mysqli_num_rows($result);
                                    if($num) {
                                        while($row = mysqli_fetch_assoc($result)) {
                                            echo '<option selected value="' .$row["HotelId"] . '">' .$row["Hotel_Name"]. '</option>';
                                        }
                                    }
                                }
                                else {
                                    echo '<option selected>Choose from Hotel Names</option>';
                                }
                                $sql = "SELECT * FROM hotel_master WHERE hotelid!='$hotelid' ORDER BY HotelId";
                                $result = mysqli_query($conn, $sql);
                                $numRows = mysqli_num_rows($result);
                                if($numRows) {
                                    while($row=mysqli_fetch_assoc($result)) {
                                        echo '<option value="' . $row["HotelId"] .'">' .$row["Hotel_Name"] . '</option>'; 
                                    }
                                }
                                echo '</select>';
                            }
                            else {
                                $hotelid = $_SESSION['hotelid'];
                                $sql = "SELECT * FROM hotel_master WHERE hotelid='$hotelid'";
                                // echo "<br/>" .$sql;
                                $result = mysqli_query($conn, $sql);
                                $num = mysqli_num_rows($result);
                                if($num) {
                                    while($row = mysqli_fetch_assoc($result)) {
                                        echo '<input class="form-control" type="text" value="' .$row["Hotel_Name"] .'" aria-label="readonly input example" readonly>';
                                    }
                                }
                            }
                        ?>
                        </form>
                        <script>
                            var dropdown = document.getElementById("hotelname");
                            var myForm = document.getElementById("myForm");
                            dropdown.addEventListener("change", function() {
                                // alert("Hello!");
                                myForm.submit();
                                // alert("Submitted!");
                            });
                        </script>
                      <hr />
                      <label for="exampleInputPassword1" class="form-label">Room Type</label>
                      <select class="form-select mb-2" id="roomtype" name="roomtype" aria-label="Default select example">
                          <?php
                            if(!$isUpdate) {

                                echo '<option selected>Choose from Room Types</option>';
                                if(isset($_SESSION["hotelid"])) {
                                    $sql = "SELECT * FROM room_master WHERE RoomId NOT IN (
                                        SELECT RoomId 
                                        FROM hotel_room_alloted 
                                        WHERE HotelId = '$hotelid'
                                    )
                                    ORDER BY RoomId";
                                    $result = mysqli_query($conn, $sql);
                                    $numRows = mysqli_num_rows($result);
                                    if($numRows) {
                                        while($row=mysqli_fetch_assoc($result)) {
                                            echo '<option value="' . $row["RoomId"] .'">' .$row["Room_Type"] . '</option>'; 
                                        }
                                    }
                                }
                            }
                            else {
                                if(isset($_SESSION["id"])) {
                                    $sql = "SELECT * FROM room_master AS RM
                                    INNER JOIN hotel_room_alloted AS HRM
                                    ON RM.RoomId=HRM.RoomId
                                    WHERE HRM.RoomId='$id'";
                                    $result = mysqli_query($conn, $sql);
                                    $num = mysqli_num_rows($result);
                                    if($num) {
                                        while($row = mysqli_fetch_assoc($result)) {
                                            echo '<option value="' . $row["RoomId"] .'">' .$row["Room_Type"] . '</option>'; 
                                        }
                                    }
                                }
                                else {
                                    echo '<option selected>Choose from Room Types</option>';
                                }
                                $sql = "SELECT * FROM room_master WHERE RoomId NOT IN (
                                    SELECT RoomId 
                                    FROM hotel_room_alloted 
                                    WHERE HotelId = '$hotelid' AND RoomId='$id'
                                )
                                ORDER BY RoomId";
                                echo "<br/>" .$sql;
                                $result = mysqli_query($conn, $sql);
                                $numRows = mysqli_num_rows($result);
                                if($numRows) {
                                    while($row=mysqli_fetch_assoc($result)) {
                                        echo '<option value="' . $row["RoomId"] .'">' .$row["Room_Type"] . '</option>'; 
                                    }
                                }
                            }
                        ?>
                      </select>
                      <label for="exampleInputPassword1" class="form-label ">No of Rooms Available</label>
                      <input type="number" class="form-control mb-2" id="noofrooms" name="noofrooms" value="1" min="0" aria-describedby="emailHelp">
                      <!-- <label for="exampleInputPassword1" class="form-label ">No of Guests</label>
                      <input type="number" class="form-control" id="noofrrooms" name="noofrooms" aria-describedby="emailHelp"> -->
                      <div class="text-center mt-4">
                      <?php
                        if(!$isUpdate) {
                            echo '<button type="submit" class="btn btn-primary w-100" name="form1_submit" style="background-color: #ff6537ff; border:none;">Add Entry</button>';
                        }
                        else {
                            echo '<button type="submit" class="btn btn-success w-100" name="form4_update" style="background-color: #ff6537ff; border:none;">Save Entry</button>';
                        }
                       ?>
                        </div>
                  </div>
                </form>
                <?php
                    // $sql = "SELECT * FROM hotel_room_alloted WHERE hotelid='$hotelnameselected'";
                    // $sql = "SELECT  * from student_address INNER JOIN student_marks on student_address.sid=student_marks.sid"; 
                    if(isset($_SESSION["hotelid"])) {
                        $hotelid = $_SESSION["hotelid"];

                    }
                    $sql = "SELECT * FROM room_master AS RM, hotel_master AS HM, hotel_room_alloted AS HRA WHERE RM.RoomId = HRA.RoomId AND HM.HotelId = HRA.HotelId AND HM.HotelId='$hotelid'";
                    // echo $sql;
                    $result = mysqli_query($conn, $sql);
                    $num = mysqli_num_rows($result);
                    // echo "Result: <br/>" . var_dump($num); 
                    if($num) {
                        // echo "Hello bro";
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
                        $i=1;
                        while($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>
                            <th scope="row">' .$i . '</th>
                            <td>' .$row["Room_Type"] .'</td>
                            <td>' .$row["No_Of_Rooms"] .'</td>';
                            echo '<form action="/HotelBookingSystem/admin/room_allot_test.php" method="POST">
                                <input type="hidden" name="id" value="' . $row["RoomId"] .'" />
                                <td><button type="submit" class="btn btn-sm rounded-pill px-3 btn-warning w-100" name="form2_update">Update</button></td>
                            </form>';
                            echo '<form action="/HotelBookingSystem/admin/room_allot_test.php" method="POST">
                                <input type="hidden" name="id" value="' . $row["RoomId"] .'" />
                                <td><button type="submit" class="btn btn-sm rounded-pill px-3 btn-danger w-100" name="form3_delete">Delete</button></td>
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