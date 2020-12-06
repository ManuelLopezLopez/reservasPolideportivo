<?php
	echo "<h1>UsuariosRegistrados</h1>";
	// Mostramos info del usuario logueado (si hay alguno)
	if ($this->seguridad->haySesionIniciada()) {
		echo "<p>Hola, ".$this->seguridad->get("Email")."</p>";
		echo "<image src='".$_FILES['imagen']['name']."'>";

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
		echo "<p><a href='index.php?action=cerrarSesion'>Cerrar sesión</a></p>";
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
		echo "<p><a href='index.php?action=formularioInsertarUsuarios'>Nuevo Usuario</a></p>";
	}

}
