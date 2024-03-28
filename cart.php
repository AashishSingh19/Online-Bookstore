<?php
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>

<!-- font awesome cdn link  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<!-- custom css file link  -->
<link rel="stylesheet" href="css/style.css">

<!-- khalti static file -->
<script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>
</head>
<body>

<?php include 'header.php'?>
<div class="container">
    <section class="shopping-cart">
        <br><br>
        <br><br>
        <br><br>
        <h1 class="heading">Shopping Cart</h1>
        <table>
            <thead>
                <th>image</th>
                <th>name</th>
                <th>price</th>
                <th>total price</th>
                <th>action</th>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM cart";
                $select_cart = mysqli_query($con,$sql);
                $grand_total = 0;

                if (mysqli_num_rows($select_cart) > 0) {
                    while ($fetch_cart = mysqli_fetch_assoc($select_cart)){
                        ?>
                        <tr>
                        <td><img src="Images/<?php echo $fetch_cart['image']; ?>" height="100" alt=""></td>
                            <td><?php echo $fetch_cart['name']; ?></td>
                            <td>Rs.<?php echo number_format($fetch_cart['price']); ?>/-</td>
                            <td>Rs.<?php echo $sub_total = number_format($fetch_cart['price']); ?>/-</td>
                            <td><a href="cart.php?remove=<?php echo $fetch_cart['id']; ?>"  class="delete-btn" onclick="return confirm('Remove item from cart ?')"><i class="fas fa-trash"></i>Remove</a>
                            <button id="payment-button" class='option-btn'>Pay with Khalti</button>
                            </td>
                        </tr>
                        <?php
                        $grand_total += $sub_total;
                    }
                };
                ?>
            </tbody>
        </table>   
    </section>   
</div>


<script src="js/script.js"></script>
<script>
        var config = {
            // replace the publicKey with yours
            "publicKey": "test_public_key_dc74e0fd57cb46cd93832aee0a390234",
            "productIdentity": "1234567890",
            "productName": "Dragon",
            "productUrl": "http://gameofthrones.wikia.com/wiki/Dragons",
            "paymentPreference": [
                "KHALTI",
                "EBANKING",
                "MOBILE_BANKING",
                "CONNECT_IPS",
                "SCT",
                ],
            "eventHandler": {
                onSuccess (payload) {
                    // hit merchant api for initiating verfication
                    console.log(payload);
                },
                onError (error) {
                    console.log(error);
                },
                onClose () {
                    console.log('widget is closing');
                }
            }
        };

        var checkout = new KhaltiCheckout(config);
        var btn = document.getElementById("payment-button");
        btn.onclick = function () {
            // minimum transaction amount must be 10, i.e 1000 in paisa.
            checkout.show({amount: 1000});
        }
    </script>
</body>
</html>
