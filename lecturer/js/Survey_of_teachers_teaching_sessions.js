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
    let addIdValues = [];
    $('input[name="nub_id[]"]').each(function () {
      addIdValues.push($(this).val());
    });

    let product_name_0 = [];
    $('input[name="input_host_name0_0[]"]').each(function () {
      product_name_0.push($(this).val());
    });
    let product_name_0_1 = [];
    $('input[name="input_host_name0_1[]"]').each(function () {
      product_name_0_1.push($(this).val());
    });
    let product_name_0_2 = [];
    $('input[name="input_host_name0_2[]"]').each(function () {
      product_name_0_2.push($(this).val());
    });

    let product_name1 = [];
    $('input[name="input_host_name1_0[]"]').each(function () {
      product_name1.push($(this).val());
    });
    let product_name1_1 = [];
    $('input[name="input_host_name1_1[]"]').each(function () {
      product_name1_1.push($(this).val());
    });
    let product_name1_2 = [];
    $('input[name="input_host_name1_2[]"]').each(function () {
      product_name1_2.push($(this).val());
    });

    let product_name2 = [];
    $('input[name="input_host_name2_0[]"]').each(function () {
      product_name2.push($(this).val());
    });
    let product_name2_1 = [];
    $('input[name="input_host_name2_1[]"]').each(function () {
      product_name2_1.push($(this).val());
    });
    let product_name2_2 = [];
    $('input[name="input_host_name2_2[]"]').each(function () {
      product_name2_2.push($(this).val());
    });

    let product_name3 = [];
    $('input[name="input_host_name3_0[]"]').each(function () {
      product_name3.push($(this).val());
    });
    let product_name3_1 = [];
    $('input[name="input_host_name3_1[]"]').each(function () {
      product_name3_1.push($(this).val());
    });
    let product_name3_2 = [];
    $('input[name="input_host_name3_2[]"]').each(function () {
      product_name3_2.push($(this).val());
    });

    let product_name4 = [];
    $('input[name="input_host_name4_0[]"]').each(function () {
      product_name4.push($(this).val());
    });
    let product_name4_1 = [];
    $('input[name="input_host_name4_1[]"]').each(function () {
      product_name4_1.push($(this).val());
    });
    let product_name4_2 = [];
    $('input[name="input_host_name4_2[]"]').each(function () {
      product_name4_2.push($(this).val());
    });

    let product_name5 = [];
    $('input[name="input_host_name5_0[]"]').each(function () {
      product_name5.push($(this).val());
    });
    let product_name5_1 = [];
    $('input[name="input_host_name5_1[]"]').each(function () {
      product_name5_1.push($(this).val());
    });
    let product_name5_2 = [];
    $('input[name="input_host_name5_2[]"]').each(function () {
      product_name5_2.push($(this).val());
    });

    let product_name6 = [];
    $('input[name="input_host_name6_0[]"]').each(function () {
      product_name6.push($(this).val());
    });
    let product_name6_1 = [];
    $('input[name="input_host_name6_1[]"]').each(function () {
      product_name6_1.push($(this).val());
    });
    let product_name6_2 = [];
    $('input[name="input_host_name6_2[]"]').each(function () {
      product_name6_2.push($(this).val());
    });

    let product_name7 = [];
    $('input[name="input_host_name7_0[]"]').each(function () {
      product_name7.push($(this).val());
    });
    let product_name7_1 = [];
    $('input[name="input_host_name7_1[]"]').each(function () {
      product_name7_1.push($(this).val());
    });
    let product_name7_2 = [];
    $('input[name="input_host_name7_2[]"]').each(function () {
      product_name7_2.push($(this).val());
    });

    var subject_group = $("#subject_group_7").val();
    var semester = $("#semester_7").val();
    var school_year = $("#school_year_7").val();
    // console.log(
    //   subject_group +
    //     " " +
    //     semester +
    //     " " +
    //     school_year +
    //     "" +
    //     localStorage.getItem("user_id")
    // );
    $.ajax({
      url: "inster_survey_of_teachers_teaching_sessions", // เปลี่ยนเป็น URL ที่ถูกต้องสำหรับไฟล์ PHP ที่จะใช้ในการเพิ่มข้อมูลสินค้า
      method: "POST",
      data: {
        user_id: localStorage.getItem("user_id"),

        // name_from: name_from,
        // petition_name: petition_name,
        subject_group: subject_group,
        semester: semester,
        school_year: school_year,
        addIdValues: addIdValues,
        product_name_0: product_name_0,
        product_name_0_1: product_name_0_1,
        product_name_0_2: product_name_0_2,
        product_name1: product_name1,
        product_name1_1: product_name1_1,
        product_name1_2: product_name1_2,
        product_name2: product_name2,
        product_name2_1: product_name2_1,
        product_name2_2: product_name2_2,
        product_name3: product_name3,
        product_name3_1: product_name3_1,
        product_name3_2: product_name3_2,
        product_name4: product_name4,
        product_name4_1: product_name4_1,
        product_name4_2: product_name4_2,
        product_name5: product_name5,
        product_name5_1: product_name5_1,
        product_name5_2: product_name5_2,
        product_name6: product_name6,
        product_name6_1: product_name6_1,
        product_name6_2: product_name6_2,
        product_name7: product_name7,
        product_name7_1: product_name7_1,
        product_name7_2: product_name7_2,
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
  x++;
  $(".host6").append(` 
    
<div class="mt-2">
    <div class="row">
        <div class="col-4 mt-2">
            <div class="form-group">
            <input type="hidden" class="form-control mt-2" name="nub_id[]" value = "" />
                <label for="" style="font-size: 18px;">รายชื่อครูผู้สอน : 1</label>
                <input type="text" class="form-control mt-2" name="input_host_name0_0[]" placeholder="รายชื่อครูผู้สอน">
            </div>
            <div class="form-group">
                <label for="" style="font-size: 18px;">รายชื่อครูผู้สอน : 2</label>
                <input type="text" class="form-control mt-2" name="input_host_name0_1[]" placeholder="รายชื่อครูผู้สอน">
            </div>
            <div class="form-group">
                <label for="" style="font-size: 18px;">รายชื่อครูผู้สอน : 3</label>
                <input type="text" class="form-control mt-2" name="input_host_name0_2[]" placeholder="รายชื่อครูผู้สอน">
            </div>
        </div>
        <div class="col-4 mt-2">
            <div class="form-group">
                <label for="" style="font-size: 18px;">รายวิชา: 1</label>
                <input type="text" name="input_host_name1_0[]" class="form-control mt-2" placeholder="รายวิชา">
            </div>
            <div class="form-group">
                <label for="" style="font-size: 18px;">รายวิชา: 2</label>
                <input type="text" name="input_host_name1_1[]" class="form-control mt-2" placeholder="รายวิชา">
            </div>
            <div class="form-group">
                <label for="" style="font-size: 18px;">รายวิชา: 3</label>
                <input type="text" name="input_host_name1_2[]" class="form-control mt-2" placeholder="รายวิชา">
            </div>
        </div>
        <div class="col-4 mt-2">
            <div class="form-group">
                <label for="" style="font-size: 18px;">รหัส: 1</label>
                <input type="text" name="input_host_name2_0[]"  class="form-control mt-2" placeholder="รหัส">
            </div>
            <div class="form-group">
                <label for="" style="font-size: 18px;">รหัส: 2</label>
                <input type="text" name="input_host_name2_1[]"  class="form-control mt-2" placeholder="รหัส">
            </div>
            <div class="form-group">
                <label for="" style="font-size: 18px;">รหัส: 3</label>
                <input type="text" name="input_host_name2_2[]"  class="form-control mt-2" placeholder="รหัส">
            </div>
        </div>
        <div class="col-4 mt-2">
            <div class="form-group">
                <label for="" style="font-size: 18px;">ชั้น/ห้อง: 1</label>
                <input type="text" name="input_host_name3_0[]"  class="form-control mt-2" placeholder="ชั้น/ห้อง">
            </div>
            <div class="form-group">
                <label for="" style="font-size: 18px;">ชั้น/ห้อง: 2</label>
                <input type="text" name="input_host_name3_1[]"  class="form-control mt-2" placeholder="ชั้น/ห้อง">
            </div>
            <div class="form-group">
                <label for="" style="font-size: 18px;">ชั้น/ห้อง: 3</label>
                <input type="text" name="input_host_name3_2[]"  class="form-control mt-2" placeholder="ชั้น/ห้อง">
            </div>
        </div>
        <div class="col-4 mt-2">
            <div class="form-group">
                <label for="" style="font-size: 18px;">คาบสอน/ห้อง: 1</label>
                <input type="text" name="input_host_name4_0[]"  class="form-control mt-2" placeholder="คาบสอน/ห้อง">
            </div>
            <div class="form-group">
                <label for="" style="font-size: 18px;">คาบสอน/ห้อง: 2</label>
                <input type="text" name="input_host_name4_1[]"  class="form-control mt-2" placeholder="คาบสอน/ห้อง">
            </div>
            <div class="form-group">
                <label for="" style="font-size: 18px;">คาบสอน/ห้อง: 3</label>
                <input type="text" name="input_host_name4_2[]"  class="form-control mt-2" placeholder="คาบสอน/ห้อง">
            </div>
        </div>
        <div class="col-4 mt-2">
            <div class="form-group">
                <label for="" style="font-size: 18px;">รวมคาบสอน: 1</label>
                <input type="text" name="input_host_name5_0[]"  class="form-control mt-2" placeholder="รวมคาบสอน">
            </div>
            <div class="form-group">
                <label for="" style="font-size: 18px;">รวมคาบสอน: 2</label>
                <input type="text" name="input_host_name5_1[]"  class="form-control mt-2" placeholder="รวมคาบสอน">
            </div>
            <div class="form-group">
                <label for="" style="font-size: 18px;">รวมคาบสอน: 3</label>
                <input type="text" name="input_host_name5_2[]"  class="form-control mt-2" placeholder="รวมคาบสอน">
            </div>
        </div>
        <div class="col-4 mt-2">
            <div class="form-group">
                <label for="" style="font-size: 18px;">สอนวิชาคู่กับครู: 1</label>
                <input type="text" name="input_host_name6_0[]"  class="form-control mt-2" placeholder="สอนวิชาคู่กับครู">
            </div>
            <div class="form-group">
                <label for="" style="font-size: 18px;">สอนวิชาคู่กับครู: 2</label>
                <input type="text" name="input_host_name6_1[]"  class="form-control mt-2" placeholder="สอนวิชาคู่กับครู">
            </div>
            <div class="form-group">
                <label for="" style="font-size: 18px;">สอนวิชาคู่กับครู: 3</label>
                <input type="text" name="input_host_name6_2[]"  class="form-control mt-2" placeholder="สอนวิชาคู่กับครู">
            </div>
        </div>
        <div class="col-4 mt-2">
            <div class="form-group">
                <label for="" style="font-size: 18px;">ชื่อกิจกรรม/ม.ต้น/ม.ปลาย: 1</label>
                <input type="text" name="input_host_name7_0[]"  class="form-control mt-2" placeholder="ชื่อกิจกรรม/ม.ต้น/ม.ปลาย">
            </div>
            <div class="form-group">
                <label for="" style="font-size: 18px;">ชื่อกิจกรรม/ม.ต้น/ม.ปลาย: 2</label>
                <input type="text" name="input_host_name7_1[]"  class="form-control mt-2" placeholder="ชื่อกิจกรรม/ม.ต้น/ม.ปลาย">
            </div>
            <div class="form-group">
                <label for="" style="font-size: 18px;">ชื่อกิจกรรม/ม.ต้น/ม.ปลาย: 3</label>
                <input type="text" name="input_host_name7_2[]"  class="form-control mt-2" placeholder="ชื่อกิจกรรม/ม.ต้น/ม.ปลาย">
            </div>
        </div>
         <div class ="mt-2"></div>
        <a href="javascript:void(0);"style="width: 250px; height:40px" class="btn btn-danger remove_field text-center">ลบ</a>
    </div>
</div>`);
}
