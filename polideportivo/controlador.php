<?php
 include_once("vista.php");
 include_once("modelos/usuarios.php");
 // include_once("modelos/reserva.php");
 include_once("modelos/instalacion.php");
 //include_once("modelos/horarioInstalacion.php");
 include_once("modelos/seguridad.php");
class Controlador
{

	private $vista, $usuarios,$instalacion;
  

	
	public function __construct()
	{
		$this->vista = new vista();
    $this->usuarios = new usuarios();
    $this->seguridad = new seguridad();
	  $this->instalacion = new instalacion();
	

	}

	
	public function mostrarFormularioLogin()
	{
		$this->vista->mostrar("usuarios/formularioLogin");
	}

	public function procesarLogin()
	{


		$Email =$_REQUEST["Email"];
    $Password = $_REQUEST["Password"];



		$usuario = $this->usuarios->buscarUsuario($Email,$Password);

if ($usuario)  {
			$this->seguridad->abrirSesion($usuario[0]);
			$this->mostrarListaUsuarios();
		} else {
			
			$data['msjError'] = "Nombre de usuario o contraseña incorrectos";
			$this->vista->mostrar("usuarios/formularioLogin", $data);
		}
	}

  public function cerrarSesion()
  {
		$this->seguridad->cerrarSesion();
		$data['msjInfo'] = "Sesión cerrada correctamente";
		$this->vista->mostrar("usuarios/formularioLogin", $data);
	}
  public function mostrarListaUsuarios()
	{
		$data['listaUsuarios'] = $this->usuarios->getAll();
		$this->vista->mostrar("usuarios/listaUsuarios", $data);
	}
  public function listaInstalacion()
  {
    $data['listaInstalacion'] = $this->instalacion->getAll();
    $this->vista->mostrar("instalacion/listaInstalacion", $data);
  }
  public function formularioInsertarUsuarios()
	{
		if ($this->seguridad->haySesionIniciada()) {

			$data['listaUsuarios'] = $this->usuarios->getAll();
			$this->vista->mostrar('usuarios/formularioInsertarUsuarios', $data);
		} else {
			$this->seguridad->errorAccesoNoPermitido();

		}
	}
  public function formularioInsertarInstalacion()
	{
		if ($this->seguridad->haySesionIniciada()) {

			$data['listaInstalacion'] = $this->instalacion->getAll();
			$this->vista->mostrar('instalacion/formularioInsertarInstalacion', $data);
		} else {
			$this->seguridad->errorAccesoNoPermitido();

		}
	}
  public function insertarUsuario()
	{

	if ($this->seguridad->haySesionIniciada()) {

			
			$Id = $_REQUEST["Id"];
			$Email = $_REQUEST["Email"];
			$Password = $_REQUEST["Password"];
			$Nombre = $_REQUEST["Nombre"];
			$Apellido1 = $_REQUEST["Apellido1"];
      $Apellido2 = $_REQUEST["Apellido2"];
			$Dni = $_REQUEST["Dni"];
			$tipo = $_REQUEST["tipo"];
      $imagen = $_FILES["imagen"]["name"];
      $Estado = $_REQUEST["Estado"];






			
			$result = $this->usuarios->insert($Id, $Email, $Password, $Nombre, $Apellido1,$Apellido2,$Dni,$tipo,$imagen,$Estado);


			
			$data['listaUsuarios'] = $this->usuarios->getAll();
			$this->vista->mostrar("usuarios/listaUsuarios", $data);
		} else {
			$this->seguridad->errorAccesoNoPermitido();
		}
	}
  public function insertarInstalacion()
	{

	if ($this->seguridad->haySesionIniciada()) {

			
			$IdInstalacion = $_REQUEST["IdInstalacion"];
			$Nombre = $_REQUEST["Nombre"];
			$Descripcion = $_REQUEST["Descripcion"];
			$Imagen = $_FILES["Imagen"]["name"];
			$Precio = $_REQUEST["Precio"];


			
			$result = $this->instalacion->insert($IdInstalacion, $Nombre, $Descripcion, $Imagen, $Precio);

			
			$data['listaInstalacion'] = $this->instalacion->getAll();
			$this->vista->mostrar("instalacion/listaInstalacion", $data);
		} else {
			$this->seguridad->errorAccesoNoPermitido();
		}
	}
 
