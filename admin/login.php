<?php 
    $login = false;
    $showError = false;
    $showWarning = false;
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        include '../partials/dbconnect.php';
        if(isset($_POST["form_login"])) {
            $name = $_POST["name"];
            $password = $_POST["password"];
            if(!$name || !$password) {
                $showWarning = "Enter all parameters";
            }
            else {
                // echo "Entered username: " .$name . "<br/>";
                $sql = "SELECT * FROM users_master AS UM
                INNER JOIN user_type_master AS UTM
                ON UM.UserTypeId = UTM.UserTypeId
                WHERE UTM.User_Type='admin' AND BINARY UM.UserName='$name'";
                // echo $sql;
                $result = mysqli_query($conn, $sql);
                $num = mysqli_num_rows($result);
                if($num == 1) {

                    while($row=mysqli_fetch_assoc($result)) {
                        if(password_verify($password, $row['Password'])) {
                            $login = true;
                            session_start();
                            $_SESSION['adminloggedin'] = true;
                            $_SESSION['loggedin'] = true;
                            $_SESSION['name'] = $row["UserName"];
                            $_SESSION['userid'] =$row["UserId"];
                            
                            // $_SESSION['usertypeid'] = 1;
                            
                            header("Refresh: 1; index.php");
                        }
                        else {
                            $showError = "Invalid admin credentials";
                        }
                    }
                }
                else {
                    $showError = "Invalid admin credentials";
                }
            }
    
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
    <?php 
        if($login) {
            echo '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> You are logged in successfully.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
        if($showError) {
            echo '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error! </strong>' . $showError. '
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
        if($showWarning) {
            echo '
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>' .$showWarning . '</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }

    ?>
    <div class="container d-flex align-items-center justify-content-center " style="margin-top:5rem;">
        <div class="card mb-3 border-0  ">
            <div class="row g-0">
                <div class="col my-auto">
                <div class="card shadow-lg mb-5 p-4 border-0 rounded">
                    <div class="card-body">
                        <img src="../images/logo.png" class="img-fluid  mx-auto d-block" alt="image" width="80" />
                        <div class="card-body">
                        <h5 style="font-size:30px; font-family:"'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif'" class="card-title mt-2">Admin Login</h5>
                        <small class="text-body-secondary" >Log in with your admin credentials.</small>
        
                        <form class="w-auto m-auto mt-3" action="../admin/login.php" method="POST">
                            <div class="mb-1">
                                <label for="exampleInputEmail1" class="form-label">Name or Username</label>
                                <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" />
                            </div>
                            <div class="mb-4">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password"/>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary text-center" id="login-btn" name="form_login" style="background-color:#ff6537ff; border:none; min-width:390px;">Login</button>
                            </div>
                            <div class="text-center mt-2">
                                <a href="../index.php" style="color:#ff6537ff;text-decoration:none;">Back to Home</Link>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>