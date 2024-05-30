$(document).ready(function () {
  $("#reason_for_leave").change(function () {
    if ($("#reason_for_leave").val() == 2) {
      $("#personal_affairs_container").show();
    } else {
      $("#personal_affairs_container").hide();
    }
  });

  $(document).ready(function () {
    $("#server_from_leave").click(function () {
      var subject = $("#subject").val();
      var Name_Surname = $("#Name_Surname").val();
      var position = $("#position").val();
      var reason_for_leave = $("#reason_for_leave").val();
      var Personal_affairs = $("#Personal_affairs").val(); // Corrected to use the input ID
      var date_activity_12 = $("#date_activity_12").val();
      var date_activity_13 = $("#date_activity_13").val();
      var scheduled_2 = $("#scheduled_2").val();
      var telephone_number_1 = $("#telephone_number_1").val();
      console.log(
        subject +
          " " +
          Name_Surname +
          " " +
          position +
          "" +
          reason_for_leave +
          "" +
          Personal_affairs +
          "" +
          date_activity_12 +
          "" +
          date_activity_13 +
          "" +
          scheduled_2 +
          "" +
          telephone_number_1
      );
      $.ajax({
        url: "inster_Request_permission_to_leave",
        method: "POST",
        data: {
          user_id: localStorage.getItem("user_id"),
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
              text: response.message,
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
  });

});
