<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head>
		<?php include('header.php');?>
		<link href="{librerias}/resources/js/cleditor/jquery.cleditor.css" rel="stylesheet" type="text/css"/>
		<script src="{librerias}/resources/js/cleditor/jquery.cleditor.min.js" type="text/javascript"></script>
	</head>
	<body>
		<form name="frmGeneric" id="frmGeneric" action="{URL}"></form>
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
					<form method="post" name="frm_curso" id="frm_curso" action="{URL}/courses/editBasicInfo">
							<div id="frm_curso">
								<h2>Edit Courses</h2>
								<input type="hidden" name="idCursos" value="{idCursos}"/>
								<div class="div-frmcourses">
									<p>Title: </p>
									<input type="text" size="100" name="titulo" class="curved-2 shadow_inset required" value="<?= (isset($data['items'])) ? utf8_decode($data['items'][0]->titulo) : $_POST["titulo"];?>"/>
								</div>
								<div class="div-frmcourses des_curso">
									<p>Short Description: </p>
									<input type="text" name="descripcionCorta" class="curved-2 shadow_inset required" value="<?= (isset($data['items'])) ? utf8_decode($data['items'][0]->descripcionCorta) : $_POST["descripcionCorta"];?>"/>
								</div>
								<div class="div-frmcourses">
									<p>Long Description: </p>
									<textarea cols="4" rows="4" class="curved-2 shadow_inset required" name="descripcionLarga"><?= (isset($data['items'])) ? utf8_decode($data['items'][0]->descripcionLarga) : $_POST["descripcionLarga"];?></textarea>
								</div>
								<div class="div-frmcourses">
									<p>Objectives: </p>
									<textarea cols="4" rows="4" class="curved-2 shadow_inset" name="objetivos"><?= (isset($data['items'])) ? utf8_decode($data['items'][0]->objetivos) : $_POST["objetivos"];?></textarea>
								</div>
								<div class="div-frmcourses">
									<p>Requirements: </p>
									<textarea cols="4" rows="4" class="curved-2 shadow_inset" name="prerrequisitos"><?= (isset($data['items'])) ? utf8_decode($data['items'][0]->prerrequisitos) : $_POST["prerrequisitos"];?></textarea>
								</div>
								<div class="div-frmcourses precio">
									<p>Audience: </p>
									<textarea cols="4" rows="4" class="curved-2 shadow_inset" name="audiencia"><?= (isset($data['items'])) ? utf8_decode($data['items'][0]->audiencia) : $_POST["audiencia"];?></textarea>
								</div>
								<div class="div-frmcourses"><input type="submit" name="submit" value="Enviar" onClick="validarFrm('frm_curso');" class="enviar curved-6" /></div>
								<div class="div-frmcourses" id="result"></div>
							</div>
						</form>
						<script type="text/javascript">
							$(document).ready(function() {
								$("textarea").cleditor({
									width:"500px", 
									height:"200px",
									controls: "bold italic underline strikethrough subscript superscript | font size " +
												"style | color highlight removeformat | bullets numbering | outdent " +
												"indent | alignleft center alignright justify | undo redo"
								});
							});
						</script>
					
					</div>
				</div>
			</div>
		</div>
		<div id="fade" class="overlay"></div>
		<div id="light" class="modal">
			<a href="#" class="cerrar"></a>
			<div class="inner_modal curved-10 form_help">
				{validation_error}
			</div>
			<?php if(isset($validation_error)){?>	
				<script type="text/javascript">
					modal();
				</script>
			<?php } ?>
		</div>
		<br clear="both"/>
		<?php include('footer.php'); ?>		
		
		<script type="text/javascript">
			curved();	
		</script>
	</body>
</html>
