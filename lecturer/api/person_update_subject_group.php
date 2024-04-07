<?php
include("../../servers/connect.php");


if (isset($_POST['id'], $_POST['subject_group_name'], $_POST['group_leader_name'])) {
    $id = $_POST['id'];
    $subjectGroupName = $_POST['subject_group_name'];
    $groupLeaderName = $_POST['group_leader_name'];

    try {
        $sql = "UPDATE `subject_group` SET subject_group_name = :subject_group_name, group_leader_name = :group_leader_name WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':subject_group_name' => $subjectGroupName,
            ':group_leader_name' => $groupLeaderName,
            ':id' => $id
        ]);

        if ($stmt->execute()) {
            echo json_encode(['status' => 200]);
        }
    } catch (Exception $e) {
        echo json_encode(['status' => 400, "mgs" => $e->getMessage()]);
    }
}
