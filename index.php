<?php
   include("includes/db.php");
   include("functions/functions.php");
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
                                getCats();
                                           
                          ?>  
                             
                         </ul>
                         
                         <ul class="nav nav-pills nav-stacked">
                             <li role="presentation" class="active"><a href="#">Brands</a></li>
                             <?php
             
                                   getBrands();                            
                          ?>  
                                                 
                         </ul>
                     </div>
                     <div class="col-md-9">
                         <div id="headline">
                             <span><h4>WELCOME GUEST! <b>shoping Cart </b> - Items: - Price:</h4> </span>
                         </div>
                         <div id="products-box">
                           <?php
                           getPro();
                           getCatPro();
                           getBrandPro();
                           ?>
                         </div>
                     </div>
                 </div>
                 
             </div>
        </div>
    </div>
</body>
</html>