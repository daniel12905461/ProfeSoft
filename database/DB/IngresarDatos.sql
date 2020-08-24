INSERT INTO Profesor
(PrimerNombre,SegundoNombre,ApellidoPaterno,ApellidoMaterno,Usuario,Contrasenia)
VALUES
('Maricela','','Delgado','Camacho','a','a');

INSERT INTO Curso
(Curso,Grado,Paralelo,IdProfesor)
VALUES
('Tercero','Primario','B',1),
('Tercero','Primario','A',1);

INSERT INTO Materia
(Materia,IdCurso)
VALUES
('Lenguaje',1),
('CienNaturales',1),
('Matematicas',1),
('CienSociales',1),
('SociedadMenor',1),
('Tecnica',1),
('Lenguaje',2),
('CienNaturales',2),
('Matematicas',2),
('CienSociales',2),
('SociedadMenor',2),
('Tecnica',2);

INSERT INTO Estudiante
(PrimerNombre,SegundoNombre,ApellidoPaterno,ApellidoMaterno,CiEstudiante,Genero,FechaNacimiento,IdCurso)
VALUES
('daniel','','Delgado','Camacho','','1','2004-04-04',1);

-- INSERT INTO ClaseEstudiante
-- (IdEstudiante,IdClase)
-- VALUES
-- (1,1);

INSERT INTO Trimestre
(Trimestre,IdCurso)
VALUES
('1 Trimestre',1),
('2 Trimestre',1),
('3 Trimestre',1),
('1 Trimestre',2),
('2 Trimestre',2),
('3 Trimestre',2);

-- INSERT INTO claseTrimestre
-- (IdTrimestre,IdClase)
-- VALUES
-- (1,1),
-- (2,1),
-- (3,1);

INSERT INTO Dimencion
(Dimencion,IdTrimestre)
VALUES
('SABER',1),
('HACER',1),
('DECIDIR',1),
('SABER',2),
('HACER',2),
('DECIDIR',2);

INSERT INTO Evaluacion
(Evaluacion,IdDimencion,IdMateria)
VALUES
('PruebaS',1,1),
('PruebaS',1,1),
('PruebaS',1,1),
('PruebaS',1,1),
('PruebaS',1,1),
('PruebaH',2,1),
('PruebaH',2,1),
('PruebaH',2,1),
('PruebaH',2,1),
('PruebaD',3,1),
('PruebaD',3,1),
('PruebaD',3,1),
('PruebaD',3,1),
('PruebaD',3,1),
('PruebaS',4,1),
('PruebaS',4,1),
('PruebaS',4,1),
('PruebaS',4,1),
('PruebaS',4,1),
('PruebaH',5,1),
('PruebaH',5,1),
('PruebaH',5,1),
('PruebaH',5,1),
('PruebaH',5,1),
('PruebaD',6,1),
('PruebaD',6,1),
('PruebaD',6,1),
('PruebaD',6,1),
('PruebaD',6,1);

INSERT INTO EvaluacionEstudiante
(NotaEvaluacion,IdEvaluacion,IdEstudiante)
VALUES
(51,1,1),
(60,2,1),
(70,3,1),
(80,4,1),
(90,5,1),
(51,6,1),
(51,7,1),
(51,8,1),
(51,9,1),
(51,10,1),
(51,11,1),
(51,12,1),
(51,13,1),
(51,14,1),
(51,15,1),
(51,16,1),
(51,17,1),
(51,18,1),
(51,19,1);