<?php 

    $disableHeaderFooter = true;
    $title = "Heritage | Login";
    include "includes/partials/header.php";

    $login = false;
    $showError = false;

    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        header("Location: index.php");
    }
    
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $email = $_POST["email"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM users_master WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if($num == 1) {
            while($row=mysqli_fetch_assoc($result)) {
                if(password_verify($password, $row['Password'])) {
                    $login = true;
                    // session_start();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['name'] = $row["UserName"];
                    $_SESSION['userid'] =$row["UserId"];
                    // echo "User Id: " .$_SESSION['userid'];
                    header("Refresh: 1; index.php");
                }
                else {
                    $showError = "Invalid login credentials";
                }
            }
        }
        else {
            $showError = "Invalid login credentials";
        }
    }

?>
<main>
    <?php 
        if($login) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> You are logged in successfully.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
    <?php } 
        if($showError) { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error! </strong>' . $showError. '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
    <?php  }
    ?>
    <div class="container d-flex align-items-center justify-content-center " style="margin-top:5rem;">
        <div class="row g-0">
            <div class="col-md-6 d-flex align-items-center justify-content-center">
                <img src="images/login.gif" class="img-fluid rounded-start" alt="..." />
            </div>
            <div class="col">
                <div class="card shadow-lg border-0 p-4 mb-5 rounded">
                    <div class="col my-auto">
                        <img src="images/logo.png" class="img-fluid  mx-auto d-block" alt="image" width="60" height="20" />
                        <div class="card-body">
                        <h5 style="font-size:30px; margin-bottom:0px; font-family:"'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif'" class="card-title mt-2" >Hello! Welcome Back</h5>
                        <small class="text-body-secondary">Log in with your data that you entered during your registration.</small>
        
                        <form class="w-auto m-auto mt-3" action="/HotelBookingSystem/login.php" method="POST">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Email address" required/>
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required/>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1"/>
                                <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary text-center" id="login-btn" style="background-color:#ff6537ff; border:none; min-width:390px;">Login</button>
                            </div>
                            <div class="text-center mt-2">
                                Don't have an account?<a href="signup.php" style="color:#ff6537ff;text-decoration:none;"> Sign Up</Link>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

<?php include "includes/partials/footer.php"; ?>