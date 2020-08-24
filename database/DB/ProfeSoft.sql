DROP DATABASE IF EXISTS ProfeSoft;
CREATE DATABASE ProfeSoft;
USE ProfeSoft;

-- -----------------------------------------------------
-- Table `biblioteca`.`Profesor`
-- -----------------------------------------------------
CREATE TABLE Profesor (
IdProfesor INT PRIMARY KEY  AUTO_INCREMENT,
PrimerNombre VARCHAR(45) NOT NULL,
SegundoNombre VARCHAR(45) NULL,
ApellidoPaterno VARCHAR(45) NOT NULL,
ApellidoMaterno VARCHAR(45) NOT NULL,
Usuario VARCHAR(45) NOT NULL,
Contrasenia VARCHAR(45) NOT NULL
);

-- -----------------------------------------------------
-- Table `biblioteca`.`Clase`
-- -----------------------------------------------------
CREATE TABLE Curso (
IdCurso INT PRIMARY KEY AUTO_INCREMENT,
Curso VARCHAR(45) NOT NULL,  
Grado VARCHAR(45) NOT NULL, 
Paralelo VARCHAR(15) NOT NULL, 
Campo VARCHAR(45) NULL, 
Area VARCHAR(45) NULL, 
fechaCreacion DATE NULL,
IdProfesor INT NOT NULL,
FOREIGN KEY (IdProfesor) REFERENCES Profesor(IdProfesor)
);

-- -----------------------------------------------------
-- Table `biblioteca`.`Clase`
-- -----------------------------------------------------
CREATE TABLE Materia (
IdMateria INT PRIMARY KEY AUTO_INCREMENT,
Materia VARCHAR(45) NOT NULL,  
fechaCreacion DATE NULL,
IdCurso INT NOT NULL,
FOREIGN KEY (IdCurso) REFERENCES Curso(IdCurso)
);

-- -----------------------------------------------------
-- Table `biblioteca`.`Estudiante`
-- -----------------------------------------------------
CREATE TABLE Estudiante (
IdEstudiante INT PRIMARY KEY  AUTO_INCREMENT,
PrimerNombre VARCHAR(45) NOT NULL,
SegundoNombre VARCHAR(45) NULL,
ApellidoPaterno VARCHAR(45) NOT NULL,
ApellidoMaterno VARCHAR(45) NOT NULL,
CiEstudiante VARCHAR(45) NULL,
Genero ENUM('Masculino','Femenino'),
FechaNacimiento DATE NOT NULL,
IdCurso INT NOT NULL,
FOREIGN KEY (IdCurso) REFERENCES Curso(IdCurso)
);

-- -----------------------------------------------------
-- Table `biblioteca`.`ClaseEstudiante`
-- -----------------------------------------------------
-- CREATE TABLE ClaseEstudiante (
-- IdClaseEstudiante INT PRIMARY KEY AUTO_INCREMENT,  
-- IdEstudiante INT NOT NULL,
-- IdClase INT NOT NULL,
-- FOREIGN KEY (IdEstudiante) REFERENCES Estudiante(IdEstudiante),
-- FOREIGN KEY (IdClase) REFERENCES Clase(IdClase)
-- );

-- -----------------------------------------------------
-- Table `biblioteca`.`Trimestre`
-- -----------------------------------------------------
CREATE TABLE Trimestre (
IdTrimestre INT PRIMARY KEY AUTO_INCREMENT,
Trimestre VARCHAR(45) NOT NULL,  
fechaCreacion DATE NULL,
IdCurso INT NOT NULL,
FOREIGN KEY (IdCurso) REFERENCES Curso(IdCurso)
);

-- -----------------------------------------------------
-- Table `biblioteca`.`Evaluaciones`
-- -----------------------------------------------------
CREATE TABLE Dimencion (
IdDimencion INT PRIMARY KEY AUTO_INCREMENT,
Dimencion VARCHAR(45) NOT NULL,  
fechaCreacion DATE NULL,
IdTrimestre INT NOT NULL,
FOREIGN KEY (IdTrimestre) REFERENCES Trimestre(IdTrimestre)
);

-- -----------------------------------------------------
-- Table `biblioteca`.`Evaluaciones`
-- -----------------------------------------------------
CREATE TABLE Evaluacion (
IdEvaluacion INT PRIMARY KEY AUTO_INCREMENT,
Evaluacion VARCHAR(45) NOT NULL,  
fechaCreacion DATE NULL,
IdDimencion INT NOT NULL,
IdMateria INT NOT NULL,
FOREIGN KEY (IdDimencion) REFERENCES Dimencion(IdDimencion),
FOREIGN KEY (IdMateria) REFERENCES Materia(IdMateria)
);

-- -----------------------------------------------------
-- Table `biblioteca`.`Evaluaciones`
-- -----------------------------------------------------
CREATE TABLE EvaluacionEstudiante (
IdEvaluacionEstudiante INT PRIMARY KEY AUTO_INCREMENT,
NotaEvaluacion INT NOT NULL,  
fechaCreacion DATE NULL,
IdEvaluacion INT NOT NULL,
IdEstudiante INT NOT NULL,
FOREIGN KEY (IdEvaluacion) REFERENCES Evaluacion(IdEvaluacion),
FOREIGN KEY (IdEstudiante) REFERENCES Estudiante(IdEstudiante)
);
