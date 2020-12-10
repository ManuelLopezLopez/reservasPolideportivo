<html>
<head>
	<meta charset="utf-8">
<style>
* {
	margin: 0;
	padding: 0;
}
body {
	background:url('http://cdn.wallpapersafari.com/13/6/Mpsg2b.jpg');
	font: 14px/1.4 Georgia, Serif;
}
#page-wrap {
	margin: 50px;
}
p {
	margin: 20px 0;
}

	/*
	Generic Styling, for Desktops/Laptops
	*/
	table {
		width: 100%;
		border-collapse: collapse;
	}
	/* Zebra striping */
	tr {
		background: #eee;
	}
	th {
		background: #333;
		color: white;
		font-weight: bold;
	}
	td, th {
		padding: 6px;
		border: 1px solid #ccc;
		text-align: left;
	}
	a.otro {
	  background-color: #5EF9EA;
	  color:#5E70F9;
	  padding: 8px;
	  text-decoration:none;
		border-radius: 10em;
	}
	a{

	  color:#5E70F9;
	  padding: 8px;
	  text-decoration:none;

	}
</style>

<script>
	// **** Petición y respuesta AJAX con JS tradicional ****

	peticionAjax = new XMLHttpRequest();

	function borrarPorAjax(IdInstalacion) {
		if (confirm("¿Está seguro de que desea borrar la instalacion?")) {
			IdInstalacionGlobal = IdInstalacion;
			peticionAjax.onreadystatechange = borradoInstalacionCompletado;
			peticionAjax.open("GET", "index.php?action=borrarInstalacion&IdInstalacion=" + IdInstalacion, true);
			peticionAjax.send(null);
		}
	}

	function borradoInstalacionCompletado() {
		if (peticionAjax.readyState == 4) {
			if (peticionAjax.status == 200) {
				IdInstalacion = peticionAjax.responseText;
				if (IdInstalacion == -1) {
					document.getElementById('msjError').innerHTML = "Ha ocurrido un error al borrar la Instalacion";
				} else {
					document.getElementById('msjInfo').innerHTML = "Instalacion borrada con éxito";
					document.getElementById('instalacion' + IdInstalacion).remove();
				}
			}
		}
	}
  </script>
  <?php
	echo "<h1>Instalaciones Disponibles</h1>";
	// Mostramos info del usuario logueado (si hay alguno)
	if ($this->seguridad->haySesionIniciada()) {
		echo "<p>Hola, ".$this->seguridad->get("Email")."</p>";

	}
	// Mostramos mensaje de error o de información (si hay alguno)
	if (isset($data['msjError'])) {
		echo "<p style='color:red'>".$data['msjError']."</p>";
	}
	if (isset($data['msjInfo'])) {
		echo "<p style='color:blue'>".$data['msjInfo']."</p>";
	}

	// Enlace a "Iniciar sesión" o "Cerrar sesión"
	if (isset($_SESSION["Id"])) {
		echo "<p><a  class='otro' href='index.php?action=cerrarSesion'>Cerrar sesión</a></p>";
	}
	else {
		echo "<p><a  class='otro'href='index.php?action=mostrarFormularioLogin'>Iniciar sesión</a></p>";
	}


	if (count($data['listaInstalacion']) > 0) {

		echo "<table border ='1'>";
		echo "<tr>";
		echo "<td>" . "IdInstalacion". "</td>";
		echo "<td>" . "Nombre". "</td>";
		echo "<td>" . "Descripcion". "</td>";
		echo "<td>" . "Imagen". "</td>";
		echo "<td>" . "Precio". "</td>";
		echo "</tr>";


	foreach($data['listaInstalacion'] as $instalacion) {


						echo "<tr>";
						echo "<td>" . $instalacion->IdInstalacion . "</td>";
						echo "<td>" . $instalacion->Nombre . "</td>";
						echo "<td>" . $instalacion->Descripcion . "</td>";
						echo "<td><img src='././imagenes/instalaciones/" . $instalacion->Imagen ."'width='50px'></td>";
						echo "<td>" . $instalacion->Precio . "</td>";




					// Los botones "Modificar" y "Borrar" solo se muestran si hay una sesión iniciada
					if ($this->seguridad->haySesionIniciada()) {
						echo "<td><a href='index.php?action=formularioModificarInstalaciones&IdInstalacion=" . $instalacion->IdInstalacion . "'>Modificar</a></td>";
						echo "<td><a href='index.php?action=borrarInstalacion&IdInstalacion=" . $instalacion->IdInstalacion . "'>Borrar</a></td>";

					}

			echo "</tr>";
			}

	echo "</table>";


	// El botón "Nuevo Usuario" solo se muestra si hay una sesión iniciada
	if (isset($_SESSION["Id"])) {
		echo "<p><a class='otro' href='index.php?action=formularioInsertarInstalacion'>Nueva Instalacion</a></p>";
	}
  echo "<p><a class='otro' href='index.php?action=mostrarListaUsuarios'>Volver</a></p>";

}
