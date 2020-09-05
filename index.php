<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<!--
Victory Template
http://www.templatemo.com/tm-507-victory
-->
        <title>Sabor de nos Terra - admin</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="img/favicon.ico" type="image/x-icon">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/fontAwesome.css">
        <link rel="stylesheet" href="css/hero-slider.css">
        <link rel="stylesheet" href="css/owl-carousel.css">
        <link rel="stylesheet" href="css/templatemo-style.css">
        

        <link href="https://fonts.googleapis.com/css?family=Spectral:200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>

<body>
    <div class="header">
        <div class="container" align="margin-left">
            <a class="nav-brand" href="#"><img src="img/logo2.png" alt="" width="110"></a>
            <nav class="navbar navbar-inverse" role="navigation">
                <div class="navbar-header">
                    <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <!--/.navbar-header-->
                <div id="main-nav" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="menu.php"> Menus</a></li>
                        <li><a href="views/register.php">Registar-se</a></li>
                        <li><a href="views/login.php">Entrar</a></li>
                       <li><a href="../carrinho.php"><i class="fa fa-shopping-cart" style="font-size:24px"><span><?php echo $cart_count; ?></i></span></a></li>
                        </div>
                    </ul>
                </div>
                <!--/.navbar-collapse-->
            </nav>
            <!--/.navbar-->
        </div>
        <!--/.container-->
    </div>
    <!--/.header-->


    <section class="banner">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h2>Olá! O que queres comer hoje!</h2>
                    <h4>Aqui vais encontra varias comidas deliciosas!!</h4>
                    
                    <div class="primary-button">
                      <li><a href="views/login.php">Login</a></li>

                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="cook-delecious">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-md-offset-1">
                    <div class="first-image">
                        <img src="img/cook_01.jpg" alt="">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="cook-content">
                        <h4>Contacto</h4>
                        <div class="contact-content">
                            <span>Tefefona-nos:</span>
                            <h6>+ 2303030</h6>
                        </div>
                        <span>ou</span>
                        <div class="primary-white-button">
                          <li><a href="views/login.php">Login</a></li>

                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="second-image">
                        <img src="img/cook_02.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="services">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="service-item">
                        <a href="menu.html">
                        <img src="img/cook_breakfast.png" alt="Breakfast">
                        <h4>Breakfast</h4>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="service-item">
                        <a href="menu.html">
                        <img src="img/cook_lunch.png" alt="Lunch">
                        <h4>Lunch</h4>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="service-item">
                        <a href="menu.html">
                        <img src="img/cook_dinner.png" alt="Dinner">
                        <h4>Dinner</h4>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="service-item">
                        <a href="menu.html">
                        <img src="img/cook_dessert.png" alt="Desserts">
                        <h4>Desserts</h4>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>



   
    <section class="featured-food">
        <div class="container">
            <div class="row">
                <div class="heading">
                    <h2>Weekly Featured Food</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="food-item">
                        <h2>Breakfast</h2>
                        <img src="img/breakfast_item.jpg" alt="">
                        <div class="price">$4.50</div>
                        <div class="text-content">
                            <h4>Kale Chips Art Party</h4>
                            <p>Dreamcatcher squid ennui cliche chicharros nes echo  small batch jean shorts hexagon street art knausgaard wolf...</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="food-item">
                        <h2>Lunch</h2>
                        <img src="img/lunch_item.jpg" alt="">
                        <div class="price">$7.50</div>
                        <div class="text-content">
                            <h4>Taiyaki Gastro Tousled</h4>
                            <p>Dreamcatcher squid ennui cliche chicharros nes echo  small batch jean shorts hexagon street art knausgaard wolf...</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="food-item">
                        <h2>Dinner</h2>
                        <img src="img/dinner_item.jpg" alt="">
                        <div class="price">$12.50</div>
                        <div class="text-content">
                            <h4>Batch Squid Jean Shorts</h4>
                            <p>Dreamcatcher squid ennui cliche chicharros nes echo  small batch jean shorts hexagon street art knausgaard wolf...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>





    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <p>Copyright &copy; 2017 Victory Template</p>
                </div>
                <div class="col-md-4">
                    <ul class="social-icons">
                        <li><a  href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-rss"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <p>Designed by <em>templatemo</em></p>
                </div>
            </div>
        </div>
    </footer>


    


    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

    <script src="js/vendor/bootstrap.min.js"></script>

    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        // navigation click actions 
        $('.scroll-link').on('click', function(event){
            event.preventDefault();
            var sectionID = $(this).attr("data-id");
            scrollToID('#' + sectionID, 750);
        });
        // scroll to top action
        $('.scroll-top').on('click', function(event) {
            event.preventDefault();
            $('html, body').animate({scrollTop:0}, 'slow');         
        });
        // mobile nav toggle
        $('#nav-toggle').on('click', function (event) {
            event.preventDefault();
            $('#main-nav').toggleClass("open");
        });
    });
    // scroll function
    function scrollToID(id, speed){
        var offSet = 0;
        var targetOffset = $(id).offset().top - offSet;
        var mainNav = $('#main-nav');
        $('html,body').animate({scrollTop:targetOffset}, speed);
        if (mainNav.hasClass("open")) {
            mainNav.css("height", "1px").removeClass("in").addClass("collapse");
            mainNav.removeClass("open");
        }
    }
    if (typeof console === "undefined") {
        console = {
            log: function() { }
        };
    }
    </script>
</body>
</html>