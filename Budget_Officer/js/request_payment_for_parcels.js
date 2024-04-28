$(document).ready(function () {
  //กดเพิ่มเจ้าภาพ
  $(".add_fields3").click(function (e) {
    e.preventDefault();
    addfields3();
  });
  //
  //กดลบเจ้าภาพ
  $(".host3").on("click", ".remove_field", function (e) {
    e.preventDefault();
    $(this).parent("div").remove();
    p--;
    x--;
  });

  $("#server_from").click(function () {
    // รับข้อมูลจากฟอร์ม Modal
    let addIdValues = [];
    $('input[name="nub_id[]"]').each(function () {
      addIdValues.push($(this).val());
    });

    let product_name1 = [];
    $('input[name="input_host_name1[]"]').each(function () {
      product_name1.push($(this).val());
    });

    let product_name2 = [];
    $('input[name="input_host_name2[]"]').each(function () {
      product_name2.push($(this).val());
    });

    let product_name3 = [];
    $('input[name="input_host_name3[]"]').each(function () {
      product_name3.push($(this).val());
    });

    let product_name4 = [];
    $('input[name="input_host_name4[]"]').each(function () {
      product_name4.push($(this).val());
    });

    let product_name5 = [];
    $('input[name="input_host_name5[]"]').each(function () {
      product_name5.push($(this).val());
    });

    let product_name6 = [];
    $('input[name="input_host_name6[]"]').each(function () {
      product_name6.push($(this).val());
    });
    var name = $("#name").val();
    var position = $("#position").val();
    var contact_number = $("#contact_number").val();

    $.ajax({
      url: "inster_request_payment_for_parcels", // เปลี่ยนเป็น URL ที่ถูกต้องสำหรับไฟล์ PHP ที่จะใช้ในการเพิ่มข้อมูลสินค้า
      method: "POST",
      data: {
        user_id: localStorage.getItem("user_id"),
        name: name,
        position: position,
        contact_number: contact_number,
        addIdValues: addIdValues,
        product_name1: product_name1,
        product_name2: product_name2,
        product_name3: product_name3,
        product_name4: product_name4,
        product_name5: product_name5,
        product_name6: product_name6,
      },
      success: function (response) {
        console.log(response);
        var data = JSON.parse(response);
        if (data.status === 200) {
          Swal.fire({
            title: "ยื่นคำร้องสำเร็จ!",
            text: response.message,
            icon: "success",
            confirmButtonText: "ยืนยัน", // Change the text of the confirmation button
          }).then((result) => {
            if (result.isConfirmed) {
              location.reload(); // Reload the page after confirmation
            }
          });
        } else {
          alert("เกิดข้อผิดพลาดในการบันทึกข้อมูล");
          window.location.href = "submit_a_complaint";
        }
      },
      error: function () {
        alert("เกิดข้อผิดพลาดในการส่งข้อมูล");
      },
    });
  });
});
var x = 1;
var p = 1;

function addfields3() {
  // x++;
  $(".host3").append(` 
    <div class="mt-2 text-center">
    <div class="row">
        <input type="hidden" name="nub_id[]" value = "" />
        <div class="col-1 mt-2">
            <div class="form-group">
                <label >ลำดับ</label>
                <input type="text"  class="form-control mt-2" placeholder="${p++}" style="background-color: #e9ecef;" readonly>
            </div>
        </div>
        <div class="col-4 mt-2">
            <div class="form-group">
                <label for="" style="font-size: 18px;">รายการสิ่งของ</label>
                <input type="text" name="input_host_name1[]"  class="form-control mt-2" placeholder="รายการสิ่งของ">
            </div>
        </div>
        <div class="col-2 mt-2">
            <div class="form-group">
                <label for="" style="font-size: 18px;">หน่วยนับ</label>
                <input type="text" name="input_host_name2[]"  class="form-control mt-2" placeholder="หน่วยนับ">
            </div>
        </div>
        <div class="col-2 mt-2">
            <div class="form-group">
                <label for="" style="font-size: 18px;">ราคาต่อหน่วย</label>
                <input type="text" name="input_host_name3[]"  class="form-control mt-2" placeholder="ราคาต่อหน่วย">
            </div>
        </div>
        <div class="col-2 mt-2">
            <div class="form-group">
                <label for="" style="font-size: 18px;">เบิก</label>
                <input type="text" name="input_host_name4[]"  class="form-control mt-2" placeholder="เบิก">
            </div>
        </div>
        <div class="col-2 mt-2">
            <div class="form-group">
                <label for="" style="font-size: 18px;">จ่าย</label>
                <input type="text" name="input_host_name5[]"  class="form-control mt-2" placeholder="จ่าย">
            </div>
        </div>
        <div class="col-2 mt-2">
            <div class="form-group">
                <label for="" style="font-size: 18px;">หมายเหตุ</label>
                <input type="text" name="input_host_name6[]"  class="form-control mt-2" placeholder="หมายเหตุ">
            </div>
        </div>
    </div>
  <div class ="mt-3"></div>
      <a href="javascript:void(0);" style="width: 150px; height:40px" class="btn btn-danger remove_field ">ลบ</a>
  </div> 
  </div>`);
}
