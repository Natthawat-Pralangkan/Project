$(document).ready(function () {
  $(".add_fields15").click(function (e) {
    e.preventDefault();
    if (x < 15) {
      // Check if less than 9 fields are already added
      add_fields15();
      x++; // Increment the counter each time a new set of fields is added
    } else {
      alert("You can add no more than 9 sets of fields."); // Optional: Alert the user
    }
  });
  //
  //กดลบเจ้าภาพ
  $(".host15").on("click", ".remove_field", function (e) {
    e.preventDefault();
    $(this).parent("div").remove();
    p--;
    x--;
  });
  $("#ser_from_1").click(function () {
    let addIdValues = [];
    $('input[name="nub_id[]"]').each(function () {
      addIdValues.push($(this).val());
    });

    let product_name_0 = [];
    $('input[name="input_host_name0_0[]"]').each(function () {
      product_name_0.push($(this).val());
    });

    let product_name1 = [];
    $('input[name="input_host_name1_0[]"]').each(function () {
      product_name1.push($(this).val());
    });

    let product_name2 = [];
    $('input[name="input_host_name2_0[]"]').each(function () {
      product_name2.push($(this).val());
    });

    let product_name3 = [];
    $('input[name="input_host_name3_0[]"]').each(function () {
      product_name3.push($(this).val());
    });

    let product_name4 = [];
    $('input[name="input_host_name4_0[]"]').each(function () {
      product_name4.push($(this).val());
    });

    let product_name5 = [];
    $('input[name="input_host_name5_0[]"]').each(function () {
      product_name5.push($(this).val());
    });

    let product_name6 = [];
    $('input[name="input_host_name6_0[]"]').each(function () {
      product_name6.push($(this).val());
    });

    let product_name7 = [];
    $('input[name="input_host_name7_0[]"]').each(function () {
      product_name7.push($(this).val());
    });
    // การจัดตารางสอนแทนครูที่ไม่มาปฏิบัติราชการ
    var semester = $("#semester").val();
    var school_year = $("#school_year_4").val();
    var id_subject_group = $("#id_subject_group_7").val();
    console.log( semester + " " + school_year);
    $.ajax({
      url: "insterarranging_teaching_schedules_for_teachers_who_are_not_onofficialduty", // เปลี่ยนเป็น URL ที่ถูกต้องสำหรับไฟล์ PHP ที่จะใช้ในการเพิ่มข้อมูลสินค้า
      method: "POST",
      data: {
        user_id: localStorage.getItem("user_id"),
        semester: semester,
        school_year: school_year,
        addIdValues: addIdValues,
        product_name_0: product_name_0,
        product_name1: product_name1,
        product_name2: product_name2,
        product_name3: product_name3,
        product_name4: product_name4,
        product_name5: product_name5,
        product_name6: product_name6,
        product_name7: product_name7,
        id_subject_group_7: id_subject_group,
      },
      success: function (response) {
        // console.log(response);
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
          alert("เกิดข้อผิดพลาดในการบันทึกข้อมูลสินค้า");
          window.location.href = "submit_a_complaint";
        }
      },
      error: function () {
        alert("เกิดข้อผิดพลาดในการส่งข้อมูล");
      },
    });
  });

  //////////////////////แบบสำรวจอัตรากำลังครู////////////////////////
  $("#ser_from_6").click(function () {
    // แบบสำรวจอัตรากำลังครู
    // var subject_group = $("#subject_group_6").val();
    var semester = $("#semester_6").val();
    var school_yea = $("#school_yea_6").val();
    var teacher_total_now = $("#teacher_total_now_6").val();
    var teacher_total_out = $("#teacher_total_out_6").val();
    var teacher_total_broken = $("#teacher_total_broken_6").val();
    var teacher_broken_reason = $("#teacher_broken_reason_6").val();
    var teacher_total_over = $("#teacher_total_over_6").val();
    var teacher_over_reason = $("#teacher_over_reason_6").val();
    var teacher_total_add = $("#teacher_total_add_6").val();
    var teacher_add_reason = $("#teacher_add_reason_6").val();
    var id_subject_group = $("#id_subject_group_4").val();
    $.ajax({
      url: "insterteacher_staffing_survey", // เปลี่ยนเป็น URL ที่ถูกต้องสำหรับไฟล์ PHP ที่จะใช้ในการเพิ่มข้อมูลสินค้า
      method: "POST",
      data: {
        user_id: localStorage.getItem("user_id"),

        // subject_group: subject_group,
        semester: semester,
        school_yea: school_yea,
        teacher_total_now: teacher_total_now,
        teacher_total_out: teacher_total_out,
        teacher_total_broken: teacher_total_broken,
        teacher_broken_reason: teacher_broken_reason,
        teacher_total_over: teacher_total_over,
        teacher_over_reason: teacher_over_reason,
        teacher_total_add: teacher_total_add,
        teacher_add_reason: teacher_add_reason,
        id_subject_group_4: id_subject_group,
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

function add_fields15() {
  // x++;
  $(".host15").append(` 

  <div class="mt-2">
  <hr/>
    <div class=" mt-2 row">
      <div class="form-group col-2">
      <input type="hidden" class="form-control mt-2" name="nub_id[]" value = "" />
          <label for="" style="font-size: 18px;">วัน เดือน ปี</label>
          <input type="date" class="form-control mt-2" name="input_host_name0_0[]" placeholder="">
      </div>
      <div class="form-group col-4">
          <label for="" style="font-size: 18px;">ครูที่ไม่มาปฏิบัตริาชการ: 1</label>
          <input type="text" name="input_host_name1_0[]" class="form-control mt-2" placeholder="ครูที่ไม่มาปฏิบัตริาชการ">
      </div>
      <div class="form-group col-4">
          <label for="" style="font-size: 18px;">สาเหตุที่ไม่มาปฏิบัติราชการ</label>
          <input type="text" name="input_host_name2_0[]"  class="form-control mt-2" placeholder="สาเหตุที่ไม่มาปฏิบัติราชการ">
      </div>
      <div class="form-group col-2">
          <label for="" style="font-size: 18px;">รายวิชา</label>
          <input type="text" name="input_host_name3_0[]"  class="form-control mt-2" placeholder="รายวิชา">
      </div>
      <div class="form-group col-2">
        <label for="" style="font-size: 18px;">คาบที่</label>
        <input type="text" name="input_host_name4_0[]"  class="form-control mt-2" placeholder="คาบที่">
      </div>
      <div class="form-group col-2">
        <label for="" style="font-size: 18px;">ชั้น ม.</label>
        <input type="text" name="input_host_name5_0[]"  class="form-control mt-2" placeholder="ชั้น ม.">
      </div>
      <div class="form-group col-4">
          <label for="" style="font-size: 18px;">สถานที่</label>
          <input type="text" name="input_host_name6_0[]"  class="form-control mt-2" placeholder="สถานที่">
      </div>
      <div class="form-group col-4">
        <label for="" style="font-size: 18px;">ครูที่ปฏิบัติราชการแทน </label>
        <input type="text" name="input_host_name7_0[]"  class="form-control mt-2" placeholder="ครูที่ปฏิบัติราชการแทน">
      </div>
    </div>
    <hr/>    
   <div class ="mt-2"></div>
   
   <a href="javascript:void(0);"style="width: 250px; height:40px" class="btn btn-danger remove_field ">ลบ</a>

 
</div>`);
}
