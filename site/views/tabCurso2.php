						<div id="descripcion_2" style="display:none;">
							<table border="1" height="250px" width="100%">
								<tr>
									<td width="30%"><h1><?=(isset($data['items'][1]) ? utf8_decode($data['items'][1]->titulo) : 'No Title')?></h1></td>
									<td width="50%">* * * * * (17 Comments)</td>
									<td width="20%" rowspan="4">
										<ul>
											<li><a href="#">Evaluate</a></li>
											<li><a href="#">Edit</a></li>
											<li><a href="#">Delete</a></li>
											<li><a href="#">Print</a></li>
											<li><a href="#">Clone</a></li>
											<li><a href="#">Add Cart</a></li>
										</ul>
									</td>
								</tr>
								<tr>
									<td><h3>Start Date</h3></td>
									<td><?=(isset($data['items'][1]) ? $data['items'][1]->fechaInicioPreinscripcion : 'No Date')?></td>
								</tr>
								<tr>
									<td><h3>Fee For Person</h3></td>
									<td><?=(isset($data['items'][1]) ? $data['items'][1]->precio : 'No Price')?></td>
								</tr>
								<tr>
									<td><h3>Short Description</h3></td>
									<td>
										<?=(isset($data['items'][1]) ? utf8_decode($data['items'][1]->descripcionCorta) : 'No Short Description')?>
									</td>
								</tr>
							</table>
						</div>