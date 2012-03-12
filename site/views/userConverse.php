<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head>
		<?php include('header.php');?>
		<link href="{librerias}/resources/js/extjs/resources/css/ext-all.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="{librerias}/resources/js/extjs/bootstrap.js"></script>
		<script type="text/javascript" src="{librerias}/resources/js/mainextjs.js"></script>
	</head>
	<body>
		<form id="frmGeneric" name="frmGeneric" action="{URL}"></form>
		<div id="contenedor">
			<div id="encabezado" class="encabezado_bg">
				<div class="margen">
					<div id="logo"><a href="{URL}"><img src="{librerias}/resources/img/logo.png"></a></div>
					<?php include('login.php'); ?>
				</div>
			</div>
			<?php include('menu_h.php'); ?>
			<div id="contenido">
				<div class="margen">
					<?php include('sidebar_userpanel.php');?>
					<div class="seccion">
						<div class="userConverse">
							<h1>To begin creating courses you must become operator to do this you must read the terms and conditions and check the option "I accept these terms and conditions"</h1>
							<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.</p>
							<p>It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>
							<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>
						
							<div class="acept">
								<form action="{URL}/courses/converToOperator" method="POST">
									<input type ="checkbox" name="aceptar" id="aceptar"></input>
									<label>I accept these terms and conditions</label>
									<input type="submit" value="Send" class="bg_gradient_azul curved-4"></input>
								</form>
							</div>
							<div class="error"><?=(isset($validation_error)) ? $validation_error : '' ?></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<br clear="both"/>
	<?php include('footer.php'); ?>		
		
		<script type="text/javascript">
			curved();	
		</script>
	</body>
</html>
