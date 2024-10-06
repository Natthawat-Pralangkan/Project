$(document).ready(function () {
  $("#follow_up_on_requests").DataTable({
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
        createdCell: function (td, cellData, rowData, row, col) {
          if (cellData == "รออนุมัติ") {
            $(td).addClass("status1");
          } else if (cellData == "รอพิจารณา") {
            $(td).addClass("status2");
          } else if (cellData == "ยกเลิก") {
            $(td).addClass("status3");
          } else if (cellData == "เกินกำหนดการ") {
            $(td).addClass("status4");
          }
        },
      },
      {
        data: "จัดการ",
      },
    ],
  });
});
