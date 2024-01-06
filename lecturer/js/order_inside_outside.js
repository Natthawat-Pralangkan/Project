$(document).ready(function () {
    $("#order_inside_outside").DataTable({
      columns: [
        {
          data: "วัน/เดือน/ปี",
        },
        {
          data: "ชื่อหัวข้อคำสั่ง",
        },
        {
          data: "ไฟล์คำสั่งภายใน/ภายนอก",
        },
      ],
    });
  });