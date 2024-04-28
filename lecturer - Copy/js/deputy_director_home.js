function fetchStatusCount_3(idStatus_3) {
  $.ajax({
    url: "deputy_director_get_id_status_3",
    method: "POST",
    data: {
      id_status: 3, // ส่งค่านี้ไปด้วยหากสคริปต์ PHP ของคุณต้องการ
    },
    success: function (response) {
      $("#idStatus_3").text(response.count); // แสดงผลข้อมูลใน element ที่มี id เป็น "idStatus"
    },
    error: function (error) {
      console.error("Error fetching status count:", error);
    },
  });
}

// เรียกใช้ฟังก์ชันเมื่อหน้าเว็บโหลดเสร็จ
$(document).ready(function () {
  fetchStatusCount_3(3); // เรียกใช้ฟังก์ชันเพื่อดึงข้อมูล id_status ที่เป็น 1
});

function fetchStatusCount_4(idStatus_4) {
  $.ajax({
    url: "deputy_director_get_id_status_4",
    method: "POST",
    data: {
      id_status: 4, // ส่งค่านี้ไปด้วยหากสคริปต์ PHP ของคุณต้องการ
    },
    success: function (response) {
      $("#idStatus_4").text(response.count); // แสดงผลข้อมูลใน element ที่มี id เป็น "idStatus"
    },
    error: function (error) {
      console.error("Error fetching status count:", error);
    },
  });
}

// เรียกใช้ฟังก์ชันเมื่อหน้าเว็บโหลดเสร็จ
$(document).ready(function () {
  fetchStatusCount_4(4); // เรียกใช้ฟังก์ชันเพื่อดึงข้อมูล id_status ที่เป็น 1
});

function fetchTotalPetitions(idStatusArray) {
  $.ajax({
    url: "deputy_director_get_id_status", // Adjust this URL to the correct endpoint
    method: "POST",
    data: {},
    success: function (response) {
      // Assuming response contains a 'count' property as per the PHP script
      $("#idStatusArray").text(response.count);
    },
    error: function (error) {
      console.error("Error fetching total petitions:", error);
    },
  });
}
$(document).ready(function () {
  fetchTotalPetitions([1, 2, 3, 4, 5, 6, 7]); // Example array passed, not used in PHP as shown
});

$(document).ready(function () {
  $.ajax({
    url: "deputy_director_get_count_personnel",
    method: "POST",
    dataType: "json",
    success: function (data) {
      console.log(data);
      if (data.status === "success") {
        $("#userCount").text(data.userCount);
      } else {
        $("#userCount").text("เกิดข้อผิดพลาดในการดึงข้อมูล");
      }
    },
    error: function () {
      $("#userCount").text("ไม่สามารถดึงข้อมูลได้");
    },
  });
});

$(document).ready(function () {
  // When the modal is shown
  $("#exampleModal5").on("show.bs.modal", function (e) {
    // Fetch data through AJAX
    $.ajax({
      url: "deputy_director_get_all_staff.php", // Adjusted URL to include .php extension
      method: "GET",
      success: function (response) {
        // Insert the response data into tbody within the modal
        $("#exampleModal5 .table tbody").html(response); // Adjusted selector to target tbody within the modal
      },
      error: function (xhr, status, error) {
        console.error(error);
        // Display an error message if data fetching fails
        $("#exampleModal5 .table tbody").html(
          '<tr><td colspan="3">เกิดข้อผิดพลาดในการดึงข้อมูล</td></tr>'
        ); // Adjusted selector
      },
    });
  });

  $("#exampleModal4").on("show.bs.modal", function (e) {
    // เรียกใช้งานข้อมูลผ่าน AJAX
    $.ajax({
      url: "deputy_director_get_all_requests", // เปลี่ยนเป็นเส้นทางของสคริปต์ PHP ของคุณ
      method: "GET",
      data: {}, // ส่งพารามิเตอร์ user_id หากคุณมีการใช้งาน
      success: function (response) {
        $("#all_requests").html(response); // แทรกข้อมูลที่ได้รับเข้าไปใน tbody
      },
      error: function (xhr, status, error) {
        console.error(error);
        $("#all_requests").html(
          '<tr><td colspan="3">เกิดข้อผิดพลาดในการดึงข้อมูล</td></tr>'
        ); // แสดงข้อความผิดพลาด
      },
    });
  });

  $("#exampleModal2").on("show.bs.modal", function (e) {
    // เรียกใช้งานข้อมูลผ่าน AJAX
    $.ajax({
      url: "deputy_director_get_all_approve", // เปลี่ยนเป็นเส้นทางของสคริปต์ PHP ของคุณ
      method: "GET",
      data: {
        id_status: 4, // ส่งค่านี้ไปด้วยหากสคริปต์ PHP ของคุณต้องการ
      },
      success: function (response) {
        $("#all_approve").html(response); // แทรกข้อมูลที่ได้รับเข้าไปใน tbody
      },
      error: function (xhr, status, error) {
        console.error(error);
        $("#all_approve").html(
          '<tr><td colspan="3">เกิดข้อผิดพลาดในการดึงข้อมูล</td></tr>'
        ); // แสดงข้อความผิดพลาด
      },
    });
  });

  $("#exampleModal1").on("show.bs.modal", function (e) {
    // เรียกใช้งานข้อมูลผ่าน AJAX
    $.ajax({
      url: "deputy_director_get_all_waiting_for_approval", // เปลี่ยนเป็นเส้นทางของสคริปต์ PHP ของคุณ
      method: "GET",
      data: {
        id_status: 3, // ส่งค่านี้ไปด้วยหากสคริปต์ PHP ของคุณต้องการ
      },
      success: function (response) {
        $("#all_waiting_for_approval").html(response); // แทรกข้อมูลที่ได้รับเข้าไปใน tbody
      },
      error: function (xhr, status, error) {
        console.error(error);
        $("#all_waiting_for_approval").html(
          '<tr><td colspan="3">เกิดข้อผิดพลาดในการดึงข้อมูล</td></tr>'
        ); // แสดงข้อความผิดพลาด
      },
    });
  });
});
