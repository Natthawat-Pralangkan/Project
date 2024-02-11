<?php include(".././servers/connect.php");


$id = $_POST['id'];

$sql = "SELECT * FROM `user` WHERE id = :id" ;
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $id); 
$stmt->execute();
$getid = $stmt->fetch(PDO::FETCH_ASSOC);
$data = array(
    "use_name"=>$getid["user_name"],
    "password"=>$getid["password"],
    "type"=>$getid["type"],
    "status"=>200,
);
echo json_encode($data);