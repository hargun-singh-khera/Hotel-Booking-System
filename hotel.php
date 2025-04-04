<?php
    include "includes/partials/header.php";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST["bookroom"])) {
            $id = $_POST["roomid"];
            $_SESSION["roomid"] = $id;
            // echo "Hello Room ";
            header("Location: booking.php");
        }
    }
?>

<hr/>
<?php include "includes/sections/hotels/hotels.php"; ?>
<hr/>
<?php  ?>

<?php 
  include "includes/sections/hotels/rooms.php";
  include "includes/partials/footer.php"; 
?>
