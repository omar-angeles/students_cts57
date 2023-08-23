-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 19, 2023 at 01:04 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `students_cts57`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumnos`
--

CREATE TABLE `alumnos` (
  `curp` varchar(20) DEFAULT NULL,
  `noControl` varchar(50) DEFAULT NULL,
  `apellidoPaterno` varchar(30) DEFAULT NULL,
  `apellidoMaterno` varchar(30) DEFAULT NULL,
  `nombres` varchar(30) DEFAULT NULL,
  `sexoAlumno` varchar(20) DEFAULT NULL,
  `fotoAlumno` varchar(255) DEFAULT NULL,
  `fechaNacimientoAlumno` date DEFAULT NULL,
  `edadAlumno` int(11) DEFAULT NULL,
  `ultimoSemestreAlumno` varchar(3) DEFAULT NULL,
  `turnoAlumno` varchar(20) DEFAULT NULL,
  `grupoAlumno` varchar(5) DEFAULT NULL,
  `especialidadAlumno` varchar(50) DEFAULT NULL,
  `becaBenito` varchar(3) DEFAULT NULL,
  `trabajaAlumno` varchar(3) DEFAULT NULL,
  `tipoSecundaria` varchar(30) DEFAULT NULL,
  `hablaLenguaIndigena` varchar(3) DEFAULT NULL,
  `domicilioAlumno` varchar(255) DEFAULT NULL,
  `localidad` varchar(255) DEFAULT NULL,
  `entidadFederativa` int(11) DEFAULT NULL,
  `codigoPostal` int(11) DEFAULT NULL,
  `noExterior` varchar(50) DEFAULT NULL,
  `noInterior` varchar(50) DEFAULT NULL,
  `descripcionCasa` varchar(255) DEFAULT NULL,
  `viveConPadres` varchar(3) DEFAULT NULL,
  `conQuienVive` varchar(255) DEFAULT NULL,
  `estatura` double(11,3) DEFAULT NULL,
  `peso` decimal(11,3) DEFAULT NULL,
  `servicioSeguro` varchar(3) DEFAULT NULL,
  `alumnoMedicado` varchar(3) DEFAULT NULL,
  `nombreEnfermedad` varchar(255) DEFAULT NULL,
  `alumnoSobresaliente` varchar(3) DEFAULT NULL,
  `tipoDeSobreSaliente` varchar(255) DEFAULT NULL,
  `alumnoConTratamientoPsicologico` varchar(3) DEFAULT NULL,
  `documentoAlumnoPsicologico` varchar(255) DEFAULT NULL,
  `tipoTransporte` varchar(250) DEFAULT NULL,
  `tiempoTransporte` int(11) DEFAULT NULL,
  `totalTransporteSemanal` int(11) DEFAULT NULL,
  `nombreUniversidadFutura` varchar(255) DEFAULT NULL,
  `gastoUtiles` int(11) DEFAULT NULL,
  `gastoUniformes` int(11) DEFAULT NULL,
  `internetEnCasa` varchar(3) DEFAULT NULL,
  `dispositivoDisponibles` varchar(50) DEFAULT NULL,
  `reglamentoAlumno` varchar(255) DEFAULT NULL,
  `reglamentoTutor` varchar(255) DEFAULT NULL,
  `firmaAlumno` varchar(255) DEFAULT NULL,
  `firmaTutor` varchar(300) DEFAULT NULL,
  `estatusNSS` varchar(255) DEFAULT NULL,
  `numeroNSSAlumno` varchar(50) DEFAULT NULL,
  `localidadSeguroSocial` varchar(255) DEFAULT NULL,
  `numeroCasaAlumno` varchar(100) DEFAULT NULL,
  `numeroCelularAlumno` varchar(20) DEFAULT NULL,
  `idCarrera` int(11) DEFAULT NULL,
  `idPariente` int(11) DEFAULT NULL,
  `idGrupo` int(11) DEFAULT NULL,
  `idDiscapacidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `alumnos`
--

INSERT INTO `alumnos` (`curp`, `noControl`, `apellidoPaterno`, `apellidoMaterno`, `nombres`, `sexoAlumno`, `fotoAlumno`, `fechaNacimientoAlumno`, `edadAlumno`, `ultimoSemestreAlumno`, `turnoAlumno`, `grupoAlumno`, `especialidadAlumno`, `becaBenito`, `trabajaAlumno`, `tipoSecundaria`, `hablaLenguaIndigena`, `domicilioAlumno`, `localidad`, `entidadFederativa`, `codigoPostal`, `noExterior`, `noInterior`, `descripcionCasa`, `viveConPadres`, `conQuienVive`, `estatura`, `peso`, `servicioSeguro`, `alumnoMedicado`, `nombreEnfermedad`, `alumnoSobresaliente`, `tipoDeSobreSaliente`, `alumnoConTratamientoPsicologico`, `documentoAlumnoPsicologico`, `tipoTransporte`, `tiempoTransporte`, `totalTransporteSemanal`, `nombreUniversidadFutura`, `gastoUtiles`, `gastoUniformes`, `internetEnCasa`, `dispositivoDisponibles`, `reglamentoAlumno`, `reglamentoTutor`, `firmaAlumno`, `firmaTutor`, `estatusNSS`, `numeroNSSAlumno`, `localidadSeguroSocial`, `numeroCasaAlumno`, `numeroCelularAlumno`, `idCarrera`, `idPariente`, `idGrupo`, `idDiscapacidad`) VALUES
('ZAAO010828HMCVNMA4', '22309060570115', 'PRUEBA', 'PRUBA', 'GABRIEL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5556917624', '5522462492', NULL, NULL, NULL, NULL);
-- --------------------------------------------------------

