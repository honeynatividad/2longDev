<?php

$app->get('/api/users', function(){
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


//display single data

$app->get('/api/users/{id}', function($request){

	require_once('dbconnect.php');

	$id = $request->getAttribute('id');

	$query = "SELECT * FROM users WHERE user_id=$id";
	$result = $mysqli->query($query);
	$data = $result->fetch_assoc();
	header('Content-Type: application/json');
	echo json_encode($data);

});

//POST METHOD

$app->post('/api/users/', function($request){

	require_once('dbconnect.php');
	$query = "INSERT INTO `users` (`username`, `password`, `mobile_number`, `email_address`, `is_verified`) VALUES(?,?,?,?,?)";
	$stmt = $mysqli->prepare($query);
	//i,d,s,b
	$stmt->bind_param("ssssi", $username,$password,$mobile_number,$email_address,$is_verified);
	$username = $request->getParsedBody()['username'];
	$password = $request->getParsedBody()['password'];
	$email_address = $request->getParsedBody()['email_address'];
	$mobile_number = $request->getParsedBody()['mobile_number'];
	$is_verified = 0;
	var_dump($stmt);
	$stmt->execute();
	echo 'done';

});

//UPDATE DATA

$app->put('/api/users/{id}', function($request){

	require_once('dbconnect.php');
	$id = $request->getAttribute('id');
	
	$query = "UPDATE `users` SET `username` = ?, `password` = ?, `email_address` = ?, `mobile_number` = ? WHERE `user_id` = $id";

	$stmt = $mysqli->prepare($query);
	
	//i,d,s,b
	$stmt->bind_param("ssss", $username,$password,$email_address,$mobile_number);
	$username = $request->getParsedBody()['username'];
	$password = $request->getParsedBody()['password'];
	$email_address = $request->getParsedBody()['email_address'];
	$mobile_number = $request->getParsedBody()['mobile_number'];	
	
	$stmt->execute();
	echo 'done';
	

});

//DELETE DATA
$app->delete('/api/users/{id}', function($request){

	require_once('dbconnect.php');
	$id = $request->getAttribute('id');
	
	$query = "DELETE FROM users WHERE `user_id` = $id";

	$stmt = $mysqli->query($query);
	//i,d,s,b
	
	echo 'done';
	

});