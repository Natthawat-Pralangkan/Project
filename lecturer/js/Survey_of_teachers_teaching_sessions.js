$(document).ready(function () {
  //กดเพิ่มเจ้าภาพ
  $(".add_fields6").click(function (e) {
    e.preventDefault();
    addfields6();
  });
  //
  //กดลบเจ้าภาพ
  $(".host6").on("click", ".remove_field", function (e) {
    e.preventDefault();
    $(this).parent("div").remove();
    p--;
    x--;
  });
  //
});
var x = 1;
var p = 1;

function addfields6() {
  // x++;
  $(".host6").append(` 
    
<div class="mt-2">
    <div class="row">
        <div class="col-4 mt-2">
            <div class="form-group">
                <label for="" style="font-size: 18px;">รายชื่อครูผู้สอน</label>
                <input type="text" class="form-control mt-2" placeholder="รายชื่อครูผู้สอน">
            </div>
        </div>
        <div class="col-4 mt-2">
            <div class="form-group">
                <label for="" style="font-size: 18px;">รายวิชา</label>
                <input type="text" class="form-control mt-2" placeholder="รายวิชา">
            </div>
        </div>
        <div class="col-4 mt-2">
            <div class="form-group">
                <label for="" style="font-size: 18px;">รหัส</label>
                <input type="text" class="form-control mt-2" placeholder="รหัส">
            </div>
        </div>
        <div class="col-4 mt-2">
            <div class="form-group">
                <label for="" style="font-size: 18px;">ชั้น/ห้อง</label>
                <input type="text" class="form-control mt-2" placeholder="ชั้น/ห้อง">
            </div>
        </div>
        <div class="col-4 mt-2">
            <div class="form-group">
                <label for="" style="font-size: 18px;">คาบสอน/ห้อง</label>
                <input type="text" class="form-control mt-2" placeholder="คาบสอน/ห้อง">
            </div>
        </div>
        <div class="col-4 mt-2">
            <div class="form-group">
                <label for="" style="font-size: 18px;">รวมคาบสอน</label>
                <input type="text" class="form-control mt-2" placeholder="รวมคาบสอน">
            </div>
        </div>
        <div class="col-4 mt-2">
            <div class="form-group">
                <label for="" style="font-size: 18px;">สอนวิชาคู่กับครู</label>
                <input type="text" class="form-control mt-2" placeholder="สอนวิชาคู่กับครู">
            </div>
        </div>
        <div class="col-4 mt-2">
            <div class="form-group">
                <label for="" style="font-size: 18px;">ชื่อกิจกรรม/ม.ต้น/ม.ปลาย</label>
                <input type="text" class="form-control mt-2" placeholder="ชื่อกิจกรรม/ม.ต้น/ม.ปลาย">
            </div>
        </div>
    </div>
    <div class ="mt-2">
        <a href="javascript:void(0);" class="btn btn-danger remove_field ">ลบ</a>
    </div>
</div>`);
}
