$(document).ready(function () {
  //กดเพิ่มเจ้าภาพ
  $(".add_fields5").click(function (e) {
    e.preventDefault();
    add_fields5();
  });
  //
  //กดลบเจ้าภาพ
  $(".host5").on("click", ".remove_field", function (e) {
    e.preventDefault();
    $(this).parent("div").remove();
    p--;
    x--;
  });
  //

  $("#server_meeting").click(function () {
    // รายงานการประชุม/อบรม/สัมมนา/กิจกรรม/โครงการ/งาน
    let addIdValues = [];
    $('input[name="input_host_name[]"]').each(function () {
      addIdValues.push($(this).val());
    });
    var location = $("#location_5").val();
    var subject = $("#subject_5").val();
    var joining_date = $("#joining_date_5").val();
    var organizer = $("#organizer_5").val();
    var time_1 = $("#time_1").val();
    var time_2 = $("#time_2").val();
    var summary_of_results_of_participation_in_the_event = $(
      "#summary_of_results_of_participation_in_the_event"
    ).val();
    var details_of_this_trip = $("#details_of_this_trip").val();
    $.ajax({
      url: "instermeeting_minutes", // เปลี่ยนเป็น URL ที่ถูกต้องสำหรับไฟล์ PHP ที่จะใช้ในการเพิ่มข้อมูลสินค้า
      method: "POST",
      data: {
        user_id: localStorage.getItem("user_id"),
        location: location,
        subject: subject,
        joining_date: joining_date,
        organizer: organizer,
        summary_of_results_of_participation_in_the_event:
          summary_of_results_of_participation_in_the_event,
        time_1: time_1,
        time_2: time_2,
        addIdValues: addIdValues,
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

function add_fields5() {
  x++;
  $(".host5").append(` 
    <div class=" mt-2">
   
    <input type="hidden" name="nub_id[]" value = "0" />
<label >ชื่อผู้เข้าร่วมงาน ${p++} :</label>
<input type="text" name="input_host_name[]" id="" class="form-control" >
<div class ="mt-2"></div>
<a href="javascript:void(0);" class="btn btn-primary remove_field ">ลบ</a>

</div>`);
}
