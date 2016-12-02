<?php

 $db = mysqli_connect('localhost','root','','myshop');

               function getPro(){
                        global $db;     
     
                              $get_products = "select * from products order by rand() LIMIT 0,6";
                              $run_products  = mysqli_query($db, $get_products);
                              
                              while($row_products = mysqli_fetch_array($run_products)){
                                    $pro_id = $row_products['product_id'];
                                    $pro_title = $row_products['product_title'];
                                    $pro_cat = $row_products['cat_id'];
                                    $pro_brand = $row_products['brand_id'];
                                    $pro_desc = $row_products['product_desc'];
                                    $pro_price = $row_products['product_price'];
                                    $pro_image = $row_products['product_img1'];
                                  
                             echo"
                             <div id='product-main-box' > 
                                <div class='col-md-4' id='product-box' >
                                  <h3 id='product-title' >$pro_title</h3>
                                  
                                  <img src='admin_area/product_images/$pro_image' id='product-img' /><br>
                                  <p id='product_price'><b>Price $ $pro_price</b> </p>
                                  <a href='details.php?pro_id=$pro_id'><button class='btn btn-primary'>Details</button></a> 
                                  <a href='index.php?add_cart=$pro_id'><button class='btn btn-primary' style='float:right;'>Add to Cart</button></a> 
                                </div>
                             </div>  
                                ";
                              }
                }



             function getBrands(){
                        global $con;
                           $get_brands ="select * from brands ";
                           $run_brands =mysqli_query($con,$get_brands);
         
                             while($row = mysqli_fetch_array($run_brands)){
                                 $brand_id = $row['brand_id'];
                                 $brand_title = $row['brand_title'];
            
                              echo "<li role='presentation'><a href='#'>$brand_title</a></li>";
                            } 
                   }


           function getCats(){
                           global $con;
                           $get_cats ="select * from categories ";
                           $run_cats =mysqli_query($con,$get_cats);
         
                             while($row = mysqli_fetch_array($run_cats)){
                                 $cat_id = $row['cat_id'];
                                 $cat_title = $row['cat_title'];
            
                              echo "<li role='presentation'><a href='#'>$cat_title</a></li>";
                            }
             }
?>