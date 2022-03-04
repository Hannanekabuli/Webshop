<?php 

require_once "api/controller/productController.php";

$controll = new ProductController();

$category_products = $controll->category_products();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Camera Webshop | Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

   <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css
">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
    
    <link rel="stylesheet" href="assets/css/product.css">
    <link rel="stylesheet" href="assets/css/startpage.css">

<!--    <script defer type="module" src="assets/js/index.js"></script>-->
</head>
<body>
<header>
<div class="header">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" style="color:rgb(20, 29, 155);" href="index.php" >ReflexMania</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav" style="padding-right:20px">
      <ul class="nav navbar-nav ml-auto"> 
<!--                        <li class="nav-item">-->
<!--                            <div class="dropdown">-->
<!--                                <button class="btn btn-white dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"  style="font-size: 1rem; color: black;">-->
<!--                                    Category-->
<!--                                </button>-->
<!--                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">-->
<!--                                    <li><a class="dropdown-item" href="#">Action Camera</a></li>-->
<!--                                    <li><a class="dropdown-item" href="#">Analog Camera</a></li>-->
<!--                                    <li><a class="dropdown-item" href="#">Compact Camera</a></li>-->
<!--                                    <li><a class="dropdown-item" href="#">System Camera</a></li>-->
<!--                                </ul>-->
<!--                            </div>-->
<!--                        </li>-->

                        
                            <li class="nav-item">
                                <?php
                                if (isset($_COOKIE['Customer-Login'])){
                                    echo '<button class="btn btn-link" onclick="logout()"  style="font-size: 1rem; color: black;"> Logout <i class="bi bi-person"></i></button>';
                                } else {
                                    echo '<a class="nav-link" href="customer/login.php"  style="font-size: 1rem; color: black;"> Login <i class="bi bi-person"></i></a>';
                                }
                                ?>
                            </li>
                           <li class="nav-item">
                                <a class="nav-link" href="aboutus.html"  style="font-size: 1rem; color: black;">About us<i class="bi bi-question-circle"></i></a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="checkout.php"  style="font-size: 1rem; color: black;"> Checkout <i class="bi bi-person"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="cart.php"  style="font-size: 1rem; color: black;">
                                    Cart
                                    <i class="bi bi-cart"></i>
                                    <span id="cartCount" class="badge rounded-pill bg-danger"></span>
                                </a>
                            </li>
<!--                             <li class="nav-item">
                            <a class="nav-link" > 
                                <i class="bi bi-cart"></i>
                                <span id="cartCount" class="badge rounded-pill bg-danger"></span></a>
                            </li> -->
                        </ul>
            </nav>
        </div>
    </div>
</header>

<section id="container">
    <?php foreach ($category_products as $category) : ?>

        <div class="row">
            <div class="mt-4 heading ">
                <h4><?php echo $category['name']?></h4>
            </div>
            <?php foreach ($category['products'] as $product) : ?>
                <?php if ($product['quantity'] > 0): ?>
                    <div class="col" id="actionCameraContainer<?php echo $product['ID']?>">
                        <div class="card" style="width: 35rem;">
                            <div class="imgContainer">
                                <img class="card-img-top" src="storage/<?php echo $product['image']?>" alt="Card image cap">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $product['name']?></h5>
                                <p class="card-text">
                                    <?php echo $product['description']?>
                                </p>
                                <button class="btn btn-primary" onclick="addToCart(<?php echo $product['ID']?>)">Add to cart</button>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>


</section>
<script src="assets/js/main.js"></script>
<script src="assets/js/cart.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>