					<div class="tabDescripcion">
						<div class="columna1">
							<div class="fila">
								<h2><?=(isset($data['items'][0]) ? utf8_decode($data['items'][0]->titulo) : 'No Title')?></h2>
								<div class="valoracion"><div id="rating"></div></div>
							</div>
							<div class="fila">
								<label>Comments:</label>
								<p><a href="#" class="link_comentarios">(17 Comments)</a></p>
							</div>
							<div class="fila">
								<label>Start Date:</label>
								<p><?=(isset($data['items'][0]) ? $data['items'][0]->fechaInicioPreinscripcion : 'No Date')?></p>
							</div>
							<div class="fila">
								<label>Price For Person:</label>
								<p><?=(isset($data['items'][0]) ? $data['items'][0]->precio : 'No Price')?>$</p>
							</div>
							<div class="fila">
								<label>Short Description:</label>
								<p><?=(isset($data['items'][0]) ? utf8_decode($data['items'][0]->descripcionCorta) : 'No Short Description')?></p>
							</div>
						</div>
						<div class="columna2">
							<?php include('tabMenu.php');?>
						</div>
					</div>	
					<script type="text/javascript">
					$(function() {
						$('#rating').raty({
							readOnly:   true,
							half: true,
							start: 4.5,
							starOff:'star-off.png',
							starOn:	'star-on.png',
							starHalf:'star-half.png',
							path: 'http://localhost/colabEx/resources/img/'
						});
					});
					</script>
					
				