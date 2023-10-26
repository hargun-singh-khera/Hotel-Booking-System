<?php
    include '../partials/dbconnect.php';
    if(isset($_POST["submit"])) {
        $file_name = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $folder = '../Image/' .$file_name; 

        $sql = "INSERT INTO Images(Image) VALUES('$file_name')";
        $result = mysqli_query($conn, $sql);

        if(move_uploaded_file($tmp_name, $folder)) {
            echo "<h2> File uploaded successfully</h2>";
        }
        else {
            echo "<h2> File was not uploaded successfully</h2>";
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
    <form action="dummy_img_upload.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="formFile" class="form-label">Default file input example</label>
            <input class="form-control" type="file" id="image" name="image">
            <button class="btn btn-primary" id="submit" name="submit">Submit</button>
        </div>
    </form>
    <div>
        <?php
            $sql = "SELECT * FROM Images";
            $result = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($result);
            if($num) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo '<img src="../Image/' .$row["Image"] .'"/>';
                }
            }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>