
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
    max-width: 480px;
  }

}
</style>
</head>

<body>

<?php
// Creamos el formulario con los campos de los usuarios
// y lo rellenamos con los datos que hemos recuperado de la BD
foreach($data['usuarios'] as $usuarios)

          echo "<form action = 'index.php' method = 'get'>
                <h1>Modificación de usuarios</h1>
                <fieldset>
                <legend>Datos Personales</legend>
                <input type='hidden' name='Id' value='$usuarios->Id'><br>
                <label>Email:</label><input type='email' name='Email'value='$usuarios->Email'><br>
                <label>Password:</label><input type='password' name='Password'value='$usuarios->Password'><br>
                <label>Nombre:</label><input type='text' name='Nombre'value='$usuarios->Nombre'><br>
                <label>Primer Apellido:</label><input type='text' name='Apellido1'value='$usuarios->Apellido1'><br>
                <label>Segundo Apellido:</label><input type='text' name='Apellido2'value='$usuarios->Apellido2'><br>
                <label>Dni:</label><input type='text' name='Dni'value='$usuarios->Dni'><br>
                <label>Tipo :</label>
                <input type='radio' value='Usuario'name='tipo'";
                if($usuarios->tipo == 'Usuario'){
                  echo "checked";
                }
                echo ">Usuario
                <input type='radio' value='Administrador'name='tipo'";
                if($usuarios->tipo == 'Administrador'){
                echo "checked";
                }
               echo ">Administrador
              <br><br>
              <label>Estado:</label>
              <input type='radio' value='Activo'name='Estado'";
              if($usuarios->Estado == 'Activo'){
                echo "checked";
              }
              echo ">Activo

              <input type='radio' value='Borrado'name='Estado'";
              if($usuarios->Estado == 'Borrado'){
              echo "checked";
              }
             echo ">Borrado
            <br><br>
            </fieldset>";





// Finalizamos el formulario
echo "<input type='hidden' name='action' value='modificarUsuarios'>
    <button type='submit'>Modificar Usuario</button>
  </form>";
echo "<p><a href='index.php?action=mostrarListaUsuarios'>Volver</a></p>";
