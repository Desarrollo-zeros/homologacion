<?php
/**
 * Created by PhpStorm.
 * User: carlo
 * Date: 24/09/2018
 * Time: 11:18 PM
 */




/*Querys*/

/*get users*/
$config["getUserCedula"] = "SELECT *FROM  users u INNER JOIN roles r ON u.roles_id = r.roles_id WHERE username = ? and password = ? and status = 1 LIMIT 1";
$config["getUserEmail"] = "SELECT *FROM  users u INNER JOIN roles r ON u.roles_id = r.roles_id  WHERE email = ? and password = ? and status = 1 LIMIT 1";
$config["getEmail"] = "SELECT email FROM users WHERE username = ? OR email = ? LIMIT 1";
$config["getToken"] = "SELECT username FROM users WHERE email = ? AND remember_token = ? LIMIT 1";
$config["getRolesUsers"] = "SELECT r.roles_id, r.name FROM roles r INNER JOIN users u ON u.roles_id = r.roles_id WHERE user_id = ?";
/*get persons*/
$config{"getPersons"} = "SELECT *FROM persons WHERE user_id = ? limit 1";
$config{"getPersonsDocument"} = "SELECT *FROM persons p inner join students s on s.person_id = p.person_id inner join pensums pe on pe.pensum_id = s.pensum_id where p.document = ?";
$config["getDataStudents"] = "SELECT  s.semester, s.pondered, s.pensum_id as currentPensum_id, ps.credit_numbers FROM students s INNER JOIN persons p on s.person_id = p.person_id INNER JOIN users u on u.user_id = p.user_id INNER JOIN pensums ps on ps.pensum_id = s.pensum_id WHERE u.user_id  = ?";
$config["getStudetsCreditNumbers"] = "SELECT SUM(credit_numbers)as studets_credit_numbers FROM matters m INNER JOIN notes n on  n.matter_id = m.matter_id INNER JOIN students s on s.student_id = n.student_id INNER JOIN persons p on p.person_id = s.person_id WHERE p.user_id = ? and n.note >= 3.0";
$config["getNewPensum_ids"] = "SELECT pensum_id as newPensum_id, code FROM pensums where career_id =(SELECT career_id from pensums where pensum_id = ?) and status = 2";
/*getMatters*/
$config["getMissingMatterCounts"] = "SELECT (COUNT(*) -(SELECT COUNT(*) FROM matters m
INNER JOIN notes n on  n.matter_id = m.matter_id
INNER JOIN students s on s.student_id = n.student_id
INNER JOIN persons p on p.person_id = s.person_id
WHERE p.user_id = ? and n.note >= 3.0)) as missingMatter 
FROM matters where pensum_id = ?";

$config["getMatterWonCounts"] = "SELECT COUNT(*) as countWon FROM matters m
INNER JOIN notes n on  n.matter_id = m.matter_id
INNER JOIN students s on s.student_id = n.student_id
INNER JOIN persons p on p.person_id = s.person_id
WHERE p.user_id = ? and n.note >= 3.0";

$config["getMatterLosts"] = "SELECT m.code, n.note, m.name FROM matters m
INNER JOIN notes n on  n.matter_id = m.matter_id
INNER JOIN students s on s.student_id = n.student_id
INNER JOIN persons p on p.person_id = s.person_id
WHERE p.user_id = ? and n.note < 3.0";

$config["getMattersWons"] = "SELECT m.code, n.note, m.name FROM matters m
INNER JOIN notes n on  n.matter_id = m.matter_id
INNER JOIN students s on s.student_id = n.student_id
INNER JOIN persons p on p.person_id = s.person_id
WHERE p.user_id = ? and n.note >= 3.0";

$config["getMatters"] = "SELECT m.code, n.note, m.credit_numbers, m.semester FROM matters m
INNER JOIN notes n on  n.matter_id = m.matter_id
INNER JOIN students s on s.student_id = n.student_id
INNER JOIN persons p on p.person_id = s.person_id
WHERE p.user_id = ?  order by m.code";

$config["getMattersHomolo"] = "SELECT mn.code, mn.name, ma.matter_id as currentMatterId, mn.matter_id as newMattersId, n.note
	FROM matters ma
		INNER JOIN notes n ON n.matter_id = ma.matter_id
		INNER JOIN students s ON s.student_id = n.student_id
		INNER JOIN persons p ON p.person_id = s.person_id
		INNER JOIN requirements r ON ma.matter_id = r.requirement_present_id
		INNER JOIN matters mn ON mn.matter_id = r.requirement_new_id 
			WHERE p.user_id = ? and n.note > 2.9 and mn.pensum_id = ? order by ma.matter_id asc";

