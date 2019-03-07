$(document).ready(function () {

	'use strict';
	// ------------------------------------------------------- //
	// Charts Gradients
	// ------------------------------------------------------ //
	if ( $("#barPerformance")[0] ) {
		// hacer algo aquí si el elemento existe
		var ctx1 = $("#barPerformance").get(0).getContext("2d");
		var gradient1 = ctx1.createLinearGradient(150, 0, 150, 300);
		gradient1.addColorStop(0, 'rgba(133, 180, 242, 0.91)');
		gradient1.addColorStop(1, 'rgba(255, 119, 119, 0.94)');

		var gradient2 = ctx1.createLinearGradient(146.000, 0.000, 154.000, 300.000);
		gradient2.addColorStop(0, 'rgba(104, 179, 112, 0.85)');
		gradient2.addColorStop(1, 'rgba(76, 162, 205, 0.85)');

		sendPost('/Dashboard/getDataPondered',[])
			.then(data => {
				console.log((data.data));
				var barPerformance     = $('#barPerformance');
				var barChartExample = new Chart(barPerformance, {
					type: 'bar',
					options: {
						scales: {
							xAxes: [{
								display: true,
								gridLines: {
									color: '#eee'
								}
							}],
							yAxes: [{
								display: true,
								gridLines: {
									color: '#eee'
								},
								ticks: {
									max: 5.0,
									min: 0.0
								},
							}]
						},
					},
					data: {
						labels: [
							"1 semestre", "2 semestre", "3 semestre", "4 semestre", "5 semestre",
							"6 semestre", "7 semestre", "8 semestre", "9 semestre", "10 semestre"
						],
						datasets: [
							{
								label: "Rendimiento academico, Materia X semestre",
								backgroundColor: [
									gradient2,
									gradient2,
									gradient2,
									gradient2,
									gradient2,
									gradient2,
									gradient2,
									gradient2,
									gradient2,
									gradient2
								],
								hoverBackgroundColor: [
									gradient1,
									gradient1,
									gradient1,
									gradient1,
									gradient1,
									gradient1,
									gradient1,
									gradient1,
									gradient1,
									gradient1

								],
								borderColor: [
									gradient2,
									gradient2,
									gradient2,
									gradient2,
									gradient2,
									gradient2,
									gradient2,
									gradient2,
									gradient2,
									gradient2
								],
								borderWidth: 1,
								data: data.data
							},

						]
					}
				});
			})
			.catch(error => console.error(error));
	}

});


var loaderCesh = (tipo) =>{
	/*tipo = new pensum*/
	/*1 = current, 2 = new*/
	var obj = new Object();
	obj.tipo = tipo;
	sendPost("/dashboard/getCesh",obj).then(data => {
		var semester = data.data;
		var x = 1;
		for (var i in semester){
			var string = "";
			for(var j in semester[i]){
				if(semester[i][j].semester == x){
					var code = "";
					if(tipo == 1){
						code = "c"+removeSpace(semester[i][j].code,"");
						//code = "c"+semester[i][j].code;
					}else{
						code = "n"+removeSpace(semester[i][j].code,"");
						//code = "n"+semester[i][j].code;
					}
					string += '<div data-toggle="tooltip" class="materia noview" id="'+code+'">';
					string += '<header>Codigo '+semester[i][j].code+'</header>';
					string += '<div>'+semester[i][j].name+'</div>';
					string += '<span>Creditos '+semester[i][j].credit_numbers+'</span>';
					string += "</div>";
				}
			}
			$(".semester"+x).html(string);
			x++;
		}
		sendPost("/dashboard/getMatter").then(data => {

			var lost = data.data.lost;
			var winner = data.data.winner;
			var homolo = data.data.homolo;
			var name = "";
			for (var i in lost){
				code = removeSpace(lost[i].code,"");
				$("#c"+code).removeClass("noview").addClass("lost");
				$("#c"+code).prop('title', 'Nota: '+lost[i].note+'');
			}
			for (var i in winner){
				code = removeSpace(winner[i].code,"");
				$("#c"+code).removeClass("noview").addClass("winner");
				$("#c"+code).prop('title', 'Nota: '+winner[i].note+'');
			}
			for (var i in homolo){
				code = removeSpace(homolo[i].code,"");
				$("#n"+code).removeClass("noview").addClass("winner");
				$("#n"+code).prop('title', 'Nota: '+homolo[i].note+'');
			}
		});
	});

	if(tipo == 1){
		$('#myModalLabel').html('Pensum Actual');
	}else{
		$('#myModalLabel').html('Pensum Nuevo');
	}
};


var removeSpace = (string,replace = "-") => {
	return string.replace(/\s/g,replace)
};

function encodeImagetoBase64(element) {
	var file = element.files[0];
	var reader = new FileReader();

	reader.onloadend = function() {
		//$("#img").attr("href",reader.result);
		$("#img").val(reader.result);
	}
	reader.readAsDataURL(file);

}

function archivo(evt) {
	var files = evt.target.files; // FileList object

	//Obtenemos la imagen del campo "file".
	for (var i = 0, f; f = files[i]; i++) {
		//Solo admitimos imágenes.
		if (!f.type.match('image.*')) {
			continue;
		}

		var reader = new FileReader();

		reader.onload = (function(theFile) {
			return function(e) {
				// Creamos la imagen.
				$("#ViewimgPerson").attr("src",e.target.result);
			};
		})(f);

		reader.readAsDataURL(f);
	}
}



