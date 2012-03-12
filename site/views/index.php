<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<?php include('header.php');?>
	<body>
		<form id="frmGeneric" name="frmGeneric" action="{URL}"></form>
		<div class="help"><a href="#" class="modal_help"></a></div>
		<div id="contenedor">
			<div id="encabezado" class="encabezado_bg">
				<div class="cabecera">
					<div id="logo"><a href="{URL}"><img src="{librerias}/resources/img/logo.png"></a></div>
					<?php include('login.php'); ?>
				</div>
				<div class="margen-banner">
					<?php include('banner_top.php'); ?>
				</div>
				<div class="registro">
					<div class="margen">
						<?php include('form_register.php'); ?>
						<div class="mje_registro">
							<p>Bist du Experte und m&ouml;chtest 
							dein Wissen anbieten? <span>oder</span><br>
							suchst du nach Expertenhilfe?
							<a href="#">Mehr erfahren</a>
							</p>
						</div>	
					</div>					
				</div>
			</div>
			<?php include('menu_h.php'); ?>
			<?php include('steps.php'); ?>
			<div class="margen">
				<div id="contenido">
					<div class="recent">
							<div id="coursesGrid"><?php include('current_courses.php'); ?></div>
							<div id="profilesGrid"></div>
					</div>
				</div>
				<div id="fade" class="overlay"></div>
				<?php include('support.php'); ?>
			</div>
		</div>
		<br clear="both"/>
		<?php include('footer.php'); ?>		
		<script type="text/javascript">
			curved();	
		</script>
	</body>
</html>