$config["getFullMetters"] = "SELECT n.note,ma.code as codeA, ma.name as nameA,ma.semester as semesterA, mn.code as codeN, mn.name as nameN, mn.semester as semesterN FROM matters ma
		INNER JOIN notes n ON n.matter_id = ma.matter_id
		INNER JOIN students s ON s.student_id = n.student_id
		INNER JOIN persons p ON p.person_id = s.person_id
		INNER JOIN requirements r ON ma.matter_id = r.requirement_present_id
		INNER JOIN matters mn ON mn.matter_id = r.requirement_new_id 
		WHERE p.person_id = ? and n.note > 2.9 and mn.pensum_id = ? order by ma.matter_id asc";
/*
$config["getFullMetters"] = "SELECT ma.code as codeA, ma.name as nameA, mn.code as codeN FROM matters ma
		INNER JOIN notes n ON n.matter_id = ma.matter_id
		INNER JOIN students s ON s.student_id = n.student_id
		INNER JOIN persons p ON p.person_id = s.person_id
		INNER JOIN requirements r ON ma.matter_id = r.requirement_present_id
		INNER JOIN matters mn ON mn.matter_id = r.requirement_new_id
		WHERE p.user_id = ? and n.note > 2.9 and mn.pensum_id = ? order by ma.matter_id asc";
*/
/*Matter*/
$config["getmattersPensum"] = "SELECT code,credit_numbers,semester, name FROM matters WHERE pensum_id = ? and semester = ?";


/*Careers*/
$config["getCareers"] = 'SELECT CONCAT(p.first_name," ",p.second_name," ",p.first_surname," ",p.second_surname) as nameP, ca.name as nameC
FROM persons p 
INNER JOIN users u ON p.user_id = u.user_id
INNER JOIN roles r ON r.roles_id = u.roles_id
INNER JOIN students s ON s.person_id = p.person_id
INNER JOIN pensums pe on s.pensum_id = pe.pensum_id
INNER JOIN careers ca ON ca.career_id = pe.career_id
WHERE pe.pensum_id = ?  and r.roles_id = 3';
/*Careers*/

/*MenuSections*/
$config["getMenus"] = "SELECT *FROM menu where status = 1  ORDER BY by_order ASC";
$config["getSections"] = "SELECT *FROM section where status = 1 AND roles_id = ? ORDER BY by_order ASC";
/**/



//alllll
$config["confulta"] = "SELECT DISTINCT  avg(n.note), ma.matter_id as metter_id1, ma.code as codeA, ma.name as nameA,ma.semester as semesterA, mn.matter_id as metter_id2, mn.code as codeN, mn.name as nameN, mn.semester as semesterN FROM  matters ma
		INNER JOIN notes n ON n.matter_id = ma.matter_id
		INNER JOIN students s ON s.student_id = n.student_id
		INNER JOIN persons p ON p.person_id = s.person_id
		INNER JOIN requirements r ON ma.matter_id = r.requirement_present_id
		INNER JOIN matters mn ON mn.matter_id = r.requirement_new_id 
		WHERE  mn.pensum_id = 6 and ma.pensum_id = 4
		GROUP BY  metter_id1, codeA, nameA, semesterA, metter_id2,codeN, nameN, semesterN 
		HAVING avg(n.note) > 1";

//barra


$config["notaVsSemestre"] = "SELECT DISTINCT  avg(n.note) as note, m.semester from matters m inner join notes n on m.matter_id = n.matter_id where m.pensum_id = ?
GROUP BY semester ORDER BY semester asc";


$config["notaGVsSemestre"] = "SELECT DISTINCT  avg(n.note) as note, m.semester from matters m inner join notes n on m.matter_id = n.matter_id where m.pensum_id = ? and n.note > 2.9
GROUP BY semester ORDER BY semester asc";

$config["notaPVsSemestre"] = "SELECT DISTINCT  avg(n.note) as note, m.semester from matters m inner join notes n on m.matter_id = n.matter_id where m.pensum_id = ? and n.note < 2.96
GROUP BY semester ORDER BY semester asc";

$config["notaPVsSemestreM"] = "SELECT DISTINCT  avg(n.note) as note, m.semester from matters m inner join notes n on m.matter_id = n.matter_id inner join students s on
n.student_id = s.student_id inner join persons p on s.person_id = p.person_id where m.pensum_id = ? and  p.document = ?
GROUP BY semester ORDER BY semester asc";

$config["notaGVsSemestre1"] = "SELECT DISTINCT  avg(n.note) as note, m.matter_id,m.name, m.semester from matters m inner join notes n on m.matter_id = n.matter_id
GROUP BY matter_id, name, semester ORDER BY semester asc";

$config["viewHomoStatus"] = "select c.change_request_id, p.document, p.person_id, CONCAT(p.first_name,' ',p.first_surname) as namePerson, pec.code code_current_pensum, pen.code as code_new_pensum, c.status, s.student_id, c.current_pensum_id, c.new_pensum_id from persons p inner join students s on p.person_id = s.person_id inner join change_request c on c.student_id = s.student_id inner join pensums pec on pec.pensum_id = c.current_pensum_id inner join pensums pen on pen.pensum_id = c.new_pensum_id";
