						<?php
							if(isset($profiles["success"]) && $profiles["success"]=='true' && $profiles["total"] > 0 && is_array($profiles['items'])){
								$rows = '';$i=1;
								foreach($profiles['items'] as $item){
									$rows .= '<div class="descripcion">';
									$rows .= '	<img src="'.$item['foto'].'"/>';
									$rows .= '	<p>';
									$rows .= '	<a href="{URL}">'.ucfirst($item['nombres']).' '.ucfirst($item['apellidos']).'</a><br><br>';
									$rows .= '		<strong>Profilbeschreibung</strong><br><br>';
									$rows .= '		'.substr($item['descripcion'],0,100).'<br/><br/>';
									$rows .= '		<strong>Kompetenzen</strong><br/><br/>';
									$rows .= '		'.substr($item['conocimientos'],0,100).'<br/><br/>';
									$rows .= '	</p>';
									$rows .= '</div>';
								}
								$total = (int) $profiles['total'];								
								$numPages = ceil($total / 2);
								$actPage = (int) $profilesPage;
								$j = 0;
								$pagingProfile = ''; 
								if($actPage > 1){
									$ant = $actPage - 1;
									$pagingProfile .= '<li><a href="#" onclick="javascript:getProfilesPage(\''.$ant.'\')"><img src="{librerias}/resources/img/prev.png"/></a></li>';
								}
								for($i=$actPage; $i<=$numPages && $j++ < 5; $i++){
									
									if($i==$actPage) $pagingProfile.='<li><a href="#" class="selected">'.$i.'</a></li>';
									
									else $pagingProfile.='<li><a href="#" onclick="javascript:getProfilesPage(\''.$i.'\')">'.$i.'</a></li>';
								}
								if($actPage < $numPages){
									$sig = $actPage + 1;
									$pagingProfile .= '<li><a href="#" onclick="javascript:getProfilesPage(\''.$sig.'\')"><img src="{librerias}/resources/img/next.png"/></a></li>';
								}
						
						?>
						
						<div class="perfil curved-5">
							<h2>Profilwerbung der Veranstalter</h2>
							<?=$rows?>
							<div class="pag">
								<ul>
									<?=$pagingProfile?>
								</ul>
							</div>
						</div>
						<?php
						}
						?>