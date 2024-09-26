$(document).ready(function () {
  $("#checktherequest").DataTable({
    columns: [
      {
        data: "ลำดับ",
      },
      {
        data: "วันที่ยื่น",
      },
      {
        data: "รายการคำร้อง",
      },
      {
        data: "ชื่อผู้ยื่นคำร้อง",
      },
      {
        data: "สถานะ",
        createdCell: function (td, cellData, rowData, row, col) {
          if (cellData == "รอพิจารณา") {
            $(td).addClass("status1");
          } else if (cellData == "รอรองผู้อำนวยการพิจารณา") {
            $(td).addClass("status2");
          } else if (cellData == "รอผู้อำนวยการพิจารณา") {
            $(td).addClass("status3");
          } else if (cellData == "อนุมัติแล้ว") {
            $(td).addClass("status4");
          } else if (cellData == "ไม่อนุมัติ") {
            $(td).addClass("status5");
          }
        },
      },
    ],
  });
});
