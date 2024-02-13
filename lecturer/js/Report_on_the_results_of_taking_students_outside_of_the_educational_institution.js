$(document).ready(function () {
  //กดเพิ่มเจ้าภาพ
  $(".add_fields1").click(function (e) {
    e.preventDefault();
    addfields1();
  });
  //
  //กดลบเจ้าภาพ
  $(".host1").on("click", ".remove_field", function (e) {
    e.preventDefault();
    $(this).parent("div").remove();
    p--;
    x--;
  });
  //
  $("#server_report").click(function () {
    // รับข้อมูลจากฟอร์ม Modal
    var name_from = $("#name_from_2").val();
    var petition_name = $("#petition_name_2").val();
    var school_name = $("#school_name").val();
    var student_total = $("#student_total").val();
    var teacher_total = $("#teacher_total").val();
    var reason_controlling = $("#reason_controlling").val();
    var date_travel = $("#date_travel").val();
    var travel_route = $("#travel_route").val();
    var trave_vehicle = $("#trave_vehicle").val();
    var travel_back = $("#travel_back").val();
    var time = $("#time").val();
    var details_of_this_trip = $("#details_of_this_trip").val();
    console.log(
      name_from +
        " " +
        petition_name +
        " " +
        school_name +
        " " +
        student_total +
        " " +
        teacher_total +
        " " +
        reason_controlling +
        " " +
        date_travel +
        "" +
        travel_route +
        "" +
        trave_vehicle +
        "" +
        travel_back +
        "" +
        time +
        "" +
        details_of_this_trip+
        ""+
        localStorage.getItem("id_user")
    );
    $.ajax({
      url: "insterReport_on_the_results_of_taking_students_outside_of_the_educational_institution", // เปลี่ยนเป็น URL ที่ถูกต้องสำหรับไฟล์ PHP ที่จะใช้ในการเพิ่มข้อมูลสินค้า
      method: "POST",
      data: {
        id_user: localStorage.getItem("id_user"),
 
        name_from: name_from,
        petition_name: petition_name,
        school_name: school_name,
        student_total: student_total,
        teacher_total: teacher_total,
        reason_controlling: reason_controlling,
        date_travel: date_travel,
        travel_route: travel_route,
        trave_vehicle: trave_vehicle,
        travel_back: travel_back,
        time: time,
        details_of_this_trip: details_of_this_trip,
      },
      success: function (response) {
        console.log(response);
        var data = JSON.parse(response);
        if (data.status === 200) {
          alert("บันทึกข้อมูลสำเร็จ");
          window.location.href = "follow_up_on_requests";
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

function addfields1() {
  x++;
  $(".host1").append(` 
    <div class=" mt-2">
   
    <input type="hidden" name="nub_id[]" value = "0" />
<label >ชื่อครูผู้ควบคุมคนที่ ${p++} :</label>
<input type="text" name="input_host_name[]" id="" class="form-control" >
<div class ="mt-2"></div>
<a href="javascript:void(0);" class="btn btn-primary remove_field ">ลบ</a>

</div>`);
}
