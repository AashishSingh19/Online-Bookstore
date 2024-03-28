<?php
$con=mysqli_connect("localhost","root","","bookstoredb") or die('Connection Failed');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the values from the form
    $itemName = $_POST['item_name'];
    $itemPrice = $_POST['item_price'];
    $itemImage = $_POST['item_image'];

    // Example: Add the values to a cart database table
    $con = mysqli_connect("localhost", "root", "", "bookstoredb") or die('Connection Failed');

    // Prepare the SQL statement
    $query = "INSERT INTO cart (name, price, image) VALUES ('$itemName', '$itemPrice', '$itemImage')";

    // Execute the query
    $result = mysqli_query($con, $query);

    // Check if the query was successful
    if ($result) {
        echo "Item added to cart!";
    } else {
        echo "Error adding item to cart: " . mysqli_error($con);
    }

    // Close the database connection
    mysqli_close($con);
}
?>