var validatePassword = () =>{
	if($("#chekChangePassword").prop('checked')){
		var element1 = $("#password1")[0];
		var element2 = $("#password2")[0];
		if($("#password1").val() != $("#password2").val()) {
			element1.setCustomValidity('Contraseña no son iguales.');
			element2.setCustomValidity('Contraseña no son iguales.');
		}else{
			element1.setCustomValidity('');
			element2.setCustomValidity('');
		}
	}
};
$("#formPersons").on("submit",function (form) {
	form.preventDefault();
	var obj = new Object();

	if($("#email").val() != ""){
		obj.email = $("#email").val();
	}
	if($("#first_name").val() != ""){
		obj.first_name = $("#first_name").val();
	}
	if($("#second_name").val() != ""){
		obj.second_name = $("#second_name").val();
	}
	if($("#first_surname").val() != ""){
		obj.first_surname = $("#first_surname").val();
	}
	if($("#second_surname").val() != ""){
		obj.second_surname = $("#second_surname").val();
	}

	obj.img = $("#img").val();

	if($("#chekChangePassword").prop('checked')){
		if($("#password1").val() != "" && $("#password1").val() == $("#password2").val()){
			obj.password1 = $("#password1").val();
			obj.password2 = $("#password2").val();
		}
	}
	sendPost("dashboard/savePerson",obj).then(data => {
		if(data.data){
			$("#perfilImg").attr("src",$("#img").val());
			$.notify("Se guardo la informacion correctamente","success");
		}else{
			$.notify("Error al momento de Actualizar los datos","error");
		}
	})
})


var loaderTableRH = (new_pensum_id = 0,person_id = 0) =>{
	$('#reporte-RH').css('display','block');

	var obj = {};
	if(new_pensum_id > 0){
		obj = {"new_pensum_id":new_pensum_id,"person_id":person_id};
	}
	sendPost("/dashboard/getFullMetter",obj).then(data => {
		var string = '';
		var data = data.data;
		var x = 1;
		for (var i in data){
			string += "<tr>";
			string += "<td>"+x+"</td>";
			string += "<td>"+data[i].codeA+"</td>";
			string += "<td>"+data[i].nameA+"</td>";
			string += "<td>"+data[i].codeN+"</td>";
			string += "<td>"+data[i].nameN+"</td>";
			//string += "<td>"+data[i].note.replace(".",",")+"</td>";
			string += "</tr>";
			x++;
		}
		$("#table-RH").html(string);
	});
}


function fecha() {
    var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
    var diasSemana = new Array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
    var f=new Date();
    return diasSemana[f.getDay()] + ", " + f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear();
}

function tableReportH(new_pensum_id = 0,person_id = 0) {
	var obj = {};

	if(new_pensum_id > 0){
		 obj = {"new_pensum_id":new_pensum_id,"person_id":person_id};
	}

	sendPost("/dashboard/getFullMetter",obj).then(data => {
		var data = data.data;

		var columns = [
			{title: "Codigo Actual", dataKey: "codeA"},
			{title: "Nombre Materia", dataKey: "nameA"},
			{title: "semestre", dataKey: "semesterA"},
			{title: "Codigo N", dataKey: "codeN"},
			{title: "Materia", dataKey: "nameN"},
			{title: "semestre", dataKey: "semesterN"},
			//{title: "Nota", dataKey: "note"},
		];

		var doc = new jsPDF('l', 'mm', 'letter');
		var totalPagesExp = "{total_pages_count_string}";

		var pageContent = function (data) {
			// HEADER
			doc.setFontSize(20);
			doc.setTextColor(40);
			doc.setFontStyle('normal');
			doc.addImage(imgData, 'JPEG', data.settings.margin.left, 15, 10, 10);
			doc.text("Reporte de Homologacion, Fecha realizacíon: "+fecha(), data.settings.margin.left + 15, 22);

			// FOOTER
			var str = "Page " + data.pageCount;
			// Total page number plugin only available in jspdf v1.0+
			if (typeof doc.putTotalPages === 'function') {
				str = str + " de " + totalPagesExp;
			}
			doc.setFontSize(10);
			doc.addImage("data:image/png;base64,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",'PNG', 240, 227,40,20,30);
			doc.text(str, data.settings.margin.left , 10);
		};

		doc.autoTable(columns, data, {
			addPageContent: pageContent,
			margin: {top: 30},
		});

		// Total page number plugin only available in jspdf v1.0+
		if (typeof doc.putTotalPages === 'function') {
			doc.putTotalPages(totalPagesExp);
		}
		doc.setFontSize(10);
		doc.text( 'Firma Alumno', 20, 210);

		doc.text( '_________________________________', 20, 220);
		doc.text("Nombre "+name, 20, 230 );
		doc.text("Cedula "+documents, 20, 235 );
		doc.text("Area de "+career, 20, 240);

		doc.text( 'Firma Jefe Departamento', 180, 210);

		doc.text( '_________________________________', 180, 220);
		doc.text("Nombre "+jefeDpto, 180, 230 );
		doc.text("Area de "+career, 180, 235 );

		doc.save('homologacion.pdf');
	});
}


function printElement(elem) {
	var domClone = elem.cloneNode(true);

	var $printSection = document.getElementById("printSection");

	if (!$printSection) {
		var $printSection = document.createElement("div");
		$printSection.id = "printSection";
		document.body.appendChild($printSection);
	}

	$printSection.innerHTML = "";
	$printSection.appendChild(domClone);
	window.print();
}



