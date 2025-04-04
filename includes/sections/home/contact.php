<!-- contact us section -->
<section id="contact">
    <div class="container text-center mt-5">
        <div class="row text-center">
            <div class="col-md-6 d-flex align-items-center justify-content-center">
                <img class="img-fluid" src="images/contact.gif" alt="" width="400" />
            </div>
            <div class="col-md-6">
                <h1 class="display-6 fw-bold lh-1 mb-5">We'd <span style="color: #ff6537ff;">love to hear </span>from you!</h1>
                <form class="w-auto m-auto" action="./index.php" method="POST">
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
                    <textarea class="form-control" placeholder="Elaborate your Concern here" name="concern" id="floatingTextarea2" style="height: 100px;" required ></textarea>
                    <label for="concern">Elaborate your Concern</label>
                    </div>
                    <div class="row-md-3 mt-5">
                        <!-- Button trigger modal -->
                        <button class="btn btn-primary w-100"  id="submit" name="submit" style="background-color:#ff6537ff; border:none;">Submit</button>
                    </div>  
                </form>
            </div>
            
        </div>
    </div>
</section>

<?php 
    if($isSuccess) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your form has been submitted successfully.</button>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php }
        if($showWarning) { ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Warning!</strong> ' .$showWarning .'</button>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
    <?php }
        else {
            if($show && !$isSuccess) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> We are facing some technical issues and your form was not submitted successfully. We regret for the inconvinience caused to you.</button>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
        <?php }
    }
?>