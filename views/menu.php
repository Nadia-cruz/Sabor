<?php
    // session_start();

    // if (!isset($_SESSION['idutilizador'])) {
    //     require('../indexHeader.php');
    // } else {
        require('header.php');
    //}

?>

<section class="featured-food">
        <div class="container">
            <div id="rowContainer">
                <?php 
                    include("../managers/basedados.php");
                    include("../managers/man_menu.php");

                    $bd = new BD();                       
                    $link = $bd->abreLigacao();
                    $menu = new Menu();

                    if (isset($_GET['categoria'])) {
                        $filtrarCategoria = $_GET['categoria'];
                        $menu_list = $menu->listMenuFromCategoria($link, $filtrarCategoria);
                    } else {
                        $menu_list = $menu->listAllMenu($link);
                    }

                    $directory = "../img/upload/";
                              
                    foreach ($menu_list as $item) {
                        $image = $item->imagem;
                        if($image == '') {
                            //$image = 'animais.png';
                        } 
                ?>
                <div class="col-lg-4" id="rowItem">
                    <div class="food-item">
                        <h2><?php echo $item->categoria ?></h2>
                        <img src="<?php echo $directory . $image; ?>" alt="" width="370" height="250">
                        <div class="price"><?php echo $item->preco . '$00'; ?></div>
                        <div class="text-content">
                            <h4><?php echo $item->nome ?></h4>
                            <p><?php echo $item->descricao; ?></p>
                        </div>
                    </div>
                </div>
                <?php 
                    } 
                    $bd->fechaLigacao($link); 
                ?>
            </div>
        </div>
    </section>

<?php require('footer.php'); ?>