function btnRegistrar(table) {
	$("[type=submit]").val("Registrar Datos");
	$("[type=submit]").addClass("btn-success").removeClass("btn-info");

	switch (table) {
		case "users":{
			$('#tableU').css('display','none');$('#formUsers').css('display','block')
			$("#formUsers input").each(function () {
				if(this.value != "Registrar Datos"){
					$(this).val("");
				}
			});
			break;
		}
	}

}

function viewGestionUser(){
	$('.dashboard-Info').css('display','none');
	$('#gestionUsers').css('display','block');
	loaderTable("users");
}

function viewPensum(){
	$('.dashboard-Info').css('display','none');
	$('#gestionPensum').css('display','block');
	loaderTable("pensum");
}



function loaderTable(table) {

	switch (table) {
		case "users":{
			$('#formUsers').css('display','none');
			$('#tableU').css('display','block');
			post.$url = url+"/gestionAdministrador/1";
			post.$sendPost.setPost();
			var data = post.$sendPost.getPost().data;
			var string = "";
			for(var i in data){
				string += "<tr>";
				string += "<td>"+data[i].user_id+"</td>";
				string += "<td>"+data[i].username+"</td>";
				string += "<td>"+data[i].email+"</td>";
				string += '<td><p class="estado-'+data[i].status+'"></p></td>';
				string += "<td><a onclick='editar(\"users\","+JSON.stringify(data[i])+")' class='btn btn-info btn-sm'>Editar</a>&nbsp;&nbsp;<a class='btn btn-danger btn-sm' onclick='eliminarUsers("+data[i].user_id+")'>Eliminar</a></td>";
				string += "</tr>";
			}
			$("#tableUsers").html(string);
			break;
		}
		case "facultad":{
			post.$url = url+"/gestionAdministrador/8";
			post.$sendPost.setPost();
			var data = post.$sendPost.getPost().data;
			var string = "";
			for(var i in data) {
				string += "<tr>";
				string += "<td>"+data[i].faculty_id+"</td>";
				string += "<td>"+data[i].code+"</td>";
				string += "<td>"+data[i].name+"</td>";
				string += "<td><a onclick='editar(\"facultad\","+JSON.stringify(data[i])+")' class='btn btn-info btn-sm'>Editar</a>&nbsp;&nbsp;</td>";
				string += "</tr>";
			}
			$("#facultadTable").html(string);
			break;
		}
		case "carrera":{
			post.$url = url+"/gestionAdministrador/11";
			post.$sendPost.setPost();
			var data = post.$sendPost.getPost().data;
			var string = "";
			for(var i in data) {
				string += "<tr>";
				string += "<td>"+data[i].career_id+"</td>";
				string += "<td>"+data[i].codeCareer+"</td>";
				string += "<td>"+data[i].nameCarrer+"</td>";
				string += "<td>"+data[i].nameFaculty+"</td>";
				string += "<td><a onclick='editar(\"carrera\","+JSON.stringify(data[i])+")' class='btn btn-info btn-sm'>Editar</a>&nbsp;&nbsp;</td>";
				string += "</tr>";
			}
			$("#carreraTable").html(string);
			break;
		}
		case "pensum" :{
			post.$url = url+"/gestionAdministrador/14";
			post.$sendPost.setPost();
			var data = post.$sendPost.getPost().data;
			var string = "";
			for(var i in data) {
				string += "<tr>";
				string += "<td>"+data[i].pensum_id+"</td>";
				string += "<td>"+data[i].codePensum+"</td>";
				string += "<td>"+data[i].create_date+"</td>";
				string += "<td>"+data[i].credit_numbers+"</td>";
				string += "<td>"+data[i].detail+"</td>";
				string += "<td>"+data[i].careerName+"</td>";
				string += "<td><a onclick='editar(\"pensum\","+JSON.stringify(data[i])+")' class='btn btn-info btn-sm'>Editar</a>&nbsp;&nbsp;</td>";
				string += "</tr>";
			}
			$("#pensumTable").html(string);
			break;
		}
		case "jefes":{
			post.$url = url+"/gestionAdministrador/17";
			post.$sendPost.setPost();
			var data = post.$sendPost.getPost().data;
			var string = "";
			for(var i in data) {
				string += "<tr>";
				string += "<td>"+data[i].teacher_id+"</td>";
				string += "<td>"+data[i].namePerson+"</td>";
				string += "<td>"+data[i].codePensum+"</td>";
				string += "<td>"+data[i].nameFaculty+"</td>";
				string += "<td>"+data[i].nameCareer+"</td>";
				string += "<td><a onclick='eliminarJefe("+data[i].teacher_id+")' class='btn btn-danger btn-sm'>Eliminar</a></td>";
				string += "</tr>";
			}
			$("#jefesTable").html(string);
			break;
		}
		case "estudiantes":{
			post.$url = url+"/gestionStudens/4";
			post.$sendPost.setPost();
			var data = post.$sendPost.getPost().data;
			var string = "";
			for(var i in data) {
				var status = '';
				string += "<tr>";
				string += "<td>"+data[i].change_request_id+"</td>";
				string += "<td>"+data[i].document+"</td>";
				string += "<td>"+data[i].namePerson+"</td>";
				string += "<td>"+data[i].code_current_pensum+"</td>";
				string += "<td>"+data[i].code_new_pensum+"</td>";
				if(data[i].status == 1){
					string += "<td><p style='color:green;'>Hologado</p></td>";
				}else{
					status = "<a onclick='changeStatus("+data[i].change_request_id+","+data[i].student_id+","+data[i].new_pensum_id+")' class='btn btn-info btn-sm'>Homologar</a>&nbsp;&nbsp;";
					string += "<td><p style='color:blue;'>En espera</p></td>";
				}
				string += "<td><a onclick='tableReportH("+data[i].new_pensum_id+","+data[i].person_id+");' class='btn btn-success btn-sm'>print</a>&nbsp;&nbsp;"+status+"<a onclick='eliminarHomologacion("+data[i].change_request_id+","+data[i].student_id+","+data[i].current_pensum_id+")' class='btn btn-danger btn-sm'>Eliminar</a></td>";
				string += "<tr>";
			}
			$("#homoStudentsTable").html(string);
			break;
		}
	}
}
function eliminarJefe(id) {
	post.$url = url+"/gestionAdministrador/18";
	post.$sendPost.setNpost({"teacher_id":id});
	$.notify("Operacion realizada con exito","success");
	loaderTable("jefes");
}

