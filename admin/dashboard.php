<?php
if (!isset($_COOKIE['Admin-Login'])){
    header('location:login.php');
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Camera Webshop | Admin | Login</title>
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
</head>
<body>
<header>
    <div class="header">
     <nav class="navbar navbar-expand-lg navbar-light bg-light">   
     <a class="navbar-brand" style="color:rgb(20, 29, 155);" href="../index.php" >ReflexMania</a>
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav" style="padding-right:20px">
               <ul class="nav navbar-nav ml-auto"> 
                            <li class="nav-item">
                                <?php
                                if (isset($_COOKIE['Admin-Login'])){
                                    echo '<button class="nav-link" onclick="logout()"  style="font-size: 1rem; color: black;"> Admin Logout </button>';
                                }  else {
                                    echo '<a class="nav-link" href="login.php"  style="font-size: 1rem; color: black;"> Admin Login </a>';
                                } 
                                ?>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="../"  style="font-size: 1rem; color: black;">
                                    Back To Home
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./products.php"  style="font-size: 1rem; color: black;">
                                   Products
                                </a>
                            </li>

                            <li class="nav-item">
                                    <a class="nav-link" href="orders.php"  style="font-size: 1rem; color: black;">
                                        Orders
                                    </a>
                            </li>

                            <li class="nav-item">
                                    <a class="nav-link" href="users.php"  style="font-size: 1rem; color: black;">
                                        Users
                                     </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="newsletter.php"  style="font-size: 1rem; color: black;">
                                    Newsletter
                                </a>
                            </li>
                  
                        </ul>
                </div>
            </nav>
    </div>
</header>




<h1 style="font-size:3rem; text-align:center; margin-top:100px; "> Welcome to admin page </h1>
<script src="../assets/js/main.js"></script>

<script>
    async function logout() {
        const action = "logout";
        let status = await makeRequest(`../api/receiver/adminReceiver.php?action=${action}`, "GET")
        if (status){
            window.location.href = "./login.php";
        } else {
            Swal.fire({
                title: 'Error!',
                text: `Something's Wrong!`,
                icon: 'error',
                confirmButtonText: 'OK'
            })
        }
    }
    
/*     async function checkLogin() {
        var body = new FormData()
        body.append("action", "login")
        body.append("email", document.getElementById('email').value)
        body.append("password", document.getElementById('password').value)
        if (checkForm('login_form')){
            let status = await makeRequest(`../api/receiver/adminReceiver.php`, "POST", body)
            if (status){
                window.location.href = "./dashboard.php";
            } else {
                alert('Email or Password is invalid!');
            }
        }

    } */
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
