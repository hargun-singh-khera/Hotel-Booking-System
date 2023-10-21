<?php 
    session_start();
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true) {
        header('location: login.php');
        exit;
    }
    // header('Refresh: 5; login.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome - <?php echo $_SESSION['name']?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    
    <?php include 'partials/nav.php';?>

    <!-- caraousel -->
    <?php include 'carousel.php';?>

    <div class="container text-center mt-5">
        <p class="h1">The <span style="color: #ff6537ff;">Best Hotels</span> For You</p>
        <small class="text-body-secondary">There are some of the hotels that we highly recommend for you. We guarentee the quality of service, <br />the food, the hotel area and various other aspects.</small>
    
        <div class="row row-cols-1 row-cols-md-3 g-4 mt-3">
            <div class="col-md-3">
                <div class="card  border-0 shadow mb-5 rounded text-start">
                    <img src="images/img12.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Royal Park Resort<br/></h5>
                        <div class="row ">
                            <div class="col ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                        <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                                        <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                    </svg><small class="text-body-secondary">
                                    &nbsp;Manali
                                </small>
                                <br/>
                                <div class="mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16" style="color:#FFC24A;">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16" style="color:#FFC24A;">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16" style="color:#FFC24A;">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16" style="color:#FFC24A;">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16" style="color:#FFC24A;">
                                        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                    </svg>
                                </div>

                            </div>
                            <div class="col text-end m-auto">
                                <p class="m-auto" style="color:#ff6537ff;"><b>₹ 2446/-</b></p>
                                <small class="text-body-secondary m-auto">1 room per night</small>
                            </div>
                            <div class="w-100 mt-3 pb-3">
                                <button class="btn btn-primary w-100" style="background-color: #ff6537ff;border:none;">Book Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card  border-0 shadow mb-5 rounded text-start">
                    <img src="images/img13.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Royal Park Resort<br/></h5>
                        <div class="row ">
                            <div class="col ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                        <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                                        <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                    </svg><small class="text-body-secondary">
                                    &nbsp;Delhi
                                </small>
                                <br/>
                                <div class="mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16" style="color:#FFC24A;">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16" style="color:#FFC24A;">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16" style="color:#FFC24A;">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16" style="color:#FFC24A;">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16" style="color:#FFC24A;">
                                        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                    </svg>
                                </div>

                            </div>
                            <div class="col text-end m-auto">
                                <p class="m-auto" style="color:#ff6537ff;"><b>₹ 3800/-</b></p>
                                <small class="text-body-secondary m-auto">1 room per night</small>
                            </div>
                            <div class="w-100 mt-3 pb-3">
                                <button class="btn btn-primary w-100" style="background-color: #ff6537ff;border:none;">Book Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card  border-0 shadow mb-5 rounded text-start">
                    <img src="images/img14.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">One & Only The Palm<br/></h5>
                        <div class="row ">
                            <div class="col ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                        <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                                        <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                    </svg><small class="text-body-secondary">
                                    &nbsp;Dubai
                                </small>
                                <br/>
                                <div class="mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16" style="color:#FFC24A;">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16" style="color:#FFC24A;">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16" style="color:#FFC24A;">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16" style="color:#FFC24A;">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16" style="color:#FFC24A;">
                                        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                    </svg>
                                </div>

                            </div>
                            <div class="col text-end m-auto">
                                <p class="m-auto" style="color:#ff6537ff;"><b>₹ 3800/-</b></p>
                                <small class="text-body-secondary m-auto">1 room per night</small>
                            </div>
                            <div class="w-100 mt-3 pb-3">
                                <button class="btn btn-primary w-100" style="background-color: #ff6537ff;border:none;">Book Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card  border-0 shadow mb-5 rounded text-start">
                    <img src="images/img15.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Hotel Sun Park<br/></h5>
                        <div class="row ">
                            <div class="col ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                        <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                                        <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                    </svg><small class="text-body-secondary">
                                    &nbsp;Chandigarh
                                </small>
                                <br/>
                                <div class="mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16" style="color:#FFC24A;">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16" style="color:#FFC24A;">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16" style="color:#FFC24A;">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16" style="color:#FFC24A;">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16" style="color:#FFC24A;">
                                        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                    </svg>
                                </div>

                            </div>
                            <div class="col text-end m-auto">
                                <p class="m-auto" style="color:#ff6537ff;"><b>₹ 4185/-</b></p>
                                <small class="text-body-secondary m-auto">1 room per night</small>
                            </div>
                            <div class="w-100 mt-3 pb-3">
                                <button class="btn btn-primary w-100" style="background-color: #ff6537ff;border:none;">Book Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card  border-0 shadow mb-5 rounded text-start">
                    <img src="images/img16.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Hotel Arafa Inn<br/></h5>
                        <div class="row ">
                            <div class="col ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                        <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                                        <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                    </svg><small class="text-body-secondary">
                                    &nbsp;Banglore
                                </small>
                                <br/>
                                <div class="mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16" style="color:#FFC24A;">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16" style="color:#FFC24A;">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16" style="color:#FFC24A;">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16" style="color:#FFC24A;">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16" style="color:#FFC24A;">
                                        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                    </svg>
                                </div>

                            </div>
                            <div class="col text-end m-auto">
                                <p class="m-auto" style="color:#ff6537ff;"><b>₹ 2300/-</b></p>
                                <small class="text-body-secondary m-auto">1 room per night</small>
                            </div>
                            <div class="w-100 mt-3 pb-3">
                                <button class="btn btn-primary w-100" style="background-color: #ff6537ff;border:none;">Book Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card  border-0 shadow mb-5 rounded text-start">
                    <img src="images/img17.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Hotel Elite<br/></h5>
                        <div class="row ">
                            <div class="col ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                        <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                                        <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                    </svg><small class="text-body-secondary">
                                    &nbsp;Dehradun
                                </small>
                                <br/>
                                <div class="mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16" style="color:#FFC24A;">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16" style="color:#FFC24A;">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16" style="color:#FFC24A;">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16" style="color:#FFC24A;">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16" style="color:#FFC24A;">
                                        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                    </svg>
                                </div>

                            </div>
                            <div class="col text-end m-auto">
                                <p class="m-auto" style="color:#ff6537ff;"><b>₹ 2100/-</b></p>
                                <small class="text-body-secondary m-auto">1 room per night</small>
                            </div>
                            <div class="w-100 mt-3 pb-3">
                                <button class="btn btn-primary w-100" style="background-color: #ff6537ff;border:none;">Book Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card  border-0 shadow mb-5 rounded text-start">
                    <img src="images/img18.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Trinty Heights<br/></h5>
                        <div class="row ">
                            <div class="col ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                        <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                                        <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                    </svg><small class="text-body-secondary">
                                    &nbsp;Dharamshala
                                </small>
                                <br/>
                                <div class="mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16" style="color:#FFC24A;">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16" style="color:#FFC24A;">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16" style="color:#FFC24A;">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16" style="color:#FFC24A;">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16" style="color:#FFC24A;">
                                        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                    </svg>
                                </div>

                            </div>
                            <div class="col text-end m-auto">
                                <p class="m-auto" style="color:#ff6537ff;"><b>₹ 7800/-</b></p>
                                <small class="text-body-secondary m-auto">2 rooms per night</small>
                            </div>
                            <div class="w-100 mt-3 pb-3">
                                <button class="btn btn-primary w-100" style="background-color: #ff6537ff;border:none;">Book Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card  border-0 shadow mb-5 rounded text-start">
                    <img src="images/img19.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Amritara Aura Resort<br/></h5>
                        <div class="row ">
                            <div class="col ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                        <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                                        <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                    </svg><small class="text-body-secondary">
                                    &nbsp;Goa
                                </small>
                                <br/>
                                <div class="mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16" style="color:#FFC24A;">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16" style="color:#FFC24A;">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16" style="color:#FFC24A;">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16" style="color:#FFC24A;">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16" style="color:#FFC24A;">
                                        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                    </svg>
                                </div>

                            </div>
                            <div class="col text-end m-auto">
                                <p class="m-auto" style="color:#ff6537ff;"><b>₹ 11256/-</b></p>
                                <small class="text-body-secondary m-auto">1 room per night</small>
                            </div>
                            <div class="w-100 mt-3 pb-3">
                                <button class="btn btn-primary w-100" style="background-color: #ff6537ff;border:none;">Book Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            
            
        </div>
    </div>

    <div class="container mt-5">
        
    </div>
    <hr />
    <section id="facilities">
        <div class="container text-center mt-5 mb-5 ">
            <p class="h1">Our<span style="color: #ff6537ff;"> Facilities</span> For You</p>
            <div class="row d-flex justify-content-center align-items-center mt-5" >
                <div class="col-md-3 text-center me-5">
                    <img src="images/img1.png" alt="image" />
                    <h3>Only <span style="color: #ff6537ff;">Checked </span>Places</h3>
                    <small class="text-body-secondary">Monitor your creative health scores <br />internally and against peer bechmarks.</small>
                </div>
                <div class="col-md-3 text-center ms-5 me-5">
                    <img src="images/img2.png" alt="image" />
                    <h3><span style="color: #ff6537ff;">Worldwide </span>Connect</h3>
                    <small class="text-body-secondary">Monitor your creative health scores <br />internally and against peer bechmarks.</small>
                </div>
                <div class="col-md-3 text-center ms-5 me-5">
                    <img src="images/img3.png" alt="image" />
                    <h3><span style="color: #ff6537ff;">Save </span>On Travel</h3>
                    <small class="text-body-secondary">Monitor your creative health scores <br />internally and against peer bechmarks.</small>
                </div>
            </div>
        </div>
    </section>
    <hr />
    
    
    <div class="container text-center mt-5 mb-5">
        <p class="h1 mb-3">What Our <span style="color: #ff6537ff;">Customer </span>Says!</p>
        <div class="row row-cols-1 row-cols-md-3 g-4 mt-3">
            <div class="col-md-3">
                <div class="card h-100 border-0 shadow-sm mb-5  rounded">
                    <img src="images/img4.jpg" class="card-img-top m-auto mt-3" alt="..." style="border-radius:50%;width:35%;height:35%;">
                    <div class="card-body">
                        <h5 class="card-title">Royal Park Resort</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis, deserunt dolorem debitis fugiat aspernatur, amet mollitia perspiciatis sint architecto iusto fugit adipisci ratione modi dolore odio aperiam, atque est nam?</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 border-0 shadow-sm mb-5 rounded">
                    <img src="images/img13.png" class="card-img-top m-auto mt-3" alt="..." style="border-radius:50%;width:35%;height:35%;">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Porro natus cupiditate earum minus blanditiis officia, veniam, suscipit rerum eaque vitae tenetur odio saepe illo maiores!</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 border-0 shadow-sm mb-5 rounded">
                    <img src="images/img4.jpg" class="card-img-top m-auto mt-3" alt="..." style="border-radius:50%;width:35%;height:35%;">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat, beatae nisi suscipit pariatur quas dolorum ex vitae debitis facere in, provident reprehenderit placeat doloribus expedita, quod commodi doloremque.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 border-0 shadow-sm mb-5 rounded">
                    <img src="images/img4.jpg" class="card-img-top m-auto mt-3" alt="..." style="border-radius:50%;width:35%;height:35%;">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. In qui voluptates quaerat autem eaque perferendis soluta voluptas, harum ipsam, eos, commodi laborum mollitia vitae? Harum, consectetur repellat.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr/>
    <section id="faqs">
        <div class="container">
            <div class="container col-xxl-10 ">
                <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                    <div class="col-lg-6">
                        <h1 class="display-5 fw-bold lh-1 mb-3 text-center"><span style="color: #ff6537ff;">FAQ</span>s</h1>
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    What is Lorem Ipsum ?
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nam, quaerat enim eos ea iusto voluptates adipisci aliquam pariatur possimus dicta nobis! Tenetur voluptates ut doloribus nam minus! Natus, debitis eum alias ab ratione aut consectetur quis mollitia ut ipsam vero nulla! Totam error dolor nesciunt eius adipisci, magnam illum eveniet?
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    What is Lorem Ipsum ?
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nam, quaerat enim eos ea iusto voluptates adipisci aliquam pariatur possimus dicta nobis! Tenetur voluptates ut doloribus nam minus! Natus, debitis eum alias ab ratione aut consectetur quis mollitia ut ipsam vero nulla! Totam error dolor nesciunt eius adipisci, magnam illum eveniet?
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    What is Lorem Ipsum ?
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nam, quaerat enim eos ea iusto voluptates adipisci aliquam pariatur possimus dicta nobis! Tenetur voluptates ut doloribus nam minus! Natus, debitis eum alias ab ratione aut consectetur quis mollitia ut ipsam vero nulla! Totam error dolor nesciunt eius adipisci, magnam illum eveniet?
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    What is Lorem Ipsum ?
                                </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nam, quaerat enim eos ea iusto voluptates adipisci aliquam pariatur possimus dicta nobis! Tenetur voluptates ut doloribus nam minus! Natus, debitis eum alias ab ratione aut consectetur quis mollitia ut ipsam vero nulla! Totam error dolor nesciunt eius adipisci, magnam illum eveniet?
                                </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    What is Lorem Ipsum ?
                                </button>
                                </h2>
                                <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nam, quaerat enim eos ea iusto voluptates adipisci aliquam pariatur possimus dicta nobis! Tenetur voluptates ut doloribus nam minus! Natus, debitis eum alias ab ratione aut consectetur quis mollitia ut ipsam vero nulla! Totam error dolor nesciunt eius adipisci, magnam illum eveniet?
                                </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                    What is Lorem Ipsum ?
                                </button>
                                </h2>
                                <div id="collapseSix" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nam, quaerat enim eos ea iusto voluptates adipisci aliquam pariatur possimus dicta nobis! Tenetur voluptates ut doloribus nam minus! Natus, debitis eum alias ab ratione aut consectetur quis mollitia ut ipsam vero nulla! Totam error dolor nesciunt eius adipisci, magnam illum eveniet?
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-10 col-sm-8 col-lg-6">
                        <img src="images/FAQs.gif" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr/>
    <!-- about us section -->
    <section id="about-us">
        <div class="container col-xxl-8 px-4 py-5">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="images/About.gif" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy" />
                </div>
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold lh-1 mb-3" ><span style="color: #ff6537ff;">About </span>Us</h1>
                    <p class="lead">Heritage's hotel search allows users to compare hotel prices in just a few clicks from hundreds of booking sites for more than 5.0 million hotels and other types of accommodation in over 190 countries. We help millions of travelers each year compare deals for hotels and accommodations. Get information for weekend trips to cities like Mumbai or Bengaluru and you can find the right hotel on trivago quickly and easily. Delhi and its surrounding area are great for trips that are a week or longer with the numerous hotels available.</p>
                </div>
            </div>
        </div>
    </section>
    <hr />
    
    <?php 
       
        $isSuccess = false;
        if($_SERVER['REQUEST_METHOD'] == "POST") {
            include 'partials/dbconnect.php';
            $name = $_POST["name"];
            $email = $_POST["email"];
            $pnumber = $_POST["pnumber"];
            $concern = $_POST["concern"];
            
            $isEmpty = false;
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
    ?>

    <!-- contact us section -->
    <section id="contact">
    <div class="container text-center mt-5">
        <div class="row text-center">
            <div class="col-md-6 d-flex align-items-center justify-content-center">
                <img class="img-fluid" src="images/contact.gif" alt="" width="400" />
            </div>
            <div class="col-md-6">
                <h1 class="display-6 fw-bold lh-1 mb-5">We'd <span style="color: #ff6537ff;">love to hear </span>from you!</h1>
                <form class="w-auto m-auto" action="/HotelBookingSystem/index.php" method="POST">
                    <div class="form-floating mb-3">
                        <input type="name" class="form-control" id="name" name="name" placeholder="Enter your Name" required />
                        <label for="name">Enter your Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" name="email" placeholder="email@example.com" required />
                        <label for="email">Enter your Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="tel" class="form-control" id="pnumber" name="pnumber" placeholder="Enter your Phone Number" required />
                        <label for="pnumber">Enter your Phone Number</label>
                    </div>
                    <div class="form-floating">
                    <textarea class="form-control" placeholder="Elaborate your Concern here" name="concern" id="floatingTextarea2" required="" style="height: 100px;"></textarea>
                    <label for="concern">Elaborate your Concern</label>
                    </div>
                    <div class="row-md-3 mt-5">
                        <!-- Button trigger modal -->
                        <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#exampleModal" id="submitContactForm" style="background-color:#ff6537ff; border:none;">Submit</button>
                    </div>  
                </form>
            </div>
            
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Message</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?php 
                            if($isSuccess) {
                                echo 
                                    '<div class="alert alert-success fade show" role="alert">
                                        <strong>Success!</strong> Your form has been submitted successfully.</button>
                                    </div>';
                            }
                            else {
                                echo 
                                    '<div class="alert alert-danger fade show" role="alert">
                                        <strong>Error!</strong> We are facing some technical issues and your form was not submitted successfully. We regret for the inconvinience caused to you.</button>
                                    </div>';
                            }
                        ?>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" style="background-color: #ff6537ff; border:none;" data-bs-dismiss="modal">Ok</button>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- footer -->
    <div class="container">
        <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 py-5 my-5 border-top">
            <div class="col mb-3">
                <a href="/" class="d-flex align-items-center mb-3 link-body-emphasis text-decoration-none">
                    <img src="images/logo.png" alt="" width="40" height="40" /> 
                    <h4 class="mt-2">Heritage</h4>
                </a>
                <p class="text-body-secondary">Heritage © 2023-2024</p>
                <p class="text-body-secondary mb-5">All rights reserved.</p>
            </div>

            <div class="col mb-3">

            </div>

            <div class="col mb-3">
                <h5>Section</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
                </ul>
            </div>

            <div class="col mb-3">
                <h5>Section</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
                </ul>
            </div>

            <div class="col mb-3">
                <h5>Section</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
                    <li class="nav-item mb-2"><a href="logout.php" class="nav-link p-0 text-body-secondary">Logout</a></li>
                </ul>
            </div>
        </footer>
    </div>

    <div class="cookie-banner fixed-bottom bg-black text-white text-center p-2">
        This website uses cookies to ensure you get the best experience on our website. &nbsp;
        <button class="btn btn-primary btn-sm accept-cookies data-dismiss="alert"">Got it</button>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>