function editar(table,data) {
	$("[type=submit]").val("Actualizar Datos");
	$("[type=submit]").addClass("btn-info").removeClass("btn-success");
	switch (table) {
		case "users": {
			$('#tableU').css('display','none');
			$('#formUsers').css('display','block');
			$("#formUsers input").each(function () {
				if(data[this.id] != undefined){
					$("#"+this.id).val(data[this.id]);
				}
			});
			break;
		}
		case "facultad":{
			console.log(data);
			$("#facultadModal").modal();
			$("#formFacultad input").each(function () {
				if(data[this.id] != undefined){
					$("#"+this.id).val(data[this.id]);
				}
			});
			break;
		}
		case "carrera":{
			$("#carreraModal").modal();
			$("#formCarrera input").each(function () {
				if(data[this.id] != undefined){
					$("#"+this.id).val(data[this.id]);
				}
			});
			break;
		}
		case "pensum":{
			$("#pensumModal").modal();
			$("#formPensum input").each(function () {
				if(data[this.id] != undefined){
					$("#"+this.id).val(data[this.id]);
				}
			});
			$("#formPensum #detail").each(function () {
				if(data[this.id] != undefined){
					$("#"+this.id).text(data[this.id]);
				}
			});
			break;
		}
	}
}


function eliminarUsers(id){
	Swal.fire({
		title: '<strong>Informacion! <u> Para Usuario</u></strong>',
		type: 'info',
		html: 'El usuario no sera borrado<b>,este estara desactivado</b>',
		showCancelButton: true,
		showCloseButton: true,
		focusConfirm: false,
		confirmButtonText: '<i class="fa fa-thumbs-up"></i>Eliminar',
		confirmButtonAriaLabel: 'Thumbs up, great!',
		cancelButtonText: '<i class="fa fa-thumbs-down"></i> Cancelar!',
		cancelButtonAriaLabel: 'Thumbs down',
		reverseButtons: true
	}).then((result) => {
		if (result.value) {
			post.$url = url+"/gestionAdministrador/4/";
			post.$sendPost.setNpost({"user_id":id});
			if(post.$sendPost.getPost().data == true){
				loaderTable("users");
				Swal.fire('Usuario removido!', 'El estado del usuario ha sido modificado.', 'success')
			}else{
				$.notify("el usuario no puede ser removido","error")
			}
		}
	});
}


function confirmar(table,mensaje,$url,$data,tipo = "info",error = "Ocurrio un error en la operacion",success = "Operacion realizada con exito") {
	Swal.fire({
		title: '<h6>Informacion</h6>',
		type: tipo,
		html: 'Operacion: <b>'+mensaje+'</b>',
		showCancelButton: true,
		showCloseButton: true,
		focusConfirm: false,
		confirmButtonText: '<i class="fa fa-thumbs-up"></i>Confirmar',
		confirmButtonAriaLabel: 'Thumbs up, great!',
		cancelButtonText: '<i class="fa fa-thumbs-down"></i> Cancelar!',
		cancelButtonAriaLabel: 'Thumbs down',
		reverseButtons: true
	}).then((result) => {
		if (result.value) {
			post.$url = url+$url;
			post.$sendPost.setNpost($data);
			if(post.$sendPost.getPost().data.error == undefined){
				if(post.$sendPost.getPost().data){
					$.notify(success,"success");
					loaderTable(table);
				}else{
					$.notify(error);
				}
			}else{
				$.notify(post.$sendPost.getPost().data.error,"error");
				$("#"+post.$sendPost.getPost().data.key).focus();
				$("#"+post.$sendPost.getPost().data.key).css("border","1px solid red");
			}
		}
	});
}


function changeSelect(value,data) {
	for(var i in data){
		if(value != data[i].pensum_id){
			$("#selectPensumId2").html("<option value='"+data[i].pensum_id+"'>"+data[i].codePensum+"</option>")
		}
	}
}

function doSearch(text,table)
{
	var tableReg = document.getElementById(table);
	var searchText = document.getElementById(text).value.toLowerCase();
	var cellsOfRow="";
	var found=false;
	var compareWith="";

	// Recorremos todas las filas con contenido de la tabla
	for (var i = 1; i < tableReg.rows.length; i++)
	{
		cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
		found = false;
		// Recorremos todas las celdas
		for (var j = 0; j < cellsOfRow.length && !found; j++)
		{
			compareWith = cellsOfRow[j].innerHTML.toLowerCase();
			// Buscamos el texto en el contenido de la celda
			if (searchText.length == 0 || (compareWith.indexOf(searchText) > -1))
			{
				found = true;
			}
		}
		if(found)
		{
			tableReg.rows[i].style.display = '';
		} else {
			// si no ha encontrado ninguna coincidencia, esconde la
			// fila de la tabla
			tableReg.rows[i].style.display = 'none';
		}
	}
}


