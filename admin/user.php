<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
                    $sql="SELECT * FROM user";
                      $select_users=mysqli_query($con,$sql);
                      if(mysqli_num_rows($select_users)>0){
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
</body>
</html>