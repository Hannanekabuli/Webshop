<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--fontAwesome Bootstrap-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css
">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
    <link rel="stylesheet" href="homeStyles.css">

    
  </head>
  <body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" style="color:rgb(20, 29, 155);" >ReflexMania</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav" style="padding-right:20px">
      <ul class="nav navbar-nav ml-auto"> 
        <li class="nav-item ">
          <a class="nav-link" style="font-size: 1rem;" href="category.php">Category<i class="fa fa-camera-retro fa-lg" style="font-size: 1rem;"></i></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" style="font-size: 1rem;" href="aboutus.html">About us<i class="fa fa-question-circle-o" aria-hidden="true"></i>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" style="font-size: 1rem;" margin-top: -8px; a:hover: grey; href="#">        
            <?php
            if (isset($_COOKIE['Customer-Login'])){
                echo '<a  class="cursor-pointer" style="font-size: 1rem; text-decoration:none; ; " onclick="logout()">Login<span class="sr-only"></span></a>';
            } else {
                echo '<a id="loginHover" href="customer/login.php" style="font-size: 1rem; text-decoration:none; ">Login <span class="sr-only"></span></a>';
            }
           ?>
          <i class="fa fa-sign-in" aria-hidden="true" style="font-size: 1rem; color:grey;"></i>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" style="font-size: 1rem;" href="checkout.php">Cart<i class="fa fa-shopping-basket" aria-hidden="true" style="font-size: 1rem;"></i>
          </a>
        </li>

      </ul>
    </div>
  </nav>
  </header>

  <section class="titles">
    <h1>ReflexMania </h1>
    <h2>Good Idea</h2>

</section>

<section class="container-boxes">
    <div class="box">


        <div class="text">


            <p>"The art of photography is all about directing the attention of the viewer.”
                – Steven Pinker-
            </p>

        </div>

    </div>

    <div class="box">



        <div class="text">


            <p>"Photography is the simplest thing in the world, but it is incredibly complicated to make it really work"
                -Bruce Gilden-</p>

        </div>

    </div>

    <div class="box">


        <div class="text">


            <p>"The limitations in your photography are in yourself, for what we see is what we are.”
                – Ernst Hass-</p>

        </div>

    </div>
</section>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
  <div id="subscribe-footer">
    <div class="container">
      <div class="left">
    <i class="icon-envelope-alt"></i>
    <h3>Subscribe to our newsletter!</h3>
    <p>Love to read our articles? Sign up now to get fresh content about blogger, SEO, make money, templates directly to your inbox.
      </p>
        </div>
      <i class='icon-chevron-right'></i>
    <div id="right">
    <form action="https://feedburner.google.com/fb/a/mailverify" method="post" ></form>
    <input class="inptfld" name="email" placeholder=" Your Email" type="text">
    <input name="uri" value="techkshetra" type="hidden">
    <input name="loc" value="en_US" type="hidden">
    <input class="subscribebtn" value="Subscribe Now!" type="submit">
      </form>
    </div>
    </div>
    </div>
    
</html>