--
-- Table structure for table `calificaciones`
--

CREATE TABLE `calificaciones` (
  `idMateria` int(11) NOT NULL,
  `generacion` varchar(30) DEFAULT NULL,
  `turno` varchar(30) DEFAULT NULL,
  `semestre` int(11) DEFAULT NULL,
  `grupo` varchar(5) DEFAULT NULL,
  `noControl` bigint(20) DEFAULT NULL,
  `nombreMateriaC` varchar(150) DEFAULT NULL,
  `calParcialUno` int(11) DEFAULT NULL,
  `calParcialDos` int(11) DEFAULT NULL,
  `calParcialTres` int(11) DEFAULT NULL,
  `calificacionFinal` int(11) DEFAULT NULL,
  `periodo` varchar(30) DEFAULT NULL,
  `asistenciasParcialUno` int(11) DEFAULT NULL,
  `asistenciasParcialDos` int(11) DEFAULT NULL,
  `asistenciasParcialTres` int(11) DEFAULT NULL,
  `totalAsistencias` int(11) DEFAULT NULL,
  `tipoAcreditacion` varchar(5) DEFAULT NULL,
  `carrera` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `justificantes`
--

CREATE TABLE `justificantes` (
  `idJustificante` int(11) NOT NULL,
  `apellidoPaterno` varchar(20) DEFAULT NULL,
  `apellidoMaterno` varchar(20) DEFAULT NULL,
  `nombres` varchar(30) DEFAULT NULL,
  `especialidadAlumno` varchar(25) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `fechaReporte` date DEFAULT NULL,
  `noControl` int(11) DEFAULT NULL,
  `observaciones` varchar(255) DEFAULT NULL,
  `diaInicio` date DEFAULT NULL,
  `diaFinal` date DEFAULT NULL,
  `turno` varchar(15) DEFAULT NULL,
  `orientacion` varchar(20) DEFAULT NULL,
  `dia` varchar(5) DEFAULT NULL,
  `mes` varchar(15) DEFAULT NULL,
  `anio` varchar(5) DEFAULT NULL,
  `dias` int(11) DEFAULT NULL,
  `motivo` varchar(255) DEFAULT NULL,
  `especificacion` varchar(255) DEFAULT NULL,
  `fechaIncidente` date DEFAULT NULL,
  `fotoJustificante` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reportes`
--

CREATE TABLE `reportes` (
  `idReporte` int(11) NOT NULL,
  `apellidoPaterno` varchar(20) DEFAULT NULL,
  `apellidoMaterno` varchar(20) DEFAULT NULL,
  `nombres` varchar(30) DEFAULT NULL,
  `especialidadAlumno` varchar(25) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `fechaReporte` date DEFAULT NULL,
  `noControl` int(11) DEFAULT NULL,
  `observaciones` varchar(255) DEFAULT NULL,
  `diaInicio` date DEFAULT NULL,
  `diaFinal` date DEFAULT NULL,
  `turno` varchar(15) DEFAULT NULL,
  `orientacion` varchar(20) DEFAULT NULL,
  `dia` varchar(5) DEFAULT NULL,
  `mes` varchar(15) DEFAULT NULL,
  `anio` varchar(5) DEFAULT NULL,
  `dias` int(11) DEFAULT NULL,
  `motivo` varchar(255) DEFAULT NULL,
  `especificacion` varchar(255) DEFAULT NULL,
  `fechaIncidente` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `apellido` varchar(80) NOT NULL,
  `username` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL,
  `mail` varchar(80) NOT NULL,
  `nombreRol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idUser`, `nombre`, `apellido`, `username`, `password`, `mail`, `nombreRol`) VALUES
(1, 'Luigi', 'Faccinetto', 'Faccinetto', '12345', 'luigi@gmail.com', 'Administrador'),
(2, 'Omar', 'Zavaleta', 'Omar', '12345', 'omar@gmail.com', 'ControlEscolar'),
(3, 'Alondra', 'Urbina', 'Alo', '12345', 'alo@gmail.com', 'Orientacion'),
(4, 'test', 'test', 'test', '12345', 'test@gmail.com', 'Alumno');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD PRIMARY KEY (`idMateria`);

--
-- Indexes for table `justificantes`
--
ALTER TABLE `justificantes`
  ADD PRIMARY KEY (`idJustificante`);

--
-- Indexes for table `reportes`
--
ALTER TABLE `reportes`
  ADD PRIMARY KEY (`idReporte`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `idMateria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15338;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
