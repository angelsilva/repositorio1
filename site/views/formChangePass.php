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
							<h1 class="h1_margin">Update Password</h1>
							<form name="frmChange" method="post" action="{URL}/access/changePassMail">
								<div class="p_align">Enter a new password</div>
								<div>Password<input class="curved-3 shadow_inset" type="password" name="clave" value=""/></div>
								<div>Confirm password<input class="curved-3 shadow_inset" type="password" name="claveConfirm" value=""/></div>
								<div class="captcha">{captcha_register}</div>
								<div>Escriba los caracteres que vea <input type="text" name="captcha" class="curved-2 shadow_inset"/></div>
								<div><input type="hidden" name="codigo" value="{codigo}"/></div>
							</form>
							<a href="#" onClick="javaScript:document.frmChange.submit();" class="curved-3 btn_box_login enviar">Send</a>
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
