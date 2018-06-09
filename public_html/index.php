<?php
		require_once("cabecera.php");
		/*
		include_once();
		include()
		include()*/
	?>
	<main id="stuff">
			<?php
			$msgErr="";
				$pagina="inicio";
				if(isset($_GET['p']))
					$pagina=$_GET['p'];

				if($pagina=="inicio")
					include("inicio.php");
				if($pagina=="contacto")
						include("contacto.php");
				if($pagina=="personajesharrypotter")
						include("personajes.php");
				if($pagina=="librosharrypotter")
					include("libros.php");
        if($pagina=="hechizosharrypotter")
          include("hechizos.php");


				if($pagina=="registro")
					include("registro.php");
				if($pagina=="iniciarsesion")
					include("iniciarsesion.php");
				if($pagina=="noticias")
					include("noticias.php");
				if($pagina == 'usrDesc')
					include("desconectar.php");
				if($pagina == 'grancomedor')
						include("grancomedor.php");


				if($pagina == 'salagry')
						include("salagry.php");
				if($pagina == 'salahuf')
						include("salahuf.php");
				if($pagina == 'salapre')
						include("salapre.php");
				if($pagina == 'salarav')
						include("salarav.php");
				if($pagina == 'salasly')
						include("salasly.php");

				if($pagina == 'modiuser')
			 			include("modificarUsuario.php");
				if($pagina == 'borraruser')
						include("borrarusuario.php");


				if($pagina =='test1')
						include("test1.php");
				if($pagina =='test2')
						include("test2.php");
				if($pagina =='test3')
						include("test3.php");
				if($pagina =='test4')
						include("test4.php");
				if($pagina =='test5')
						include("test5.php");
				if($pagina =='test6')
						include("test6.php");
			?>
	</main>
	<?php
			require_once("pie.php");
		?>
