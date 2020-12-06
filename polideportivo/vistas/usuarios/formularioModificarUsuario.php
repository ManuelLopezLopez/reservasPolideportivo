<?php
// Pasamos las variables preparadas en el controlador ($data[]) a variables normales
// para escribirlas con más facilidad




echo "<h1>Modificación de usuarios</h1>";


// Creamos el formulario con los campos de los usuarios
// y lo rellenamos con los datos que hemos recuperado de la BD
foreach($data['usuarios'] as $usuarios)
echo "
            <form action = 'index.php' method = 'get'>
                <input type='hidden' name='Id' value='$usuarios->Id'><br>
                Email:<input type='email' name='Email'value='$usuarios->Email'><br>
                Password:<input type='password' name='Password'value='$usuarios->Password'><br>
                Nombre:<input type='text' name='Nombre'value='$usuarios->Nombre'><br>
                Primer Apellido:<input type='text' name='Apellido1'value='$usuarios->Apellido1'><br>
                Segundo Apellido:<input type='text' name='Apellido2'value='$usuarios->Apellido2'><br>
                Dni:<input type='text' name='Dni'value='$usuarios->Dni'><br>


                Tipo:<input type='radio' value='Usuario'name='tipo'";
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
              Estado :<input type='radio' value='Activo'name='Estado'";
              if($usuarios->Estado == 'Activo'){
                echo "checked";
              }
              echo ">Activo
              <input type='radio' value='Borrado'name='Estado'";
              if($usuarios->Estado == 'Borrado'){
              echo "checked";
              }
             echo ">Borrado
            <br><br>";





// Finalizamos el formulario
echo "  <input type='hidden' name='action' value='modificarUsuarios'>
            <input type='submit'>
          </form>";
echo "<p><a href='index.php'>Volver</a></p>";
