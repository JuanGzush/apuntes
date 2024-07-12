DELIMITER $$
CREATE DEFINER=`root`@`localhost` FUNCTION `getTutorName`(`codOe` VARCHAR(3), `codCurso` VARCHAR(2)) RETURNS varchar(30) CHARSET utf8
    DETERMINISTIC
BEGIN
	DECLARE tutorName, tutorSurname VARCHAR(20);
    
    SELECT nombre, apellidos INTO tutorName, tutorSurname FROM profesor prof JOIN curso cur ON prof.codProf = cur.codTutor WHERE cur.codOe = codOe AND cur.codCurso = codCurso;
    
	RETURN concat(tutorName, ' ', tutorSurname);
END$$
DELIMITER ;



DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getSubjectData`(IN `codASIG` VARCHAR(8), IN `codOe` VARCHAR(3), IN `codCurso` VARCHAR(2), OUT numRows INT(3), OUT `numWeeklyHours` INT(2), OUT `teacherName` VARCHAR(30))
BEGIN
	DECLARE teacherFirstname, teacherSurname VARCHAR(20);
    
    SELECT count(*) INTO numRows FROM profesor prof JOIN reparto rep ON prof.codProf = rep.codProf JOIN asignatura asig ON rep.codAsig = asig.codAsig WHERE rep.codOe = codOe AND rep.codCurso = codCurso AND rep.codAsig = codAsig;
    
    SELECT prof.nombre, apellidos, horasSemanales INTO teacherFirstname, teacherSurname, numWeeklyHours FROM profesor prof JOIN reparto rep ON prof.codProf = rep.codProf JOIN asignatura asig ON rep.codAsig = asig.codAsig WHERE rep.codOe = codOe AND rep.codCurso = codCurso AND rep.codAsig = codAsig;
    
    SET teacherName = concat(teacherFirstname, ' ', teacherSurname);
END$$
DELIMITER ;