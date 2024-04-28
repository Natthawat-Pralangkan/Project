$(document).ready(function () {
  $("#checktherequest").DataTable({
    columns: [
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
        data: "name_status",
        createdCell: function (td, cellData, rowData, row, col) {
          if (cellData == "รอพิจารณา") {
            $(td).addClass("status1");
          } else if (cellData == "รอรองผู้อำนวยการพิจารณา") {
            $(td).addClass("status2");
          } else if (cellData == "รอผู้อำนวยการพิจารณา") {
            $(td).addClass("status3");
          } else if (cellData == "อนุมัติแล้ว") {
            $(td).addClass("status4");
          } else if (cellData == "ไม่อนุมัติแล้ว") {
            $(td).addClass("status5");
          } else if (cellData == "ไม่ผ่านพิจารณา") {
            $(td).addClass("status6");
          } else if (cellData == "ยกเลิก") {
            $(td).addClass("status7");
          } else if (cellData == "รอหัวหน้ากลุ่มสาระพิจารณา") {
            $(td).addClass("status8");
          }
        },
      },
      {
        data: "จัดการ",
      },
    ],
  });
});
