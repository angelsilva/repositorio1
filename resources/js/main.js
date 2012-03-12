$(document).ready(function() {
	var ruta = "http://localhost/colabEx/";
	// heeeeeeeeeeere we go. SCROLL BANNER
	$("#chained").scrollable({circular: true, mousewheel: false}).navigator().autoscroll({
		interval: 8000		
	});	
	
	//$(".help").attr("left",$(document).width);
	//PANEL FORM REGISTRO
	$(".registrar").click(function(){
		var $j = jQuery.noConflict();
		$(".box_login").slideUp(500);
		$(".btn_login").css("margin-top","100px");
		$("#banner").hide();
		$("#login").hide();
		$(".btn_login").show();
		$(".registro").fadeIn(1500);
		
	});
	
	//MOSTRAR DETALLE DE CURSO
	$(".cursos_act .mostrar").click(function(){ 
		var a = $(this).parent().next().css("display");
		if(a == "block"){
			$(this).parent().next().slideUp(300);
			$(this).removeAttr("class").attr("class","mostrar");
		}else {
			var $a = jQuery.noConflict();
			$(this).parent().next().slideDown(500);
			$(this).removeAttr("class").attr("class","mostrar_menos");
		}
	});
	//WIDGET LOGIN
	$(".w_login").click(function(){ 
		var visible = $(".box_login").css("display");
		if(visible=="none"){
			$(".box_login").slideDown(500);
		}else{
			$(".box_login").slideUp(500);
		}
	});
	$(".box_login input[name='usuario']").bind('focus',function(){
		$(this).val('');
		$(this).unbind('focus');
	});
	//MODAL HELP
	$(".help a").click(function(){
		modal();
		// $(".overlay").show();
		// $(".modal").show("slow");
		// $(".cerrar").click(function(){ 
			// $(".overlay").hide();
			// $(".modal").hide("slow");
		// });
	});
	
	$(".form_help input").click(function(){
		$(this).val("");
	}); 
	$(".form_help textarea").click(function(){
		$(this).val("");
	});
	$('.botones a, .link-titulo,.perfil a').live('click', function(ev) {
		var url = $(this).attr('href');
		this.blur();

		if (url.match(/^#/)) {
			ev.preventDefault();
			ev.stopPropagation();
		}
		else {
			$(this).attr('target', '_self');
		}
	});
	
	//MOSTRAR PROFILES GRID EN HOME PAGE	
	$('#profilesGrid').each(function(){
		$.ajax({
			url:document.frmGeneric.action+'?profiles/getPage/1',
			success : function(resp){
				$('#profilesGrid').html(resp);
			}
		});
	});

	//EDITAR PERFIL DE USUARIO
	$(".botones a").click(function(){
		var accion = $(this).attr("class");
		var name = $(this).attr("name");
		var parent = $(this).parent().parent().attr("class");
		var a;
		var b;
		var edit = function(name,b){
			safeItemProfile(name,b);
		};
		var changePrivacy = function(id){
			safeItemPrivacy(id);
		};
	
		if(accion == "edit"){
			$(".edt_"+name+" span").css("display", "none");
			if(parent=="datos"){
				if (name == "clave"){
					$(".edt_pass").css("height","55px");
					var p1 = $(".edt_"+name+" input");
					var p2 = $(".edt_"+name+" input").next();
				}
				var type = $(".edt_"+name+" input").attr("type");
				a = $(".edt_"+name+" span").html();
				if(type!=="password")
					$(".edt_"+name+" input").val(a);
				if(name=='email'){
					$(".edt_"+name+" input[name='pass']").val('');
				}
				$(".edt_"+name+" input").focus();
				$(".edt_"+name+" input, .edt_"+name+" .group").css("display", "block");
				$(".edt_"+name+" button.btn_save").bind('click',function(){
					$(".edt_"+name+" span").css("display", "block");
					$(".edt_"+name+" input, .edt_"+name+" .group").css("display", "none");
					b = $(".edt_"+name+" input").val();
					if(type==="password"){
						var op = $(".edt_"+name+" input[name='oldPass']").val();
						var np = $(".edt_"+name+" input[name='newPass']").val();
						var npc = $(".edt_"+name+" input[name='newPassConfirm']").val();
						editPass(op,np,npc);
					}else if(name=='email'){
						var email = $(".edt_"+name+" input[name='email']").val();
						var pass = $(".edt_"+name+" input[name='pass']").val();
						editEmail(email,pass);
					}else{
						edit(name,b);
					}
					$(".edt_"+name+" button.btn_save").unbind('click');
					$(".edt_"+name+" button.btn_cancel").unbind('click');
				});
				$(".edt_"+name+" button.btn_cancel").bind('click',function(){
					$(".edt_"+name+" span").css("display", "block");
					$(".edt_"+name+" input, .edt_"+name+" .group").css("display", "none");
					resetField(name);
					$(".edt_"+name+" button.btn_save").unbind('click');
					$(".edt_"+name+" button.btn_cancel").unbind('click');
				});
			}
			if(parent=="info"){
				$(".edt_"+name+" textarea, .edt_"+name+" .group").css("display", "block");
				$(".edt_"+name+" textarea").focus();
				a = $(".edt_"+name+" span").html();
				$(".edt_"+name+" textarea").val(a);
				
				$(".edt_"+name+" button.btn_save").bind('click',function(){
					$(".edt_"+name+" span").css("display", "block");
					$(".edt_"+name+" textarea, .edt_"+name+" .group").css("display", "none");
					b = $(".edt_"+name+" textarea").val();
					edit(name,b);
					$(".edt_"+name+" button.btn_save").unbind('click');
					$(".edt_"+name+" button.btn_cancel").unbind('click');
				});
				$(".edt_"+name+" button.btn_cancel").bind('click',function(){
					$(".edt_"+name+" span").css("display", "block");
					$(".edt_"+name+" textarea, .edt_"+name+" .group").css("display", "none");
					resetField(name);
					$(".edt_"+name+" button.btn_save").unbind('click');
					$(".edt_"+name+" button.btn_cancel").unbind('click');
				});				
			}			
		}
		if(accion=="lock"){
			$(this).removeAttr("class");
			$(this).attr("class","unlock");
			var id = $(this).attr("id");
			changePrivacy(id);
		}
		if(accion=="unlock"){
			$(this).removeAttr("class");
			$(this).attr("class","lock");
			var id = $(this).attr("id");
			changePrivacy(id);
		}
		
	});
	
	//TAB PANEL DE CURSOS
	$(".titulosTab a").click(function(){
		var tab = $(this).attr("id");
		$(".titulosTab a").removeClass("tabSelected");
		$(this).addClass("tabSelected");
		 $(".tabVisible").hide();
		 $(".contenidoTab div").removeClass("tabVisible");
		$("#contenido"+tab).fadeIn("slow");
		 $("#contenido"+tab).addClass("tabVisible");
	});
	
	//SLIDER MAX Y MIN JQUERY UI
	$(function() {
		if($( "#slider-range" ).is('div')){
			$( "#slider-range" ).slider({
				range: true,
				min: 1,
				max: 10,
				
				values: [ 5, 10 ],
				slide: function( event, ui ) {
					$( "#amount" ).val( ui.values[ 0 ] + " - " + ui.values[ 1 ] );
				}
			});
			if($( "#amount" ).val()===''){
				$( "#amount" ).val($( "#slider-range" ).slider( "values", 0 ) + " - " + $( "#slider-range" ).slider( "values", 1 ) );
			}else{
				var values = $( "#amount" ).val().split('-');
				if(values.length > 0){
					$( "#slider-range" ).slider( "values", 0 ,values[0]);
				}if(values.length > 1){
					$( "#slider-range" ).slider( "values", 1 ,values[1]);
				}
			}
		}
	});
	
	//SLIDER DURATION JQUERY UI
	$(function() {
		if($( "#slide_duration" ).is('div')){
			$( "#slide_duration" ).slider({
				range: "min",
				value: 10,
				min: 1,
				max: 200,
				slide: function( event, ui ) {
					$( "#duracion" ).val( ui.value +' hours' );
				}
			});
			if($( "#duracion" ).val()===''){
				$( "#duracion" ).val('10 hours');
			}else{
				var value = $( "#duracion" ).val().replace(' hours','');
				$( "#slide_duration" ).slider( "value", value);
			}
		}
	});
	
	//SLIDER PRICE JQUERY UI
	$(function() {
		if($( "#slide_price" ).is('div')){
			$( "#slide_price" ).slider({
				range: "min",
				value: 0,
				min: 1,
				max: 2000,
				slide: function( event, ui ) {
					$( "#precio" ).val("$ "+ui.value );
				}
			});
			if($( "#precio" ).val()===''){
				$( "#precio" ).val('$ 0');
			}else{
				var value = $( "#precio" ).val().replace('$ ','');
				$( "#slide_price" ).slider( "value", value);
			}
		}
	});
	
	//INPUT FECHA
	$(function() { 
		if($( ".configCursos" ).is('div')){
			$( "#date_ini" ).datepicker({
				dateFormat: 'dd-mm-yy'
			});
			$( "#date_end" ).datepicker({
				dateFormat: 'dd-mm-yy'
			});
			$( "#ins_date_ini" ).datepicker({ 
				dateFormat: 'dd-mm-yy'
			});
			$( "#ins_date_end" ).datepicker({
				dateFormat: 'dd-mm-yy'
			});
			$( ".fechaTarea" ).datepicker({
				dateFormat: 'dd-mm-yy'
			});
			$( ".hora").timepicker({});
		}
		$( "#startdate" ).datepicker({
				dateFormat: 'dd-mm-yy',
			});
			$( "#enddate" ).datepicker({
				dateFormat: 'dd-mm-yy',
			});
	});
	
	//CRONOGRAMA
	var numTarea;
	$(".nuevaTarea").click(function(){
		numTarea = numTarea + 1;
		var b = '<div class="timeline"><label>Date</label><input type="text" name="fechaTarea" class="fechaTarea curved-2 shadow_inset" readonly /><label>Start time</label><input type="text" name="horaInicio" class="hora curved-2 shadow_inset" readonly /><label>End time</label><input type="text" name="horaFinal" class="hora curved-2 shadow_inset" readonly /></div>';
		$(".nuevaTarea").before(b);
		$( ".fechaTarea" ).datepicker({
			dateFormat: 'dd-mm-yy',
		});
		$( ".hora" ).timepicker({});
	});
	
	if($('.cronograma').is('input')){
		if($('.cronograma').val()!=='' && $('.cronograma').val()!==undefined){
			var cronograma = $('.cronograma').val();
			cronograma = cronograma.replace(/\'/g, "\"");
			cronograma = jQuery.parseJSON(cronograma);
			var html = '';
			for(var i = 0; i < cronograma.length; i++){
				var timeline = cronograma[i];
				var date1 = timeline[0].split(' ');
				var date2 = timeline[1].split(' ');
				var b = '<div class="timeline"><label>Date</label><input type="text" name="fechaTarea" class="fechaTarea curved-2 shadow_inset" value="'+date1[0]+'" readonly /><label>Start time</label><input type="text" name="horaInicio" class="hora curved-2 shadow_inset" value="'+date1[1]+'" readonly /><label>End time</label><input type="text" name="horaFinal" class="hora curved-2 shadow_inset" value="'+date2[1]+'" readonly /></div>';
				html += b;
			}
			if(html!=='') $(".timeline").remove();
			$(".nuevaTarea").before(html);
			$( ".fechaTarea" ).datepicker({
				dateFormat: 'dd-mm-yy',
			});
			$( ".hora" ).timepicker({});
		}
	}
	
});

//MOSTRAR DETALLES DEL GRID
function getProfilesPage(page){

	$.ajax({
		url:document.frmGeneric.action+'?profiles/getPage/'+page,
		success : function(resp){
			$('#profilesGrid').html(resp);
		}
	});

}
function resetField(name){
	var value = $('div.seccion').data(name);
	$(".edt_"+name+" input").val(value);
	$(".edt_"+name+" span").html(value);
}

function setField(name,value){
	$('div.seccion').data(name,value);
	$(".edt_"+name+" input").val(value);
	$(".edt_"+name+" span").html(value);
}

function setPhoto(value){
	$(".img_perfil img").attr('src',value);
}
//MOSTRAR VENTANA MODAL
function modal(){ 
	var h_screen =  $(document).height();
	var w_screen =  $(document).width();
	$(".overlay").css("min-height",h_screen+"px");
	$(".overlay").css("min-width",w_screen+"px");
	$(".overlay").show();
	$(".modal").show("slow");
	$(".cerrar").click(function(){ 
		$(".overlay").hide();
		$(".modal").hide("slow");
	});
}
//VALIDACION DE FORMULARIO
function validarFrm(frm){
	//Validar el form
	$('#'+frm).validate();

}

//ENVIAR FORM DE CONFIGURACION DE CURSO
 function enviarConfiguracion(){ 
	var cronograma = "[";
	var fechaTarea = new Array();
	var horaFinal = new Array();
	var horaInicio = new Array();
	var i = 0;
	var j = 0;
	var k = 0;
		
		$("#cronograma input[name='fechaTarea']").each(function(){
			fechaTarea[i] = $(this).val();
			i++;
		});	
		$("#cronograma input[name='horaInicio']").each(function(){
			horaInicio[j] = $(this).val();
			j++;
		});	
		$("#cronograma input[name='horaFinal']").each(function(){
			horaFinal[k] = $(this).val();
			k++;
		});
		
		for(l=0; l<= fechaTarea.length-1; l++){ 
			cronograma += '["'+fechaTarea[l]+' '+horaInicio[l]+'","'+fechaTarea[l]+' '+horaFinal[l]+'"]';
			if(l!=fechaTarea.length-1) cronograma+=",";
		}
		cronograma += "]";
		

		$(".cronograma").val(cronograma);
		document.frm_config_curso.submit();
 }

