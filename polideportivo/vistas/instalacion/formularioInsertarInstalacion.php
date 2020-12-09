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
    max-width: 600px;
  }

}
</style>
</head>

<body>

<?php
if (isset($_SESSION['IdInstalacion'])) {

}
				echo"<body>";
				if (isset($_POST['subir'])) {
   
   $Imagen = $_FILES['Imagen']['name'];
   
   if (isset($Imagen) && $Imagen != "") {
     
      $Tipo = $_FILES['archivo']['type'];
      $tamano = $_FILES['archivo']['size'];
      $temp = $_FILES['archivo']['tmp_name'];
      /
     if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
        echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
        - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
     }
     else {
        
        if (move_uploaded_file($temp, '/imagenes/instalaciones'.$Imagen)) {
            
            chmod('imagenes/'.$Imagen, 0777);
            
            echo '<div>Se ha subido correctamente la imagen.</div>';
            
            echo '<p><img src="././imagenes/instalaciones'.$Imagen.'"></p>';
        }
        else {
           
           echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
        }
      }
   }
}

echo "</body>";

				
				echo "<form action = 'index.php'enctype='multipart/form-data' method = 'post'>
				<h1>Nuevas Instalaciones</h1>
				<fieldset><label></label>
				<legend>Datos Instalacion</legend>
						<label>IdInstalacion:</label><input type='text' name='IdInstalacion'><br>
						<label>Nombre:</label>
						<input type='radio' value='Pista de Tenis' name='Nombre'>Pista de Tenis
						<input type='radio' value='Pista de Padel' name='Nombre'>Pista de Padel
						<input type='radio' value='Cancha de Baloncesto' name='Nombre'>Cancha de Baloncesto
						<input type='radio' value='Piscina' name='Nombre'selected>Picina<br>
						<br>
						<br>
						<label>Descripcion:</label><input type='text' name='Descripcion'><br>
						<label>Precio :</label>
						<input type='radio' value='4€/h' name='Precio'>4€/hora
						<input type='radio' value='5€/h' name='Precio' >5€/hora
            <input type='radio' value='6€/h' name='Precio' >6€/hora
            <input type='radio' value='7€/h' name='Precio'selected>7€/hora<br>
						<br>
						</fieldset>
						<fieldset>
        		<label>Añdir imagen:</label><input name='Imagen' id='archivo' type='file'/>
						<input type='hidden' name='subir' value='Subir imagen'/>
						</fieldset>";

				
				echo "<input type='hidden' name='action' value='insertarInstalacion'>
						<button type='submit'>Insertar Instalacion</button>
					</form>";
				echo "<p><a href='index.php?action=ListaInstalacion'>Volver</a></p>";
				?>
				</body>
				</html>
