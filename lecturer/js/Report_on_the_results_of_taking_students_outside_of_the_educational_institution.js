$(document).ready(function () {
  //กดเพิ่มเจ้าภาพ
  $(".add_fields1").click(function (e) {
    e.preventDefault();
    addfields1();
  });
  //
  //กดลบเจ้าภาพ
  $(".host1").on("click", ".remove_field", function (e) {
    e.preventDefault();
    $(this).parent("div").remove();
    p--;
    x--;
  });
  //
});
var x = 1;
var p = 1;

function addfields1() {
  x++;
  $(".host1").append(` 
    <div class=" mt-2">
   
    <input type="hidden" name="nub_id[]" value = "0" />
<label >ชื่อครูผู้ควบคุมคนที่ ${p++} :</label>
<input type="text" name="input_host_name[]" id="" class="form-control" >
<div class ="mt-2"></div>
<a href="javascript:void(0);" class="btn btn-primary remove_field ">ลบ</a>

</div>`);
}
