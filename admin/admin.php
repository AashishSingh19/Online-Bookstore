<?php 
$con=mysqli_connect("localhost","root","","bookstoredb") or die('Connection Failed');
?>
<?php
if(isset($_POST['add_product'])){
    
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_image = $_FILES['product_image']['name'];
        $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
        $product_image_folder = '../Images/'.$product_image;

        if(empty($product_name) || empty($product_price) || empty($product_image)){
            $message[]='Please fill out all';
        }else{
            $insert ="INSERT INTO book(name, price, image) VALUES('$product_name','$product_price','$product_image')";
            $upload=mysqli_query($con, $insert);
            if($upload){
                move_uploaded_file($product_image_tmp_name, $product_image_folder);
                $message[]='New Book Added.';
            }else{
                $message[]='Failed to add book.';
            };
        };
};

if(isset($_GET['delete'])){
    $delete_id=$_GET['delete'];
    $sql="DELETE FROM book WHERE id=$delete_id";
    echo $delete_id;
    $delete_query = mysqli_query($con, "DELETE FROM book WHERE id = $delete_id");
    if($delete_query){
        header('location:admin_page.php');
        $message[]='Product Deleted';
    }else{
        // header('location:admin_page.php');
        $message[]='Product Could Not Be Deleted';
    };
 };

 if(isset($_POST['update_product'])){
    $update_p_id = $_POST['update_p_id'];
    $update_p_name = $_POST['update_p_name'];
    $update_p_price = $_POST['update_p_price'];
    $update_p_image = $_FILES['update_p_image'];
    $update_p_image_tmp_name=$_FILES['update_p_image']['tmp_name'];
    $update_p_image_folder='../Imagaes/'.$update_p_image;

    $sql="UPDATE book SET name ='$$update_p_name', price ='$$update_p_price', image ='$$update_p_image' WHERE id = '$update_p_id'";
    $update_query=mysqli_query($con, $sql);
    if($update_query){
        move_uploaded_file($update_p_image_tmp_name, $update_p_image_folder);
        $message[]='Product Updated';
        header('location:admin_page.php');
    }else{
        $message[]='Product Update Unsuccessful';
    }
 }

?>

<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="adminstyle.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    </head>
    <body>
        
    <?php
     if(isset($message)){
        foreach($message as $message){
            echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.dislay="none";"></i></div>';
        };
     };

?>

<div class="container">
        <div class="admin-product-form-container">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                <h3>Add A New Book</h3>
                    <input type="text" placeholder="Enter Book Name" name="product_name" class="box"></input>
                    <input type="number" placeholder="Enter Book Price" name="product_price" class="box"></input>
                    <input type="file"  accept="image/png, image/jpeg, image/jpg" name="product_image" class="box"></input>
                    <input type="submit" class="btn" name="add_product" value="Add A Book"></input>
            </form>
        </div>
        
            <?php
            echo "<script>document.querySelector('.edit-form-container').style.display='none';</script>";
       
            ?>
        </section>   

    </div>
    </body>
</html>

<script src="../js/script.js"></script>