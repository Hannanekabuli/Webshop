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
        <div class="menu-bar">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid" style="background-color: rgb(200, 196, 201); height: 90px; margin-top: -10px;">
                    <h3 class="float-md-start mb-0">ReflexMania</h3>

                    <ul class="navbar-nav justify-content-end">
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

                        <ul class="navbar-nav justify-content-end" >
                            <li class="nav-item">
                                <a class="nav-link" href="login.php"  style="font-size: 1rem; color: black;"> Login <i class="bi bi-person"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../aboutus.html"  style="font-size: 1rem; color: black;">About us<i class="bi bi-question-circle"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../checkout.php"  style="font-size: 1rem; color: black;"> Checkout <i class="bi bi-person"></i></a>
                            </li>
                            <li>
                                <i class="bi bi-cart"></i>
                                <span id="cartCount" class="badge rounded-pill bg-danger"></span>
                            </li>
                        </ul>
            </nav>
        </div>
    </div>
</header>
<div class="w-50 mx-auto border p-2 rounded mt-5">
    <h4 class="font-weight-bold mt-2 mb-2">Customer Registration</h4>

    <form id="register_form">
        <div class="form-group">
            <label for="exampleInputEmail1">First Name</label>
            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name" required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name" required>
        </div>
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
    <button type="submit" class="btn btn-success" onclick="register()">Register</button>
    <br>
    <a href="login.php" class="btn btn-link text-primary">Back to Login Page</a>

</div>
<script src="../assets/js/main.js"></script>

<script>
    async function register() {
        var body = new FormData()
        body.append("action", "register")
        body.append("first_name", document.getElementById('first_name').value)
        body.append("last_name", document.getElementById('last_name').value)
        body.append("email", document.getElementById('email').value)
        body.append("password", document.getElementById('password').value)
        if (checkForm('register_form')){
            let status = await makeRequest(`../api/receiver/customerReceiver.php`, "POST", body)
            console.log(status);
            if (status === true){
                alert('Welcome to the ReflexMania Shop!');
                window.location.href = "../category.php";
            }
        }

        // let status = await makeRequest(`../api/receiver/customerReceiver.php`, "POST", body)
        // console.log(status);
        // if (status === true){
        //     alert('Welcome to the ReflexMania Shop!');
        //     window.location.href = "../category.php";
        // }
        // else{
        //     alert('Email or Password is invalid!');
        // }// else (status != true) {
           // alert('Looks like either your information incorrect. Wanna try again?');
           // window.location.href = "register.php";
       // }
    }
</script>
</body>
</html>
