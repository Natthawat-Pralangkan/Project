$(document).ready(function () {
  //กดเพิ่มเจ้าภาพ
  $(".add_fields2").click(function (e) {
    e.preventDefault();
    if (x < 9) {
      // Check if less than 9 fields are already added
      addfields2();
      x++; // Increment the counter each time a new set of fields is added
    } else {
      alert("You can add no more than 9 sets of fields."); // Optional: Alert the user
    }
  });
  //
  //กดลบเจ้าภาพ
  $(".host2").on("click", ".remove_field", function (e) {
    e.preventDefault();
    $(this).parent("div").remove();
    p--;
    x--;
  });
  //
  $("#saveform").click(function () {
    // <!-- รายงานการเข้าร่วมกิจกรรม -->
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

    let product_name6 = [];
    $('input[name="input_host_name6[]"]').each(function () {
      product_name6.push($(this).val());
    });
    // var subject_group = $("#subject_group").val();
    var school_year = $("#school_year").val();
    var id_subject_group = $("#id_subject_group_2").val();
    $.ajax({
      url: "insteractivityparticipationreport", // เปลี่ยนเป็น URL ที่ถูกต้องสำหรับไฟล์ PHP ที่จะใช้ในการเพิ่มข้อมูลสินค้า
      method: "POST",
      data: {
        user_id: localStorage.getItem("user_id"),
        // subject_group: subject_group,
        school_year: school_year,
        addIdValues: addIdValues,
        product_name1: product_name1,
        product_name2: product_name2,
        product_name3: product_name3,
        product_name4: product_name4,
        product_name5: product_name5,
        product_name6: product_name6,
        id_subject_group_2: id_subject_group,
      },
      success: function (response) {
        // console.log(response);
        var data = JSON.parse(response);
        if (data.status === 200) {
          alert("บันทึกข้อมูลสำเร็จ");
          window.location.href = "follow_up_on_requests";
        } else {
          console.log(data);
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

function addfields2() {
  // x++;
  $(".host2").append(` 

<div class="  mt-2">
<div class="text-center">
<table class="table">
<thead>
<tr>
  <th scope="col">ลำดับที่</th>
  <th scope="col">วัน/เดือน/ปี</th>
  <th scope="col">สถานที่เข้าร่วมกิจกรรม</th>
  <th scope="col">รายการกิจกรรม</th>
  <th scope="col">ชื่อนักเรียนที่เข้าร่วมกิจกรรม</th>
  <th scope="col">ชั้น</th>
  <th scope="col">ผลการเข้าร่วมกิจกรรม</th>
</tr>
</thead>
<tbody>
<tr>
<input type="hidden" class="form-control mt-2" name="nub_id[]" value = "" />
  <td>${p++}</td>
  <td><input type="date" class="form-control mt-2" name="input_host_name1[]" id="" ></td>
  <td><input type="text" class="form-control mt-2" name="input_host_name2[]" id=""></td>
  <td><input type="text" class="form-control mt-2" name="input_host_name3[]" id=""></td>
  <td><input type="text" class="form-control mt-2" name="input_host_name4[]" id=""></td>
  <td><input type="text" class="form-control mt-2" name="input_host_name5[]" id=""></td>
  <td><input type="text" class="form-control mt-2" name="input_host_name6[]" id=""></td>
  
</tr>
</table>
<div class ="mt-2"></div>
    <a href="javascript:void(0);" class="btn btn-danger remove_field ">ลบ</a>
</div> 
</div>`);
}
