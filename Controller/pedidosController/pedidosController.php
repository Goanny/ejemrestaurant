<?php  
ob_start();

class PedidosController {

   public function plantilla(){
   	     include 'Views/template.php';
   }

  	#INTERACCIÓN DEL USUARIO
	#----------------------------------------------
	public function enlacesPaginasController(){

		if(isset($_GET["action"])){
		  $enlacesController = $_GET["action"];
		}else{
		   $enlacesController = "index";			
		}
      // le pide al modelo y que conecte con :: al método y asi heredo la clase y sus metodos y atributos..
		 $respuesta = Paginas::enlacesPaginasModel($enlacesController);
		 require $respuesta;
	}
	//=============================================================================
	//PEDIDOS
	//============================================================================
// funcion para devolver todas las pedidos.
	 	public function getPedidosController(){

	 		date_default_timezone_set('America/Argentina/Buenos_Aires');
	 		$hoy = date('Y-m-d');
 		$respuesta = PedidosModel::getPedidosModel('pedidos');
 			# code...
 		foreach ($respuesta as $row) {
 			if ($hoy == $row['fecha']) {
	 			echo '<tr>			
					<td align="center"> '.$row["invitado"].'</a></td>
					<td align="center"> '.$row["email"].'</td>
					<td align="center">'.$row["nrocelu"].'</td> 
				  <td align="center">'.date("d-m-Y", strtotime($row["fecha"])).'</td>
					<td align="center">'.$row["hora"].'</td>						
					<td align="center"><a href="index.php?action=editarPedidos&idpedi='.$row["idpedi"].'"<i class="fa fa-edit btn btn-primary btn-sm"></i></a>&nbsp;&nbsp;&nbsp;
					    <a href="index.php?action=pedidos&idBorrar='.$row["idpedi"].'"<i class="fa fa-trash-o btn btn-danger btn-sm"></i></a>
					</td>
				    </tr>';
 			}
 		}
 		}
 	//insertar pedidos
 	public function agregarPedidosController(){
         	if(isset($_POST['agregar'])) {
 			$datosController = array("invitado"=>$_POST['invitado'],
 				                     "email"=>$_POST['email'],
 				                      "nrocelu"=>$_POST['nrocelu'],
 				                      "fecha"=>$_POST['fecha'],	              
 				                      "hora"=>$_POST['hora']			                      
 				                     );
 			#pedir la informacion al modelo.
 		
 		$respuesta= PedidosModel::agregarPedidosModel($datosController,'pedidos');
 			if ($respuesta == 'success') {
 				header('location:okPedidos');
 			}else{
                header('location:pedidos');
 			}
 		}
 	}

 	//borrar pedidos
   public function deletePedidosController(){
   	 if (isset($_GET['idBorrar'])) {
   	 	$datosController = $_GET['idBorrar'];

   	 	$respuesta = PedidosModel::deletePedidoModel($datosController,'pedidos');
   	 	if ($respuesta == 'success') {
         header('location:borrarPedidos');
          
   	 	}
   	 }
   }
//cantidad de pedidos
   public function totalPedidosController(){
   	  $respuesta = PedidosModel::totalPedidosModel('pedidos');
   	 	foreach ($respuesta as $key ) {
 			 echo $key['total'];
 		}
   	  	
   	  
   }

     public function editarPedidosController(){
      	$datosController= $_GET['idpedi'];
	    $respuesta =PedidosModel::editarPedidosModel($datosController, 'pedidos');

	    echo ' <form method="post">
          <div class="row">
            <div class="col-md-6">  
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Nombre Cliente:</label>
                <input type="text" class="form-control" id="recipient-name" name="nombrecliente" value="'.$respuesta['nombrecliente'].'">
              </div>
            </div>
               <div class="col-md-6">  
             <div class="form-group">
              <label for="recipient-name" class="form-control-label">Cantidad de Personas:</label>
              <input type="text" class="form-control" id="recipient-name" name="cantidadpersonas" value="'.$respuesta['cantidadpersonas'].'">
            </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6"> 
             <div class="form-group">
              <label for="recipient-name" class="form-control-label">Telefono de Contacto:</label>
              <input type="text" class="form-control" id="recipient-name" name="telefono"  value="'.$respuesta['telefono'].'">
            </div>
            </div>
            <div class="col-md-6"> 
             <div class="form-group">
              <label for="recipient-name" class="form-control-label">Fecha Pedidos (1/10/2017):</label>
              <input type="text" id="datepicker" class="form-control" id="recipient-name" name="diallegada" value="'.$respuesta['diallegada'].'">
            </div>
            </div>
            </div>
             <div class="row">
                <div class="col-md-6"> 
             <div class="form-group">
              <label for="recipient-name" class="form-control-label">Hora de Pedidos (22:00):</label>
              <input type="text" class="form-control" id="recipient-name" name="horallegada" value="'.$respuesta['horallegada'].'">
            </div>
            </div>
              <div class="col-md-6"> 
              <div class="form-group">
              <label for="message-text" class="form-control-label">Observaciones:</label>
              <textarea class="form-control" id="message-text" name="observaciones" required="">'.$respuesta['observaciones'].'</textarea>
            </div>
            </div>
        </div>
        </div>
        <input type="hidden" name="idpedi" value="'.$respuesta['idpedi'].'">
          <button type="submit" class="btn btn-primary form-control" name="editar">Agregar pedidos</button>
          </form>';
     
    }

    public function actualizarPedidosController(){
    	if (isset($_POST['editar'])) {
    		$datosController=array('invitado'=>$_POST['invitado'],
    			                   'email'=>$_POST['email'],
    			                   'nrocelu'=>$_POST['nrocelu'],
    			                   'fecha'=>date("Y-m-d", strtotime($_POST['fecha'])),
    			                   'hora'=>$_POST['hora'],    			                   
    			                   'idpedi'=>$_POST['idpedi']
    			);
    	$respuesta=PedidosModel::actualizarPedidosModel($datosController,'pedidos');	
    	  	if ($respuesta == 'success') {
      				  header('location:cambioPedidos');
      		}
    	}
    }
   //=============================================================================
	//FIN DE PEDIDOS
	//============================================================================

}
