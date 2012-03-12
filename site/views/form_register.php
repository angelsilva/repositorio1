					<?php
						$nombres = (isset($_POST['nombres'])) ? $_POST['nombres'] : '';
						$apellidos = (isset($_POST['apellidos'])) ? $_POST['apellidos'] : '';
						$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
						$email = (isset($_POST['email'])) ? $_POST['email'] : '';
					?>
					
						<div class="form_registro">
							<form name="frmRegister" method="post" action="{URL}/register/verify">
								<h1>Noch kein mitglied?</h1>
								<p>Jetzt Mitglied werden</p>
								<div>Vorname <input type="text" name="nombres" class="curved-2 shadow_inset" value="<?=$nombres?>"/></div>
								<div>Nachname <input type="text" name="apellidos" class="curved-2 shadow_inset" value="<?=$apellidos?>"/></div>
								<div>User Name <input type="text" name="usuario" class="curved-2 shadow_inset" value="<?=$usuario?>"/></div>
								<div>Emailadresse <input type="text" name="email" class="curved-2 shadow_inset" value="<?=$email?>"/></div>
								<div>Emailadresse best&auml;tigen<input type="text" name="emailConfirm" class="curved-2 shadow_inset"/></div>
								<div>Passwort<input type="password" name="clave" class="curved-2 shadow_inset"/></div>
								<div>Passwort best&auml;tigen<input type="password" name="claveConfirm" class="curved-2 shadow_inset"/></div>
								<div class="captcha">{captcha_register}</div>
								<div>Escriba los caracteres que vea <input type="text" name="captcha" class="curved-2 shadow_inset"/></div>
								<div class="term_cond">Hacer clic en <strong>Registrar</strong> significa que acepta el <a href="#">Contrato de servicios de colabEx</a> </div>
								<a href="#" onClick="javascript:document.frmRegister.submit();" class="enviar">Konto erstellen</a>
							</form>
						</div>
					