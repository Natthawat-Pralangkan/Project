$(document).ready(function () {
  //กดเพิ่มเจ้าภาพ
  $(".add_fields6").click(function (e) {
    e.preventDefault();
    addfields6();
  });
  //
  //กดลบเจ้าภาพ
  $(".host6").on("click", ".remove_field", function (e) {
    e.preventDefault();
    $(this).parent("div").remove();
    p--;
    x--;
  });

  $("#server_from_7").click(function () {
    // การยื่นแบบสำรวจคาบสอนของครูผู้สอน
   
    var subject_group = $("#subject_group_7").val();
    var semester = $("#semester_7").val();
    var school_year = $("#school_year_7").val();
    console.log(
        subject_group +
        " " +
        semester +
        " " +
        school_year+
        ""+
        localStorage.getItem("user_id")
    );
    $.ajax({
      url: "inster_survey_of_teachers_teaching_sessions", // เปลี่ยนเป็น URL ที่ถูกต้องสำหรับไฟล์ PHP ที่จะใช้ในการเพิ่มข้อมูลสินค้า
      method: "POST",
      data: {
        user_id:localStorage.getItem("user_id"),
      
        // name_from: name_from,
        // petition_name: petition_name,
        subject_group: subject_group,
        semester: semester,
        school_year: school_year,
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

function addfields6() {
  // x++;
  $(".host6").append(` 
    
<div class="mt-2">
    <div class="row">
        <div class="col-4 mt-2">
            <div class="form-group">
                <label for="" style="font-size: 18px;">รายชื่อครูผู้สอน</label>
                <input type="text" class="form-control mt-2" placeholder="รายชื่อครูผู้สอน">
            </div>
        </div>
        <div class="col-4 mt-2">
            <div class="form-group">
                <label for="" style="font-size: 18px;">รายวิชา</label>
                <input type="text" name="input_host_name[]" class="form-control mt-2" placeholder="รายวิชา">
            </div>
        </div>
        <div class="col-4 mt-2">
            <div class="form-group">
                <label for="" style="font-size: 18px;">รหัส</label>
                <input type="text" name="input_host_name[]"  class="form-control mt-2" placeholder="รหัส">
            </div>
        </div>
        <div class="col-4 mt-2">
            <div class="form-group">
                <label for="" style="font-size: 18px;">ชั้น/ห้อง</label>
                <input type="text" name="input_host_name[]"  class="form-control mt-2" placeholder="ชั้น/ห้อง">
            </div>
        </div>
        <div class="col-4 mt-2">
            <div class="form-group">
                <label for="" style="font-size: 18px;">คาบสอน/ห้อง</label>
                <input type="text" name="input_host_name[]"  class="form-control mt-2" placeholder="คาบสอน/ห้อง">
            </div>
        </div>
        <div class="col-4 mt-2">
            <div class="form-group">
                <label for="" style="font-size: 18px;">รวมคาบสอน</label>
                <input type="text" name="input_host_name[]"  class="form-control mt-2" placeholder="รวมคาบสอน">
            </div>
        </div>
        <div class="col-4 mt-2">
            <div class="form-group">
                <label for="" style="font-size: 18px;">สอนวิชาคู่กับครู</label>
                <input type="text" name="input_host_name[]"  class="form-control mt-2" placeholder="สอนวิชาคู่กับครู">
            </div>
        </div>
        <div class="col-4 mt-2">
            <div class="form-group">
                <label for="" style="font-size: 18px;">ชื่อกิจกรรม/ม.ต้น/ม.ปลาย</label>
                <input type="text" name="input_host_name[]"  class="form-control mt-2" placeholder="ชื่อกิจกรรม/ม.ต้น/ม.ปลาย">
            </div>
        </div>
    </div>
    <div class ="mt-2">
        <a href="javascript:void(0);" class="btn btn-danger remove_field ">ลบ</a>
    </div>
</div>`);
}
