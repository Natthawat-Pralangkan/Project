
$(document).ready(function() {
    //กดเพิ่มเจ้าภาพ
    $(".add_fields9").click(function(e) {
        e.preventDefault();
        addfields9()
    });
    //
    //กดลบเจ้าภาพ
    $(".host9").on("click", ".remove_field", function(e) {
        e.preventDefault();
        $(this).parent('div').remove();
        p--;
        x--;
    })


    $("#server_from_11").click(function () {

        var school_wishes = $("#school_wishes_10").val();
        var class_student = $("#class_student_10").val();
        var room = $("#room_10").val();
        var reason_project = $("#reason_project_10").val();
        var date_activity = $("#date_activity_10").val();
        var Time_to_go = $("#Time_to_go_10").val();
        var Return_time = $("#Return_time_10").val();
        var Number_of_supervising_teachers = $("#Number_of_supervising_teachers").val();
        var Place_of_sending_documents = $("#Place_of_sending_documents").val();
        console.log(
            school_wishes +
            " " +
            class_student +
            " " +
            room +
            " " +
            reason_project +
            " " +
            date_activity +
            "" +
            Time_to_go +
            "" +
            Return_time +
            "" +
            Number_of_supervising_teachers +
            "" +
            Place_of_sending_documents 
        );
        $.ajax({
          url: "inster_Requesting_permission_for_students_to_go_to_school_in_special_cases", // เปลี่ยนเป็น URL ที่ถูกต้องสำหรับไฟล์ PHP ที่จะใช้ในการเพิ่มข้อมูลสินค้า
          method: "POST",
          data: {
            user_id:localStorage.getItem("user_id"),
            school_wishes: school_wishes,
            class_student: class_student,
            room: room,
            reason_project: reason_project,
            date_activity: date_activity,
            Time_to_go: Time_to_go,
            Return_time: Return_time,
            Number_of_supervising_teachers: Number_of_supervising_teachers,
            Place_of_sending_documents: Place_of_sending_documents,
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

      var x = 1;
var p = 1;

function addfields9() {
    // x++;
    $(".host9").append(` 

    <div class="mt-2">
    <div class="row">
        <div class="col-2 mt-2">
            <div class="form-group">
                <label for="" style="font-size: 18px;">ลำดับที่</label>
                <input type="text" class="form-control mt-2" placeholder="${p++}" disabled>
            </div>
        </div>
        <div class="col-4 mt-2">
            <div class="form-group">
                <label for="" style="font-size: 18px;">ชื่อ-สกุล</label>
                <input type="text" class="form-control mt-2" placeholder="ชื่อ-สกุล">
            </div>
        </div>
        <div class="col-4 mt-2">
            <div class="form-group">
                <label for="" style="font-size: 18px;">เบอร์โทรศัพท์มือถือ</label>
                <input type="text" class="form-control mt-2" placeholder="เบอร์โทรศัพท์มือถือ">
            </div>
        </div>
    </div>
    <div class ="mt-2 text-center">
        <a href="javascript:void(0);" class="btn btn-danger remove_field ">ลบ</a>
    </div>
</div>`);
}
})





