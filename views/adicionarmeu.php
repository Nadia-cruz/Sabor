<?php


    include("../managers/basedados.php");
    include("../managers/man_menu.php");
    include("../managers/session.php"); 

    if (isset($_POST['Validar'])) {
        
        $bd = new BD();
        $link = $bd->abreLigacao();
        $menu = new Menu();

        if ($menu->setMenu($link, $id_session)) {
            header('location: home.php');
        } else {
            print ("<div class='alert alert-danger'>
                      <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                      <strong>Erro de criação!</strong> Verifique se os dados estão corretos.
                      </div>");
        }

        $bd->fechaLigacao($link);
    }

?>
<?php require('header.php'); ?>
</div>
<!--/.header-->
<section id="book-table">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h2>Adicone o Menu</h2>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-4 col-md-offset-2 col-sm-12">
                    <div class="left-image">
                        <img src="../img/book_left_image.jpg" alt="">
                    </div>
                </div>
                <aside class="col-sm-4 text-center">

                    <center>
                        <div class="card" align="margin-left">
                            <article class="card-body">
                                <form method="POST" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="nome"
                                                placeholder="Introduza o nome" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="preco"
                                                placeholder="Introduza o preço" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-10">
                                            <textarea type="text" class="form-control" name="descricao"
                                                placeholder="Breve descição do menu"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="file"></label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="categoria">
                                                <option name=""> -- Categoria --</option>
                                                <?php 
                                                    $bd = new BD();
    									            $link = $bd->abreLigacao();
    									            $menu = new Menu();
                                                    $categorias = $menu->getCategorias($link);
    										
                                                    foreach ($categorias as $categoria) { 
                                                ?>
                                                <option name="<?php echo $categoria; ?>"><?php echo $categoria; ?></option>
                                                <?php 
                                                    } 
                                                    $bd->fechaLigacao($link); 
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" name="imagem" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="Validar" class="akame-btn"> Submeter</button>
                                    </div>
                                </form>
                            </article>
                        </div>
                    </center>
                </aside>
            </div>
        </div>     
    </div>
</section>

<?php require('footer.php'); ?>