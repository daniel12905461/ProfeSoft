SELECT CONCAT(p.apellidoPaterno,' ',p.apellidoMaterno,' ',p.primerNombre,' ',p.segundoNombre) as NombreProfesor ,p.IdProfesor,p.Contrasenia 
FROM Profesor p 
WHERE p.Usuario="a";

SELECT CONCAT(p.apellidoPaterno,' ',p.apellidoMaterno,' ',p.primerNombre,' ',p.segundoNombre) as NombreProfesor ,p.IdProfesor,p.Contrasenia 
FROM Clase c
WHERE p.Usuario="a";

-- Mostrar todas las evaluaciones con sus dimenciones de la materia legguaje del 1 trimestre del curso tercero B de primaria
SELECT e.*,d.*
FROM Materia m JOIN Curso c ON m.IdCurso = c.IdCurso
JOIN Trimestre t ON c.IdCurso = t.IdCurso
JOIN Dimencion d ON t.IdTrimestre = d.IdTrimestre
JOIN Evaluacion e ON d.IdDimencion = e.IdDimencion
AND c.IdCurso = 1
AND t.IdTrimestre = 1
AND m.IdMateria = 1

-- Mostrar todas las evaluaciones de la dimencion Hacer de la materia legguaje del 1 trimestre del curso tercero B de primaria
SELECT e.*,d.*
FROM Materia m JOIN Curso c ON m.IdCurso = c.IdCurso
JOIN Trimestre t ON c.IdCurso = t.IdCurso
JOIN Dimencion d ON t.IdTrimestre = d.IdTrimestre
JOIN Evaluacion e ON d.IdDimencion = e.IdDimencion
AND c.IdCurso = 1
AND t.IdTrimestre = 1
AND m.IdMateria = 1
AND d.Dimencion = "SABER"
ORDER BY e.IdEvaluacion;

-- Mostrar todos los estudiantes del curso tercero B
SELECT e.* 
FROM Estudiante e JOIN Curso c ON e.IdCurso=c.IdCurso
AND c.IdCurso=2;

-- Mostrar la nota del Estudiante de la evaluacion 1
SELECT ee.* 
FROM Estudiante es JOIN evaluacionEstudiante ee ON es.IdEstudiante = ee.IdEstudiante
JOIN Evaluacion ev ON ee.IdEvaluacion = ev.IdEvaluacion
AND es.IdEstudiante = 2
AND ev.IdEvaluacion = 35

-- Mostrar todos los estudiantes de la evaluacion Pruebas DE saebr
SELECT ee.* 
FROM Evaluacion ev JOIN evaluacionEstudiante ee ON ev.IdEvaluacion = ee.IdEvaluacion
JOIN Estudiante es ON ee.IdEstudiante = es.IdEstudiante
AND ev.IdEvaluacion = 35

-- Mostrar todos los estudiantes de la evaluacion 1
SELECT es.* 
FROM Evaluacion e JOIN Materia m ON e.IdMateria = m.IdMateria
JOIN Curso c ON m.IdCurso = c.IdCurso
JOIN Estudiante es ON c.IdCurso = es.IdCurso
AND e.IdEvaluacion=1

-- Mostrar la nota el Estudiante y la evaluacion por la calificaion
SELECT es.*,ev.*,ee.* 
FROM Estudiante es JOIN evaluacionEstudiante ee ON es.IdEstudiante = ee.IdEstudiante
JOIN Evaluacion ev ON ee.IdEvaluacion = ev.IdEvaluacion
AND ee.IdEvaluacionEstudiante = 1

-- Mostrar todos los cursos y sus respectivos profesores
SELECT c.*,p.*
FROM Curso c JOIN Profesor p ON c.IdProfesor=p.IdProfesor
SELECT c.*,m.*
FROM Curso c JOIN Materia m ON c.IdCurso = m.IdCurso

-- Mostrar Todas LAS EVALUACIONES cON SU DAMEN TRI MATE Curso
SELECT e.*,d.Dimencion,t.Trimestre,c.Curso,m.Materia
FROM Evaluacion e JOIN Materia m ON e.IdMateria = m.IdMateria
JOIN Dimencion d ON e.IdDimencion = d.IdDimencion
JOIN Trimestre t ON d.IdTrimestre = t.IdTrimestre
JOIN Curso c ON t.IdCurso = c.IdCurso