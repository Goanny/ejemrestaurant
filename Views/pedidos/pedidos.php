
 <div class="container"><br>
 

 <?php  
 if (isset($_GET['action'])) {
   if($_GET['action'] == 'okPedidos'){
        echo '<center><div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <strong>Exitos!! </strong> El Pedido fue agragada Satifactoriamente al sistema.
          </div>
        </center>';
   }

   if($_GET['action'] == 'borrarPedidos'){
        echo '<center><div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <strong>Exitos!! </strong> El Pedido fue Borrada Satifactoriamente al sistema.
          </div>
        </center>';
   }
 }

  if($_GET['action'] == 'cambioPedidos'){
        echo '<center><div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <strong>Exitos!! </strong> El Pedido fue Editada Satifactoriamente al sistema.
          </div>
        </center>';
   }
 

 ?>

<?php
  // Te recomiendo utilizar esta conección, la que utilizas ya no es la recomendada. 
  $sql = new PDO('mysql:host=localhost;dbname=restaurant', 'root', ''); // el campo vaciío es para la password. 
?>

<div class="card">
<div class="row">
  <div class="col-md-8">  
    <ol class="breadcrumb">
       <li class="breadcrumb-item active"><i class="fa fa-list"> </i> LISTADO DE PEDIDOS </li>
    </ol>
  </div>
    <div class="col-md-4">  
     <div class="alert alert-success" role="alert">

         <strong>Total Pedidos : </strong>
          <?php $vistaPedidos = new PedidosController();
                 $vistaPedidos->totalPedidosController();
           ?>                                     
    </div>
  </div>
    <br><br><br>
    <div class="col-md-7">
    <!-- <form method="post" class="form-control" action="index.php?action=buscarPedidos">  
      <input type="text" class="form-control" id="datepicker" name="buscar" placeholder="Buscar Pedidos por Fechas" required=""><br>
       <input type="submit" name="submit" class="btn btn-info btn-sm" value="Buscar">
    </form> -->
  </div>
  <div class="col-md-2">
<?php require 'Views/modal/modal_pedidos.php'; ?>
  <div class="alert alert-success" role="alert">
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#pedidos" data-whatever="@mdo">
  Hacer un Pedido Nuevo
  </button>
</div>
</div>
  <div class="card-block">
    <p class="card-text">
       <table class="table table-bordered">
    <thead class="thead">
       <tr>
            <!-- <td align="center">Cliente</td> -->
            <td align="center">Invitados</td>
            <td align="center">e-mail</td>
            <td align="center">Celular</td>
            <td align="center">Fecha</td>
            <td align="center">Hora</td>
            <!-- <td align="center">Acciones</td> -->            
      </tr>
    </thead>

    <tbody>
      <tr style="text-align: center">
        <?php foreach ($sql->query('SELECT * from pedidos') as $row){?>
          <td class=" alert-danger" style="text-align: center"><?php echo $row['invitado'] ?></td>
          <td class=" alert-danger" style="text-align: center"><?php echo $row['email'] ?></td>   
          <td class=" alert-danger" style="text-align: center"><?php echo $row['nrocelu'] ?></td>   
          <td class=" alert-danger" style="text-align: center"><?php echo $row['fecha'] ?></td>   
          <td class=" alert-danger" style="text-align: center"><?php echo $row['hora'] ?></td>       
      </tr>        
        <?php }
        ?>
      <?php 
        $vistaUsuario = new PedidosController();
        $vistaUsuario->getPedidosController();
        $vistaUsuario->deletePedidosController();
       ?>
    </tbody>
  </table>
</div>
    </p>
</div>
  
  </div>
</div>
 </div>

</div>


