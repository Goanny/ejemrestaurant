<?php 

require_once 'Model/conexion.php';

 class PedidosModel{       
       #-----------------------------------------------------------
       #obtener todas pedidos
 	 	public function getPedidosModel( $tabla){
 	 		$sql=Conexion::conectar()->prepare("SELECT *  FROM $tabla  ORDER BY fecha asc ");
 	 		$sql->execute();
 	 		return $sql->fetchAll();
 	 		$sql->close();
 	 	} 

 	 // agregar Pedidos
 	  public function agregarPedidosModel($datosModel,$tabla){
 	 	  $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(invitado,email,nrocelu,fecha,hora)
 	 	  	VALUES(:invitado,:email,:nrocelu,:fecha,:hora)");

            // $stmt->bindParam(':nombrecliente',$datosModel['nombrecliente'], PDO::PARAM_INT);
            $stmt->bindParam(':invitado',$datosModel['invitado'],PDO::PARAM_STR);
            $stmt->bindParam(':email',$datosModel['email'], PDO::PARAM_STR);
            $stmt->bindParam(':nrocelu',$datosModel['nrocelu'], PDO::PARAM_STR);
            $stmt->bindParam(':fecha',$datosModel['fecha'], PDO::PARAM_STR);
            $stmt->bindParam(':hora',$datosModel['hora'], PDO::PARAM_STR);
           
            if ($stmt->execute()) {
               return 'success';
            }else{
                return 'error';
            }

            $stmt->close();
 	  }	
      //delete public function deletePedidoModel
 	  public function deletePedidoModel($datosModel,$tabla){
         $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idpedi = :idpedi");

         $stmt->bindParam(':idpedi', $datosModel, PDO::PARAM_INT);

         if ($stmt->execute()) {
            return 'success';
         }else{
         return 'Error';
         }

         $stmt->close();
     }
     
     public function totalPedidosModel($tabla){
         // date_default_timezone_set('America/Argentina/Buenos_Aires');
         //  $fecha = date('Y-m-d').'<br>';
         $idpedi = 'idpedi';
         $sql=Conexion::conectar()->prepare("SELECT * , COUNT(*) as total FROM $tabla WHERE fecha >= '$idpedi'");
         $sql->execute();
         return $sql->fetchAll();
         $sql->close();
     }

     public function editarPedidosModel($datosModel,$tabla){
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $sql=Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE idpedi = :idpedi");
        $sql->bindParam(':idpedi',$datosModel, PDO::PARAM_INT);
        $sql->execute();
        return $sql->fetch();
        $sql->close();
     } 

     function actualizarPedidosModel($datosModel,$tabla){
      $sql=Conexion::conectar()->prepare("UPDATE $tabla SET invitado = :invitado,
       email = :email, nrocelu=:nrocelu,nrocelu=:nrocelu,fecha=:fecha,hora=:hora WHERE idpedi = :idpedi");

      // $sql->bindParam(':nombrecliente',$datosModel['nombrecliente'], PDO::PARAM_STR);
      $sql->bindParam(':invitado',$datosModel['invitado'], PDO::PARAM_STR);
      $sql->bindParam(':email',$datosModel['email'], PDO::PARAM_STR);
      $sql->bindParam(':nrocelu',$datosModel['nrocelu'], PDO::PARAM_STR);
      $sql->bindParam(':fecha',$datosModel['fecha'], PDO::PARAM_STR);
      $sql->bindParam(':hora',$datosModel['hora'], PDO::PARAM_STR);
      $sql->bindParam(':idpedi',$datosModel['idpedi'], PDO::PARAM_STR);
           
      if($sql->execute()){

             return "success";
      }else{
    
       return  "error";
      }

      $sql->close();
     }

 }




