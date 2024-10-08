$(document).ready(function () {
    $("#Request_a_time_entry_and_exit_report").DataTable({
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