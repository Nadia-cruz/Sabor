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

<head>
    <title>Sabor de nos terra - Login</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta name="description" content=" sabores da nossa terra ">
    

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">


    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="css/login.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>


    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>


<!------ Include the above in your HEAD tag ---------->

<!-- login start -->


<div class="container-fluid">

    <section class="login-block mt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4 login-sec">
                <center><div class="rd-navbar-brand"><a title="Ir para Página Inicial" class="brand" href="index.php"><img src="img/logo2.png" alt="" width="140" height="50"/></a></div></center>
                   <br> <h5 class="text-center mb-4">Faça seu Login</h5>
                    
                    
                    <form class="login100-form validate-form" method="POST">
                        <div class="wrap-input100 validate-input">
                            <span class="label-input100">Username</span><br>
                            <input class="input100" type="text" name="username" id="username"
                            placeholder="Insira seu Email" required>
                            <span class="focus-input100"></span>
                        </div>

                        <div class="wrap-input100 validate-input">
                            <span class="label-input100">Password</span>
                            <input class="input100" type="password" id="pass" name="pass" placeholder="Insira sua password" required>
                            <span class="focus-input100 password"></span>
                        </div>

                        

                        <div class="container-login100-form-btn">
                            <div class="wrap-login100-form-btn">
                                <button class="btn btn-primary" type="submit" name="Validar" > Login </button>>
                                    
                                </button>
                            </div>
                        </div>


                    </form>

                    <div class="copy-text">Não tem conta?

                        <a class="text-primary" href="" data-toggle="modal" data-target="#modal-login">Cria a tua conta!</a>
                    </div>

                    <div class="text-center p-t-8 p-b-31">
                        <a class="text-danger" href="" data-toggle="modal" data-target="#modal-rec">
                           <small> Recuperar password? </small>
                       </a>
                   </div>


               </div>
               <div class="col-md-8 banner-sec">   
                  <div class="signup__overlay"></div>          
                  <div class="banner">
                    <div id="demo" class="carousel slide carousel-fade" data-ride="carousel">


                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="img/upload/cachupa.jpg" height="100%" width="100%">

                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

</section>

<!-- login end -->

</div>

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
            <label class="text-dark" for="exampleInputEmail1">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome e Sobrenome" required>

        </div>

        <div class="row">
         <div class="col-md-6">
             <div class="form-group">
                <label class="text-dark" for="exampleInputEmail1">Endereço</label>
                <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Endereco" required>

            </div>
        </div>

        <div class="row">
         <div class="col-md-6">
             <div class="form-group">
                <label class="text-dark" for="exampleInputEmail1">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>

            </div>
        </div>

        <div class="col-md-6">
         <div class="form-group">
            <label class="text-dark" for="exampleInputEmail1">Telefone</label>
            <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone" required>

        </div>
    </div>
</div>



<div class="form-group">
    <label class="text-dark" for="exampleInputEmail1">Email</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required value="<?php echo @$email_rec ?>">

</div>




<div class="form-group">
    <label class="text-dark" for="exampleInputEmail1">Password</label>
    <input type="password" class="form-control" id="password " name="password" placeholder="Password" required>

</div>


<div aling="center" class="" id="mensagem">
</div>


</div>
<div class="modal-footer">
   <button type="button" id="btn-fechar" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
   <button name="btn-registro" id="btn-registro" class="btn btn-info">Registrar</button>

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