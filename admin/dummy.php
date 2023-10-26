<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["dropdown"])) {
        $selectedValue = $_POST["dropdown"];

        // Now, $selectedValue contains the selected value from the dropdown
        // You can use this value in your PHP script as needed.
        echo "You selected: " . $selectedValue;
    } else {
        echo "Dropdown value not set.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- <form id="myForm" method="post" action="dummy.php">
        <form id="myForm" method="post" action="dummy.php">
            <select id="myDropdown" name="dropdown">
                <?php
                    if($selectedValue) {
                        echo '<option selected value="' . $selectedValue . '">' .$selectedValue .'</option>';
                    }
                    else {
                        echo '<option selected>Choose</option>';
                    }
                ?>
                
                <option value="option1">Option 1</option>
                <option value="option2">Option 2</option>
                <option value="option3">Option 3</option>
            </select>
        </form>
        <script>
            document.getElementById("myDropdown").addEventListener("change", function() {
                
                document.getElementById("myForm").submit();
            });

        </script>
    </form> -->
    <form id="myForm" action="dummy.php" method="POST">
    <form id="myForm" method="POST" action="dummy.php">
        <select id="myDropdown" name="dropdown">
            <?php
                if($selectedValue) {
                    echo '<option selected value="' . $selectedValue . '">' .$selectedValue .'</option>';
                }
                else {
                    echo '<option selected>Choose</option>';
                }
            ?>
            
            <option value="option1">Option 1</option>
            <option value="option2">Option 2</option>
            <option value="option3">Option 3</option>
        </select>
    </form>
    <script>
        document.getElementById("myDropdown").addEventListener("change", function() {
            alert("Hello!");
            document.getElementById("myForm").submit();
            alert("Submitted!");
        })
    </script>
</form>
</body>
</html>