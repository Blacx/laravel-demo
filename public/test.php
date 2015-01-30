<?php
/**
 * 2014-08-25: Tweak pour le transfert des résultats du lot1 au lot2.
 * (finalement redondant avec be.ella.v2.server.webapps.system.levelTest.LevelTestResultController si celui-ci avait été correctement configuré (il écrit dans la mauvaise DB))
 *
 * @author Pierre-Yves Dufays
 */

///////////// Helper function
$debug=false;

function initDB($params) {
	global $debug;
	$userName = $params["userName"];
	$password = $params["password"];
	$hostName = $params["hostName"];
	$databaseName = $params["databaseName"];
	$con = mysql_connect($hostName, $userName, $password)
	or die("Unable to connect to MySQL:$hostName\n");
	if ($debug) {
		echo "Connected to MySQL:$hostName\n";
	}
	mysql_select_db($databaseName, $con) or die("Could not select database: $databaseName\n");
	return $con;
}

function executeQuery($con, $query, $forEachRowFct) {
	global $debug;
	if ($debug) {
		echo "DEBUG: executeQuery: ".$query."\n------------------\n";
	}
	$result = mysql_query($query,$con) or die("Query fails! ($query)");
	while ($row = mysql_fetch_array($result)) {
		$forEachRowFct($row);
	}
}

function executeUpdate($con,$updateQuery) {
	global $debug;
	if ($debug) {
		echo "DEBUG: executeUpdate: ".$updateQuery."\n------------------\n";
	}
	$result = mysql_query($updateQuery,$con) or die("Query fails! ($updateQuery)");
}

function sqlArrayToInClause($arr) {
	$ret='';
	for ($i=0;$i<count($arr);$i++) {
		if ($ret!='') $ret.=',';
		$ret.=$arr[$i];
	}
	return "($ret)";
}

$lot1Con=null;
$lot2Con=null;

function outputV($v) {
	if ($v==NULL) return 'NULL';
	return $v;
}

///////////// Init
try {

	$lot1Con=initDB(array(
			"userName"=>"vagrant",
			"password"=>"vagrant",
			"hostName"=>"192.168.10.10",
			"databaseName"=>"elearning"
		));

	$lot2Con=initDB(array(
			"userName"=>"vagrant",
			"password"=>"vagrant",
			"hostName"=>"192.168.10.10",
			"databaseName"=>"elearning"
		));

	///////////// Main prg

	$licenseTable="ller14_licenses";
	// Load all userIds that will be handled by the script: this is a freeze
	$licenseIds=array();
	executeQuery($lot1Con,"SELECT l.id AS lId FROM ".$licenseTable." AS l WHERE status>=3 AND `type`='assessment'",function($row) {
			global $licenseIds;
			array_push($licenseIds,$row['lId']);
		});
	//echo "; #".count($licenseIds)."\n";
	//var_dump($licenseIds);	

	// global variable (to be sure)
	$license=-1;
	$v1User=-1;
	$v2User=-1;
	$testInfos=-1;
	$cpt=0;

	echo '"licenseId";"testNum";"old_date_first_acces";"new_date_first_acces";"comment";"v1UserId";"v2UserId";"UPDATE for correction"'."\r\n";
	$len=count($licenseIds);
	for ($i=0;$i<$len;$i++) {
		global $licenseTable;
		global $license;
		global $v1User;
		global $v2User;
		global $cpt;
		$licenseId=$licenseIds[$i];

		// retrieving current license
		executeQuery($lot1Con,"SELECT * FROM ".$licenseTable." WHERE id=".$licenseId,function($row) {
				global $license;
				$license=$row;
			});
		$v1UserId=$license['user_id'];
		//var_dump($license);		
		if ($v1UserId==0) continue; // Skip license because not assigned to an user			



		// retrieve corresponding v1User		
		executeQuery($lot1Con,"SELECT * FROM users WHERE ID=".$v1UserId,function($row) {
				global $v1User;
				$v1User=$row;
			});
		$email=$v1User['email'];

		// retrieve corresponding v2User
		$v2UserId=-1;
		executeQuery($lot1Con,"SELECT * FROM V2User WHERE email='".mysql_escape_string($email)."'",function($row) {
				global $v2User;
				$v2User=$row;
			});
		$v2UserId=$v2User['id'];

		// Computing the number of the test for the license
		executeQuery($lot1Con,"SELECT count(*) AS testNum FROM ".$licenseTable." WHERE id<".$licenseId." AND user_id=".$v1UserId." AND `type`='assessment'",function($row) {
				global $license;
				$license['testNum']=$row['testNum']+1;
			});



		// Computing test information about that user (! ignoring the language of the test !)
		$testInfos=array();
		executeQuery($lot1Con,"SELECT * FROM `V2Module` WHERE userId=".$v2UserId." ORDER BY endTime",function($row) {
				global $testInfos;
				array_push($testInfos,$row);
			});
		$testNum=1; // 1: test 1, 2: test 2						
		foreach ($testInfos as $testInfo) {
			$testInfo['testNum']=$testNum;
			if ($license['testNum']==$testNum) {
				$license['startTime']=$testInfo['startTime'];
				break;
			}
			$testValid= ((($testInfo['validComputer']==1)&&($testInfo['validUserOverride']==NULL))||($testInfo['validUserOverride']==1)) && ($testInfo['score']!=NULL);
			if ($testValid) $testNum++;
		}

		// display change		
		if (ISSET($license['startTime'])) { // exists a corresponding test in Altissia DB
			if ($license['startTime']!=$license['date_first_acces']) {
				$update="UPDATE ".$licenseTable." SET date_first_acces='".$license['startTime']."' WHERE id=".$license['id'].";";
				echo '"'.$license['id'].'";"'.$license['testNum'].'";"'.$license['date_first_acces'].'";"'.$license['startTime'].'";"Date doesn t match";"'.$v1UserId.'";"'.$v2UserId.'";"'.$update.'"'."\r\n";
			}
		} else { // no corresponding test in Altissia DB
			if ($license['date_first_acces']!='0000-00-00 00:00:00') {
				$update="UPDATE ".$licenseTable." SET date_first_acces='0000-00-00 00:00:00' WHERE id=".$license['id'].";";
				echo '"'.$license['id'].'";"'.$license['testNum'].'";"'.$license['date_first_acces'].'";"-";"No corresponding test in Altissia DB";"'.$v1UserId.'";"'.$v2UserId.'";"'.$update.'"'."\r\n";
			}
		}

		usleep(150);
		$cpt++;
		/*if ($cpt>100) {
			break;
		}*/
	}
	mysql_close($lot1Con);
	mysql_close($lot2Con);
} catch (Exception $e) {
	try {
		if ($lot1Con!=null) {
			mysql_close($lot1Con);
		}
	} catch (Exception $e2) {
		// ignoring
	}
	if ($lot2Con!=null) {
		mysql_close($lot2Con);
	}
}
?>