function ecodeImg(element) {
	var file = element.files[0];
	var reader = new FileReader();

	reader.onloadend = function() {
		//$("#img").attr("href",reader.result);
		$("#favicon").val(reader.result);
		$("#imgFavicon").attr("src",reader.result);
		console.log(reader.result);
	}
	reader.readAsDataURL(file);
}





function ecodeImg(element) {
	var file = element.files[0];
	var reader = new FileReader();

	reader.onloadend = function() {
		//$("#img").attr("href",reader.result);
		$("#favicon").val(reader.result);
		$("#imgFavicon").attr("src",reader.result);
		console.log(reader.result);
	}
	reader.readAsDataURL(file);
}


var viewCesh = () => {
	$(".dashboard-header").css("display","none");
	$(".dashboard-Info").css("display","none");
	$(".dashboard-Cesh").css("display","block");
	$('#reporte-RH').css('display','none');
}

var modiI = () => {
	$(".dashboard-header").css("display","none");
	$(".dashboard-Cesh").css("display","none");
	$(".dashboard-Info").css("display","block");
	$("#gestionPerson").css("display","block");
	$('#reporte-RH').css('display','none');
}



$("#imgFile").change(function(evt){
	archivo(evt);
});

$("#chekChangePassword").change(function(){
	if($("#chekChangePassword").prop('checked')){
		$( "#password1" ).prop( "disabled", false );
		$( "#password2" ).prop( "disabled", false );
	}else{
		$( "#password1" ).prop( "disabled", true );
		$( "#password2" ).prop( "disabled", true );
	}
});


$("#formUsers").on("submit",function (form) {
	form.preventDefault();
	var obj = new Object();
	obj.username = $("#username").val();
	obj.email = $("#email").val();
	obj.password = $("#password").val();
	obj.roles_id = $("#roles_id").val();
	obj.status = $("#status").val();
	$(".form-control").css("border","1px solid #dee2e6");
	if($("#user_id").val() != ""){
		form.preventDefault();
		obj.user_id = $("#user_id").val();
		confirmar("users","Actualizar Datos Personales","/gestionAdministrador/3",obj)

	}else{
		post.$url = url+"/gestionAdministrador/2";
		post.$sendPost.setNpost(obj);

		var estado = (post.$sendPost.getPost().data.error != undefined) ? 'error' : 'success';
		if(estado == "success"){
			$.notify("Operacion realizada con exito",estado);
			loaderTable("users");
		}else{
			$.notify(post.$sendPost.getPost().data.error,estado);
			$("#"+post.$sendPost.getPost().data.key).focus();
			$("#"+post.$sendPost.getPost().data.key).css("border","1px solid red");
		}

	}
});


$("#formPrincipal").on("submit",function (form) {
	form.preventDefault();
	var obj = new Object();
	obj.title = $("#title").val();
	obj.description = $("#description").val();
	obj.favicon = $("#favicon").val();
	obj.smtp_user = $("#smtp_user").val();
	obj.smtp_pass = $("#smtp_pass").val();
	confirmar("","Cuidado, revisa bien los datos antes de seguir","/gestionAdministrador/5",obj);
});

$("#formDB").on("submit",function (form) {
	form.preventDefault();
	var obj = new Object();
	obj.hostname = $("#hostname").val();
	obj.username = $("#usernamedb").val();
	obj.password = $("#passworddb").val();
	obj.database = $("#database").val();
	confirmar("","Cuidado, revisa bien los datos antes de seguir, cualquier mala edicion puede dañar el sistema","/gestionAdministrador/6",obj,"error");
});

function caragarDB() {
	if(confirm("Esta opcion debes manejarla con mucho cuidado, cualquier mal edicion dañaria la conexion a la base de datos")){
		$("form").css("display","none");
		$("#formDB").css("display","block");
		$("#dbConfig").css("overflow","hidden").css("height",0).css("height",$("#dbConfig").prop("scrollHeight")+"px");

	}
}

function cargarPrincipal() {
	$("form").css("display","none");
	$("#formPrincipal").css("display","block");
	$("#emailConfig").css("overflow","hidden").css("height",0).css("height",$("#emailConfig").prop("scrollHeight")+"px");
}

$("li").click(function () {
	$("li").removeClass("active");
	$(this).addClass("active");
})

$("#formFacultad").on("submit",function (form) {
	form.preventDefault();
	$("#formFacultad .form-control").css("border","1px solid #dee2e6");
	if($("#faculty_id").val() == ""){
		var obj = {"code":$("#code").val(),"name":$("#name").val()};
		confirmar("facultad","Seguir operacion?","/gestionAdministrador/9",obj,"info");
	}else{
		var obj = {"faculty_id":$("#faculty_id").val(),"code":$("#code").val(),"name":$("#name").val()};
		confirmar("facultad","Seguir operacion?","/gestionAdministrador/10",obj,"info");
	}
});

