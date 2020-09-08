    <?php require('indexHeader.php'); ?>

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

    <section class="services">
        <div class="container">
            <div class="row">
                <?php 
                    include("managers/basedados.php");
                    include("managers/man_menu.php");

                    $bd = new BD();
    				$link = $bd->abreLigacao();
    				$menu = new Menu();
                    $categorias = $menu->getCategorias($link);
    										
                    foreach ($categorias as $categoria) {
                ?>
                <div class="col-md-3" id="serviceItem">
                    <div class="service-item">
                    <a href="views/menu.php?categoria=<?php echo $categoria; ?>">
                        <img src="img/cook_breakfast.png" alt="">
                        <h4><?php echo $categoria; ?></h4>
                        </a>
                    </div>
                </div>
                <?php 
                    } 
                    $bd->fechaLigacao($link); 
                ?> 
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
                        
                        <div class="contact-content">
                            <h4>Contacto</h4>
                            <span>Tefefona-nos:</span>
                            <h6>+ 2303030</h6>
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

</body>
</html>