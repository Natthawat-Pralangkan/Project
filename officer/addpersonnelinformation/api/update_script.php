<?php
include("../../../servers/connect.php");



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // print_r($_POST);
    // print_r($_FILES);

    // exit;
    try {
        $id = $_POST["id"];
        $sql = "SELECT * FROM `teacher_personnel_information`WHERE id = :id";
        $stmt_picture = $db->prepare($sql);
        $stmt_picture->bindParam(':id', $id);
        $stmt_picture->execute();
        $row = $stmt_picture->fetch(PDO::FETCH_ASSOC);
        if (isset($_FILES['picture']) && $_FILES['picture']['error'] === UPLOAD_ERR_OK) {
            $tmp = $_FILES['picture']['tmp_name'];
            $imgname = $_FILES['picture']['name'];
            $path = "./images/" . $imgname;
            move_uploaded_file($tmp, $path);
        } else {
            $imgname = $row['picture'];
        }
        $user_name = $_POST["user_name"];
        $last_name = $_POST["last_name"];
        $id_card_number = $_POST["id_card_number"];
        $date_month_yearofbirth = $_POST["date_month_yearofbirth"];
        $age = $_POST["age"];
        $nationality = $_POST["nationality"];
        $house_code = $_POST["house_code"];
        $number_house = $_POST["number_house"];
        $village = $_POST["village"];
        $district = $_POST["district"];
        $prefecture = $_POST["prefecture"];
        $province = $_POST["province"];
        $road = $_POST["road"];
        $zip_code = $_POST["zip_code"];
        $email = $_POST["email"];
        $telephone_number = $_POST["telephone_number"];
        $start_date = $_POST["start_date"];
        $faculty_bachelor_s_degree = $_POST["faculty_bachelor_s_degree"];
        $field_of_study_bachelor_s_degree = $_POST["field_of_study_bachelor_s_degree"];
        $faculty_master_s_degree = $_POST["faculty_master_s_degree"];
        $field_of_study_master_s_degree = $_POST["field_of_study_master_s_degree"];
        $executive_professional_certificate = $_POST["executive_professional_certificate"];
        $faculty_less_than_bachelor_s_degree = $_POST["faculty_less_than_bachelor_s_degree"];
        $field_of_study_less_than_bachelor_s_degree = $_POST["field_of_study_less_than_bachelor_s_degree"];
        $executive_professional_certificate_less_than_bachelor_s_degree = $_POST["executive_professional_certificate_less_than_bachelor_s_degree"];
        $dhamma_expert_dhamma_studies = $_POST["dhamma_expert_dhamma_studies"];
        $precepts_pali_studies = $_POST["precepts_pali_studies"];
        $educational_qualification = $_POST["educational_qualification"];
        $position = $_POST["position"];

        $query = "UPDATE teacher_personnel_information SET user_name = :user_name, last_name = :last_name, 
        id_card_number = :id_card_number, date_month_yearofbirth = :date_month_yearofbirth, 
        age = :age, nationality = :nationality, house_code = :house_code, 
        number_house = :number_house, village = :village, district = :district, 
        prefecture = :prefecture, province = :province, road = :road, 
        zip_code = :zip_code, email = :email, telephone_number = :telephone_number, 
        start_date = :start_date, faculty_bachelor_s_degree = :faculty_bachelor_s_degree, 
        field_of_study_bachelor_s_degree = :field_of_study_bachelor_s_degree, 
        faculty_master_s_degree = :faculty_master_s_degree, 
        field_of_study_master_s_degree = :field_of_study_master_s_degree, 
        executive_professional_certificate = :executive_professional_certificate, 
        faculty_less_than_bachelor_s_degree = :faculty_less_than_bachelor_s_degree, 
        field_of_study_less_than_bachelor_s_degree = :field_of_study_less_than_bachelor_s_degree, 
        executive_professional_certificate_less_than_bachelor_s_degree = :executive_professional_certificate_less_than_bachelor_s_degree, 
        dhamma_expert_dhamma_studies = :dhamma_expert_dhamma_studies, precepts_pali_studies = :precepts_pali_studies, 
        educational_qualification = :educational_qualification, position=:position,picture=:picture WHERE id = :id";
        $stmt = $db->prepare($query);

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':user_name', $user_name);
        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(':id_card_number', $id_card_number);
        $stmt->bindParam(':date_month_yearofbirth', $date_month_yearofbirth);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':nationality', $nationality);
        $stmt->bindParam(':house_code', $house_code);
        $stmt->bindParam(':number_house', $number_house);
        $stmt->bindParam(':village', $village);
        $stmt->bindParam(':district', $district);
        $stmt->bindParam(':prefecture', $prefecture);
        $stmt->bindParam(':province', $province);
        $stmt->bindParam(':road', $road);
        $stmt->bindParam(':zip_code', $zip_code);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telephone_number', $telephone_number);
        $stmt->bindParam(':start_date', $start_date);
        $stmt->bindParam(':faculty_bachelor_s_degree', $faculty_bachelor_s_degree);
        $stmt->bindParam(':field_of_study_bachelor_s_degree', $field_of_study_bachelor_s_degree);
        $stmt->bindParam(':faculty_master_s_degree', $faculty_master_s_degree);
        $stmt->bindParam(':field_of_study_master_s_degree', $field_of_study_master_s_degree);
        $stmt->bindParam(':executive_professional_certificate', $executive_professional_certificate);
        $stmt->bindParam(':faculty_less_than_bachelor_s_degree', $faculty_less_than_bachelor_s_degree);
        $stmt->bindParam(':field_of_study_less_than_bachelor_s_degree', $field_of_study_less_than_bachelor_s_degree);
        $stmt->bindParam(':executive_professional_certificate_less_than_bachelor_s_degree', $executive_professional_certificate_less_than_bachelor_s_degree);
        $stmt->bindParam(':dhamma_expert_dhamma_studies', $dhamma_expert_dhamma_studies);
        $stmt->bindParam(':precepts_pali_studies', $precepts_pali_studies);
        $stmt->bindParam(':educational_qualification', $educational_qualification);
        $stmt->bindParam(':position', $position);
        $stmt->bindParam(':picture', $imgname);

        $stmt->execute();
        if ($stmt->execute()) {
            echo json_encode(['status' => 200]);
        }
    } catch (Exception $e) {
        echo json_encode(['status' => 400, "mgs" => $e->getMessage()]);
    }
    // $pdo = null;
}
