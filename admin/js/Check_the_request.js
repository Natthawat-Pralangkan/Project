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
          data: "สถานะ",
        },
        {
          data: "สถานะ",
        },
        // {
        //   data: "อำเภอ",
        // },
      ],
    });
  });