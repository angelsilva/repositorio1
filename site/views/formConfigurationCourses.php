<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head>
		<?php include('header.php');?>
		<script src="{librerias}/resources/js/jquery-ui-timepicker.js"></script>
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
					<?php
					
						if(isset($data) && $data['success']=='true' && (int) $data['total'] > 0 && isset($data['items']) && is_array($data['items'])){
						
							if(isset($data['items'][0]->cantidadMinima) && isset($data['items'][0]->cantidadMaxima)){
								$amount = $data['items'][0]->cantidadMinima.' - '.$data['items'][0]->cantidadMaxima;
							}elseif(isset($_POST['amount'])){
								$amount = $_POST['amount'];
							}else{
								$amount = '';
							}
							
							if(isset($data['items'][0]->duracion)){
								$duracion = $data['items'][0]->duracion.' hours';
							}elseif(isset($_POST['duracion'])){
								$duracion = $_POST['duracion'];
							}else{
								$duracion = '';
							}
							
							if(isset($data['items'][0]->precio)){
								$precio = '$ '.$data['items'][0]->precio;
							}elseif(isset($_POST['precio'])){
								$precio = $_POST['precio'];
							}else{
								$precio = '';
							}
							
							if(isset($data['items'][0]->fechaInicioPreinscripcion)){
								$fechaInicioPreinscripcion = $data['items'][0]->fechaInicioPreinscripcion;
							}elseif(isset($_POST['fechaInicioPreinscripcion'])){
								$fechaInicioPreinscripcion = $_POST['fechaInicioPreinscripcion'];
							}else{
								$fechaInicioPreinscripcion = '';
							}
							
							if(isset($data['items'][0]->fechaFinPreinscripcion)){
								$fechaFinPreinscripcion = $data['items'][0]->fechaFinPreinscripcion;
							}elseif(isset($_POST['fechaFinPreinscripcion'])){
								$fechaFinPreinscripcion = $_POST['fechaFinPreinscripcion'];
							}else{
								$fechaFinPreinscripcion = '';
							}
							
							if(isset($data['items'][0]->fechaInicioInscripcion)){
								$fechaInicioInscripcion = $data['items'][0]->fechaInicioInscripcion;
							}elseif(isset($_POST['fechaInicioInscripcion'])){
								$fechaInicioInscripcion = $_POST['fechaInicioInscripcion'];
							}else{
								$fechaInicioInscripcion = '';
							}
							
							if(isset($data['items'][0]->fechaFinInscripcion)){
								$fechaFinInscripcion = $data['items'][0]->fechaFinInscripcion;
							}elseif(isset($_POST['fechaFinInscripcion'])){
								$fechaFinInscripcion = $_POST['fechaFinInscripcion'];
							}else{
								$fechaFinInscripcion = '';
							}
							
							if(isset($data['items'][0]->gmt)){
								$gmt = $data['items'][0]->gmt;
							}elseif(isset($_POST['gmt'])){
								$gmt = $_POST['gmt'];
							}else{
								$gmt = '';
							}
						
					?>
						<form method="post" name="frm_config_curso" id="frm_config_curso" action="{URL}/courses/conditions">
							<div id="frm_curso" class="configCursos">
								<h2>Set Courses</h2>
								<input type="hidden" name="idCursos" value="{idCursos}"/>
								<input type="hidden" name="cronograma" class="cronograma" value="{cronograma}"/>
								<div class="div-frmcourses">
									<p>Number of Participants <span>(Min - Max)</span> : </p>
									<div id="slider-range"></div>
									<input type="text" class="rango" name="amount" id="amount" readonly value="<?=$amount?>"/>
								</div>
								<div class="div-frmcourses">
									<p>Duration: </p>
									<div id="slide_duration" style="width:250px;"></div>
									<input type="text" id="duracion" name="duracion" size="4" class="rango required" readonly value="<?=$duracion?>"/>
								</div>
								<div class="div-frmcourses">
									<p>Price (For Person): </p>
									<div id="slide_price" style="width:250px;"></div>
									<input type="text" id="precio" name="precio" size="4" class="rango required" readonly value="<?=$precio?>"/>
								</div>
								<div class="div-frmcourses">
									<p>Image: </p>
									<div class="adjuntar">
										<input type="file" name="imagen" value=""/>
									</div>
								</div>
								<div class="div-frmcourses">
									<p>Certificate: </p>
									<div class="adjuntar">
										<input type="file" name="certificado" value=""/>
									</div>
								</div>
								<div class="div-frmcourses fecha">
									<h3>Pre-Registration date set</h3>
									<div>
										<p>Begin Date: </p>
										<input type="text" id="date_ini" name="fechaInicioPreinscripcion" value="<?=$fechaInicioPreinscripcion?>" readonly class="curved-2 shadow_inset required">
									</div>
									<div>
										<p>End Date: </p>
										<input type="text" id="date_end" name="fechaFinPreinscripcion" value="<?=$fechaFinPreinscripcion?>" readonly class="curved-2 shadow_inset required">
									</div>
								</div>
								<div class="div-frmcourses fecha">
									<h3>Registration date set</h3>
									<div>
										<p>Begin Date: </p>
										<input type="text" id="ins_date_ini" name="fechaInicioInscripcion" value="<?=$fechaInicioInscripcion?>" readonly class="curved-2 shadow_inset required">
									</div>
									<div>
										<p>End Date: </p>
										<input type="text" id="ins_date_end" name="fechaFinInscripcion" value="<?=$fechaFinInscripcion?>" readonly class="curved-2 shadow_inset required">
									</div>
								</div>
								<div class="div-frmcourses" id="cronograma">
									<h3>Schedule set</h3>
									<div class="div-frmcourses">
										<label>GMT</label>
										<input type="text" name="gmt" class="gtm curved-2 shadow_inset" value="<?=$gmt?>"/>
									</div>
									<div class="div-frmcourses timeline">
										<label>Date</label>
										<input type="text" name="fechaTarea" class="fechaTarea curved-2 shadow_inset" readonly />
										<label>Start time</label>
										<input type="text" name="horaInicio" class="hora curved-2 shadow_inset" readonly />
										<label>End time</label>
										<input type="text" name="horaFinal" class="hora curved-2 shadow_inset" readonly />
									</div>
									<a class="nuevaTarea">Add new task</a>
								</div>
								<div class="div-frmcourses activar">
									<input type="checkbox" name="activar" checked="checked"/>	
									<label>I want to activate the course now</label>
								</div>
								<div><input type="button" name="submit2" value="Enviar" onClick="enviarConfiguracion()" class="enviar curved-6" /></div>		
							</div>
						</form>
						<?php
						}
						?>						
					</div>
				</div>
			</div>
		</div>
		<div id="fade" class="overlay"></div>
		<div id="light" class="modal">
			<a href="#" class="cerrar"></a>
			<div class="inner_modal curved-10 form_help">
				<div class="ui-state-error-text">{validation_error}</div>
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

