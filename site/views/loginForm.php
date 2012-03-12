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
					<?php include('banner_top.php'); ?>
				</div>
				<div class="registro" style="display:block;">
					<div class="margen">
						<div class="form_registro">
							<h1 class="h1_margin">User Validation</h1>
							<form name="frmLogin" method="post" action="{URL}/access/authenticate">
								<div class="margin_top">User:<input class="curved-3 shadow_inset" type="text" name="usuario" value=""/></div>
								<div>Pass<input class="curved-3 shadow_inset" type="password" name="clave"/></div>
								<div class="term_cond"><a href="{URL}/access/formForgetPass">Passwort vergessen >></a></div>
								<div class="term_cond"><a href="{URL}/register/formRegister" class="registrar">Noch kein Mitglied?</a></div>
							</form>
							<a href="#" onClick="javaScript:document.frmLogin.submit();" class="curved-3 btn_box_login enviar">Anmelden</a>
						</div>
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
		<?php include('support.php'); ?>		
		<script type="text/javascript">
			curved();	
		</script>
	</body>
</html>
