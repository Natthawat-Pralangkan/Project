$(document).ready(function () {
  //กดเพิ่มเจ้าภาพ
  $(".add_fields7").click(function (e) {
    e.preventDefault();
    addfields7();
  });
  //
  //กดลบเจ้าภาพ
  $(".host7").on("click", ".remove_field", function (e) {
    e.preventDefault();
    $(this).parent("div").remove();
    p--;
    x--;
  });

  $("#server_from_8").click(function () {
    let addIdValues = [];
    $('input[name="input_host_name[]"]').each(function () {
      addIdValues.push($(this).val());
    });

    var allow_student = $("#allow_student_8").val();
    var student_total = $("#student_total_8").val();
    var teacher_total = $("#teacher_total_8").val();
    var reason_controll = $("#reason_controll_8").val();
    var school_name = $("#school_name_8").val();
    var date_travel = $("#date_travel_8").val();
    var travel_time = $("#travel_time_8").val();
    var travel_route = $("#travel_route_8").val();
    var travel_back = $("#travel_back_8").val();
    var Time_to_arrive = $("#Time_to_arrive_8").val();
    var amount_person = $("#amount_person_8").val();
    var Vehicle_for_traveling = $("#Vehicle_for_traveling_8").val();
    var id_subject_group = $("#id_subject_group_5").val();
    // var Vehicle_for_traveling = $("#Vehicle_for_traveling_8").val();
    console.log(
      allow_student +
        " " +
        student_total +
        " " +
        teacher_total +
        " " +
        reason_controll +
        " " +
        school_name +
        "" +
        date_travel +
        "" +
        travel_time +
        "" +
        travel_route +
        "" +
        travel_back +
        "" +
        Time_to_arrive +
        "" +
        amount_person +
        "" +
        Vehicle_for_traveling +
        "" +
        addIdValues +
        "" +
        id_subject_group
    );
    $.ajax({
      url: "inster_Requesting_permission_from_supervisors_to take_students_outside_of_the_educational_institution", // เปลี่ยนเป็น URL ที่ถูกต้องสำหรับไฟล์ PHP ที่จะใช้ในการเพิ่มข้อมูลสินค้า
      method: "POST",
      data: {
        user_id: localStorage.getItem("user_id"),
        // id_from: $("#id_from").val(),
        allow_student: allow_student,
        student_total: student_total,
        teacher_total: teacher_total,
        reason_controll: reason_controll,
        school_name: school_name,
        date_travel: date_travel,
        travel_time: travel_time,
        travel_route: travel_route,
        travel_back: travel_back,
        Time_to_arrive: Time_to_arrive,
        amount_person: amount_person,
        Vehicle_for_traveling: Vehicle_for_traveling,
        addIdValues: addIdValues,
        id_subject_group_5: id_subject_group,
      },
      success: function (response) {
        console.log(response);
        var data = JSON.parse(response);
        if (data.status === 200) {
          Swal.fire({
            title: "ยื่นคำร้องสำเร็จ!",
            text: response.message,
            icon: "success",
            confirmButtonText: "ยืนยัน", // Change the text of the confirmation button
          }).then((result) => {
            if (result.isConfirmed) {
              location.reload(); // Reload the page after confirmation
            }
          });
        } else {
          alert("เกิดข้อผิดพลาดในการบันทึกข้อมูล");
          window.location.href = "submit_a_complaint";
        }
      },
      error: function () {
        alert("เกิดข้อผิดพลาดในการส่งข้อมูล");
      },
    });
  });
});
var x = 1;
var p = 1;

function addfields7() {
  x++;
  $(".host7").append(` 
      <div class=" mt-2">
     
  <input type="hidden" name="nub_id[]" value = "0" />
  <label >ชื่อครูผู้ควบคุมคนที่ ${p++} :</label>
  <input type="text" name="input_host_name[]" id="" class="form-control" >
  <div class ="mt-2"></div>
  <a href="javascript:void(0);" class="btn btn-primary remove_field ">ลบ</a>
  
  </div>`);
}
