<?php
    session_start();

    include '../partials/dbconnect.php';
    $showSubmitSuccess = false;
    $showDeleteSuccess = false;
    $showUpdateSuccess = false;
    $showSubmitAlert = false;
    $showDeleteAlert = false;
    $showUpdateAlert = false;
    $isUpdate = false;
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST["form1_submit"])) {
            $hotelname = $_POST["hotelname"];
            $location = $_POST["location"];
            $file_name = $_FILES['image']['name'];
            $tmp_name = $_FILES['image']['tmp_name'];
            // $folder = '../Image/Hotels' .$file_name; 

            $sql = "INSERT INTO hotel_master(`hotel_name`, `locationid`, `hotelimage`) VALUES('$hotelname', '$location','$file_name')";
            // echo "<br/>" .$sql;
            $result = mysqli_query($conn, $sql);
            if(!$result) {
                $showSubmitSuccess = false;
            } 
            else {
                $showSubmitSuccess = true;
            }

            // if(move_uploaded_file($tmp_name, $folder)) {
            //     echo "<h2> File uploaded successfully</h2>";
            // }
            // else {
            //     echo "<h2> File was not uploaded successfully</h2>";
            // }

            $showSubmitAlert = true;
        }
        if(isset($_POST["form2_delete"])) {
            $id = $_POST["id"];
            $sql = "DELETE FROM hotel_master WHERE hotelid='$id'";
            try {
                $deleteResult  = mysqli_query($conn, $sql);
                if(!$deleteResult) {
                    $showDeleteSuccess = false;
                }
                else {
                    $showDeleteSuccess = true;
                }
            }
            catch(Exception $e) {}
            $showDeleteAlert = true;
        }
        if(isset($_POST["form3_update"])) {
            $id = $_POST["id"];
            $_SESSION["hotelid"] = $id;
            $isUpdate = true;
        }
        if(isset($_POST["form4_update"])) {
            $hotelid = $_SESSION["hotelid"];
            $hotelname = $_POST["hotelname"];
            $sql = "UPDATE hotel_master SET hotel_name='$hotelname' WHERE hotelid='$hotelid'";
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
    <title>Hotel Master</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <main class="d-flex flex-nowrap">
        <?php include 'nav.php';?>
        <div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-body-tertiary ms-2" style="width:76em;">
            <?php
                if($showSubmitSuccess && $showSubmitAlert) {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> New Hotel has been added to the database.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                }
                else if($showSubmitAlert && !$showSubmitSuccess) {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> Hotel Type already exists in the database.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>'; 
                }
                else if($showDeleteAlert && $showDeleteSuccess) {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> Hotel has been deleted successfully.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>'; 
                }
                else if($showDeleteAlert && !$showDeleteSuccess) {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> Hotel was not deleted.
                            <ul><li>Possible reason: You might have alloted some rooms to this hotel.</li>
                            <li>Fix: Please de-allocate the room types from this hotel before proceeding.</li></ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>'; 
                }
                else if($showUpdateAlert && $showUpdateSuccess) {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> Hotel name updated successfully.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>'; 
                }
                else if($showUpdateAlert && !$showUpdateSuccess) {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> Hotel was not updated.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>'; 
                }
            ?>
            <div class="container" style="margin-top:5rem;" >
            <div class="row d-flex align-items-center justify-content-center mb-5">
                    <div class="col-md-10 ">
                        <div class="card shadow p-5 border-0 rounded me-5">
                            <h2 >Manage Hotels</h2>
                            <form action="/HotelBookingSystem/admin/hotel_master.php" method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Hotel Name</label>
                                    <?php
                                        if(!$isUpdate) {
                                            echo '<input type="text" class="form-control" id="hotelname" name="hotelname" required/>';
                                        }
                                        else {
                                            if(isset($_SESSION["hotelid"])) {
                                                $hotelid = $_SESSION["hotelid"];
                                                $sql = "SELECT * FROM hotel_master WHERE hotelid='$hotelid'";
                                                // echo "<br/>" .$sql;
                                                $result = mysqli_query($conn, $sql);
                                                $num = mysqli_num_rows($result);
                                                if($num) {
                                                    while($row = mysqli_fetch_assoc($result)) {
                                                        echo '<input type="text" class="form-control" id="hotelname" name="hotelname" value="' .$row["Hotel_Name"] .'" required>';
                                                    }
                                                }

                                            }
                                        }
                                    ?>
                                    <div class="mb-3 mt-3">
                                        <label for="formFile" class="form-label">Upload Hotel Image</label>
                                        <input class="form-control" type="file" id="image" name="image">
                                    </div>
                                    <label for="exampleInputPassword1" class="form-label">Hotel Location</label>
                                    <select class="form-select" aria-label="Default select example" id="location" name="location">
                                        <?php
                                            if(!$isUpdate) {
                                                $sql = "SELECT * FROM location_master";
                                                $result = mysqli_query($conn, $sql);
                                                $num = mysqli_num_rows($result);
                                                echo '<option selected>Choose from Locations</option>';
                                                if($num) {
                                                    while($row = mysqli_fetch_assoc($result)) {
                                                        echo '<option value="' .$row["LocationId"] .'">' .$row["Location"] .'</option>';
                                                    }
                                                }
                                            }
                                        ?>
                                    </select>
                                    <?php
                                        if(!$isUpdate) {
                                            echo '<div class="text-center mt-4">
                                                <button type="submit" class="btn btn-primary w-100" name="form1_submit" style="background-color: #ff6537ff; border:none;">Add Entry</button>
                                            </div>';
                                        }
                                        else {
                                            echo '<div class="text-center mt-4">
                                                    <button type="submit" class="btn btn-primary w-100" name="form4_update" style="background-color: #ff6537ff; border:none;">Save Entry</button>
                                                </div>';
                                        }
                                    ?>
                                </div>
                            </form>
                            <?php
                                $sql = "SELECT * FROM location_master AS LM INNER JOIN hotel_master AS HM
                                ON LM.LocationId = HM.LocationId";
                                $result = mysqli_query($conn, $sql);
                                $num = mysqli_num_rows($result);
                                if($num) {
                                    echo '
                                    <hr />
                                    <h4>Recently Added Hotels</h4>
                                    <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">S.No.</th>
                                        <th scope="col">Hotels</th>
                                        <th scope="col">Location</th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                    </tr>
                                    </thead>
                                    <tbody>';
                                    $i=1;
                                    while($row=mysqli_fetch_assoc($result)) {
                                        $hotelId = $row["HotelId"];
                                        echo '<tr>
                                        <th scope="row">' .$i . '</th>
                                        <td>' .$row["Hotel_Name"] . '</td>
                                        <td>' .$row["Location"] . '</td>';
                                        echo '<form action="/HotelBookingSystem/admin/hotel_master.php" method="POST">
                                                <input type="hidden" name="id" value="' . $hotelId .'" />
                                                <td><button type="submit" class="btn btn-sm rounded-pill px-3 btn-warning w-100" name="form3_update">Update</button></td>
                                            </form>';
                                        echo '<form action="/HotelBookingSystem/admin/hotel_master.php" method="POST">
                                                <input type="hidden" name="id" value="' . $hotelId .'" />
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