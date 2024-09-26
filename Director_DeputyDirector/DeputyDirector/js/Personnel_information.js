$(document).ready(function () {
    $("#addpersonnelinformation").DataTable({
      columns: [
        {
          data: "ลำดับ",
        },
        
        {
          data: "ชื่อ-นามสกุล",
        },
        {
          data: "ตำแหนง",
        },
        {
          data: "ดูรายละเอียด",
        },
        // {
        //   data: "ลบ",
        // },
      ],
    });
  });