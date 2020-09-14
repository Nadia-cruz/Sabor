<?php require('header.php'); ?>
<?php include('session.php');?> 
 <?php
    
    session_start();
    include_once ('../managers/basedados.php');
    $bd = new BD();
    $link = $bd->abreLigacao();
    $sql="SELECT * FROM pedido where Idutilizador = " . $_SESSION['idutilizador'];
    $Pedidos=mysqli_stmt_init($link);

    if(!mysqli_stmt_prepare($Pedidos,$sql))
        { echo "erro";}
    else {
        mysqli_stmt_execute($Pedidos);
        $result = mysqli_stmt_get_result($Pedidos);
    }

  
    
    ?>



<div class="container">
	<div class="row">
                <section class="content">
                            <h1>Pedidos dos clientes</h1>
                            <div class="col-md-8 col-md-offset-2">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        
                                        <div class="table-container">
                                            <table id="pedidos_cliente_table" class="table table-striped table-bordered" style="width:100%">
                                                        <thead class="thead-dark">
                                                            <tr>
                                                                <th scope="col">Menu</th>
                                                                <th scope="col">Data</th>
                                                                <th scope="col">Estado</th>
                                                                <th scope="col">editar</th>
                                                                <th scope="col">eliminar</th>
                                                                
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php while($row = $result->fetch_assoc()){?>

                                                        
                                                            <tr>
                                                                <td><?PHP echo $row['menu']?></td>
                                                                <td><?PHP echo $row['datahora']?></td>
                                                                <td><?PHP echo $row['estado']?></td>
                                                                <td>
                                                                    <a href="../managers/man_pedido.php?editID=<?PHP echo $row['Idpedido']?>">
                                                                     <button class="btn">
                                                                     <i class="fa fa-pencil" ></i>
                                                                    </button>
                                                                </a>

                                                                </td>

                                                                <td>
                                                                    <a href="../managers/man_pedido.php?deleteID=<?PHP echo $row['Idpedido']?>">
                                                                   
                                                                    <button class="btn">
                                                                        <i class="fa fa-trash"></i>
                                                                    </button>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            <?php }?>
                                                        </tbody>
                                            </table>

                                        </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </section>
            </div>
        </div>
            
        
        
            





