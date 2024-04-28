$(document).ready(function () {
  $("#addpersonnelinformation").DataTable({
    columns: [
      {
        data: "ลำดับ",
      },
      {
        data: "ชื่อ-นามสกุล",
      },
      {
        data: "ตำแหนง",
      },
      {
        data: "แก้ไข",
      },
      {
        data: "ลบ",
      },
    ],
  });
 
  // $("#position").change(function(){
  //   if( $("#position").val()== 7){
  //     $("#id_subject").show()
  //   }else{
  //     $("#id_subject").hide()
  //   }
  // })

  $("#server_user").click(function () {
    
    // รับข้อมูลจากฟอร์ม Modal
    
    var user_name = $("#user_name").val();
    var last_name = $("#last_name").val();
    var id_card_number = $("#id_card_number").val();
    var date_month_yearofbirth = $("#date_month_yearofbirth").val();
    var age = $("#age").val();
    var nationality = $("#nationality").val();
    var house_code = $("#house_code").val();
    var number_house = $("#number_house").val();
    var village = $("#village").val();
    var district = $("#district").val();
    var prefecture = $("#prefecture").val();
    var province = $("#province").val();
    var road = $("#road").val();
    var zip_code = $("#zip_code").val();
    var email = $("#email").val();
    var telephone_number = $("#telephone_number").val();
    var start_date = $("#start_date").val();
    var faculty_bachelor_s_degree = $("#faculty_bachelor_s_degree").val();
    var field_of_study_bachelor_s_degree = $(
      "#field_of_study_bachelor_s_degree"
    ).val();
    var faculty_master_s_degree = $("#faculty_master_s_degree").val();
    var field_of_study_master_s_degree = $(
      "#field_of_study_master_s_degree"
    ).val();
    var executive_professional_certificate = $(
      "#executive_professional_certificate"
    ).val();
    var faculty_less_than_bachelor_s_degree = $(
      "#faculty_less_than_bachelor_s_degree"
    ).val();
    var field_of_study_less_than_bachelor_s_degree = $(
      "#field_of_study_less_than_bachelor_s_degree"
    ).val();
    var executive_professional_certificate_less_than_bachelor_s_degree = $(
      "#executive_professional_certificate_less_than_bachelor_s_degree"
    ).val();
    var dhamma_expert_dhamma_studies = $("#dhamma_expert_dhamma_studies").val();
    var precepts_pali_studies = $("#precepts_pali_studies").val();
    var educational_qualification = $("#educational_qualification").val();
    var id_subject_group = $("#id_subject_group").val();
    var picture = $("#picture")[0].files[0];
    var position = $("#position").val();

    var formData = new FormData();
    formData.append('id_user',localStorage.getItem("id_user"),);
    formData.append('user_name',user_name);
    formData.append('last_name',last_name);
    formData.append('id_card_number',id_card_number);
    formData.append('date_month_yearofbirth',date_month_yearofbirth);
    formData.append('age',age);
    formData.append('nationality',nationality);
    formData.append('house_code',house_code);
    formData.append('number_house',number_house);
    formData.append('village',village);
    formData.append('district',district);
    formData.append('prefecture',prefecture);
    formData.append('province',province);
    formData.append('road',road);
    formData.append('zip_code',zip_code);
    formData.append('email',email);
    formData.append('telephone_number',telephone_number);
    formData.append('start_date',start_date);
    formData.append('faculty_bachelor_s_degree',faculty_bachelor_s_degree);
    formData.append('field_of_study_bachelor_s_degree',field_of_study_bachelor_s_degree);
    formData.append('faculty_master_s_degree',faculty_master_s_degree);
    formData.append('field_of_study_master_s_degree',field_of_study_master_s_degree);
    formData.append('executive_professional_certificate',executive_professional_certificate);
    formData.append('faculty_less_than_bachelor_s_degree',faculty_less_than_bachelor_s_degree);
    formData.append('field_of_study_less_than_bachelor_s_degree',field_of_study_less_than_bachelor_s_degree);
    formData.append('executive_professional_certificate_less_than_bachelor_s_degree',executive_professional_certificate_less_than_bachelor_s_degree);
    formData.append('dhamma_expert_dhamma_studies',dhamma_expert_dhamma_studies);
    formData.append('precepts_pali_studies',precepts_pali_studies);
    formData.append('educational_qualification',educational_qualification);
    formData.append('picture',picture);
    // formData.append('id_subject_group',id_subject_group);
    formData.append('position',position);
    // var id_user = $("#id_user").val();
    $.ajax({
      url: "./api/inster_Add_information", // เปลี่ยนเป็น URL ที่ถูกต้องสำหรับไฟล์ PHP ที่จะใช้ในการเพิ่มข้อมูลสินค้า
      method: "POST",
      processData:false,
      contentType:false,
      data: formData,

      success: function (response) {
        console.log(response);
        var data = JSON.parse(response);
        if (data.status === 200) {
          alert("บันทึกข้อมูลสำเร็จ");
          window.location.href = "addpersonnelinformation";
        } else {
          alert("เกิดข้อผิดพลาดในการบันทึกข้อมูล");
          window.location.href = "Add_information";
        }
      },
      error: function () {
        alert("เกิดข้อผิดพลาดในการส่งข้อมูล");
      },
    });
  });
});
