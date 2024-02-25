$(document).ready(function () {
  //กดเพิ่มเจ้าภาพ
  $(".add_fields8").click(function (e) {
    e.preventDefault();
    addfields8();
  });
  //
  //กดลบเจ้าภาพ
  $(".host8").on("click", ".remove_field", function (e) {
    e.preventDefault();
    $(this).parent("div").remove();
    p--;
    x--;
  });

  $("#server_from_10").click(function () {
    // รับข้อมูลจากฟอร์ม Modal
    let addIdValues = [];
    $('input[name="nub_id[]"]').each(function () {
      addIdValues.push($(this).val());
    });

    let product_name1 = [];
    $('input[name="input_host_name1[]"]').each(function () {
      product_name1.push($(this).val());
    });

    let product_name2 = [];
    $('input[name="input_host_name2[]"]').each(function () {
      product_name2.push($(this).val());
    });

    let product_name3 = [];
    $('input[name="input_host_name3[]"]').each(function () {
      product_name3.push($(this).val());
    });

    let product_name4 = [];
    $('input[name="input_host_name4[]"]').each(function () {
      product_name4.push($(this).val());
    });

    let product_name5 = [];
    $('input[name="input_host_name5[]"]').each(function () {
      product_name5.push($(this).val());
    });

    var activity_name = $("#activity_name_9").val();
    var reason_project = $("#reason_project_9").val();
    var date_activity = $("#date_activity_9").val();
    console.log(activity_name + " " + reason_project + " " + date_activity);
    $.ajax({
      url: "inster_Request_permission_to_bring_students_to_participate_in_activities_during_class_time", // เปลี่ยนเป็น URL ที่ถูกต้องสำหรับไฟล์ PHP ที่จะใช้ในการเพิ่มข้อมูลสินค้า
      method: "POST",
      data: {
        user_id: localStorage.getItem("user_id"),
        activity_name: activity_name,
        reason_project: reason_project,
        date_activity: date_activity,
        addIdValues: addIdValues,
        product_name1: product_name1,
        product_name2: product_name2,
        product_name3: product_name3,
        product_name4: product_name4,
        product_name5: product_name5,
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

function addfields8() {
  // x++;
  $(".host8").append(` 

    <div class="mt-2">
    <div class="row">
        <input type="hidden" class="form-control mt-2" name="nub_id[]" value = "" />
        <div class="col-4 mt-2">
            <div class="form-group">
                <label for="" style="font-size: 18px;">ชื่อ-สกุล</label>
                <input type="text" name="input_host_name1[]"  class="form-control mt-2" placeholder="ชื่อ-สกุล">
            </div>
        </div>
        <div class="col-2 mt-2">
            <div class="form-group">
                <label for="" style="font-size: 18px;">ชั้น</label>
                <input type="text" name="input_host_name2[]"  class="form-control mt-2" placeholder="ชั้น">
            </div>
        </div>
        <div class="col-2 mt-2">
            <div class="form-group">
                <label for="" style="font-size: 18px;">เวลา</label>
                <input type="text" name="input_host_name3[]"  class="form-control mt-2" placeholder="เวลา">
            </div>
        </div>
        <div class="col-4 mt-2">
            <div class="form-group">
                <label for="" style="font-size: 18px;">สถานที่</label>
                <input type="text" name="input_host_name4[]"  class="form-control mt-2" placeholder="สถานที่">
            </div>
        </div>
        <div class="col-4 mt-2">
            <div class="form-group">
                <label for="" style="font-size: 18px;">หมายเหตุ</label>
                <input type="text" name="input_host_name5[]"  class="form-control mt-2" placeholder="หมายเหตุ">
            </div>
        </div>
    </div>
    <div class ="mt-2 text-center"></div>
        <a href="javascript:void(0);" class="btn btn-danger remove_field ">ลบ</a>
    
</div>`);
}
