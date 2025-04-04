<?php
    session_start();

    if(!isset($_SESSION['adminloggedin']) || $_SESSION['adminloggedin']!=true) {
        // echo  "Redirecting";
        header('Location: login.php');
        exit;
    }
    include '../partials/dbconnect.php';
    $showDeleteSuccess = false;
    $showDeleteAlert = false;
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST["form_delete"])) {
            $id = $_POST["id"];
            $sql = "DELETE FROM users_master WHERE userid='$id'";
            // echo "<br/>" .$sql;
            $result  = mysqli_query($conn, $sql);
            if(!$result) {
                $showDeleteSuccess = false;
            }
            else {
                $showDeleteSuccess = true;
            }
            $showDeleteAlert = true;
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
                if($showDeleteSuccess && $showDeleteAlert) {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> User has been deleted successfully.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                }
                else if(!$showDeleteSuccess && $showDeleteAlert) {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> User not deleted.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>'; 
                }
            ?>
            <div class="container" style="margin-top:5rem;" >
                <div class="row d-flex align-items-center justify-content-center mb-5">
                    <div class="col-md-10 ">
                        <div class="card shadow p-5 border-0 rounded me-5">
                            <h2 >Manage Users</h2>
                            <?php
                                $sql = "SELECT * FROM users_master AS UM INNER JOIN user_type_master AS UTM
                                ON UM.UserTypeId = UTM.UserTypeId WHERE UTM.UserTypeId=2";
                                $result = mysqli_query($conn, $sql);
                                $num = mysqli_num_rows($result);
                                echo '<hr />';
                                if($num) {
                                    echo '
                                    <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">S.No.</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col"></th>
                                    </tr>
                                    </thead>
                                    <tbody>';
                                    $i=1;
                                    while($row=mysqli_fetch_assoc($result)) {
                                        $userId = $row["UserId"];
                                        echo '<tr>
                                            <th scope="row">' .$i . '</th>
                                            <td>' .$row["UserName"] . '</td>
                                            <td>' .$row["Email"] . '</td>';
                                            echo '<form action="../admin/user_master.php" method="POST">
                                                    <input type="hidden" name="id" value="' . $userId .'" />
                                                    <td><button type="submit" class="btn btn-sm rounded-pill px-3 btn-danger w-100" name="form_delete">Delete</button></td>
                                                </form>
                                                </tr>';
                                        $i++;
                                    }
                                    echo '</tbody>
                                    </table>';
                                }
                                else {
                                    echo '<h3 class="text-center">No users found.</h3>';
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