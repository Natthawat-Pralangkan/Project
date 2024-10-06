$(document).ready(function () {

  // แสดง/ซ่อนฟิลด์ "เหตุผล" เมื่อเลือก "เหตุผลในการลา"
  $("#reason_for_leave").change(function () {
    if ($("#reason_for_leave").val() == 2) {
      $("#personal_affairs_container").show();
    } else {
      $("#personal_affairs_container").hide();
    }
  });

  // ส่งข้อมูลการยื่นคำร้องลา
  $("#server_from_leave").click(function () {
    var subject = $("#subject").val();
    var Name_Surname = $("#Name_Surname").val();
    var position = $("#position").val();
    var reason_for_leave = $("#reason_for_leave").val();
    var Personal_affairs = $("#Personal_affairs").val(); // ถูกต้องสำหรับฟิลด์เหตุผล
    var date_activity_12 = $("#date_activity_12").val();
    var date_activity_13 = $("#date_activity_13").val();
    var scheduled_2 = $("#scheduled_2").val();
    var telephone_number_1 = $("#telephone_number_1").val();
    
    // แสดงข้อมูลที่กำลังจะส่งใน console
    console.log(
      subject +
      " " +
      Name_Surname +
      " " +
      position +
      " " +
      reason_for_leave +
      " " +
      Personal_affairs +
      " " +
      date_activity_12 +
      " " +
      date_activity_13 +
      " " +
      scheduled_2 +
      " " +
      telephone_number_1
    );

    $.ajax({
      url: "inster_Request_permission_to_leave",
      method: "POST",
      data: {
        user_id: localStorage.getItem("user_id"),  // ใช้ localStorage สำหรับ user_id
        subject: subject,
        Name_Surname: Name_Surname,
        position: position,
        reason_for_leave: reason_for_leave,
        Personal_affairs: Personal_affairs,
        date_activity_12: date_activity_12,
        date_activity_13: date_activity_13,
        scheduled_2: scheduled_2,
        telephone_number_1: telephone_number_1,
      },
      success: function (response) {
        console.log(response);
        var data = JSON.parse(response);
        if (data.status === 200) {
          Swal.fire({
            title: "ยื่นคำร้องสำเร็จ!",
            text: data.message,
            icon: "success",
            confirmButtonText: "ยืนยัน",
          }).then((result) => {
            if (result.isConfirmed) {
              location.reload();
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

//   // นิยามฟังก์ชัน setUserId เพื่อเซ็ต user_id ให้กับปุ่ม
//   function setUserId(buttonId) {
//     var userId = localStorage.getItem('user_id'); // ดึงค่า user_id จาก localStorage

//     if (userId) {
//         console.log("Setting user ID in modal button: " + userId);
//         document.getElementById(buttonId).setAttribute('data-user_id', userId); // เซ็ตค่า user_id ใน data attribute ของปุ่ม
//     } else {
//         console.error("User ID is missing from localStorage.");
//     }
// }


// // เมื่อเปิด Modal จะดึง user_id จาก data-user_id และดึงข้อมูลผู้ใช้จากเซิร์ฟเวอร์
// $('#exampleModal12').on('show.bs.modal', function (e) {
//   var button = $(e.relatedTarget); // ปุ่มที่ถูกคลิกเพื่อเปิด modal
//   var userId = button.data('user_id'); // ดึงค่า user_id จาก data attribute

//   console.log("User ID: " + userId);  // ตรวจสอบว่า user_id ถูกดึงมาอย่างถูกต้องหรือไม่

//   // ตรวจสอบว่า user_id มีค่าและไม่เป็น null
//   if (userId) {
//       $.ajax({
//           url: 'get_user_data.php',
//           type: 'POST',
//           data: { user_id: userId },
//           success: function(response) {
//               console.log("Response from server: ", response);  // ตรวจสอบว่า PHP ตอบกลับอะไร
//               var data = JSON.parse(response);

//               if (data.status === 'success') {
//                   $('#Name_Surname').val(data.user_name);
//                   $('#telephone_number_1').val(data.telephone_number);
//                   $('#position').val(data.position);
//               } else {
//                   alert(data.message);
//               }
//           },
//           error: function(error) {
//               console.error("AJAX error: ", error);
//           }
//       });
//   } else {
//       console.error("User ID is missing.");
//   }
// });

  



  
  
  


 

  // คำนวณจำนวนวันที่ลา
  $('#date_activity_12, #date_activity_13').on('change', function() {
    var startDate = new Date($('#date_activity_12').val());
    var endDate = new Date($('#date_activity_13').val());
    if (startDate && endDate && startDate <= endDate) {
      var timeDiff = Math.abs(endDate.getTime() - startDate.getTime());
      var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)) + 1; // รวมวันเริ่มต้นและวันสิ้นสุด
      $('#scheduled_2').val(diffDays + ' วัน');
    }
  });

});
