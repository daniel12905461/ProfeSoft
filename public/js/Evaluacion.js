$(document).ready(function(){
	
	// console.log("daniel");

	$("#txtCurso").change(function() {
		// console.log("daniel1");
		let IdCurso = $('#txtCurso').val();
		var url = '/ActualizarSelectMaterTrimes/'+IdCurso;
		$.get(url, function(response) {
			// console.log(response);
			let template = '';
			response.ListaMaterias.forEach(task => {
				template += `
				<option value="${ task.IdMateria }">${ task.Materia }</option>
				`
			});
			// console.log(template);
			$('#txtMateria').html(template);
			template = '';
			response.ListaTrimestres.forEach(task => {
				template += `
				<option value="${ task.IdTrimestre }">${ task.Trimestre }</option>
				`
			});
			// console.log(template);
			$('#txtTrimestre').html(template);
		});
	});

	$("#txtTrimestre").change(function() {
		// console.log("txtTrimestre");
		let IdTrimestre = $('#txtTrimestre').val();
		var url = '/ActualizarSelectDimeciones/'+IdTrimestre;
		$.get(url, function(response) {
			// console.log(response);
			let template = '';
			response.ListaDimenciones.forEach(task => {
				template += `
				<option value="${ task.IdDimencion }">${ task.Dimencion }</option>
				`
			});
			// console.log(template);
			$('#txtDimencion').html(template);
		});
	});


});