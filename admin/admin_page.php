<?php
include 'config.php';
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
     if(isset($_GET['delete'])){
        $delete_id=$_GET['delete'];
        $sql="DELETE FROM 'book' WHERE id=$delete_id";
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
        $update_p_image_folder='../Images/'.$update_p_image;

        $sql="UPDATE book SET name ='$$update_p_name', price ='$$update_p_price', image ='$$update_p_image' WHERE id = '$update_p_id'";
        $update_query=mysqli_query($con, $sql);
        if($update_query){
            move_uploaded_file($update_p_image_tmp_name, $update_p_image_folder);
            $message[]='Product Updated';
            header('location:admin_page.php');
        }else{
            $message[]='Product Update Unsuccessful';
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
        <section class="display-product-table">
            <table>
                <thead>
                    <th>book image</th>
                    <th>book name</th>
                    <th>book price</th>
                    <th>action</th>
                </thead>
                <tbody>
                    <?php
                    $sql="SELECT * FROM book";
                      $select_products=mysqli_query($con,$sql);
                      if(mysqli_num_rows($select_products)>0){
                        while($row=mysqli_fetch_assoc($select_products)){                    
                    ?>
                    <tr>
                        <td><img src="../Images/<?php echo $row['image']; ?>" height="100" alt=""></td>
                        <td><?php echo $row['name']; ?></td>
                        <td>Rs.<?php echo $row['price']; ?>/-</td>
                        <td>
                            <a href="admin_page.php?delete=<?php echo $row['id'];?>" class="delete-btn" onclick="return confirm('are you sure you want to delete this ?');"><i class="fas fa-trash"></i> Delete</a><br/>
                            <a href="admin_page.php?edit=<?php echo $row['id'];?>" class="option-btn"><i class="fas fa-edit"></i> Update</a>
                        </td>   
                    </tr>

                    <?php
                        };
                    }else{
                        echo "<div class='empty'>No Product Added</div>";
                    }
                    ?>
                </tbody>    
           </table>
        </section>

        <section class="edit-form-container">
            <?php
            if(isset($_GET['edit'])){
            $edit_id = $_GET['edit'];
            $sql="SELECT * FROM book WHERE id= $edit_id";
            $edit_query=mysqli_query($con,$sql);
            if(mysqli_num_rows($edit_query)>0){
                while($fetch_edit = mysqli_fetch_assoc($edit_query)){
            ?>
            <form action="" method="post" enctype="multipart/form-data">
                <img src="../Images/<?php echo $fetch_edit['image']; ?>" height="200" alt="">
                <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['id']; ?>">
                <input type="text" class="box" required name="update_p_name" value="<?php echo $fetch_edit['name']; ?>">
                <input type="number" min="0" class="box" required name="update_p_price" value="<?php echo $fetch_edit['price']; ?>">
                <input type="file" class="box" required name="update_p_image" accept="image/png, image/jpeg, image/jpg">
                <input type="submit" value="update" name="update_product" class="btn">
                <input type="reset" value="cancel" id="close-edit" class="option-btn">
                </form>
            <?php
                };
            };

            echo "<script>document.querySelector('.edit-form-container').style.display='none';</script>";
        };
            ?>
        </section>   

    </div>
    </body>
</html>

<script src="../js/script.js"></script>