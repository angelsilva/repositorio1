			<div id="menu_h" class="shadow">
				<div class="margen">
					<ul>
						<?php $url_act = $this->uri->segment(1); ?>
						<li id="<?=($url_act == "")? "select" : ""?>"><a href="{URL}" accesskey="1" >{home_menu}</a></li>
						<?php
							
							if(isset($userpanel_menu) && $userpanel_menu!==''){
								
						?>
								<li id="<?=(isset($seccion) && $seccion == "userPanel")? "select" : ""?>"><a href="{URL}/profiles" accesskey="5" title="">{userpanel_menu}</a></li>
						<?php	
							}
						?>
						<li><a href="#" accesskey="2" title="">{search_menu}</a></li>
						<li><a href="#" accesskey="3" title="">How-To</a></li>
						<li><a href="#" accesskey="4" title="">Kontak</a></li>
					</ul>
					<div class="car"><a href="#" class="shopping_car"><img src="{librerias}/resources/img/shopping_car.png">Warenkorb</a></div>
				</div>
			</div>