
$(document).ready(function() {
    //กดเพิ่มเจ้าภาพ
    $(".add_fields2").click(function(e) {
        e.preventDefault();
        addfields2()
    });
    //
    //กดลบเจ้าภาพ
    $(".host2").on("click", ".remove_field", function(e) {
        e.preventDefault();
        $(this).parent('div').remove();
        p--;
        x--;
    })
    //
})
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
  <th scope="row">${p++}</th>
  <td><input type="text" class="form-control mt-2" placeholder=""></td>
  <td><input type="text" class="form-control mt-2" placeholder=""></td>
  <td><input type="text" class="form-control mt-2" placeholder=""></td>
  <td><input type="text" class="form-control mt-2" placeholder=""></td>
  <td><input type="text" class="form-control mt-2" placeholder=""></td>
  <td><input type="text" class="form-control mt-2" placeholder=""></td>
  
</tr>
</table>
<div class ="mt-2"></div>
    <a href="javascript:void(0);" class="btn btn-danger remove_field ">ลบ</a>
</div> 
</div>`);
}

// $("#addfromactivityparticipationreport").submit(function (e) {
//     e.preventDefault(); // ป้องกันการรีเฟรชหน้า
  
//     // รับข้อมูลจากฟอร์ม Modal
//     var name_from = $("#name_from").val();
//     var petition_name = $("#petition_name").val();
//     var subject_group = $("#subject_group").val();
//     var school_year = $("#school_year").val();
//     var status_from = $("#status_from").val();

  
//     // ส่งข้อมูลไปบันทึกผ่าน AJAX
//     $.ajax({
//       url: "insteractivityparticipationreport.php", // เปลี่ยนเป็น URL ที่ถูกต้องสำหรับไฟล์ PHP ที่จะใช้ในการเพิ่มข้อมูลสินค้า
//       method: "POST",
//       data: {
//         name_from: name_from,
//         petition_name: petition_name,
//         subject_group: subject_group,
//         school_year: school_year,
//         status_from: status_from,
//         // เพิ่มฟิลด์อื่น ๆ ตามต้องการ
//       },
//       success: function (response) {
//         // ตรวจสอบว่าบันทึกข้อมูลสำเร็จหรือไม่
//         // ตรวจสอบว่าบันทึกข้อมูลสำเร็จหรือไม่
//         if (response === "success") {
//           // ปิด Modal เพิ่มข้อมูลสินค้า
//           $("#addfromactivityparticipationreport").modal("hide");
  
//           // แสดงข้อความบันทึกข้อมูลสินค้าสำเร็จ
//           alert("บันทึกข้อมูลสินค้าสำเร็จ");
  
//           // รีเฟรชหน้าหลังจากบันทึกการเปลี่ยนแปลง
//           location.reload();
//         } else {
//           alert("เกิดข้อผิดพลาดในการบันทึกข้อมูลสินค้า");
//         }
//       },
//       error: function () {
//         alert("เกิดข้อผิดพลาดในการส่งข้อมูล");
//       },
//     });
//   });


