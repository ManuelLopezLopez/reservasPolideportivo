<?php
	if (isset($data['msjError'])) {
		echo "<p style='color:red'>".$data['msjError']."</p>";
	}
	if (isset($data['msjInfo'])) {
		echo "<p style='color:blue'>".$data['msjInfo']."</p>";
	}
?>
<link href='./estilos.css' rel='stylesheet' type='text/css'>
<form action='index.php'>
<div class="login">
  <div class="login-header">
    <h1>Login</h1>
  </div>
  <div class="login-form">
    <h3>Email:</h3>
    <input type="text"name='Email' placeholder="Email"/><br>
    <h3>Contraseña</h3>
    <input type="password" name='Password' placeholder="Password"/>
    <br>

		<input type='hidden' name='action' value='procesarLogin'>
		<br>
		<input type='submit'>
    <br>
  </div>
</div>

</form>
