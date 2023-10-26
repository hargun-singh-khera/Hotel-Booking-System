<?php 
    $showAlert=false;
    $showError=false;
    $showWarning = false;
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        include 'partials/dbconnect.php';             
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $cpassword = $_POST["cpassword"];
        if($name && $email && $password && $cpassword) {
            $sql = "SELECT * FROM users_master WHERE email='$email'";
            $result = mysqli_query($conn, $sql);
            if(!$result) {
                $showError = "We're facing some technical issues right now. We regret for the inconvenience caused to you. Please try again later.";
            }
            $numRows = mysqli_num_rows($result);
            if($numRows > 0) {
                $showError = "User having email: $email already exists";
            }
            else {
                // echo "Password: " .$password . " , Cpassword: " .$cpassword;
                if(($password == $cpassword)) {
                    $password_hash = password_hash($password, PASSWORD_DEFAULT);
                    $sql = "INSERT INTO users_master (`username`, `email`, `password`, `usertypeid`) VALUES ('$name', '$email', '$password_hash', 2)";
                    // $sql = "INSERT INTO users_master (`username`, `email`, `password`, `usertypeid`) VALUES ('$name', '$email', '$password_hash', 1)";
                    $result = mysqli_query($conn, $sql);
                    if($result) {
                        $showAlert = true;
                        header("Refresh: 1; login.php");
                    }
                }
                else {
                    $showError = "Passwords & Confirm Password doesn't matches";
                }
            }
        }
        else {
            $showWarning = "All fields are required";
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
        if($showAlert) {
            echo '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Your account has been created successfully.
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
    
    <div class="container d-flex align-items-center justify-content-center mt-5 ">
        <div class="row g-0">
            <div class="col-md-6 d-flex align-items-center justify-content-center">
                <img src="images/register.gif" class="img-fluid rounded-start" alt="..." />
            </div>
            <div class="col">
                <div class="card shadow-lg p-4 mb-5 border-0 rounded" >
                    <div class="col my-auto">
                        <img src="https://i.ibb.co/3hMcwNz/myhosieryshop-logo.png" class="img-fluid mx-auto d-block" alt="image" width="200" />
                        <div class="card-body">
                        <h5 style="font-size:30px; font-family:"'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif'" class="card-title mb-3">Create an Account</h5>
                        <form class="w-auto m-auto" action="/HotelBookingSystem/signup.php" method="POST">
                            <div class="mb-1">
                                <label for="name" class="form-label">Your name</label>
                                <input type="name" class="form-control" id="name" name="name" placeholder="Name"  required/>
                            </div>
                            <div class="mb-1">
                                <label for="email" class="form-label mt-1">E-mail address</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" />
                            </div>
                            <div class="mb-1">
                                <label for="password" class="form-label mt-1">Password</label>
                                <input type="password" maxlength="23" class="form-control" id="password" name="password" placeholder="Password" required/>
                            </div>
                            <div class="mb-1">
                                <label for="cpassword" class="form-label mt-1">Confirm Password</label>
                                <input type="password" maxlength="23" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password" required/>
                            </div>
                            <div class="col-12 mb-4 mt-2">
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required/>
                                <label class="form-check-label" for="invalidCheck">
                                    Agree to terms and conditions
                                </label>
                                <div class="invalid-feedback">
                                    You must agree before submitting.
                                </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary text-center corner-radius" id="signup-btn" style="background-color:#ff6537ff; border:none; min-width:400px;">Create account</button>
                            </div>
                            <div class="text-center mt-2">
                                Have an account?<a style="color:#ff6537ff;text-decoration:none;" href="login.php"> Sign In</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>