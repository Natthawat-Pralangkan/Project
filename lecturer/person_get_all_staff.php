<?php
include("../servers/connect.php");



try {
    // Corrected JOIN syntax and fixed the condition to match tables correctly
    $sql = "SELECT * FROM `teacher_personnel_information` 
        JOIN type on teacher_personnel_information.position = type.id_type
        WHERE teacher_personnel_information.status = 0";

    $stmt = $db->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $number = 1;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            echo "<tr>";
            // Ensure these column names exist in your query's result set
            echo "<td>"  . $number++ . "</td>"; // Assuming 'date' is a correct column name
            echo "<td>" . $row['user_name'] . ' ' . $row['last_name'] . "</td>"; // Assuming 'user_name' is provided by teacher_personnel_information
            echo "<td>" . $row['name_type'] . "</td>"; // Assuming 'name' is the correct column from petition_name
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='3'>ไม่พบข้อมูล</td></tr>";
    }
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
