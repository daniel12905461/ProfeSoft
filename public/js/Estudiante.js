class Estudiante {
    MostrarEstudiante(IdEstudiante) {
		var url = 'estudiantes/'+IdEstudiante;
        return $.get(url);
    }
    EliminarEstudiante(IdEstudiante) {
        $.ajax({
            url: 'estudiantes/'+IdEstudiante,
            type: 'DELETE',  // user.destroy
            success: function(result) {
                // Do something with the result
                console.log(result);
            }
        });
    }
}

$(document).ready(function(){

    var estudiante = new Estudiante();

    function SiEsNull(Palabra){
        if(Palabra == null){
            return '';
        }
        if (Palabra == '') {
            return '';
        }
        return Palabra;
    }

	$(".ClassActuEstudent").click(function() {
		// console.log("dsda");
        let IdEstudiante = $(this).attr("value");
        datos =  estudiante.MostrarEstudiante(IdEstudiante).done(function(data) {
            // console.log(data.estudiante);
            $('#txtIdEstudianteAct').val(data.estudiante.IdEstudiante);
            $('#txtPrimerNombreAct').val(data.estudiante.PrimerNombre);
            $('#txtSegundoNombreAct').val(data.estudiante.SegundoNombre);
            $('#txtApellidoPaternoAct').val(data.estudiante.ApellidoPaterno);
            $('#txtApellidoMaternoAct').val(data.estudiante.ApellidoMaterno);
            $('#txtCiAct').val(data.estudiante.CiEstudiante);
            if (data.estudiante.Genero == "Masculino") {
                $('#txtGeneroAct').val("1");
            }else{
                $('#txtGeneroAct').val("2");
            }
            $('#txtNacimientoAct').val(data.estudiante.FechaNacimiento);
            $('#txtCursoAct').val(data.estudiante.IdCurso);
        });
    });

    $(".ClassVerEstudent").click(function() {
		// console.log("dsda");
        let IdEstudiante = $(this).attr("value");
        datos =  estudiante.MostrarEstudiante(IdEstudiante).done(function(data) {
            // console.log(data.estudiante);
			let template = '';
            template += `
            <div class="text-center">
                <!--{{-- <img class="profile-user-img img-fluid img-circle"
                    src="../../dist/img/user4-128x128.jpg"
                    alt="User profile picture"> --}}-->
            </div>

            <h3 class="profile-username text-center">${ data.estudiante.PrimerNombre }
            ${ SiEsNull(data.estudiante.SegundoNombre) } ${ data.estudiante.ApellidoPaterno } ${ data.estudiante.ApellidoMaterno }</h3>

            <p class="text-muted text-center">
                <div class="row">
                    <div class="col-md-6"><b>Ci:</b> ${ SiEsNull(data.estudiante.CiEstudiante) }</div>
                    <div class="col-md-6"><b>Género:</b> ${ data.estudiante.Genero }</div>
                </div>
                <div class="row">
                    <div class="col-md-6"><b>Fecha Naci:</b> ${ data.estudiante.FechaNacimiento }</div>
                    <div class="col-md-6"><b>Curso:</b> ${ data.estudiante.Curso }</div>
                </div>
            </p>`
			$('#VerMasEst').html(template);
        });
    });

    $(".ClassEliminarEstudent").click(function() {
		// console.log("dsda");
        $('#txtIdEstudianteEli').val($(this).attr("value"));
    });

    // ========================================Mensajes=====================================
    if(ifError == 2)toastr.success('Se agrego Correctamente.');
    if(ifError == 1)toastr.error('Ocurrio un Error!!!'+ErrorType);
    console.log(ErrorType);
});
