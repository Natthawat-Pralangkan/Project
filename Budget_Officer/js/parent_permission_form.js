$(document).ready(function () {
    var numberOfClicks = 0; // ตัวแปรเก็บจำนวนครั้งที่กด
  
    $(".add_fields1").click(function (e) {
      e.preventDefault();
      if (numberOfClicks < 2) {
        // ตรวจสอบว่ากดเกินจำนวนที่กำหนดหรือไม่
        addfields1();
        numberOfClicks++; // เพิ่มจำนวนครั้งที่กด
      } else {
        alert("คุณสามารถเพิ่มได้เพียง 2 ครั้งเท่านั้น");
      }
    });
  
    //
    //กดลบเจ้าภาพ
    $(".host1").on("click", ".remove_field", function (e) {
      e.preventDefault();
      $(this).parent("div").remove();
      p--;
      x--;
    });
  
    //กดเพิ่มนักเรียน
    $(".add_fields2").click(function (e) {
      e.preventDefault();
      addfields2();
    });
    //
  
    $(".host2").on("click", ".remove_field", function (e) {
      e.preventDefault();
      $(this).parent("div").remove();
      p--;
      x--;
    });
    //
    $("#server_report").click(function () {
      // รับข้อมูลจากฟอร์ม Modal
      let addIdValues = [];
      $('input[name="input_host_name[]"]').each(function () {
        addIdValues.push($(this).val());
      });
      let addIdValues_2 = [];
      $('input[name="input_host_name_students[]"]').each(function () {
        addIdValues_2.push($(this).val());
      });
      var school_name = $("#school_name").val();
      var reason_controlling = $("#reason_controlling").val();
      var student_total = $("#student_total").val();
      var province = $("#province").val();
      var number_of_students = $("#number_of_students").val();
      var number_of_supervisor_teachers = $(
        "#number_of_supervisor_teachers"
      ).val();
      var vehicle_used_for_traveling = $("#vehicle_used_for_traveling").val();
      var travel_route = $("#travel_route").val();
      var date_of_travel = $("#date_of_travel").val();
      var time = $("#time").val();
      var return_date = $("#return_date").val();
      var time_return = $("#time_return").val();
      var cost_per_student = $("#cost_per_student").val();
  
      console.log(
        school_name +
          " " +
          reason_controlling +
          " " +
          student_total +
          " " +
          province +
          " " +
          number_of_students +
          " " +
          number_of_supervisor_teachers +
          "" +
          vehicle_used_for_traveling +
          "" +
          date_of_travel +
          "" +
          time +
          "" +
          return_date +
          "" +
          time_return +
          "" +
          cost_per_student +
          "" +
          addIdValues +
          "" +
          addIdValues_2 +
          "" +
          localStorage.getItem("user_id")
      );
      $.ajax({
        url: "inster_parent _permission_form", // เปลี่ยนเป็น URL ที่ถูกต้องสำหรับไฟล์ PHP ที่จะใช้ในการเพิ่มข้อมูลสินค้า
        method: "POST",
        data: {
          user_id: localStorage.getItem("user_id"),
  
          // name_from: name_from,
          // petition_name: petition_name,
          school_name: school_name,
          reason_controlling: reason_controlling,
          student_total: student_total,
          province: province,
          number_of_students: number_of_students,
          number_of_supervisor_teachers: number_of_supervisor_teachers,
          vehicle_used_for_traveling: vehicle_used_for_traveling,
          travel_route: travel_route,
          date_of_travel: date_of_travel,
          time: time,
          return_date: return_date,
          time_return: time_return,
          cost_per_student: cost_per_student,
          addIdValues: addIdValues,
          addIdValues_2: addIdValues_2,
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
    var x = 1;
    var p = 1;
  
    function addfields1() {
      x++;
      $(".host1").append(` 
          <div class=" mt-2">
         
          <input type="hidden" name="nub_id[]" value = "" />
      <label >ชื่อครูผู้ควบคุมคนที่ ${p++} :</label>
      <input type="text" name="input_host_name[]" id="" class="form-control" >
      <div class ="mt-2"></div>
      <a href="javascript:void(0);" class="btn btn-primary remove_field ">ลบ</a>
      
      </div>`);
    }
    
  });
  