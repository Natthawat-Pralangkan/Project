$(document).ready(function () {
  $("#server_from").click(function () {
    // รับข้อมูลจากฟอร์ม Modal
    var name_from = $("#name_from_1").val();
    var date_report_send = $("#date_report_send").val();
    var document_name_consider = $("#document_name_consider").val();
    var subject_group = $("#subject_group_1").val();
    var activity_name = $("#activity_name").val();
    var according_project = $("#according_project").val();
    var date_activity = $("#date_activity").val();
    var activity_where = $("#activity_where").val();
    var summary_details = $("#summary_details").val();
    console.log(
      name_from +
        " " +
        date_report_send +
        " " +
        document_name_consider +
        " " +
        subject_group +
        " " +
        activity_name +
        " " +
        according_project +
        "" +
        date_activity +
        "" +
        activity_where +
        "" +
        summary_details
    );
    $.ajax({
      url: "instersubmitting_a_cover_form", // เปลี่ยนเป็น URL ที่ถูกต้องสำหรับไฟล์ PHP ที่จะใช้ในการเพิ่มข้อมูลสินค้า
      method: "POST",
      data: {
        id_user: localStorage.getItem("id_user"),
        name_from: name_from,
        date_report_send: date_report_send,
        document_name_consider: document_name_consider,
        subject_group: subject_group,
        activity_name: activity_name,
        according_project: according_project,
        date_activity: date_activity,
        activity_where: activity_where,
        summary_details: summary_details,
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
