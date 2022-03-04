<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ReflexMania | Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="http://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <link href="https://cdn.lineicons.com/3.0/lineicons.css" rel="stylesheet">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="../Ny mapp/samplehomepage.html">ReflexMnia</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="../Ny mapp/samplehomepage.html">Home <span class="sr-only"></span></a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Products
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Add</a>
                    <a class="dropdown-item" href="#">List</a>
                </div>
            </li>


        </ul>
        <?php if (isset($_COOKIE['Customer-Login'])): ?>
            <button class="btn btn-outline-danger my-2 my-sm-0" type="submit" onclick="logout()">Logout</button>
        <?php else: ?>
            <a href="../customer/login.php" class="btn btn-outline-success my-2 my-sm-0" type="submit" >Login</a>
        <?php endif; ?>

    </div>
</nav>
<div class="container"><div class="row align-items-center">
    <div class="col-12 col-md-6 p-3">
        <img src="https://m.media-amazon.com/images/I/61HRnUdvv6L._AC_SL1000_.jpg" class="w-75 d-block mx-auto">
    </div>
    <div class="col-12 col-md-6">
        <h1 id="product_name" class="font-weight-bold"></h1>
        <p id="product_description" class="text-muted"></p>
        <p id="product_price" class="h2"></p>
        <div class="form-group">
            <label for="">Quantity</label>
            <input id="product_quantity" type="number" class="form-control" value="1" min="1" max="10">
        </div>
        <button class="btn btn-success">ADD TO BAG</button>
    </div>
</div>



<script src="../assets/js/main.js"></script>
<script>
    async function productData() {
        const action = "getById";
        const id = <?php echo $_GET['id'] ;?>;
        let product = await makeRequest(`../receivers/productReceiver.php?action=${action}&id=${id}`, "GET")
        document.getElementById('product_name').innerText = product.name;
        document.getElementById('product_description').innerText = product.description;
        document.getElementById('product_price').innerText = `$${product.price}`;
        document.getElementById("myInput").setAttribute("max",product.quantity);
    }
    productData()

</script>

</div>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    async function logout() {
        const action = "logout";
        let status = await makeRequest(`../receivers/customerReceiver.php?action=${action}`, "GET")
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
</body>
</html>