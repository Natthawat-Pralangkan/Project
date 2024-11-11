$(document).ready(function () {
  // Initial rendering of DataTable
  $.ajax({
    url: "get_time_clocking_system", // ตรวจสอบให้แน่ใจว่า path นี้ถูกต้อง
    type: "GET",
    dataType: "json",
    success: function (data) {
      var table = $("#mytable").DataTable({
        data: data,
        columns: [
          {
            // ใช้ฟังก์ชัน render เพื่อสร้างตัวนับที่ไดนามิก
            data: null,
            render: function (data, type, row, meta) {
              return meta.row + 1; // meta.row เริ่มที่ 0 สำหรับแถวแรก
            },
          },
          {
            data: "user_id",
          },
          {
            // รวม user_name และ last_name เข้าด้วยกัน
            data: null,
            render: function (data, type, row) {
              return row.user_name + " " + row.last_name;
            },
          },
          {
            data: "name_type",
          },
        ],
        destroy: true, // การตั้งค่านี้จะทำให้การตารางถูกสร้างใหม่อย่างถูกต้อง
      });
    },
    error: function (xhr, status, error) {
      console.error("An error occurred: " + status + " " + error);
    },
  });

  $("#exampleModal").on("shown.bs.modal", function () {
    fetchEmployeeData();
  });

  function fetchEmployeeData() {
    $.ajax({
      url: "get_fetch_employees", // URL ไปยัง PHP script ที่ดึงข้อมูลพนักงาน
      method: "GET",
      success: function (data) {
        let employees = JSON.parse(data);
        let employeeDropdown = $("#employeeDropdown");
        employeeDropdown.empty();
        employeeDropdown.append("<option selected>เลือกพนักงาน...</option>");
        employees.forEach(function (employee) {
          let employeeName = `${employee.user_name} ${employee.last_name}`;
          employeeDropdown.append(
            '<option value="' +
              employee.user_id +
              '" data-user_name="' +
              employee.user_name +
              '" data-last_name="' +
              employee.last_name +
              '" data-name_type="' +
              employee.name_type +
              '" data-position="' +
              employee.position +
              '">' +
              employeeName +
              "</option>"
          );
        });
      },
      error: function (xhr, status, error) {
        console.error("Error fetching employee data:", error);
      },
    });
  }

  $("#employeeDropdown").on("change", function () {
    let selectedOption = $(this).find("option:selected");
    let userId = selectedOption.val();
    let userName = selectedOption.data("user_name");
    let lastName = selectedOption.data("last_name");
    let nameType = selectedOption.data("name_type");
    let position = selectedOption.data("position");

    $("#user_id").val(userId);
    $("#user_name").val(userName);
    $("#last_name").val(lastName);
    $("#name_type").val(nameType);
    $("#position").val(position);
  });

  $("#saveChanges").on("click", function () {
    var user_id = $("#user_id").val();
    var user_name = $("#user_name").val();
    var last_name = $("#last_name").val();
    var position = $("#position").val();
    //   var picture = $("#picture")[0].files[0];
    var files = $("#picture")[0].files;

    
    var formData = new FormData();
    for (var i = 0; i < files.length; i++) {
        formData.append("files[]", files[i]);
      }
    formData.append("user_id", user_id);
    formData.append("user_name", user_name);
    formData.append("last_name", last_name);
    formData.append("position", position);
    $.ajax({
      url: "./save_time_entry", // URL ไปยังไฟล์ PHP สำหรับบันทึกข้อมูล
      method: "POST",
      processData: false,
      contentType: false,
      data: formData,
      success: function (response) {
        var data = JSON.parse(response);
        if (data.status === 200) {
          alert("บันทึกข้อมูลสำเร็จ");
          $("#exampleModal").modal("hide");
          location.reload(); // Reload the page to see the new data
        } else {
          alert("เกิดข้อผิดพลาดในการบันทึกข้อมูล");
        }
      },
      error: function () {
        alert("เกิดข้อผิดพลาดในการส่งข้อมูล");
      },
    });
  });
});

// document.addEventListener("DOMContentLoaded", function() {
//   $('#exampleModal').on('shown.bs.modal', function() {
//       fetchEmployeeData();
//   });

//   function fetchEmployeeData() {
//       $.ajax({
//           url: 'get_fetch_employees', // URL ไปยัง PHP script ที่ดึงข้อมูลพนักงาน
//           method: 'GET',
//           success: function(data) {
//               let employees = JSON.parse(data);
//               let employeeDropdown = $('#employeeDropdown');
//               employeeDropdown.empty();
//               employeeDropdown.append('<option selected>เลือกพนักงาน...</option>');
//               employees.forEach(function(employee) {
//                   let employeeName = `${employee.user_name} ${employee.last_name}`;
//                   employeeDropdown.append('<option value="' + employee.user_id + '" data-user_name="' + employee.user_name + '" data-last_name="' + employee.last_name + '" data-name_type="' + employee.name_type + '">' + employeeName + '</option>');
//               });
//           },
//           error: function(xhr, status, error) {
//               console.error('Error fetching employee data:', error);
//           }
//       });
//   }

//   $('#employeeDropdown').on('change', function() {
//       let selectedOption = $(this).find('option:selected');
//       let userId = selectedOption.val();
//       let userName = selectedOption.data('user_name');
//       let lastName = selectedOption.data('last_name');
//       let nameType = selectedOption.data('name_type');

//       $('#userId').val(userId);
//       $('#userName').val(userName);
//       $('#lastName').val(lastName);
//       $('#nameType').val(nameType);
//   });
// });

// function displayImageEdit(input) {
//   if (input.files && input.files[0]) {
//       var reader = new FileReader();
//       reader.onload = function(e) {
//           $('#uploaded_image_edit').attr('src', e.target.result).show();
//       }
//       reader.readAsDataURL(input.files[0]);
//   }
// }
