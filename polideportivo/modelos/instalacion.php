<?php

include_once("DB.php");

class instalacion{
  private $db;
  public function __construct()
    {
        $this->db = new DB();
    }

    public function get($IdInstalacion)
        {
            $result = $this->db->consulta("SELECT * FROM instalacion
                                                WHERE instalacion.IdInstalacion = '$IdInstalacion'");
            return $result;
        }


        public function getAll()
            {
              $instalacion = $this->db->consulta("SELECT * FROM instalacion
                                                      ORDER BY IdInstalacion ");
              return $instalacion;
          }
          public function insert($IdInstalacion, $Nombre, $Descripcion, $Imagen, $Precio)
          {

              // Ahora insertamos la incidencia en la BD
              $result = $this->db->manipulacion("INSERT INTO instalacion (IdInstalacion,Nombre,Descripcion,Imagen,Precio)
                              VALUES ('$IdInstalacion','$Nombre', '$Descripcion', '$Imagen', '$Precio')");
              return $result;
              // Terminamos mostrando la lista de incidencias de este usuarios actualizada

          }

          public function update($IdInstalacion, $Nombre, $Descripcion, $Imagen, $Precio)
          {
            $result=  $this->db->manipulacion("UPDATE instalacion SET  IdInstalacion = '$IdInstalacion',Nombre = '$Nombre',Descripcion = '$Descripcion',Imagen = '$Imagen',Precio = '$Precio' WHERE IdInstalacion = '$IdInstalacion'");
              return $result;

          }


          /**
           * Elimina un usuario  de la BD

           */
          public function delete($Id)
          {
            $result=  $this->db->manipulacion("DELETE FROM instalacion WHERE IdInstalacion = '$IdInstalacion'");
              return $result;
          }
}
