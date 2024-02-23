$(document).ready(function () {
  //กดเพิ่มเจ้าภาพ
  $(".add_fields4").click(function (e) {
    e.preventDefault();
    addfields4();
  });
  //
  //กดลบเจ้าภาพ
  $(".host4").on("click", ".remove_field", function (e) {
    e.preventDefault();
    $(this).parent("div").remove();
    p--;
    x--;
  });
  
  $("#server_non").click(function () {
    // รับข้อมูลจากฟอร์ม Modal
    var level = $("#level").val();
    var teach_week = $("#teach_week").val();
    var date_teach_start = $("#date_teach_start").val();
    var date_teach_end = $("#date_teach_end").val();
    var details_of_this_trip = $("#details_of_this_trip").val();
    console.log(level+' '+teach_week+' '+date_teach_start+' '+date_teach_end);
    $.ajax({
      url: "insterNon-signing_report_form_on_teaching_and_learning_survey", // เปลี่ยนเป็น URL ที่ถูกต้องสำหรับไฟล์ PHP ที่จะใช้ในการเพิ่มข้อมูลสินค้า
      method: "POST",
      data: {
        id_user:localStorage.getItem("user_id"),
        level: level,
        teach_week: teach_week,
        date_teach_start: date_teach_start,
        date_teach_end: date_teach_end,
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

function addfields4() {
  // x++;
  $(".host4").append(` 
<div class="  mt-2">
<div class="text-center">
<table class="table">
<thead>
<tr>
  <th scope="col">ลำดับ</th>
  <th scope="col">ชื่อ - สกุล</th>
  <th scope="col">รหัสวิชา</th>
  <th scope="col">กลุ่มสาระฯ/งาน</th>
  <th scope="col">วันที่</th>
  <th scope="col">คาบที่</th>
  <th scope="col">เหตุผล</th>
</tr>
</thead>
<tbody>
<tr>
  <th scope="row">${p++}</th>
  <td><input type="text" class="form-control mt-2" placeholder=""></td>
  <td><input type="text" class="form-control mt-2" placeholder=""></td>
  <td><input type="text" class="form-control mt-2" placeholder=""></td>
  <td><input type="text" class="form-control mt-2" placeholder=""></td>
  <td><input type="text" class="form-control mt-2" placeholder=""></td>
  <td><textarea class="form-control" placeholder="หมายเหตุ" id="floatingTextarea"></textarea>
  
</tr>
</table>
<div class ="mt-2"></div>
    <a href="javascript:void(0);" class="btn btn-danger remove_field ">ลบ</a>
</div> 
</div>`);
}
