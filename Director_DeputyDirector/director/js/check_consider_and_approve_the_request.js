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
        data: "สถานะ",
        createdCell: function (td, cellData, rowData, row, col) {
          if (cellData == "รออนุมัติ") {
            $(td).addClass("status1");
          } else if (cellData == "รอพิจารณา") {
            $(td).addClass("status2");
          } else if (cellData == "รอผู้อำนวยการพิจารณา") {
            $(td).addClass("status3");
          } else if (cellData == "ไม่อนุมัติ") {
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
