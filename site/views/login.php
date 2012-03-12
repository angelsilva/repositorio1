				<?php
					if($show_login=='true'){
				?>

						<div class="btn_login">
							<a href="#" class="w_login">Login <img src="{librerias}/resources/img/arrow_login.png"/></a>
							<div class="box_login">
								<form name="frmLogin1" method="post" action="{URL}/access/authenticate">
									<input class="curved-3 shadow_inset" type="text" name="usuario" value="Benutzername..."/>
									<input class="curved-3 shadow_inset" type="password" name="clave"/>
									<a href="{URL}/access/formForgetPass">Passwort vergessen >></a>
									<a href="#" class="registrar">Noch kein Mitglied?</a>
								</form>
								<a href="#" onClick="javaScript:document.frmLogin1.submit();" class="curved-3 btn_box_login">Anmelden</a>
							</div>
						</div>
				<?php
					}else{?>
						<div class="btn_login">
							<a href="{URL}/access/closeSession" class="w_login">Logout <img src="{librerias}/resources/img/logout.png"/></a>
						</div>
				<?php }
				?>
