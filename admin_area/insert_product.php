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
            <form action="insert_product.php" method="post" id="insert_data" enctype="multipart/form-data">
            
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
                <label for="keyword">Product Keywords <br><input type="text" name="product_keyword" id="keyword" class="input_fields"></label>
                <input type="submit" name="insert_product" value="Insert product">
            </form>
        </div>
    </div>
</body>
</html>
<?php
   if(isset($_POST['insert_product'])){
     // data get from user
     
       $product_title = $_POST['product_title'];
       $product_cat = $_POST['product_cat'];
       $product_brand = $_POST['product_brand'];
       $product_price = $_POST['product_price'];
       $product_desc = $_POST['product_desc'];
       $status = 'on';
       $product_keywords = $_POST['product_keyword'];
    //image  get form user
       $product_img1 = $_FILES['product_img1']['name'];
       $product_img2 = $_FILES['product_img2']['name'];
       $product_img3 = $_FILES['product_img3']['name'];
   
  //Image temp Name
        $temp_name1 = $_FILES['product_img1']['tmp_name'];
        $temp_name2 = $_FILES['product_img2']['tmp_name'];
        $temp_name3 = $_FILES['product_img3']['tmp_name'];
           
         if($product_title == ' ' ){
            echo"<script>alert('Please Fill All fields');</script>"; 
            exit();         
         }else{
             global $con;
             //uploading images to its folder
             move_uploaded_file($temp_name1,"product_images/$product_img1");
             move_uploaded_file($temp_name2,"product_images/$product_img2");
             move_uploaded_file($temp_name3,"product_images/$product_img3");
             
             $insert_product =   " insert into products (cat_id,brand_id,date,product_title,product_img1,product_img2,product_img3,product_price,product_desc,status) values ('$product_cat','$product_brand',NOW(),'$product_title','$product_img1','$product_img2','$product_img3','$product_price','$product_desc','$status')"; 
             $run_product = mysqli_query($con , $insert_product);   
             if($run_product){
                 echo"<script>alert('Product Inserted Successfully!');</script>";
             }  
         }
        
   
   
   }
   
?>