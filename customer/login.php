<?php
if (isset($_COOKIE['Customer-Login'])){
    header('location:../category.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Camera Webshop | Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >-->
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
        <div class="menu-bar">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid" style="background-color: rgb(200, 196, 201); height: 90px; margin-top: -10px;">
                    <a href="index.php">
                        <h3 class="float-md-start mb-0">ReflexMania</h3>
                    </a>
                    <ul class="navbar-nav justify-content-end">
                        <ul class="navbar-nav justify-content-end" >
                            <li class="nav-item">
                                <?php
                                if (isset($_COOKIE['Customer-Login'])){
                                    echo '<button class="btn btn-link" onclick="logout()"  style="font-size: 1rem; color: black;"> Logout <i class="bi bi-person"></i></button>';
                                } else {
                                    echo '<a class="nav-link" href="../customer/login.php"  style="font-size: 1rem; color: black;"> Login <i class="bi bi-person"></i></a>';
                                }
                                ?>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../aboutus.html"  style="font-size: 1rem; color: black;">About us<i class="bi bi-question-circle"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../cart.php"  style="font-size: 1rem; color: black;">
                                    Cart
                                    <i class="bi bi-cart"></i>
                                    <span id="cartCount" class="badge rounded-pill bg-danger"></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../checkout.php"  style="font-size: 1rem; color: black;"> Checkout <i class="bi bi-person"></i></a>
                            </li>

                        </ul>
            </nav>
        </div>
    </div>
</header>




<div class="w-50 mx-auto border p-2 rounded mt-5">
    <h4 class="font-weight-bold mt-2 mb-2">Customer Login</h4>

    <form id="login_form">
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
        </div>

    </form>
    <br>
    <button type="submit" class="btn btn-primary" onclick="checkLogin()">Login</button>
    <a href="register.php" class="btn btn-outline-primary">Register</a>

</div>
<script src="../assets/js/main.js"></script>

<script>
    async function checkLogin() {
        var body = new FormData()
        body.append("action", "login")
        body.append("email", document.getElementById('email').value)
        body.append("password", document.getElementById('password').value)
        if (checkForm('login_form')){
            let status = await makeRequest(`../api/receiver/customerReceiver.php`, "POST", body)
            if (status){
                window.location.href = "../category.php";
            } else {
                alert('Email or Password is invalid!');
            }
        }

    }
</script>

</body>
</html>
