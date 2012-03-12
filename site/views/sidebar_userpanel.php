					<div class="sidebar">	
						<ul>
							<?php $url_act = $this->uri->segment(1); ?>
							<li class="first"><a href="{URL}/profiles" class="<?=($url_act == "profiles")? "selected" : ""?>">Profil</a></li>
							<li><a href="{URL}/courses" class="<?=($url_act == "courses")? "selected" : ""?>">Kurse</a></li>
							<li><a href="#">Kalender</a></li>
							<li><a href="#">Postfach</a></li>
							<li><a href="#">Kontakte</a></li>
							<li><a href="{URL}/access/closeSession" class="last">Ausloggen</a></li>
						</ul>
					</div>