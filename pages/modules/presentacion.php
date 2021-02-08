
<section class="container bg-light pt-5">
	<?php
	//$user->limparSesion();
	?>
	<div class="container pt-3 text-center">
		<h2>Bienvenido al Sistema de inventario</h2>
		<div>Version Pre-Alpha</div>
		<h4>Explicaci&oacute;n basica del funcionamiento del sistema.</h4>
	</div>
	<div class="container pt-4">
		<p>Bienvenido al sistema de inventario desarrolado por <b>Hejevero</b>, 
			por el momento el registro es privado y usuarios nuevos solo puedes ser agregados por
			otros con un rango de usuario de <a href="./pages/modules/inicio.php">administrador</a>.
			</p>
		<p>El sistema se divide en 2 partes principales, <b>modulos y mantenedores</b>.</p>
		<p><b>Modulos:</b> siendo las opciones principales, ej: ver bodegas.</p>
		<p><b>Mantenedores:</b> principalmente para agregar datos, ej: nueva bodega </p>
		<p><a href="#info1" class="inf">Ver Modulos</a></p>
		<div id="info1" class="oculto"><p>Contenido modulos</p></div>
		<p><a href="#info2" class="inf">Ver Mantenedores</a></p>
		<div id="info2" class="oculto"><p>Contenido mantenedores</p></div>
		
	</div>
</section>
<script>
jQuery(document).ready(function(){
	$(".oculto").hide();
	$(".inf").click(function(){
		var nodo = $(this).attr("href");
		if($(nodo).is(":visible")){
			$(nodo).hide();
			return false;
		}else{
			$(".oculto").hide("slow");
			$(nodo).fadeToggle("fast");
			return false;
		}
	});
});
</script>