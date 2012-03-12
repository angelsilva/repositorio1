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
						<div class="img_perfil">
							<img src="<?=(isset($foto)) ? $foto : $librerias.'/resources/img/thumb_foto_perfil.jpg' ?>"/>
							<a href="#" id="imgProfile" class="edit_foto">Profilbild &auml;ndern</a>
						</div>
						<div class="titulos">
							<h2>{nombres} {apellidos}</h2>
							<h3>Privatsph&auml;re</h3>
						</div>
						<div class="descripcion">
							<div class="datos">
								<div class="label">Email:</div>
								<div class="dato edt_email">
									<span>{email}</span>
									<div class="group" style="display:none;">
										<input type="text" name="email"/>
										<p style="font-size:10px;color:#555;">Enter your password</p>
										<input type="password" name="pass"/>
										<button class="btn_save bg_gradient_gris shadow curved-2">Save</button>
										<button class="btn_cancel bg_gradient_gris shadow curved-2">Cancel</button>
									</div>
								</div>
								<div class="botones">
									<a href="#" class="edit" name="email"></a>
									<a href="#" id="btn_priv_email" class="<?=(isset($camposPrivados['email']) ? 'lock':'unlock')?>"></a>
								</div>
							</div>
							<div class="datos">
								<div class="label">Passwort:</div>
								<div class="dato edt_clave">
									<span>************</span>
									<div class="group" style="display:none;">
										<p style="font-size:10px;color:#555;">Old Pass</p>
										<input type="password" name="oldPass"/>
										<p style="font-size:10px;color:#555;">New Pass</p>
										<input type="password" name="newPass"/>
										<p style="font-size:10px;color:#555;">New Pass Confirm</p>
										<input type="password" name="newPassConfirm"/>
										<button class="btn_save bg_gradient_gris shadow curved-2">Save</button>
										<button class="btn_cancel bg_gradient_gris shadow curved-2">Cancel</button>
									</div>
								</div>
								<div class="botones">
									<a href="#" class="edit" name="clave"></a>
								</div>
							</div>
							<div class="datos">
								<div class="label">Adress:</div>
								<div class="dato edt_direccion">									
									<span>{direccion}</span>
									<div class="group" style="display:none;">
										<input type="text" name="direccion"/>
										<button class="btn_save bg_gradient_gris shadow curved-2">Save</button>
										<button class="btn_cancel bg_gradient_gris shadow curved-2">Cancel</button>
									</div>
								</div>
								<div class="botones">
									<a href="#" class="edit" name="direccion"></a>
									<a href="#" id="btn_priv_direccion" class="<?=(isset($camposPrivados['direccion']) ? 'lock':'unlock')?>"></a>
								</div>
							</div>
							<div class="datos">
								<div class="label">Telefon:</div>
								<div class="dato edt_telefono">
									<span>{telefono}</span>
									<div class="group" style="display:none;">
										<input type="text" name="telefono"/>
										<button class="btn_save bg_gradient_gris shadow curved-2">Save</button>
										<button class="btn_cancel bg_gradient_gris shadow curved-2">Cancel</button>
									</div>
								</div>
								<div class="botones">
									<a href="#" class="edit" name="telefono"></a>
									<a href="#" id="btn_priv_telefono" class="<?=(isset($camposPrivados['telefono']) ? 'lock':'unlock')?>"></a>
								</div>
							</div>
							<div class="datos">
								<div class="label">Kompetenzen</div>
								<div class="dato edt_conocimientos">
									<span>{conocimientos}</span>
									<div class="group" style="display:none;">
										<input type="text" id="txt_conocimientos" name="conocimientos"></input>
										<p style="font-size:10px;color:#555;">Separated by a comma Eg: Language, Law, Economics</p>
										<button class="btn_save bg_gradient_gris shadow curved-2">Save</button>
										<button class="btn_cancel bg_gradient_gris shadow curved-2">Cancel</button>
									</div>
								</div>
								<div class="botones">
									<a href="#" class="edit" name="conocimientos"></a>
									<a href="#" id="btn_priv_conocimientos" class="<?=(isset($camposPrivados['conocimientos']) ? 'lock':'unlock')?>"></a>
								</div>
							</div>

							<div class="info">
								<div class="label">Profilbeschreibung</div>
								<div class="dato edt_descripcion">
									<span>{descripcion}</span>
									<div class="group" style="display:none;">
										<textarea name="descripcion"></textarea>
										<button class="btn_save bg_gradient_gris shadow curved-2">Save</button>
										<button class="btn_cancel bg_gradient_gris shadow curved-2">Cancel</button>
									</div>
								</div>
								<div class="botones">
									<a href="#" class="edit" name="descripcion"></a>
									<a href="#" id="btn_priv_descripcion" class="<?=(isset($camposPrivados['descripcion']) ? 'lock':'unlock')?>"></a>
								</div>
							</div>
						</div>
					</div>
					<script type="text/javascript">
						// $('#txt_conocimientos').tagsInput({width:'250px',height:'50px','hide':false,'minInputWidth':100});
						$('div.seccion').data('email','{email}');
						$('div.seccion').data('direccion','{direccion}');
						$('div.seccion').data('telefono','{telefono}');
						$('div.seccion').data('descripcion','{descripcion}');
						$('div.seccion').data('conocimientos','{conocimientos}');
							
					</script>
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
