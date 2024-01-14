$(document).ready(function () {
    $("#submit_a_complaint").DataTable({
      columns: [
        {
          data: "ลำดับ",
        },
        {
          data: "ชื่อคำร้อง",
        },
        {
          data: "ประเภท",
        },
        {
          data: "จัดการ",
        },
      ],
    });
  });