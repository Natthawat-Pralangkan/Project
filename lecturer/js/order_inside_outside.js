$(document).ready(function () {
  $("#order_inside_outside").DataTable({
    columns: [
      {
        data: "วันที่",
      },
      {
        data: "ชื่อสั่ง",
      },
      {
        data: "ประเภท",
      },
      {
        data: "ไฟล์",
      },
      {
        data: "จัดการ",
      },
    ],
  });
});