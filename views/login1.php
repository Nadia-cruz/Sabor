<?php
    session_start();

    if (isset($_POST['Validar'])) {
        include("../managers/basedados.php");
        include("../managers/utilizador.php");

        $bd = new BD();
        $link = $bd->abreLigacao();

        $utilizador = new Utilizador();

        if ($utilizador->login($link)) {
            //$_SESSION[$this->GetLoginSessionVar()] = $username;         
            header("location: home.php");
        } else {
            print ("<div class='alert alert-danger'>
                      <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                      <strong>Erro de autenticação!</strong> Verifique se o Login e a Password estão corretos.
                      </div>");
        }

        $bd->fechaLigacao($link);
    }

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Sabor de nos Terra</title>

    <!-- Favicon -->
    <link rel="icon" href="../img/core-img/favicon.ico">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="../style.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <!-- Preloader -->


    <div class="container">

        <div class="classynav">
            <div class="main-header-area">
                <div class="classy-nav-container breakpoint-off">
                    <div class="container">
                        <!-- Classy Menu -->
                        <nav class="classy-navbar justify-content-between" id="akameNav">

                            <!-- Logo -->
                            <a class="nav-brand" href="../index.php"><img src="../img/logo2.png" alt="" width="110"></a>

                            <!-- Navbar Toggler -->
                            <div class="classy-navbar-toggler">
                                <span class="navbarToggler"><span></span><span></span><span></span></span>
                            </div>

                        </nav>
                    </div>
                </div>
            </div>

            <hr>


            <div class="row text-center">


                <aside class="col-sm-4 text-center">


                    <center>
                    <center><div class="rd-navbar-brand"><a title="Ir para Página Inicial" class="brand" href="../index.php"><img src="../img/logo2.png" alt="" width="110"/></a></div></center>
                        <div class="card">
                            <article class="card-body" style="align-content: center">
                                <form method="POST">
                                    <h2 class="form-title">Entre na sua conta</br></h2>
                                    <div class="form-group">
                                        <input name="username" class="form-control" placeholder="Username" type="text">
                                    </div> <!-- form-group// -->
                                    <div class="form-group">
                                        <input name="password" class="form-control" placeholder="******"
                                            type="password">
                                    </div> <!-- form-group// -->
                                    <div class="form-group">
                                        <button type="submit" name="Validar" class="akame-btn"> Login </button>
                                    </div> <!-- form-group// -->
                                    <!-- .row// -->
                                </form>

                                <p>Não é registrado? <a href="register.php">Cria a sua conta!</a></p>
                            </article>
                        </div>
                    </center>


            </div> <!-- card.// -->

            </aside> <!-- col.// -->



        </div> <!-- row.// -->
       

    </div>

    </div>
    <!--container end.//-->

</body>

<div class="modal fade" id="modal-login" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Faça o seu registro!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <div class="modal-body">
    <form method="post">
    
                            <div class="form-group">
                                <input type="text" class="form-control" name="nome" placeholder="O seu nome e apelido"/>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="username" placeholder="Username"/>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="O seu Email"/>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="telefone" placeholder="O seu numero de telefone"/>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="endereco" placeholder="Seu Endereço"/>
                                
                            </div>
                            
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Password"/>
                                <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password2" placeholder="Repeat your password"/>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="Validar2" class="btn btn-outline-warning"> Sign Up </button>
                                <p>Já se encontra Registrado? <a href="login.php">Faça o seu Login!</a></p> 
                            </div>
                             
   </form>
   
</div>
</div>
</div>
</div>







<div class="modal fade" id="modal-rec" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Recuperar Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <div class="modal-body">
    <form method="post">
       


<div class="form-group">
    <label class="text-dark" for="exampleInputEmail1">Email</label>
    <input type="email" class="form-control" id="email-recuperar" name="email-recuperar" placeholder="Email" required>

</div>




<div aling="center" class="" id="mensagem2">
</div>


</div>
<div class="modal-footer">
   <button type="button" id="btn-fechar" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
   <button name="btn-rec" id="btn-rec" class="btn btn-info">Recuperar</button>

   </form>

</div>
</div>
</div>
</div>





<?php 

if(isset($_POST['email2']) and $_POST['email2'] != ''){

 ?>

 <script> $("#modal-login").modal("show"); </script> 

<?php } ?>




<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

<script src="js/mascaras.js"></script>




<!--AJAX PARA INSERÇÃO DOS DADOS -->
<script type="text/javascript">
    $(document).ready(function(){
        
        $('#btn-cadastro').click(function(event){
            event.preventDefault();
            
            $.ajax({
                url: "registar-utilizador.php",
                method: "post",
                data: $('form').serialize(),
                dataType: "text",
                success: function(mensagem){

                    $('#mensagem').removeClass()

                    if(mensagem == 'Registrado com Sucesso!!'){
                        
                        $('#mensagem').addClass('text-success')

                        document.getElementById('email').value = document.getElementById('email').value;

                        document.getElementById('pass').value = document.getElementById('password').value;

                        $('#nome').val('')
                        $('#telefone').val('')
                        $('#username').val('')
                        $('#endereco').val('')
                        $('#email').val('')
                        $('#password').val('')

                        
                        //$('#btn-fechar').click();
                        //location.reload();



            
           

                    }else{
                        
                        $('#mensagem').addClass('text-danger')
                    }
                    
                    $('#mensagem').text(mensagem)

                },
                
            })
        })
    })
</script>





<!--AJAX PARA RECUPERAR A SENHA -->
<script type="text/javascript">
    $(document).ready(function(){
        
        $('#btn-rec').click(function(event){
            event.preventDefault();
            
            $.ajax({
                url: "recuperar.php",
                method: "post",
                data: $('form').serialize(),
                dataType: "text",
                success: function(mensagem){

                    $('#mensagem2').removeClass()

                    if(mensagem == 'Password enviada para o seu Email!'){
                        
                        $('#mensagem2').addClass('text-success')

                        document.getElementById('username').value = document.getElementById('email-recuperar').value;

                       
                        $('#email-recuperar').val('')
                        

                        //$('#btn-fechar').click();
                        //location.reload();



                    }else{
                        
                        $('#mensagem2').addClass('text-danger')
                    }
                    
                    $('#mensagem2').text(mensagem)

                },
                
            })
        })
    })
</script>
