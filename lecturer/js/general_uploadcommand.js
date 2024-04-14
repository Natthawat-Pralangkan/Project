$(document).ready(function () {
    $("#uploadcommand").DataTable({
      columns: [
        {
          data: "วัน/เดือน/ปี",
        },
        {
          data: "ชื่อคำสั่ง",
        },
        {
          data: "ประเภทคำสั่ง",
        },
        {
          data: "ไฟล์",
        },
        {
          data: "จัดการ",
        },
        // {
        //   data: "อำเภอ",
        // },
      ],
    });

    $("#server_file").click(function () {
    
      // รับข้อมูลจากฟอร์ม Modal
      
      var name_order = $("#name_order").val();
      var order_type = $("#order_type").val();
      var file = $("#file")[0].files[0];
  
      var formData = new FormData();
      formData.append('id_user',localStorage.getItem("id_user"));
      formData.append('order_type',order_type);
      formData.append('name_order',name_order);
      formData.append('file',file);
      // var id_user = $("#id_user").val();
      $.ajax({
        url: "general_inster_uploadcommand", // เปลี่ยนเป็น URL ที่ถูกต้องสำหรับไฟล์ PHP ที่จะใช้ในการเพิ่มข้อมูลสินค้า
        method: "POST",
        processData:false,
        contentType:false,
        data: formData,
  
        success: function (response) {
          console.log(response);
          var data = JSON.parse(response);
          if (data.status === 200) {
            alert("บันทึกข้อมูลสำเร็จ");
            window.location.href = "general_uploadcommand";
          } else {
            alert("เกิดข้อผิดพลาดในการบันทึกข้อมูล");
            window.location.href = "uploadcommand";
          }
        },
        error: function () {
          alert("เกิดข้อผิดพลาดในการส่งข้อมูล");
        },
      });
    });




  });