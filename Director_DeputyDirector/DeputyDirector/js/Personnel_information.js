$(document).ready(function () {
    $("#addpersonnelinformation").DataTable({
      columns: [
        {
          data: "ลำดับ",
        },
        {
          data: "รูปภาพ",
        },
        {
          data: "คำนำหน้า",
        },
        {
          data: "ชื่อ",
        },
        {
          data: "นามสกุล",
        },
        {
          data: "ตำแหนง",
        },
        // {
        //   data: "แก้ไข",
        // },
        // {
        //   data: "ลบ",
        // },
      ],
    });
  });