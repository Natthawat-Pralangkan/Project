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
          data: "สถานะ",
          createdCell: function (td, cellData, rowData, row, col) {
            if (cellData == "รอการอนุมัติ") {
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