<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<header>
		<?php include('header.php'); ?>
	</header>
	<body>
		<div id="contenedor">
			<div id="encabezado" class="encabezado_bg">
				<div class="cabecera">
					<div class="margen">
						<div id="logo"><a href="{URL}"><img src="{librerias}/resources/img/logo.png"></a></div>
						<?php include('login.php'); ?>
					</div>
				</div>
				<div class="help"><a href="#" class="modal_help"></a></div>
				<div class="margen-banner" style="display:none;">
					<?php include('banner_welcome.php'); ?>
				</div>
				<div class="registro" style="display:block;">
					<div class="margen">
						<?php include('form_register.php'); ?>
						<div class="error_form">
							{validation_error}
						</div>
					</div>
				</div>
			</div>
			<?php include('menu_h.php'); ?>
			<div id="contenido">
				<?php include('steps.php'); ?>
				<div class="recent">
					<div class="margen">
						<?php include('current_courses.php'); ?>
						<?php include('profiles.php'); ?>
					</div>
				</div>
			</div>
			<div id="fade" class="overlay"></div>
			<?php include('support.php'); ?>
			
		</div>
		<br clear="both"/>
		<?php include('footer.php'); ?>		
		<script type="text/javascript">
			curved();	
		</script>
	</body>
</html>
