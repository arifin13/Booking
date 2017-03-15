<?php
	include '../lib/connection.php';
	include '../lib/message.class.php';
	include '../lib/split.class.php';
	include '../lib/global.class.php';

	if(!isset($_REQUEST['submitInsidentil']) && !isset($_REQUEST['submitRegular'])) {
		$_REQUEST['submitInsidentil'] = 1;
	}

	$todayDateFrom = date("Y-m-d");
	$todayDateTo = date("Y-m-d",mktime(0, 0, 0, date("m"), date("d")+14, date("Y")));

	$facilityId = isset($_REQUEST['facilityId']) ? $_REQUEST['facilityId'] : 'x';
	$departementId = isset($_REQUEST['departementId']) ? $_REQUEST['departementId'] : 'x';
	$type = isset($_REQUEST['type']) ? $_REQUEST['type'] : 'x';

	if(isset($_REQUEST['dateFrom'])) {
	   if(strlen(trim($_REQUEST['dateFrom'])) > 0) {
	      $tmp = explode('/',$_REQUEST['dateFrom']);
	      $dateFrom  = $tmp[2].'-'.$tmp[1].'-'.$tmp[0];
          } else {
            $dateFrom = $todayDateFrom;
	   }
       } else {
	   $dateFrom = $todayDateFrom;
	}

	if(isset($_REQUEST['dateTo'])) {
	   if(strlen(trim($_REQUEST['dateTo'])) > 0) {
	      $tmp = explode('/',$_REQUEST['dateTo']);
	      $dateTo  = $tmp[2].'-'.$tmp[1].'-'.$tmp[0];
          } else {
            $dateTo = $todayDateTo;
	   }
	} else {
	   $dateTo = $todayDateTo;
	}

	$where = $facilityId != 'x' ? " and facility_id = '$facilityId'" : "";
	$where .= $dateFrom != 'x' ? " and date_to >= '$dateFrom'" : "";
	$where .= $dateTo != 'x' ? " and date_to <= '$dateTo'" : "";

	if( ($dateFrom == $todayDateFrom) && ($dateTo == $todayDateTo)) {
		//$where .= " and b.date_to <= CURDATE() ";
	}

	$query = "select b.id, b.departement_id, b.facility_id, b.type, b.name,
                b.description, b.date_from, b.date_to, b.time_from, b.time_to,
		  (select d.name from departement as d where d.id = b.departement_id) as departement_name,
		  (select f.name from facility as f where f.id = b.facility_id) as facility_name,
		  DATE_FORMAT(b.date_from,'%e %b %Y') as date_from_name,
		  DATE_FORMAT(b.date_to,'%e %b %Y') as date_to_name,
		  DATE_FORMAT(b.time_from,'%H:%i') as time_from_name,
		  DATE_FORMAT(b.time_to,'%H:%i') as time_to_name,
		  file_attacment
		from booking as b
		where type = '0'
		  $where
		order by b.date_from asc, b.date_to asc, b.time_from asc, b.time_to asc
		limit 0,50";

	$dataInsidentil = mysql_query($query) or die (mysql_error());
	$regularFacilityId = isset($_REQUEST['regularFacilityId']) ? $_REQUEST['regularFacilityId'] : 'x';

	$whereRegular = $regularFacilityId != 'x' ? " and facility_id = '$regularFacilityId'" : "";

	$query = "select b.id, b.departement_id, b.facility_id, b.type, b.name,
                b.description, b.date_from, b.date_to, b.time_from, b.time_to,
		  (select d.name from departement as d where d.id = b.departement_id) as departement_name,
		  (select f.name from facility as f where f.id = b.facility_id) as facility_name,
		  DATE_FORMAT(b.date_from,'%e %b %Y') as date_from_name,
		  DATE_FORMAT(b.date_to,'%e %b %Y') as date_to_name,
		  DATE_FORMAT(b.time_from,'%H:%i') as time_from_name,
		  DATE_FORMAT(b.time_to,'%H:%i') as time_to_name,
		  day_regular,
		  file_attacment
		from booking as b
		where type = '1'
		  $whereRegular
		order by facility_name asc, b.day_regular desc, b.date_from desc, b.date_to desc, b.time_from asc, b.time_to asc
		limit 0,50";

	$dataRegular = mysql_query($query) or die (mysql_error());

	$query = "select id,name
		from facility
		where is_delete = '0'
		order by name";
	$dataFacility = mysql_query($query) or die (mysql_error());

	$query = "select id,name
		from facility
		where is_delete = '0'
		order by name";
	$dataFacilityRegular = mysql_query($query) or die (mysql_error());


	$query = "select id,name
		from facility
		where is_delete = '0'
		order by name";
	$dataFacilityList = mysql_query($query) or die (mysql_error());

	include '../lib/connection-close.php';
?>
