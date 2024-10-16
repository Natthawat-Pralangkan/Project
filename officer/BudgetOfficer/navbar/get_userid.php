<?php include(".../../servers/connect.php"); ?>
<?php

$user_id = $_POST["user_id"];

$sql = "SELECT * FROM `teacher_personnel_information` WHERE user_id = ?";
$result = $db->prepare($sql);
$result->bindParam(1, $user_id);
$result->execute();
$row = $result->fetch(PDO::FETCH_ASSOC);

$keeall = array(); // Create an array to store the data

// Ensure data is fetched successfully
if ($row) {
    $keeall[] = array(
        "id" => $row['id'],
        "user_name" => $row['user_name'],
        "last_name" => $row['last_name'],
        "picture" => "http://localhost/Project/images/" . $row['picture'] // Concatenating with the proper separator
    );
}

echo json_encode($keeall); // Return the JSON response

?>