$("#formCarrera").on("submit",function (form) {
	form.preventDefault();
	$("#formCarrera .form-control").css("border","1px solid #dee2e6");
	if($("#career_id").val() == ""){
		var obj = {"code":$("#codeCareer").val(),"name":$("#nameCarrer").val(),"faculty_id":$("#faculty").val()};
		confirmar("carrera","Seguir operacion?","/gestionAdministrador/12",obj,"info");
	}else{
		var obj = {"career_id":$("#career_id").val(),"faculty_id":$("#faculty").val(),"code":$("#codeCareer").val(),"name":$("#nameCarrer").val()};
		confirmar("carrera","Seguir operacion?","/gestionAdministrador/13",obj,"info");
	}
});

$("#formPensum").on("submit",function (form) {
	form.preventDefault();
	var obj = new Object();
	obj.code = $("#codePensum").val();
	obj.create_date = $("#create_date").val();
	obj.credit_numbers = $("#credit_numbers").val();
	obj.detail = $("#detail").text();
	obj.status = $("#statusPensum").val();
	obj.career_id = $("#career").val();
	if(obj.detail.length<5){
		$.notify("detalle no puede ser menor a 10 caracteres");
		$("#detail").focus();
		$("#detail").css("border","1px solid red");
		return false;
	}
	if($("#pensum_id").val() == ""){
		confirmar("pensum","Seguir operacion?","/gestionAdministrador/15",obj,"info");
	}else{
		obj.pensum_id = $("#pensum_id").val();
		confirmar("pensum","Seguir operacion?","/gestionAdministrador/16",obj,"info");
	}
});


function viewFacultad(){
	$('.dashboard-Info').css('display','none');
	$('#gestionFacultad').css('display','block');
	//$("#tableFacultad").css("visibility","visible");
	loaderTable("facultad");
}


function viewCarrera(){
	$('.dashboard-Info').css('display','none');
	$('#gestionCarrera').css('display','block');
	//$("#tableFacultad").css("visibility","visible");
	loaderTable("carrera");
}

function btnRegisterFacultad() {
	$("[type=submit]").val("Registrar Datos");
	$("[type=submit]").addClass("btn-success").removeClass("btn-info");
	$('#facultadModal').modal();
	$('#formFacultad [type=text]').val('');
	$('#formFacultad [type=hidden]').val('');
}

function btnRegisterCarrera() {
	$("[type=submit]").val("Registrar Datos");
	$("[type=submit]").addClass("btn-success").removeClass("btn-info");
	$('#carreraModal').modal();
	$('#formCarrera [type=text]').val('');
	$('#formCarrera [type=hidden]').val('');
}


$("#jefeModal").on("submit",function (form) {
	form.preventDefault();
	var obj = {"person_id":$("#jefe_id").val(),"pensum_id":$("#jefe_pensum_id").val()};
	confirmar("jefes","Seguir operacion?","/gestionAdministrador/19",obj,"info");
});


$("#option1").change(function (e) {
	switch (this.value) {
		case "1":
		case "2":
		case "3":
			$("#option2").html("<option>Seleccione una opcion<option value='1'>Grafica Linea</option><option value='2'>Grafica de barra</option>");
			break;
		case "4":{
			$("#option2").html("<option>Seleccione una opcion<option value='4'>Grafica de torta</option>");
			break;
		}
		default :{
			$("#option2").html("<option>Seleccione una opcion</option>");
		}
	}
});

$("#option2").change(function (e) {
	var pensum_id = $("#selectPensumId").val();
	switch (this.value) {
		case "1":{
			crearChar({"pensum_id":pensum_id,"chart":'line',"tipo":"1"});
			break;
		}
		case "2":
			crearChar({"pensum_id":pensum_id,"chart":'bar',"tipo":"2"});
			break;
		case "3":{
			crearChar({"pensum_id":pensum_id,"chart":'bar',"tipo":"3"});
			break;
		}
		case "4":{
			$("#pensumModal").modal();
			break;
		}
	}
});

