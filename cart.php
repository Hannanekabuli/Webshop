<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Camera Webshop | Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/product.css">
    <link rel="stylesheet" href="assets/css/startpage.css">
    <!--    <script defer type="module" src="assets/js/index.js"></script>-->
</head>
<body>
<header>
<div class="header">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" style="color:rgb(20, 29, 155); margin-left:30px" href="index.php" >ReflexMania</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav" style="padding-right:0px; padding-left: 650px;">
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
                                    echo '<a class="nav-link" href="customer/login.php"  style="font-size: 1rem; color: black;"> Logout <i class="bi bi-person"></i></a>';
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
                                <a class="nav-link" href="checkout.php"  style="font-size: 1rem; color: black;"> Checkout <i class="bi bi-person"></i></a>
                            </li> -->
                        </ul>
            </nav>
        </div>
    </div>
</header>
<div class="container mt-5 mb-5">
    <!--Page Content-->
    <table class="table table-striped">
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Action</th>
        </thead>
        <tbody id="cart_table">

        </tbody>
    </table>
    <br>
    <a class="btn btn-success badge-pill" href="checkout.php">Checkout</a>

    <!--./Page Content-->





</div>


<script src="assets/js/main.js"></script>
<script src="assets/js/cart.js"></script>
<script src="assets/js/checkout.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
<script>
    async function logout() {
        const action = "logout";
        let status = await makeRequest(`api/receiver/customerReceiver.php?action=${action}`, "GET")
        if (status){
            window.location.href = "login.php";
        } else {
            Swal.fire({
                title: 'Error!',
                text: `Something's Wrong!`,
                icon: 'error',
                confirmButtonText: 'OK'
            })
        }
    }
</script>
<script>
    console.log(getCart())
</script>
</body>
</html>