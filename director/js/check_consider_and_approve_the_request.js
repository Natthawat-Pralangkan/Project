$(document).ready(function () {
    $("#check_consider_and_approve_the_request").DataTable({
      columns: [
        {
          data: "วันที่ยื่น",
        },
        {
          data: "รายการคำร้อง",
        },
        
        {
          data: "ชื่อผู้ยื่น",
        },
        {
          data: "จัดการ",
        },

      ],
    });
  });