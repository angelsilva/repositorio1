<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head>
		<?php include('header.php');?>
		<script type="text/javascript" src="{librerias}/resources/js/jquery.raty.min.js"></script>
	</head>
	<body>
		<div id="contenedor">
			<div id="encabezado" class="encabezado_bg">
				<div class="margen">
					<div id="logo"><a href="{URL}"><img src="{librerias}/resources/img/logo.png"></a></div>
					<?php include('login.php'); ?>
				</div>
			</div>
			<?php include('menu_h.php'); ?>
			<div id="contenidoeee">
				<div class="margen">
					<?php include('sidebar_userpanel.php');?>
					<div class="seccion">
					<?php
						$rows = '';$numPages = 0;$total = 0;$actPage = 0;$paramsPaging = '';
						if(isset($data) && $data['success']=='true' && (int) $data['total'] > 0 && isset($data['items']) && is_array($data['items'])){

							$i=1;$j=1;
							foreach($data['items'] as $item){
								$rows .= '<div class="fila'.$j.'">';
								$rows .= '<label><a href="#!'.$item->idCursos.'" class="link-titulo titulo-curso'.$i++.'">'.utf8_decode($item->titulo).'</a></label>';
								$rows .= '<label>'.utf8_decode($item->fechaInicioPreinscripcion).'</label>';
								$rows .= '<label>'.utf8_decode($item->fechaFinPreinscripcion).'</label>';
								$rows .= '<label>'.utf8_decode($item->estatus).'</label>';
								$rows .= '<a id="link_editbasicinfo" href="{URL}/courses/formEditBasicInfo/'.$item->idCursos.'" class="edit"></a>';
								$rows .= '<a href="{URL}/courses/formConfiguration/'.$item->idCursos.'" class="config"></a>';
								$rows .= '</div>';
								if($j == 1){
									$j=2;
								}else if($j==2){
									$j=1;
								}
							}
							
							//paginacion
							$total = (int) $data['total'];
							$numPages = ceil($total / 5);
							$actPage = (int) $page;
							$j = 0;
							$paging = ''; 
							
							$paramsPaging .= (isset($type)) ? "/ty:".$type : '';
							$paramsPaging .= (isset($_POST['startdate'])) ? "/st:".$_POST['startdate'] : '';
							$paramsPaging .= (isset($_POST['enddate'])) ? "/ed:".$_POST['enddate'] : '';
							$paramsPaging .= (isset($_POST['status'])) ? "/st:".$_POST['status'] : '';
							if($actPage > 0){
								$ant = $actPage;
								$paging .= '<li><a href="{URL}/courses/getPage/'.$ant.$paramsPaging.'"><img src="{librerias}/resources/img/prev.png" width="5px" height="10px" /></a></li>';
							}else{
								$paging .= '<li><a><img src="{librerias}/resources/img/prev_disable.png" width="5px" height="10px" /></a></li>';
							}
							$iniPage = 1;
							if($actPage > 3) $iniPage = $actPage - 2;
							for($i=$iniPage; $i<=$numPages && $j++ < 5; $i++){
									
								if($i==$actPage + 1){
									$paging.='<li><a href="#" id="pag_actual">'.$i.'</a></li>';
								}else{
									$paging.='<li><a href="{URL}/courses/getPage/'.$i.$paramsPaging.'">'.$i.'</a></li>';
								}
						
								
							}
							if($actPage + 1 < $numPages){ 
								$sig = $actPage + 2;
								$paging .= '<li><a href="{URL}/courses/getPage/'.$sig.$paramsPaging.'"><img src="{librerias}/resources/img/next.png" width="5px" height="10px" /></a></li>';
							}else{
								$paging .= '<li><a><img src="{librerias}/resources/img/next_disable.png" width="5px" height="10px" /></a></li>';
							}
						}
						
					?>
						<form id="frmGeneric" name="frmGeneric" action="{URL}"></form>
						<?php if(isset($message)){ ?>
						<div style="width:100%;margin:0 0 0 3px;padding-left:20px;" class="message ui-state-highlight"><span style="font-size:9px;color:#555;float:right;padding:2px;">(3 seconds to close)</span> {message} </div>
						<script type="text/javascript">
							setTimeout(function(){
								$('.message').fadeOut('slow');
							},3000);
						</script>
						<?php } ?>
						<div class="tipo_curso">
							<span>Show</span>
							<select id="select_typeCourses">
								<option value="all" <?=(isset($type) && $type=="all") ? 'selected' : '' ?>>All</option>
								<option value="mycourses" <?=(isset($type) && $type=="mycourses") ? 'selected' : '' ?>>My Courses</option>
								<option value="preregister" <?=(isset($type) && $type=="preregister") ? 'selected' : '' ?>>Pre-Register</option>
								<option value="register" <?=(isset($type) && $type=="register") ? 'selected' : '' ?>>Register</option>
								<option value="asisting" <?=(isset($type) && $type=="asisting") ? 'selected' : '' ?>>Asisting</option>
							</select>
							<script type="text/javascript">
								$('#select_typeCourses').change(function(){
									var type = $(this).val();
									var startdate = $('input#startdate').val();
									var enddate = $('input#enddate').val();
									var status = $('select#filter_status').val();
									var params = 'ty:'+type;
									params += (startdate) ? '/sd:'+startdate : '';
									params += (enddate) ? '/ed:'+enddate : '';
									params += (status) ? '/st:'+status : '';
									document.location.href = '{URL}/courses/getType/'+params;
								});
							</script>
						</div>
						<div class="crear_curso">
							<a href="{URL}/courses/formCreate">Create Curse</a>
						</div>
						<div class="filtros">
							<div class="labels">
								<label>Start Date</label>
								<label>End Date</label>
								<label>Status</label>
							</div>
							<div class="inputs">
								<form name="frmFilterCourses" id="frmFilterCourses" action="{URL}/courses/search" method="POST">
									<input class="txt_filter curved-2 shadow_inset" type="text" name="startdate" id="startdate" value="<?=(isset($_POST['startdate'])? $_POST['startdate'] : '')?>"></input>
									<input class="txt_filter curved-2 shadow_inset" type="text" name="enddate" id="enddate" value="<?=(isset($_POST['enddate'])? $_POST['enddate'] : '')?>"></input>
									<select id="filter_status" name="status" class="curved-4">
										<option value=""> - </option>
										<option value="activo" <?=(isset($_POST['status']) && $_POST['status']=="activo")? 'selected' : '';?>>Active</option>
										<option value="pendiente" <?=(isset($_POST['status']) && $_POST['status']=="pendiente")? 'selected' : '';?>>Inactive</option>
									</select>
									<input type="hidden" name="type" value="<?=(isset($type)) ? $type : ''?>">
									<a href="javascript:document.frmFilterCourses.submit();" class="btn_buscar"></a>									
									<a onClick="javascript:$('.txt_filter').val('');" class="clean" title="clean"></a>
								</form>

							</div>
						</div>
						<div class="listar_cursos">
							<div class="barra_titulo bg_gradient_gris">
								<label>Title</label>
								<label>Start Date </label>
								<label>End Date</label>
								<label>Status</label>
							</div>
							<?=$rows?>
						</div>
						<div class="paginacion">
							<p>Displaying <?=($numPages > 1)? ($actPage * 5) + 1: $numPages;?> - <?=($numPages > 1 && (($actPage * 5 ) + 5) <= $total)? ($actPage * 5 ) + 5 : $total;?> of <?=$total?></p>
							<div class="paginas">
								<ul>
									<?=(isset($paging)) ? $paging : '' ?>
								</ul>
							</div>
							<div class="ir_a">
								<span>Go To Page</span>
								<input type="text" class="curved-2 shadow_inset" value="<?=$actPage+1?>" name="txt_go" id="txt_go"/>
								<a href="#" id="btn_go">GO</a>
							</div>
							<script type="text/javascript">
								$('#btn_go').click(function(){
									var page = $('input#txt_go').val();
									document.location.href = '{URL}/courses/getPage/'+page+'<?=$paramsPaging?>';
								});
							</script>
						</div>
						<div id="tabCourses">
							<?php include('tabCourses.php'); ?>
						</div>
						<div id="progressbar" style="height:15px; width:150px; float:left; margin:-25px 0 5px 335px; line-height:12px; display:none;"></div>
						<script type="text/javascript">
							var stop = false;
							function pga(){
								if(stop) return;
								var value = $( "#progressbar" ).progressbar("value");
								if(value >= 100){
									value = 0;
								}else{
									value += 10;
								}console.log(value);
								$( "#progressbar" ).progressbar("value",value);
								setTimeout("pga()",200);
							}
							$(document).ready(function() {
								$( "#progressbar" ).progressbar({value:100});
								$( "#progressbar div" ).append('<span style="padding-left:5px;font-size:10px;">Loading...</span>');
								$('.link-titulo').click(function(){
									$( "#progressbar" ).show();
									stop = false;
									pga();
									var id = $(this).attr('href').replace('#!','');
									$.ajax({
										url : document.frmGeneric.action+'?courses/showTab/'+id,
										success : function(data){
											$('#tabCourses').html(data);
											stop = true;
											$( "#progressbar" ).progressbar("value",100).hide();
										},
										error : function(){
											$('#tabCourses').html('<h1>Not Found</h1>').show();
											stop = true;
											$( "#progressbar" ).progressbar("value",100).hide();
										}
									});
								});
							});
							
							function deleteCourse(id){
								if(confirm('You really want to remove the course?')) { 
									document.location.href='{URL}?courses/delete/'+id;
								}
							}
						</script>
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
			<?php if(isset($validation_error) && $validation_error !== ''){?>	
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
