<?php
	if (isset($data['msjError'])) {
		echo "<p style='color:red'>".$data['msjError']."</p>";
	}
	if (isset($data['msjInfo'])) {
		echo "<p style='color:blue'>".$data['msjInfo']."</p>";
	}
?>
<style>
	 .outer {
		 position: relative;
		 height:500px;
     width:500px;
		 padding-top: 100px;
		 text-align: left;
		 background-color:  #7CF1BD;
	 }
	 .inner {
		 position: center;
		 height:100px;
	   width:400px;
		 margin: 0px auto;
		 background-color: ##7CF1BD ;
	 }

 </style>

 <div class="outer">

     <div class="inner">
			 <form action='index.php'>

			 Email:<input type='text' name='Email'>
			 <br>
			 Contraseña:<input type='password' name='Password'>
			 <br>
			 <input type='hidden' name='action' value='procesarLogin'>
       <br>
			 <input type='submit'>

			</form>

   </div>
 </div>
