$(document).ready(function () {
    $("#uploadcommand").DataTable({
      columns: [
        {
          data: "ลำดับ",
        },
        {
          data: "ว/ด/ป",
        },
        {
          data: "เวลาเข้า",
        },
        {
          data: "เวลาออก",
        },
        {
          data: "ชื่อนามสกุล",
        },
        {
          data: "หมายเหตุ",
        },
        // {
        //   data: "อำเภอ",
        // },
      ],
    });
  });