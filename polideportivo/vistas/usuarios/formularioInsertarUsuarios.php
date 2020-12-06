<?php
if (isset($_SESSION['Id'])) {




}
			// Comprobamos si hay una sesión iniciada o no
				echo "<h1>Alta de Usuarios</h1>";
				echo"<body>";
				if (isset($_POST['subir'])) {
   //Recogemos el archivo enviado por el formulario
   $imagen = $_FILES['imagen']['name'];
   //Si el archivo contiene algo y es diferente de vacio
   if (isset($imagen) && $imagen != "") {
      //Obtenemos algunos datos necesarios sobre el archivo
      $Tipo = $_FILES['archivo']['type'];
      $tamano = $_FILES['archivo']['size'];
      $temp = $_FILES['archivo']['tmp_name'];
      //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
     if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
        echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
        - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
     }
     else {
        //Si la imagen es correcta en tamaño y tipo
        //Se intenta subir al servidor
        if (move_uploaded_file($temp, '/imagenes/'.$imagen)) {
            //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
            chmod('imagenes/'.$imagen, 0777);
            //Mostramos el mensaje de que se ha subido co éxito
            echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
            //Mostramos la imagen subida
            echo '<p><img src="imagenes/'.$imagen.'"></p>';
        }
        else {
           //Si no se ha podido subir la imagen, mostramos un mensaje de error
           echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
        }
      }
   }
}

echo "</body>";

				// Creamos el formulario con los campos de el usuario
				echo "<form action = 'index.php'enctype='multipart/form-data' method = 'post'>
						Id:<input type='text' name='Id'><br>
						Email:<input type='email' name='Email'><br>
						Password:<input type='password' name='Password'><br>
						Nombre:<input type='text' name='Nombre'><br>
						Primer Apellido:<input type='text' name='Apellido1'><br>
						Segundo Apellido:<input type='text' name='Apellido2'><br>
						Dni:<input type='text' name='Dni'><br>
						Tipo :
						<input type='radio' value='Administrador' name='tipo'>Administrador
						<input type='radio' value='Usuario' name='tipo'selected>Usuario<br>
						Estado:
						<input type='radio' value='Activo' name='Estado'>Activo
						<input type='radio' value='Borrado' name='Estado'>Borrado<br>
        		Añdir imagen: <input name='imagen' id='archivo' type='file'/>
						<input type='submit' name='subir' value='Subir imagen'/>";



				// Finalizamos el formulario
				echo "  <input type='hidden' name='action' value='insertarUsuario'>
						<input type='submit'>
					</form>";
				echo "<p><a href='index.php'>Volver</a></p>";
