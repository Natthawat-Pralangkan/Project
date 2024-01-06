$(document).ready(function () {
    $("#managerequests").DataTable({
      columns: [
        {
          data: "ลำดับ",
        },
        {
          data: "ชื่อคำร้อง",
        },
        {
          data: "สถานะ",
        },
        {
          data: "ประเภทคำร้อง",
        },
        {
          data: "จัดการ",
        },
        // {
        //   data: "ตำบล",
        // },
        // {
        //   data: "อำเภอ",
        // },
      ],
    });
  });