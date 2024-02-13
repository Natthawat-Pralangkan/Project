
$(document).ready(function() {
    //กดเพิ่มเจ้าภาพ
    $(".add_fields8").click(function(e) {
        e.preventDefault();
        addfields8()
    });
    //
    //กดลบเจ้าภาพ
    $(".host8").on("click", ".remove_field", function(e) {
        e.preventDefault();
        $(this).parent('div').remove();
        p--;
        x--;
    })
    
    $("#server_from_10").click(function () {
        // รับข้อมูลจากฟอร์ม Modal
        var name_from = $("#name_from_9").val();
        // var petition_name = $("#petition_name_9").val();
        var activity_name = $("#activity_name_9").val();
        var reason_project = $("#reason_project_9").val();
        var date_activity = $("#date_activity_9").val();
        console.log(
          name_from +
            " " +
            petition_name +
            " " +
            activity_name +
            " " +
            reason_project +
            " " +
            date_activity
        );
        $.ajax({
          url: "inster_Request_permission_to_bring_students_to_participate_in_activities_during_class_time", // เปลี่ยนเป็น URL ที่ถูกต้องสำหรับไฟล์ PHP ที่จะใช้ในการเพิ่มข้อมูลสินค้า
          method: "POST",
          data: {
            id_user:localStorage.getItem("id_user"),
        
            name_from: name_from,
            // petition_name: petition_name,
            activity_name: activity_name,
            reason_project: reason_project,
            date_activity: date_activity,
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



})
var x = 1;
var p = 1;

function addfields8() {
    // x++;
    $(".host8").append(` 

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
        <div class="col-2 mt-2">
            <div class="form-group">
                <label for="" style="font-size: 18px;">ชั้น</label>
                <input type="text" class="form-control mt-2" placeholder="ชั้น">
            </div>
        </div>
        <div class="col-2 mt-2">
            <div class="form-group">
                <label for="" style="font-size: 18px;">เวลา</label>
                <input type="text" class="form-control mt-2" placeholder="เวลา">
            </div>
        </div>
        <div class="col-4 mt-2">
            <div class="form-group">
                <label for="" style="font-size: 18px;">สถานที่</label>
                <input type="text" class="form-control mt-2" placeholder="สถานที่">
            </div>
        </div>
        <div class="col-4 mt-2">
            <div class="form-group">
                <label for="" style="font-size: 18px;">หมายเหต</label>
                <textarea class="form-control" placeholder="หมายเหต" id="floatingTextarea2"></textarea>
            </div>
        </div>
    </div>
    <div class ="mt-2 text-center">
        <a href="javascript:void(0);" class="btn btn-danger remove_field ">ลบ</a>
    </div>
</div>`);
}




