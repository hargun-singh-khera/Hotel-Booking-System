<?php
    $showSuccess = true;
    $showAlert = false;
    include '../partials/dbconnect.php';
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST["form1_submit"])) {
            $roomtype = $_POST["roomtype"];
            $sql = "INSERT INTO room_master(room_type) VALUES('$roomtype')";
            $result = mysqli_query($conn, $sql);
            if(!$result) {
                $showSuccess = false;
            } 
            $showAlert = true;
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
                    if($showSuccess && $showAlert) {
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> New Room has been added to the database.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                        header('Refresh: 2; room_master.php');
                    }
                    if($showAlert && !$showSuccess) {
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error!</strong> Room Type already exists in the database.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                        header('Refresh: 2; room_master.php'); 
                    }
                ?>
        <div class="container" style="margin-top:5rem;">
            <div class="row d-flex align-items-center justify-content-center mb-5">
                    <div class="col-md-8 ">
                        <div class="card shadow p-5 border-0 rounded me-5">
                            <h2 >Add Rooms</h2>
                            <form action="/HotelBookingSystem/admin/room_master.php" method="POST">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Room Type</label>
                                    <input type="text" class="form-control" id="roomtype" name="roomtype" required>
                                    <div class="text-center mt-4">
                                        <button type="submit" class="btn btn-primary w-100" name="form1_submit" style="background-color: #ff6537ff; border:none;">Add Entry</button>
                                    </div>
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
                                    <tbody>
                                    ';
                                    while($row=mysqli_fetch_assoc($result)) {
                                        echo '<tr>
                                        <th scope="row">' .$row["RoomId"] . '</th>
                                        <td>' .$row["Room_Type"] . '</td>
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