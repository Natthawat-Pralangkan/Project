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
          data: "ตำแหน่ง",
        },
      
        {
          data: "ดูรายละเอียด",
        },
      ],
    });
  });