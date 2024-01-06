
$(document).ready(function () {
    $("#follow_up_on_requests").DataTable({
      columns: [
        {
          data: "วันที่ยื่นำร้ง",
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