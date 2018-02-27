<?php
session_start();
define('DSN', 'mysql:host=localhost;dbname=login');
define('DB_USERNAME','natsuo');
define('DB_PASSWORD', 'd8skcadfw9');

header("Content-type: application/json; charset=UTF-8");

$db=new PDO(DSN, DB_USERNAME, DB_PASSWORD);

$stmt=$db->prepare("insert into comments(postId, name, comment, created) values (:postId, :name, :comment, now())");
$stmt->execute([
	':postId'=>$_SESSION['post'],
	':name'=>$_POST['name'],
	':comment'=>$_POST['comment']
]);


$response=[
	"name"=>$_POST['name'],
	"comment"=>$_POST['comment']
];
echo json_encode($response);