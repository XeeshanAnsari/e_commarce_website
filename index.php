<?php
   include("includes/db.php");
?>
 <!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HOme</title>
   
    <link rel="stylesheet" href="./styles/bootstrap.min.css">
    
    <script src="./js/jquery.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div> 
        <div class="container">
            <div class="header">
                
            </div>
            <!--Naviigation-->
                <div class="navbar navbar-default ">
                   <div class="navbar-brand">
                       E-Commarce
                    </div>
                     
                    <div class="navbar-header navbar-centre">
                       <ul class=" nav navbar-nav ">
                          <li><a href="#">Home</a></li>
                          <li><a href="#">All Product</a></li>
                          <li><a href="#">My Account</a></li>
                          <li><a href="#">Sign Up</a></li>
                          <li><a href="#">Shopping Cart</a></li>
                           <li><a href="#">Contact Us</a></li> 
                        </ul>
                    </div>  
                    <div class="navbar-right">
                        <form method="post" action="result.php" class="navbar-form navbar-left" role="search">
                            <div class="form-group">
                                 <input type="text" class="form-control" name="user_query" placeholder="Search a Product">
                             </div>
                             <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                    </div>          
                  </div>
            <!--Naviigation-->
            
            
             <!--main Body-->
             
             <div class="">
                 <div class="row">
                     <div class="col-md-3" id="left-side">
                         
              
                         <ul class="nav nav-pills nav-stacked">
                             <li role="presentation" class="active"><a href="#">Categories</a></li>
                            
                          <?php
           
                           global $con;
                           $get_cats ="select * from categories ";
                           $run_cats =mysqli_query($con,$get_cats);
         
                             while($row = mysqli_fetch_array($run_cats)){
                                 $cat_id = $row['cat_id'];
                                 $cat_title = $row['cat_title'];
            
                              echo "<li role='presentation'><a href='#'>$cat_title</a></li>";
                            }                
                          ?>  
                             
                         </ul>
                         
                         <ul class="nav nav-pills nav-stacked">
                             <li role="presentation" class="active"><a href="#">Brands</a></li>
                             <?php
           
                           global $con;
                           $get_brands ="select * from brands ";
                           $run_brands =mysqli_query($con,$get_brands);
         
                             while($row = mysqli_fetch_array($run_brands)){
                                 $brand_id = $row['brand_id'];
                                 $brand_title = $row['brand_title'];
            
                              echo "<li role='presentation'><a href='#'>$brand_title</a></li>";
                            }                
                          ?>  
                                                 
                         </ul>
                     </div>
                     <div class="col-md-9">
                         <div id="headline">
                             <span><h4>WELCOME GUEST! <b>shoping Cart </b> - Items: - Price:</h4> </span>
                         </div>
                         <div id="products-box">
                             <?php
                             global $con;
                              $get_products = "select * from products order by rand() LIMIT 0,6";
                              $run_products  = mysqli_query($con, $get_products);
                              
                              while($row_products = mysqli_fetch_array($run_products)){
                                    $pro_id = $row_products['product_id'];
                                    $pro_title = $row_products['product_title'];
                                    $pro_cat = $row_products['cat_id'];
                                    $pro_brand = $row_products['brand_id'];
                                    $pro_desc = $row_products['product_desc'];
                                    $pro_price = $row_products['product_price'];
                                    $pro_image = $row_products['product_img1'];
                                  
                                echo"
                                <div class='col-md-4' id='product-box' >
                                  <h3 id='product-title' >$pro_title</h3>
                                  
                                  <img src='admin_area/product_images/$pro_image' id='product-img' /><br>
                                  <a href='details.php?pro_id=$pro_id'><button class='btn btn-primary'>Details</button></a> 
                                  <a href='index.php?add_cart=$pro_id'><button class='btn btn-primary' style='float:right;'>Add to Cart</button></a> 
                                </div>
                                ";
                              }
                             ?>

                         </div>
                     </div>
                 </div>
                 
             </div>
        </div>
    </div>
</body>
</html>