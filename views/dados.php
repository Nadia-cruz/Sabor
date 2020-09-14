<?php

ini_set ( 'display_errors' , 1 ); 
ini_set ( 'display_startup_errors' , 1 ); 


	include("../managers/basedados.php");
    include("../managers/utilizador.php");
    include("../managers/session.php");

	

    if (isset($_POST['Guardar'])) {
    
        $bd = new BD();
        $link = $bd->abreLigacao();
        $utilizador = new Utilizador();

        if ($utilizador->alteraFormQueryUtilizador($link)) {
            //$_SESSION[$this->GetLoginSessionVar()] = $username;
            header("location: home.php");
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
                    <h2>Menus dados</h2>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-4 col-md-offset-2 col-sm-12">
                    <div class="left-image">
                        <img src="../img/blog_post_02.jpg" alt="">
                    </div>
                </div>
                <aside class="col-sm-4 text-center">

                    <center>
                        <div class="card" align="margin-left">
                            <article class="card-body">
                                <?php 

                                   $bd = new BD();
                                   $link = $bd->abreLigacao();
                                   $utilizador = new Utilizador();
                                   $user_item = $utilizador->getUtilizador($link, $id_session);

                                ?>
                                <form method="POST" enctype="multipart/form-data">

                                    <div class="form-group" hidden>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="Login"
                                                value="<?php echo $user_item->username; ?>"></input>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="nome" placeholder="Nome"
                                                value="<?php echo $user_item->nome; ?>"></input>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="email" placeholder="Email"
                                                value="<?php echo $user_item->email; ?>"></input>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="telefone"
                                                placeholder="Telefone"
                                                value="<?php echo $user_item->telefone; ?>"></input>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="endereco"
                                                placeholder="Endereco"
                                                value="<?php echo $user_item->endereco; ?>"></input>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" name="password"
                                                placeholder="Nova password"></input>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" name="confirmacaoPassword"
                                                placeholder="Confirmar password"></input>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-10">

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-10">

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-10">
                                            <output type="file"></output>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                       <button type="submit" name="Guardar" class="akame-btn"> Guardar </button>
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

</body>

</html>