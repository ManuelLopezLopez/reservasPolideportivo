<?php
include_once("DB.php");
  class usuarios {
      private $db;

     
       public function __construct()
      {
          $this->db = new DB();
      }



      public function buscarUsuario($Email,$Password) {

          if ($usuarios = $this->db->consulta("SELECT Id, Email, Password, Nombre , tipo   FROM usuarios WHERE Email = '$Email'AND Password = '$Password'")) {
              if ($usuarios) {
                
                  return $usuarios;
              } else {
                  return null;
              }
          } else {
              return null;
          }

      }

      public function get($Id)
      {
          $result = $this->db->consulta("SELECT * FROM usuarios
                                              WHERE usuarios.Id = '$Id'");

          return $result;
      }
      public function getAll()
        {
            $usuarios = $this->db->consulta("SELECT * FROM usuarios
                                                    ORDER BY Id ");
            return $usuarios;
        }

      public function insert($Id, $Email, $Password, $Nombre, $Apellido1,$Apellido2,$Dni,$tipo,$imagen,$Estado)
    	{

    		
          $result = $this->db->manipulacion("INSERT INTO usuarios (Id,Email,Password,Nombre,Apellido1,Apellido2,Dni,tipo,imagen,Estado)
                          VALUES ('$Id','$Email', '$Password', '$Nombre', '$Apellido1','$Apellido2','$Dni','$tipo','$imagen','$Estado')");
          return $result;
    			

    	}

      public function update($Id,$Email, $Password, $Nombre, $Apellido1,$Apellido2,$Dni,$tipo,$Estado)
      {
        $result=  $this->db->manipulacion("UPDATE usuarios SET  Email = '$Email',Password = '$Password',Nombre = '$Nombre',Apellido1 = '$Apellido1',Apellido2 = '$Apellido2',Dni = '$Dni',tipo ='$tipo',Estado = '$Estado' WHERE Id = '$Id'");
          return $result;

      }


      
      public function delete($Id)
      {
        $r=  $this->db->manipulacion("DELETE FROM usuarios WHERE Id = '$Id'");
          return $r;
      }
      public function busquedaAproximada($textoBusqueda)
      {

         
      $result = $this->db->consulta("SELECT * FROM usuarios
            WHERE usuarios.Id LIKE '%$textoBusqueda%'
            OR usuarios.Nombre LIKE '%$textoBusqueda%'
            OR usuarios.Apellido1 LIKE '%$textoBusqueda%'
            OR usuarios.Apellido2 LIKE '%$textoBusqueda%'
            OR usuarios.Estado LIKE '%$textoBusqueda%'
            OR usuarios.tipo LIKE '%$textoBusqueda%'
            ORDER BY usuarios.Id");

          return $result;

      }

  }