function crearChar(datos) {
	$("canvas").css("display", "none");
	if ($("#option1").val() == "1") {
		if (datos.tipo == "1" || datos.tipo == "2") {

			if (datos.chart == "line") {
				var a = [0];
				var label = [
					"0", "1 semestre", "2 semestre", "3 semestre", "4 semestre", "5 semestre",
					"6 semestre", "7 semestre", "8 semestre", "9 semestre", "10 semestre"
				];
				var ctx = document.getElementById("lineal1").getContext('2d');
				$("#lineal1").css("display", "block");
			} else {
				var a = [];
				var label = [
					"1 semestre", "2 semestre", "3 semestre", "4 semestre", "5 semestre",
					"6 semestre", "7 semestre", "8 semestre", "9 semestre", "10 semestre"
				];
				$("#barra1").css("display", "block");
				var ctx = document.getElementById("barra1").getContext('2d');
			}

			//ponderado vs Semestre
			post.$url = url + "/gestionBoss/1";
			post.$sendPost.setNpost({"pensum_id": datos.pensum_id});
			var data = post.$sendPost.getPost().data;

			for (var i in data) {
				a.push(data[i].note);
			}

			var myChart = new Chart(ctx, {
				type: datos.chart,
				data: {
					labels: label,
					datasets: [{
						label: 'Materis Vs Semestre',
						data: a,
						backgroundColor: [
							'rgba(255, 99, 132, 0.2)',
							'rgba(54, 162, 235, 0.2)',
							'rgba(255, 206, 86, 0.2)',
							'rgba(75, 192, 192, 0.2)',
							'rgba(153, 102, 255, 0.2)',
							'rgba(255, 159, 64, 0.2)'
						],
						borderColor: [
							' rgba(255,99,132,1)',
							'rgba(54, 162, 235, 1)',
							'rgba(255, 206, 86, 1)',
							'rgba(75, 192, 192, 1)',
							'rgba(153, 102, 255, 1)',
							'rgba(255, 159, 64, 1)'
						],
						borderWidth: 1
					}]
				},
				options: {
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero: true
							}
						}]
					}
				}
			});
		}
	}
	if ($("#option1").val() == "2") {

		if (datos.chart == "line") {
			var a = [0];
			var label = [
				"0", "1 semestre", "2 semestre", "3 semestre", "4 semestre", "5 semestre",
				"6 semestre", "7 semestre", "8 semestre", "9 semestre", "10 semestre"
			];
			$("#lineal2").css("display", "block");
			var ctx = document.getElementById("lineal2").getContext('2d');
		} else {
			var a = [];
			var label = [
				"1 semestre", "2 semestre", "3 semestre", "4 semestre", "5 semestre",
				"6 semestre", "7 semestre", "8 semestre", "9 semestre", "10 semestre"
			];
			$("#barra2").css("display", "block");
			var ctx = document.getElementById("barra2").getContext('2d');
		}

		//ponderado vs Semestre
		post.$url = url + "/gestionBoss/2";
		post.$sendPost.setNpost({"pensum_id": datos.pensum_id});
		var data = post.$sendPost.getPost().data;

		for (var i in data) {
			a.push(data[i].note);
		}
		var myChart = new Chart(ctx, {
			type: datos.chart,
			data: {
				labels: label,
				datasets: [{
					label: "Materias Ganada Vs Semestre",
					borderColor: "#80b6f4",
					pointBorderColor: "#80b6f4",
					pointBackgroundColor: "#80b6f4",
					pointHoverBackgroundColor: "#80b6f4",
					pointHoverBorderColor: "#80b6f4",
					pointBorderWidth: 10,
					pointHoverRadius: 10,
					pointHoverBorderWidth: 1,
					pointRadius: 3,
					fill: false,
					borderWidth: 4,
					data: a
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							fontColor: "rgba(0,0,0,0.5)",
							fontStyle: "bold",
							beginAtZero: true,
							maxTicksLimit: 5,
							padding: 20
						},
						gridLines: {
							drawTicks: false,
							display: false
						}
					}],
					xAxes: [{
						gridLines: {
							zeroLineColor: "transparent"
						},
						ticks: {
							padding: 20,
							fontColor: "rgba(0,0,0,0.5)",
							fontStyle: "bold"
						}
					}]
				}
			}
		});
	}
	if ($("#option1").val() == "3") {
		if (datos.tipo == "1" || datos.tipo == "2") {

			// hacer algo aquí si el elemento existe

			if (datos.chart == "line") {
				var a = [0];
				var label = [
					"0", "1 semestre", "2 semestre", "3 semestre", "4 semestre", "5 semestre",
					"6 semestre", "7 semestre", "8 semestre", "9 semestre", "10 semestre"
				];
				var ctx = document.getElementById("lineal3").getContext('2d');
				$("#lineal3").css("display", "block");
			} else {
				var a = [];
				var label = [
					"1 semestre", "2 semestre", "3 semestre", "4 semestre", "5 semestre",
					"6 semestre", "7 semestre", "8 semestre", "9 semestre", "10 semestre"
				];
				$("#barra3").css("display", "block");
				var ctx = document.getElementById("barra3").getContext('2d');
			}

			var gradient1 = ctx.createLinearGradient(150, 0, 150, 300);
			gradient1.addColorStop(0, 'rgba(133, 180, 242, 0.91)');
			gradient1.addColorStop(1, 'rgba(255, 119, 119, 0.94)');

			var gradient2 = ctx.createLinearGradient(146.000, 0.000, 154.000, 300.000);
			gradient2.addColorStop(0, 'rgba(104, 179, 112, 0.85)');
			gradient2.addColorStop(1, 'rgba(76, 162, 205, 0.85)');

			//ponderado vs Semestre
			post.$url = url + "/gestionBoss/3";
			post.$sendPost.setNpost({"pensum_id": datos.pensum_id});
			var data = post.$sendPost.getPost().data;

			for (var i in data) {
				a.push(data[i].note);
			}
			new Chart(ctx, {
				type: datos.chart,
				options: {
					scales: {
						xAxes: [{
							display: true,
							gridLines: {
								color: '#eee'
							}
						}],
						yAxes: [{
							display: true,
							gridLines: {
								color: '#eee'
							},
							ticks: {
								max: 5.0,
								min: 0.0
							},
						}]
					},
				},
				data: {
					labels: label,
					datasets: [
						{
							label: "Materias pedidas Vs Semestre",
							backgroundColor: [
								gradient2,
								gradient2,
								gradient2,
								gradient2,
								gradient2,
								gradient2,
								gradient2,
								gradient2,
								gradient2,
								gradient2
							],
							hoverBackgroundColor: [
								gradient1,
								gradient1,
								gradient1,
								gradient1,
								gradient1,
								gradient1,
								gradient1,
								gradient1,
								gradient1,
								gradient1

							],
							borderColor: [
								gradient2,
								gradient2,
								gradient2,
								gradient2,
								gradient2,
								gradient2,
								gradient2,
								gradient2,
								gradient2,
								gradient2
							],
							borderWidth: 1,
							data: a
						},

					]
				}
			});

		}
	}
	if($("#option1").val() == "4"){
		$("#barra4").css("display","block");
		//ponderado vs Semestre
		post.$url = url + "/gestionBoss/4";
		post.$sendPost.setNpost({"pensum_id": datos.pensum_id,"document":datos.document});
		var data = post.$sendPost.getPost().data;
		var a = [];
		var b = [];
		for (var i in data) {
			a.push(data[i].note);
			b.push(data[i].name);
		}
		var oilCanvas = document.getElementById("barra4").getContext('2d');
		Chart.defaults.global.defaultFontFamily = "Lato";
		Chart.defaults.global.defaultFontSize = 18;
		var oilData = {
			labels:  ["1 semestre", "2 semestre", "3 semestre", "4 semestre", "5 semestre","6 semestre", "7 semestre", "8 semestre", "9 semestre", "10 semestre"],
			datasets: [
				{
					data: a,
					backgroundColor: [
						"#FF6384",
						"#63FF84",
						"#84FF63",
						"#8463FF",
						"#6384FF",
						"#eee",
						"#bbb",
						"#6542FF",
						"#7894ff",
						"#FF8932"
					]
				}]
		};
		var pieChart = new Chart(oilCanvas, {
			type: 'pie',
			data: oilData,
			options: {
				title: {
					display: true,
					text: 'Estudiante Nota Vs Semestre'
				}
			}
		});
	}

}


