<?php
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        $loggedin = true;
    }
    else {
        $loggedin = false;
    }
    //  navbar
    echo '
    <div class="d-flex flex-column min-vh-100 flex-shrink-0 p-3 text-bg-dark" style="width: 280px;">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <span class="fs-4">Admin Dashboard</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item mt-1 mb-1">
                <a href="index.php" class="nav-link active text-white" aria-current="page" style="background-color:#ff6537ff;">
                Home
                </a>
            </li>
            <hr/>
            <li class="nav-item mt-1 mb-1">
                <a class="text-decoration-none nav-link active text-white" style="background-color:#ff6537ff;" href="room_master.php">Manage Rooms</a>
            </li>
            <li class="nav-item mt-1 mb-1">
                <a class="text-decoration-none nav-link active text-white" style="background-color:#ff6537ff;" href="hotel_master.php">
                Manage Hotels
                </a>
            </li>
            <li class="nav-item mt-1 mb-1">
                <a class="text-decoration-none nav-link active text-white" style="background-color:#ff6537ff;" href="location_master.php">
                Manage Hotel Locations
                </a>
            </li>
            <li class="nav-item mt-1 mb-1">
                <a class="text-decoration-none nav-link active text-white" style="background-color:#ff6537ff;" href="room_allot.php">
                Room Allotment
                </a>
            </li>
            <li class="nav-item mt-1 mb-1">
                <a class="text-decoration-none nav-link active text-white" style="background-color:#ff6537ff;" href="user_master.php">
                Manage Users
                </a>
            </li>
            <hr/>
            <li class="nav-item mt-1">
                <a href="logout.php" class="nav-link active text-white" aria-current="page" style="background-color:#ff6537ff;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                        <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                    </svg> Logout
                </a>
            </li>
        </ul>          
    </div>';
?>