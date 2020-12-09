
<html>
<head>
<style>
*, *:before, *:after {
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

body {
	background:url('http://cdn.wallpapersafari.com/13/6/Mpsg2b.jpg');
	background-size: 3000px;
  font-family: 'Nunito', sans-serif;
  color: #384047;

}

form {
  max-width: 300px;
  margin: 10px auto;
  padding: 10px 20px;
  background: #f4f7f8;
  border-radius: 8px;
}

h1 {
  margin: 0 0 30px 0;
  text-align: center;
}

input[type="text"],
input[type="password"],
input[type="email"],

select {
  background: rgba(255,255,255,0.1);
  border: none;
  font-size: 16px;
  height: auto;
  margin: 0;
  outline: 0;
  padding: 15px;
  width: 100%;
  background-color: #e8eeef;
  color: #8a97a0;
  box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
  margin-bottom: 30px;
}

input[type="radio"],
input[type="checkbox"] {
  margin: 0 4px 8px 0;
}

select {
  padding: 6px;
  height: 32px;
  border-radius: 2px;
}

button {
  padding: 19px 39px 18px 39px;
  color: #FFF;
  background-color: #4bc970;
  font-size: 18px;
  text-align: center;
  font-style: normal;
  border-radius: 20px;
  width: 100%;
  border: 1px solid #3ac162;
  border-width: 1px 1px 3px;
  box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
  margin-bottom: 10px;
}

fieldset {
  margin-bottom: 30px;
  border: none;
}

legend {
  font-size: 1.4em;
  margin-bottom: 10px;
}

label {
  display: block;
  margin-bottom: 8px;
}
a {
  background-color: #5EF9EA;
  color:#5E70F9;
  padding: 8px;
  text-decoration:none;
 border-radius: 10em;
}




@media screen and (min-width: 480px) {

  form {
    max-width: 480px;
  }

}
</style>
</head>

<body>

<?php
if (isset($_SESSION['Id'])) {




}
			// Comprobamos si hay una sesión iniciada o no

				echo"<body>";
				;
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
            echo '<p><img src="././imagenes/'.$imagen.'"></p>';
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
				 <h1>Alta de Usuarios</h1>
				 <fieldset>
          <legend>Datos Personales</legend>
					<label>Identificador</label><input type='text' name='Id'><br>
						<label>Email:</label><input type='email' name='Email'><br>
							<label>Password</label><input type='password' name='Password'><br>
							<label>Nombre:</label><input type='text' name='Nombre'><br>
						<label>Primer Apellido:</label><input type='text' name='Apellido1'><br>
						<label>Segundo Apellido:</label><input type='text' name='Apellido2'><br>
							<label>Dni:</label><input type='text' name='Dni'><br>
							<label>Tipo :</label>
						<input type='radio' value='Administrador' name='tipo'>Administrador
						<input type='radio' value='Usuario' name='tipo'selected>Usuario<br>
						<label>Estado:</label>
						<input type='radio' value='Activo' name='Estado'>Activo
						<input type='radio' value='Borrado' name='Estado'>Borrado<br>
						</fieldset>
						<fieldset>
        			<label>Añdir imagen:</label><input name='imagen' id='archivo' type='file'/>
						<input type='hidden' name='subir' value='Subir imagen'/>
						</fieldset>";


				// Finalizamos el formulario

				echo "<input type='hidden' name='action' value='insertarUsuario'>
						<button type='submit'>Registrar Usuario</button>
					</form>";
				echo "<p><a href='index.php?action=mostrarListaUsuarios'>Volver</a></p>";
				?>
				</body>
				</html>