var searhStudent = (cedula) =>{
	var obj = {"document":cedula};
	post.$url = url+"/gestionStudens/3";
	post.$sendPost.setNpost(obj);
	var data = post.$sendPost.getPost().data;
	if(data){
		$("#viewReport").prop("disabled",false);
		$("#current_pensum_id").val(data.current_pensum_id);
		$("#new_pensum_id").val(data.new_pensum_id);
		$("#code_current_pensum").val(data.code_current_pensum);
		$("#code_new_pensum").val(data.code_new_pensum);
		$("#person_id").val(data.person_id);
		$("#student_id").val(data.student_id);
		$("#documento_change")[0].setCustomValidity("");
	}else{
		$("#documento_change")[0].setCustomValidity("Docuemnto no existe");
		$.notify("Docuemnto no existe");
		$("#viewReport").prop("disabled",true);
		$("#current_pensum_id").val("");
		$("#new_pensum_id").val("");
		$("#code_current_pensum").val("");
		$("#code_new_pensum").val("");
		$("#person_id").val("");
		$("#student_id").val("");
		$('#tableRH').css('display','none');
	}
};


function solicitarHomologacion() {
	confirmar("","Esta seguro que desea solicitar Una Homologacion?, luego de enviar la solicitud, el unico que puede cancelarla en el jefe de tu departamento","/gestionStudens/1",{},"question","tienes una solicitud en proceso","solictud de homologacion exitosa");
}

$("#formRequestChange").on("submit",function (form) {
	form.preventDefault();
	var obj = new Object();
	obj.current_pensum_id = $("#current_pensum_id").val();
	obj.new_pensum_id = $("#new_pensum_id").val();
	obj.person_id = $("#person_id").val();
	obj.student_id = $("#student_id").val();
	obj.status = $("#status_change").val();
	confirmar("estudiantes","Desea Hacer la solicitud de cambio para el documento "+$("#documento_change").val()+"?","/gestionStudens/1",obj,"question","el estudiante tiene una solicitud en proceso","solictud de homologacion exitosa");
});

function  eliminarHomologacion(id,student_id,pensum_id) {
	confirmar("estudiantes","Desea Eliminar la homologacion de este pensum? a este estudiante?","/gestionStudens/6",{"change_request_id":id,"student_id":student_id,"pensum_id":pensum_id},"warning");
}
function  changeStatus(id,student_id,pensum_id) {
	confirmar("estudiantes","Desea Cambiar el pensum a este estudiante?","/gestionStudens/5",{"change_request_id":id,"student_id":student_id,"pensum_id":pensum_id},"question");
}


function viewPensum(){
	$('.dashboard-Info').css('display','none');
	$('#gestionPensum').css('display','block');
	loaderTable("pensum");
}
function btnRegisterPensum(){
	$("[type=submit]").val("Registrar Datos");
	$("[type=submit]").addClass("btn-success").removeClass("btn-info");
	$('#pensumModal').modal();
	$('#formPensum [type=text]').val('');
	$('#formPensum [type=hidden]').val('');
	$("#detail").css("overflow","hidden").css("height",20).css("height","50px");
	$("#codePensum").css("border","1px solid #dee2e6;");
	$("#detail").html("");
}

function divEdtiable(id) {
	if($("#"+id).text().length>5){
		$("#"+id).css("border","1px solid #dee2e6");
	}else{
		$("#"+id).css("border","1px solid red");
	}
	$("#"+id).css("overflow","hidden").css("height",0).css("height",$("#"+id).prop("scrollHeight")+"px");
}

function searhCode(value) {
	if(value.length>8){
		var obj = {"code":value};
		post.$url = url+"/searchCodePensum";
		post.$sendPost.setNpost(obj);
		var data = post.$sendPost.getPost().data;
		if(data == 1){
			$("#codePensum")[0].setCustomValidity("el codigo de pensum ya existe");
			$.notify("El codigo de pensum ya existe");
			$("#codePensum").css("border","1px solid red");
		}else{
			$("#codePensum")[0].setCustomValidity("");
			$("#codePensum").css("border","1px solid #dee2e6");
		}
	}
}