  public function borrarUsuario()
  {
    if ($this->seguridad->haySesionIniciada())  {
      
      $Id = $_REQUEST["Id"];
      
      $result = $this->usuarios->delete($Id);
      if ($result == 0) {
        $data['msjError'] = "Ha ocurrido un error al borrar el usuario. Por favor, inténtelo de nuevo";
      } else {
        $data['msjInfo'] = "Usuario borrado con éxito";
      }
      
      $data['listaUsuarios'] = $this->usuarios->getAll();
      $this->vista->mostrar("usuarios/listaUsuarios", $data);
    } else {
    $this->seguridad->errorAccesoNoPermitido();
    }
  }
  public function borrarInstalacion()
	{
		if ($this->seguridad->haySesionIniciada()) {
			
			$IdInstalacion = $_REQUEST["IdInstalacion"];
			
			$result = $this->instalacion->delete($IdInstalacion);
			if ($result == 0) {
				
				echo "-1";
			}
			else {
				
				echo $IdInstalacion;
			}
		} else {
			echo "-1";
		}
	}

 
  public function formularioModificarUsuarios()
  {
    if ($this->seguridad->haySesionIniciada()) {

      $Id = $_REQUEST["Id"];
      $data['usuarios'] = $this->usuarios->get($Id);


      $this->vista->mostrar('usuarios/formularioModificarUsuario', $data);
    } else {
    $this->seguridad->errorAccesoNoPermitido();
    }
  }


  public function formularioModificarInstalaciones()
  {
    if ($this->seguridad->haySesionIniciada()) {

      $IdInstalacion = $_REQUEST["IdInstalacion"];
      $data['instalacion'] = $this->instalacion->get($IdInstalacion);


      $this->vista->mostrar('instalacion/formularioModificarInstalaciones', $data);
    } else {
    $this->seguridad->errorAccesoNoPermitido();
    }
  }

  	
  	public function modificarUsuarios()
  	{
  		if ($this->seguridad->haySesionIniciada()) {

  			
        $Id = $_REQUEST["Id"];
  			$Email = $_REQUEST["Email"];
  			$Password = $_REQUEST["Password"];
  			$Nombre = $_REQUEST["Nombre"];
  			$Apellido1 = $_REQUEST["Apellido1"];
        $Apellido2 = $_REQUEST["Apellido2"];
  			$Dni = $_REQUEST["Dni"];
  			$tipo = $_REQUEST["tipo"];
        $Estado = $_REQUEST["Estado"];


  			
  			$result = $this->usuarios->update($Id,$Email, $Password, $Nombre, $Apellido1,$Apellido2,$Dni,$tipo,$Estado);

        $data['listaUsuarios'] = $this->usuarios->getAll();
        $this->vista->mostrar("usuarios/listaUsuarios", $data);
        } else {
        $this->seguridad->errorAccesoNoPermitido();
        }
      }
      public function modificarInstalaciones()
      {
        if ($this->seguridad->haySesionIniciada()) {


          $IdInstalacion = $_REQUEST["IdInstalacion"];
    			$Nombre = $_REQUEST["Nombre"];
    			$Descripcion = $_REQUEST["Descripcion"];
    			$Precio = $_REQUEST["Precio"];


         
          $result = $this->instalacion->update($IdInstalacion, $Nombre, $Descripcion,$Precio);

          $data['listaInstalacion'] = $this->instalacion->getAll();
          $this->vista->mostrar("instalacion/listaInstalacion", $data);
          } else {
          $this->seguridad->errorAccesoNoPermitido();
          }
        }

        public function buscarUsuarios()
	{
		
		$textoBusqueda = $_REQUEST["textoBusqueda"];
		
		$data['listaUsuarios'] = $this->usuarios->busquedaAproximada($textoBusqueda);
		$data['msjInfo'] = "Resultados de la búsqueda: \"$textoBusqueda\"";
		$this->vista->mostrar("usuarios/listaUsuarios", $data);

	}


}

