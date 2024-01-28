
$(document).ready(function() {
    //กดเพิ่มเจ้าภาพ
    $(".add_fields2").click(function(e) {
        e.preventDefault();
        addfields2()
    });
    //
    //กดลบเจ้าภาพ
    $(".host2").on("click", ".remove_field", function(e) {
        e.preventDefault();
        $(this).parent('div').remove();
        p--;
        x--;
    })
    //
})
var x = 1;
var p = 1;

function addfields2() {
    // x++;
    $(".host2").append(` 

<div class="  mt-2">
<div class="text-center">
<table class="table">
<thead>
<tr>
  <th scope="col">ลำดับที่</th>
  <th scope="col">วัน/เดือน/ปี</th>
  <th scope="col">สถานที่เข้าร่วมกิจกรรม</th>
  <th scope="col">รายการกิจกรรม</th>
  <th scope="col">ชื่อนักเรียนที่เข้าร่วมกิจกรรม</th>
  <th scope="col">ชั้น</th>
  <th scope="col">ผลการเข้าร่วมกิจกรรม</th>
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
  <td><input type="text" class="form-control mt-2" placeholder=""></td>
  
</tr>
</table>
<div class ="mt-2"></div>
    <a href="javascript:void(0);" class="btn btn-danger remove_field ">ลบ</a>
</div> 
</div>`);
}




