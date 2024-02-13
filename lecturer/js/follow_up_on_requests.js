
$(document).ready(function () {
    $("#show").DataTable({
      columns: [
        {
          data: "วันที่ยื่น",
        },
        {
          data: "ชื่อคำร้อง",
        },
        {
          data: "ประเภท",
        },
        {
          data: "สถานะ",
        },
        {
          data: "จัดการ",
        },
      ],
    });
  });