$(document).ready(function () {
  $("#ser_from_1").click(function () {
    // การจัดตารางสอนแทนครูที่ไม่มาปฏิบัติราชการ
    var subject_group = $("#subject_group_4").val();
    var semester = $("#semester").val();
    var school_year = $("#school_year_4").val();
    console.log(subject_group + " " + semester + " " + school_year);
    $.ajax({
      url: "insterarranging_teaching_schedules_for_teachers_who_are_not_onofficialduty", // เปลี่ยนเป็น URL ที่ถูกต้องสำหรับไฟล์ PHP ที่จะใช้ในการเพิ่มข้อมูลสินค้า
      method: "POST",
      data: {
        id_user: localStorage.getItem("id_user"),
        subject_group: subject_group,
        semester: semester,
        school_year: school_year,
      },
      success: function (response) {
        // console.log(response);
        var data = JSON.parse(response);
        if (data.status === 200) {
          alert("บันทึกข้อมูลสินค้าสำเร็จ");
          window.location.href = "follow_up_on_requests";
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
    var subject_group = $("#subject_group_6").val();
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
    $.ajax({
      url: "insterteacher_staffing_survey", // เปลี่ยนเป็น URL ที่ถูกต้องสำหรับไฟล์ PHP ที่จะใช้ในการเพิ่มข้อมูลสินค้า
      method: "POST",
      data: {
        id_user: localStorage.getItem("id_user"),
        
        subject_group: subject_group,
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
      },
      success: function (response) {
        console.log(response);
        var data = JSON.parse(response);
        if (data.status === 200) {
          alert("บันทึกข้อมูลสินค้าสำเร็จ");
          window.location.href = "follow_up_on_requests";
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
});
