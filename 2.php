<?php 
error_reporting(0);
date_default_timezone_set('Asia/Jakarta');

include_once "class.test.php";

$log = new Test();

function GetData($ApiURL, $param)
{
	$ParamsFullURL = $ApiURL ."?". $param;
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $ParamsFullURL);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_GET, true);	
	$result = curl_exec($ch);
	curl_close($ch);
	return $result;
} 

function AddLog($type, $search, $imdbID)
{	
	$log = new Test();
	$result = $log->SaveLog($type, $search, $imdbID);	
	return $result;	
}

function getMovieAll($ApiURL, $param)
{
	$param_data = implode("&", $param);
	$json = GetData($ApiURL, $param_data);
	$result = json_decode($json);

	return $result;
}

function getMovieByID($ApiURL, $param)
{
	$param_data = implode("&", $param);
	$json = GetData($ApiURL, $param_data);
	$result = json_decode($json);

	return $result;
}


$ApiURL = "http://www.omdbapi.com";

// GET MOVIE ALL
$param = array(
	"apikey=faf7e5bb",
	"s=Batman",
	"page=2"
);
$MovieAll = getMovieAll($ApiURL, $param);
if ($MovieAll)
{
	AddLog($Type='movie', $Search='Batman', $imdbID=null);
	$result = array ('result'=>true,'resultCode' => 'S000', 'resultDesc'=> 'OK');
	echo json_encode($result);
	exit();	
	
}else{

	$result = array ('result'=>false,'resultCode' => 'E999', 'resultDesc'=> 'Error Return API All');
	echo json_encode($result);
	exit();	
	
}
		
// GET MOVIE DETAIL
$param = array(
	"apikey=faf7e5bb",
	"type=movie",
	"i=tt1285016"
);
$MovieDetail = getMovieByID($ApiURL, $param);

if ($MovieDetail)
{
	AddLog($Type='movie', $Search='', $imdbID='tt1285016');
	$result = array ('result'=>true,'resultCode' => 'S000', 'resultDesc'=> 'OK');
	echo json_encode($result);
	exit();	
	
}else{

	$result = array ('result'=>false,'resultCode' => 'E999', 'resultDesc'=> 'Error Return API Detail');
	echo json_encode($result);
	exit();	
	
}
?>