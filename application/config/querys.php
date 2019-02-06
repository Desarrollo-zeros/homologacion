<?php
/**
 * Created by PhpStorm.
 * User: carlo
 * Date: 24/09/2018
 * Time: 11:18 PM
 */




/*Querys*/

/*get users*/
$config["getUserCedula"] = "SELECT *FROM  users u INNER JOIN roles r ON u.roles_id = r.roles_id WHERE username = ? and password = ? LIMIT 1";
$config["getUserEmail"] = "SELECT *FROM  users u INNER JOIN roles r ON u.roles_id = r.roles_id  WHERE email = ? and password = ? LIMIT 1";
$config["getEmail"] = "SELECT email FROM users WHERE username = ? OR email = ? LIMIT 1";
$config["getToken"] = "SELECT username FROM users WHERE email = ? AND remember_token = ? LIMIT 1";
$config["getRolesUsers"] = "SELECT r.roles_id, r.name FROM roles r INNER JOIN users u ON u.roles_id = r.roles_id WHERE user_id = ?";
/*get persons*/
$config{"getPersons"} = "SELECT *FROM persons WHERE user_id = ? limit 1";
$config["getDataStudents"] = "SELECT  s.semester, s.pondered, s.pensum_id as currentPensum_id, ps.credit_numbers FROM students s INNER JOIN persons p on s.person_id = p.person_id INNER JOIN users u on u.user_id = p.user_id INNER JOIN pensums ps on ps.pensum_id = s.pensum_id WHERE u.user_id  = ?";
$config["getStudetsCreditNumbers"] = "SELECT SUM(credit_numbers)as studets_credit_numbers FROM matters m INNER JOIN notes n on  n.matter_id = m.matter_id INNER JOIN students s on s.student_id = n.student_id INNER JOIN persons p on p.person_id = s.person_id WHERE p.user_id = ? and n.note >= 3.0";
$config["getNewPensum_ids"] = "SELECT pensum_id as newPensum_id FROM pensums where career_id =(SELECT career_id from pensums where pensum_id = ?) and status = 2";
/*getMatters*/
$config["getMissingMatterCounts"] = "SELECT (COUNT(*) -(SELECT COUNT(*) FROM matters m
INNER JOIN notes n on  n.matter_id = m.matter_id
INNER JOIN students s on s.student_id = n.student_id
INNER JOIN persons p on p.person_id = s.person_id
WHERE p.user_id = ? and n.note >= 3.0)) as missingMatter 
FROM matters where pensum_id = 4";

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

$config["getFullMetters"] = "SELECT ma.code as codeA, ma.name as nameA,ma.semester as semesterA, mn.code as codeN, mn.name as nameN, mn.semester as semesterN FROM matters ma
		INNER JOIN notes n ON n.matter_id = ma.matter_id
		INNER JOIN students s ON s.student_id = n.student_id
		INNER JOIN persons p ON p.person_id = s.person_id
		INNER JOIN requirements r ON ma.matter_id = r.requirement_present_id
		INNER JOIN matters mn ON mn.matter_id = r.requirement_new_id 
		WHERE p.user_id = ? and n.note > 2.9 and mn.pensum_id = ? order by ma.matter_id asc";
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
