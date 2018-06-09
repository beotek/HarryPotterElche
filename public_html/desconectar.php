<?php
	if($_SESSION['usuario']!=""){
		$_SESSION['usuario']="";
		if (isset($_SESSION['email']))
			unset($_SESSION['email']);
			unset($_SESSION['usuario']);
			unset($_SESSION['nombreusuario']);
			echo'<script language="javascript">window.location=index.php?p=usrDesc</script>;';
	}
?>



	<div id="cerrarsesion">
		<section class=cerrarsesion>


	<h1>Hasta Pronto!</h1>
	<br>
	<a href="index.php"> <button type="button" name="button" class=button-naranja>volver al inicio</button></a>
	</section>
	</div>
