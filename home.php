<?php 

    $isSearch = false;
    $isSuccess = false;
    $showWarning = false;
    $show = false;
    
    // header('Refresh: 5; login.php');
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST["booknow"])) {
            $id = $_POST["hotelid"];
            // echo "Hello Book Now" .$id;
            $_SESSION["hotelid"] = $id;
            header('Location: hotel.php');
        }
        if(isset($_POST["search"])) {
            // echo "Searching...";
            $isSearch = true;
            $id = $_POST["locations"];
            $checkin = $_POST["checkin"];
            $checkout = $_POST["checkout"];
            $guests = $_POST["guests"];
            $rooms = $_POST["rooms"];
            $_SESSION["CheckInDate"] = $checkin;
            $_SESSION["CheckOutDate"] = $checkout;
            $_SESSION["Guests"] = $guests;
            $_SESSION["Rooms"] = $rooms;
            // echo "Location Id: " .$id . ", Check in: " .$_SESSION["CheckInDate"] .", Check out: " .$checkout . ', Guest: ' .$guests .", Rooms: " .$rooms;
            
        }
        
        if(isset($_POST["submit"])) {
            $show = true;
            $name = $_POST["name"];
            $email = $_POST["email"];
            $pnumber = $_POST["pnumber"];
            $concern = $_POST["concern"];
            if($name && $email && $pnumber && $concern) {
                if(strlen($pnumber) == 10) {
                    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        // $isEmpty = false;
                        $sql = "INSERT INTO `contacts` (`name`, `email`, `phonenumber`, `concern`) VALUES ('$name', '$email', '$pnumber', '$concern')";
                        $result = mysqli_query($conn, $sql);
                        if($result) {
                            $isSuccess = true;
                        }
                        else {
                            $isSuccess = false;
                            die("Error!" . mysqli_connect_error());
                        }
                    }
                    else {
                        $showWarning = "Please provide a valid email address.";
                    }
                }
                else {
                    $showWarning = "Mobile Number must be equal to 10 characters.";
                }
            }
            else {
                $showWarning = "All fields are mandatory.";
            }
            
        }
    }
?>

<?php include 'includes/carousel.php';?>
<?php include 'includes/search_box.php';?>

<?php include 'includes/hotel_listing.php';?>

<hr />
<?php include "includes/sections/facilities.php"; ?>
<hr />
<?php include "includes/sections/testimonials.php"; ?>
<hr/>
<?php include "includes/sections/faqs.php"; ?>
<hr/>
<?php include "includes/sections/about.php"; ?>
<hr />

<?php include "includes/sections/contact.php"; ?>

