$(document).ready(function () {
  //กดเพิ่มเจ้าภาพ
  $(".add_fields4").click(function (e) {
    e.preventDefault();
    addfields4();
  });
  //
  //กดลบเจ้าภาพ
  $(".host4").on("click", ".remove_field", function (e) {
    e.preventDefault();
    $(this).parent("div").remove();
    p--;
    x--;
  });
  //
});
var x = 1;
var p = 1;

function addfields4() {
  // x++;
  $(".host4").append(` 
<div class="  mt-2">
<div class="text-center">
<table class="table">
<thead>
<tr>
  <th scope="col">ลำดับ</th>
  <th scope="col">ชื่อ - สกุล</th>
  <th scope="col">รหัสวิชา</th>
  <th scope="col">กลุ่มสาระฯ/งาน</th>
  <th scope="col">วันที่</th>
  <th scope="col">คาบที่</th>
  <th scope="col">เหตุผล</th>
</tr>
</thead>
<tbody>
<tr>
  <th scope="row">${p++}</th>
  <td><input type="text" class="form-control mt-2" placeholder=""></td>
  <td><input type="text" class="form-control mt-2" placeholder=""></td>
  <td><input type="text" class="form-control mt-2" placeholder=""></td>
  <td><input type="text" class="form-control mt-2" placeholder=""></td>
  <td><input type="text" class="form-control mt-2" placeholder=""></td>
  <td><textarea class="form-control" placeholder="หมายเหตุ" id="floatingTextarea"></textarea>
  
</tr>
</table>
<div class ="mt-2"></div>
    <a href="javascript:void(0);" class="btn btn-danger remove_field ">ลบ</a>
</div> 
</div>`);
}
