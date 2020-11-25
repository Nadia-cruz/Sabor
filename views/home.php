<?php require('header.php'); ?>

</div>
    <!--/.header-->

    <section class="featured-food">
        <div class="container">
            <div id="rowContainer">
               <p> <?php 
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
                            
                        } 
                ?>
                <div class="col-lg-4" id="rowItem">
                    <div class="food-item">
                        <form method="post" action="carrinho.php?action=add&id=<?php echo $item->idmenu; ?>">

                            <h2><?php echo $item->categoria ?></h2>
                            <img src="<?php echo $directory . $image; ?>" alt="" width="370" height="250">
                            <div class="price"><?php echo $item->preco . '$'; ?></div>
                            <div class="text-content">
                                <h4><?php echo $item->nome ?></h4>
                                <p><?php echo $item->descricao; ?></p>

                                <input type="text" name="quantity" value="1" class="form-control" />
                                <input type="hidden" name="hidden_nome" value="<?php echo $item->nome; ?>" />
						        <input type="hidden" name="hidden_preco" value="<?php echo $item->preco; ?>" />
                                <input type="submit" name="add_ao_carrinho" style="margin-top:5px;" class="btn btn-success" value="Add ao carrinho" />

                            </div>
                        </form>
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