
<html>
<head>
	<meta charset="utf-8">
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
  border-radius: 5px;
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



foreach($data['instalacion'] as $instalacion)
echo "
            <form action = 'index.php' method = 'get'>
            <h1>Modificación de instalaciones</h1>
            <fieldset>
            <legend>Datos Instalacion</legend>
                <input type='hidden' name='IdInstalacion' value='$instalacion->IdInstalacion'><br>
                <label>Nombre:</label>
                <input type='radio' value='Pista de Tenis' name='Nombre'";
                if($instalacion->Nombre == 'Pista de Tenis'){
                  echo "checked";
                }
                echo ">Pista de Tenis
                <input type='radio' value='Pista de Padel'name='Nombre'";
                if($instalacion->Nombre == 'Pista de Padel'){
                echo "checked";
                }
               echo ">Pista de Padel
               <input type='radio' value='Cancha de Baloncesto'name='Nombre'";
               if($instalacion->Nombre == 'Cancha de Baloncesto'){
                 echo "checked";
               }
               echo ">Cancha de Baloncesto
               <input type='radio' value='Piscina'name='Nombre'";
               if($instalacion->Nombre == 'Piscina'){
               echo "checked";
               }
              echo ">Piscina

            <br>
            <br>
            <br>
                <label>Descripcion:</label><input type='text' name='Descripcion'value='$instalacion->Descripcion'><br>

                <label>Precio:</label>
                <input type='radio' value='4euros'name='Precio'";
                if($instalacion->Precio == '4€/h'){
                  echo "checked";
                }
                echo ">4€/h
                <input type='radio' value='5euros'name='Precio'";
                if($instalacion->Precio == '5€/h'){
                echo "checked";
                }
               echo ">5€/h
               <input type='radio' value='6euros'name='Precio'";
               if($instalacion->Precio == '6€/h'){
                 echo "checked";
               }
               echo ">6€/h
               <input type='radio' value='7euros'name='Precio'";
               if($instalacion->Precio == '7€/h'){
               echo "checked";
               }
              echo ">7€/h

            <br><br>
            </fieldset>";





// Finalizamos el formulario
echo "  <input type='hidden' name='action' value='modificarInstalaciones'>
            <button type='submit'>Modificar Instalacion</button>
          </form>";
echo "<p><a href='index.php?action=ListaInstalacion'>Volver</a></p>";
