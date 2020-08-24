$(document).ready(function(){
	
	// console.log("daniel");

	$("#txtCurso").change(function() {
		// console.log("daniel1");
	let daniel = $('#daniel').val();
	console.log(daniel);
		let IdCurso = $('#txtCurso').val();
		let IdMateria = $('#txtMateria').val();
		let IdTrimestre = $('#txtTrimestre').val();
		LlenarTablaEvaluaciones(IdCurso,IdMateria,IdTrimestre);
	});

	$("#txtMateria").change(function() {
		// console.log("daniel1");
		let IdCurso = $('#txtCurso').val();
		let IdMateria = $('#txtMateria').val();
		let IdTrimestre = $('#txtTrimestre').val();
		LlenarTablaEvaluaciones(IdCurso,IdMateria,IdTrimestre);
	});

	$("#txtTrimestre").change(function() {
		let IdCurso = $('#txtCurso').val();
		let IdMateria = $('#txtMateria').val();
		let IdTrimestre = $('#txtTrimestre').val();
		// console.log(IdCurso,IdMateria,IdTrimestre);
		LlenarTablaEvaluaciones(IdCurso,IdMateria,IdTrimestre);
	});

	function LlenarTablaEvaluaciones(IdCurso,IdMateria,IdTrimestre) {
		var url = '/ActualizarTabla/'+IdCurso+'&'+IdMateria+'&'+IdTrimestre;
		$.get(url, function(response) {
			console.log(response);
			let template = '';
			template += `
				<tr>
					<th style="padding: 0px; text-align: center; width:40px; max-width: 40px">
						#
					</th>
					<th style="padding: 0px; text-align: center; width:300px; max-width: 300px;">
						Nombre del Estudiante
					</th>
				`
			response.ListaEValuacionesSABER.forEach(task => {
				template += `
					<th style="height: 100px; width:30px; max-width: 30px;  padding: 0px; text-align: center; font-size: 11px; background-color: #28a745;">
						<span style="writing-mode: tb; transform: rotate(180deg);"><a href="">${ task.Evaluacion }</a></span>
					</th>
				`
			});
			template += `
					<th style="height: 100px; width:30px; max-width: 30px;  padding: 0px; text-align: center; font-size: 11px;">
						<span style="writing-mode: tb; transform: rotate(180deg);">PRODUCTO DEL SABER</span>
					</th>
				`
			response.ListaEValuacionesHACER.forEach(task => {
				template += `
					<th style="height: 100px; width:30px; max-width: 30px;  padding: 0px; text-align: center; font-size: 11px; background-color: #ffc107;">
						<span style="writing-mode: tb; transform: rotate(180deg);">${ task.Evaluacion }</span>
					</th>
				`
			});
			template += `
					<th style="height: 100px; width:30px; max-width: 30px;  padding: 0px; text-align: center; font-size: 11px;">
						<span style="writing-mode: tb; transform: rotate(180deg);">PRODUCTO DEL HACER</span>
					</th>
				`
			response.ListaEValuacionesDECIDIR.forEach(task => {
				template += `
					<th style="height: 100px; width:30px; max-width: 30px;  padding: 0px; text-align: center; font-size: 11px; background-color: #007bff;">
						<span style="writing-mode: tb; transform: rotate(180deg);">${ task.Evaluacion }</span>
					</th>
				`
			});
			template += `
					<th style="height: 100px; width:30px; max-width: 30px;  padding: 0px; text-align: center; font-size: 11px;">
						<span style="writing-mode: tb; transform: rotate(180deg);">PRODUCTO DEL SER Y DECIDIR</span>
					</th>
					<th style="height: 100px; width:30px; max-width: 30px;  padding: 0px; text-align: center; font-size: 11px; background-color: #6c757d;">
						<span style="writing-mode: tb; transform: rotate(180deg);">PROMEDIO BIMESTRE</span>
					</th>
				</tr>
				`
			$('#thead').html(template);
			template = '';
			let key=0;
			response.ListaEValuacionesEstudiante.forEach(task => {
				template += `
				<tr>
					<td style="padding: 0px; text-align: center;">${ key+1 }</td>
					<td style="padding: 0px; text-align: center;">${  task["PrimerNombre"] } ${ task["SegundoNombre"] } ${ task["ApellidoPaterno"] } ${ task["ApellidoMaterno"] }</td>
				`
				for (let j = 0; j < response.CantidadNotas; j++) {
					template += `
						<td style="padding: 0px; text-align: center;">${ task[j] }</td>
					`
				}
				template += `
				</tr>
				`
				key++;
			});
			// Console.log(template);
			$('#tbody').html(template);
		});
	}

	$(".Evaluacion").click(function() {
		// console.log($(this).attr("value"));
		let IdEvaluacion = $(this).attr("value");
		var url = '/MostrarNotasPorEvaluacion/'+IdEvaluacion;
		$.get(url, function(response) {
			console.log(response);
			let template = '';
			template += `${ response.NombreDeLaEvaluacion }`
			$('#NombreEvaluacionGrande').html(template);
			template = '';
			let key=0;
			response.ListaEstudiantesCalificaiones.forEach(task => {
				template += `
					<tr>
						<td>${ key+1 }</td>
						<td>${  task["PrimerNombre"] } ${ task["SegundoNombre"] } ${ task["ApellidoPaterno"] } ${ task["ApellidoMaterno"] }</td>
						<td><input type="hidden" name="txtIdCalificacion${ task["IdEvaluacionEstudiante"] }" value="${ task["IdEvaluacionEstudiante"] }"><input type="number" name="txtNota${ task["IdEvaluacionEstudiante"] }" value="${ task["Nota"] }" style="text-align: center; width: 40px;"></td>
					</tr>
				`
				key++;
			});
			$('#TblaModalEvaluacion').html(template);
		});
	});

	$(".NotaEvaluacion").click(function() {
		// console.log($(this).attr("value"));
		let IdEvaluacionEstudiante = $(this).attr("value");
		var url = '/MostrarNotasPorCalificaion/'+IdEvaluacionEstudiante;
		$.get(url, function(response) {
			console.log(response);
			let template = '';
			template += `${ response.DatosCalificacion[0].Evaluacion }`
			$('#NombreEvaluacionPequenio').html(template);
			template = `
				<tr>
					<td>${  response.DatosCalificacion[0].ApellidoPaterno } ${ response.DatosCalificacion[0].ApellidoMaterno } ${ response.DatosCalificacion[0].PrimerNombre } ${ response.DatosCalificacion[0].SegundoNombre }</td>
					<td><input type="hidden" name="txtIdCalificacion" value="${  response.DatosCalificacion[0].IdEvaluacionEstudiante }"><input type="number" name="txtNota" value="${  response.DatosCalificacion[0].NotaEvaluacion }" style="text-align: center; width: 40px;"></td>
				</tr>
			`
			$('#TblaModalEvaluacionPeque').html(template);
		});
	});

});