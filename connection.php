<?php
$conn = new mysqli("172.31.22.43", "Mishantkumar200555960", "RLdXP0HgXL", "Mishantkumar200555960
");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Connected successfully";
}

if (isset($_POST["submit"])) {
    $size = $_POST["pizzaSize"];
    $sauce = $_POST["pizzaname"];
    $dip = $_POST["dip"];
    $name = $_POST["name"];
    $number = $_POST["Phone_number"];
    $gmail = $_POST["g-mail"];

    // Make sure the TOPPING field exists in your HTML form
    $toppings = isset($_POST["TOPPING"]) ? $_POST["TOPPING"] : [];
    $topping = implode(",", $toppings);

    $query = "INSERT INTO pizza_the_store VALUES ('$size', '$topping', '$sauce', '$dip', '$name', '$number', '$gmail')";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data successfully inserted');</script>";
        echo "<h4>Size: $size</h4>";
        echo "<h4>Sauce: $sauce</h4>";
        echo "<h4>Dip: $dip</h4>";
        echo "<h4>Toppings: $topping</h4>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>