<?php
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        $loggedin = true;
    }
    else {
        $loggedin = false;
    }
?>
<div class="container tab-pane active">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3">
        <div class="col-md-3 mb-2 mb-md-0">
            <a href="index.php" class="d-inline-flex link-body-emphasis text-decoration-none">
            <img class="ms-3" src="images/logo.png" alt="img" width="40" height="40"/> <h4 class="mt-2 ms-2">Heritage</h4>
            </a>
        </div>
        <ul class="nav nav-pills nav-fill gap-2 p-1 large  rounded-5 shadow-sm" id="pillNav2" role="tablist" style="--bs-nav-link-color: var(--bs-white); --bs-nav-pills-link-active-color: #ff6537ff; --bs-nav-pills-link-active-bg: var(--bs-white); background-color:#ff6537ff;">
            <li class="nav-item" role="presentation">
                <a href="index.php" style="text-decoration:none;"><button class="nav-link active rounded-5" id="home-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="true">Home</button></a>
            </li>
            <li class="nav-item" role="presentation">
                <a href="index.php#facilities" style="text-decoration:none;"><button class="nav-link rounded-5" id="profile-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="false">Facilities</button></a>
            </li>
            <li class="nav-item" role="presentation">
                <a href="index.php#about-us" style="text-decoration:none;"><button class="nav-link rounded-5" id="contact-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="false">About Us</button></a>
            </li>
            <li class="nav-item" role="presentation">
                <a href="index.php#contact" style="text-decoration:none;"><button class="nav-link rounded-5" id="contact-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="false">Contact</button></a>
            </li>
            <li class="nav-item" role="presentation">
                <a href="index.php#faqs" style="text-decoration:none;"><button class="nav-link rounded-5" id="contact-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="false">FAQs</button></a>
            </li>
        </ul>

        <div class="col-md-3 text-end">
            <?php
                if(!$loggedin) { ?>
                    <button type="button" class="btn btn-outline-primary me-2 rounded-pill" style="border-color:#ff6537ff; color:#ff6537ff"><a href="login.php" style="text-decoration:none; color: #ff6537ff">Login</a></button>
                    <button type="button" class="btn btn-primary rounded-pill" style="background-color:#ff6537ff;border-color:#ffffff"><a href="signup.php" style="text-decoration:none; color:white;">Sign-up</a></button>
                    
                <?php }
                    if($loggedin) { ?>
                        <button type="button" class="btn btn-primary rounded-pill m-auto" style="background-color:#ff6537ff;border-color:#ffffff"><a href="logout.php" style="text-decoration:none; color:white;">Logout</a></button>
                <?php } ?>
        </div>
    </header>
</div>