<html>
<head>
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

	function borrarPorAjax(Id) {
		if (confirm("¿Está seguro de que desea borrar el usuario?")) {
			IdGlobal = Id;
			peticionAjax.onreadystatechange = borradoUsuarioCompletado;
			peticionAjax.open("GET", "index.php?action=borrarUsuario&Id=" + Id, true);
			peticionAjax.send(null);
		}
	}

	function borradoUsuarioCompletado() {
		if (peticionAjax.readyState == 4) {
			if (peticionAjax.status == 200) {
				Id = peticionAjax.responseText;
				if (Id == -1) {
					document.getElementById('msjError').innerHTML = "Ha ocurrido un error al borrar el usuario";
				} else {
					document.getElementById('msjInfo').innerHTML = "Usuario borrado con éxito";
					document.getElementById('usuarios' + Id).remove();
				}
			}
		}
	}
  </script>
</head>

<body>
<?php


	echo "<h1>UsuariosRegistrados</h1>";
	// Mostramos info del usuario logueado (si hay alguno)
	if ($this->seguridad->haySesionIniciada()) {
		echo "<p>Hola, ".$this->seguridad->get("Email")."</p>";
	//	echo "<image src='".$_FILES['imagen']['name']."'>";

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
		echo "<p><a class='otro' href='index.php?action=cerrarSesion'>Cerrar sesión</a></p>";
	}
	else {
		echo "<p><a href='index.php?action=mostrarFormularioLogin'>Iniciar sesión</a></p>";
	}
	echo "<form action='index.php'>
			<input type='hidden' name='action' value='buscarUsuarios'>
           	<input type='text' name='textoBusqueda'>
			<input type='submit' value='Buscar'>
            </form><br>";

	if (count($data['listaUsuarios']) > 0) {
	// Ahora, la tabla con los datos de los usuarios

		echo "<table border ='1'>";
		echo "<tr>";
		echo "<td>" . "Id". "</td>";
		echo "<td>" . "Email". "</td>";
		echo "<td>" . "Nombre". "</td>";
		echo "<td>" . "Apellido1". "</td>";
		echo "<td>" . "Apellido2". "</td>";
		echo "<td>" . "Dni". "</td>";
		echo "<td>" . "tipo". "</td>";
		echo "<td>" . "Estado". "</td>";
		echo "<td>" . "imagen". "</td>";
		echo "</tr>";


	foreach($data['listaUsuarios'] as $usuarios) {


						echo "<tr>";
						echo "<td>" . $usuarios->Id . "</td>";
						echo "<td>" . $usuarios->Email . "</td>";
						echo "<td>" . $usuarios->Nombre . "</td>";
						echo "<td>" . $usuarios->Apellido1 . "</td>";
						echo "<td>" . $usuarios->Apellido2 . "</td>";
					echo "<td>" . $usuarios->Dni . "</td>";
					echo "<td>" . $usuarios->tipo . "</td>";
					echo "<td>" . $usuarios->Estado . "</td>";
					echo "<td><img src='././imagenes/" . $usuarios->imagen ."'width='50px'></td>";


					// Los botones "Modificar" y "Borrar" solo se muestran si hay una sesión iniciada
					if ($this->seguridad->haySesionIniciada()) {
						echo "<td><a href='index.php?action=formularioModificarUsuarios&Id=" . $usuarios->Id . "'>Modificar</a></td>";
						echo "<td><a href='index.php?action=borrarUsuario&Id=" . $usuarios->Id . "'>Borrar</a></td>";
						
					}

			echo "</tr>";
			}

	echo "</table>";


	// El botón "Nuevo Usuario" solo se muestra si hay una sesión iniciada
	if (isset($_SESSION["Id"])) {
		echo "<p><a class='otro' href='index.php?action=formularioInsertarUsuarios'>Nuevo Usuario</a></p>";
	}
	if (isset($_SESSION["Id"])) {
		echo "<p><a class='otro' href='index.php?action=listaInstalacion'>Mostrar Instalaciones</a></p>";
	}

}

?>
</body>
</html>
