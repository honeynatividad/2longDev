<?php

$app->get('/api/books', function(){
	require_once('dbconnect.php');
	$query = "SELECT * FROM users ORDER by user_id ";
	$result = $mysqli->query($query);
	while($row = $result->fetch_assoc()){
		$data[]	=	$row;
	}
	if(isset($data)){
		header('Content-Type: application/json');
		echo json_encode($data);
	}else{
		$data = array(
			"MessageReturn" => "Error" 
		);
		echo json_encode($data);
	}
	
	
});