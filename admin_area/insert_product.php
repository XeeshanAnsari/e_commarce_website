<?php
   include("includes\db.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Insert</title>
    <link rel="stylesheet" href="../styles/bootstrap.min.css">
    <link rel="stylesheet" href="./styles/style.css">
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
</head>
<body>
    <div>
        <div class="container" id="centerContainer">
            <form action="" id="insert_data">
            
                <label for="title">Product Title <br><input type="text" name="product_title" id="title" class="input_fields"></label>
                <label for="cate"> Product  Categories <br>
                    <Select id="cate" name="product_cat" class="input_fields">
                        <option >Select A Categories</option>
                        <?php
                           global $con;
                           $get_cats ="select * from categories ";
                           $run_cats =mysqli_query($con,$get_cats);
         
                             while($row = mysqli_fetch_array($run_cats)){
                                 $cat_id = $row['cat_id'];
                                 $cat_title = $row['cat_title'];
            
                              echo "<option value='$cat_id'>$cat_title</option>";
                            }                
                          ?>  
                    </Select>
                </label>
                <label for="brand"> Product  Brand <br>
                    <Select id="brand" name="product_brand" class="input_fields">
                        <option >Select A Brand</option>
                         <?php
           
                           global $con;
                           $get_brands ="select * from brands ";
                           $run_brands =mysqli_query($con,$get_brands);
         
                             while($row = mysqli_fetch_array($run_brands)){
                                 $brand_id = $row['brand_id'];
                                 $brand_title = $row['brand_title'];
            
                              echo "<option value='$brand_id'>$brand_title</option>";
                            }                
                          ?>  
                    </Select>
                </label>
                <label for="img1">Product Image 1<input type="file" name="product_img1" id="img1" class="input_fields"></label>
                <label for="img2">Product Image 2<input type="file" name="product_img2" id="img2" class="input_fields"></label>
                <label for="img3">Product Image 3<input type="file" name="product_img3" id="img3" class="input_fields"></label>
                <label for="price">Product Price <br><input type="text" name="product_price" id="price" class="input_fields"></label>
                <label for="desc">Product description <br><textarea name="product_desc" id="" cols="30" rows="10" class="input_fields"></textarea> </label>
                <label for="keyword">Product Keyword <br><input type="text" name="product_key" id="keyword" class="input_fields"></label>
            </form>
        </div>
    </div>
</body>
</html>