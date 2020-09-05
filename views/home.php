<?php require('header.php'); ?>

<?php

include("../managers/basedados.php");
include("../managers/session.php"); 

?>

<section class="featured-food">
        <div class="container">
            <div class="row">
                <div class="heading">
                    <h2>Meus pedidos</h2>
                </div>
            </div>
              <div class="col-md-4">
                    <div class="food-item">
                        <h2>Lunch</h2>
                        <img src="../img/lunch_item.jpg" alt="">
                        <div class="price">$7.50</div>
                        <div class="text-content">
                            <h4>Taiyaki Gastro Tousled</h4>
                            <p>Dreamcatcher squid ennui cliche chicharros nes echo  small batch jean shorts hexagon street art knausgaard wolf...</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="food-item">
                        <h2>Lunch</h2>
                        <img src="../img/lunch_item.jpg" alt="">
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
                        <img src="../img/dinner_item.jpg" alt="">
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
   



<?php require('footer.php'); ?>