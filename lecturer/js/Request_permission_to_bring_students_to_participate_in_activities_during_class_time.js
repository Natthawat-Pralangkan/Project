
$(document).ready(function() {
    //กดเพิ่มเจ้าภาพ
    $(".add_fields8").click(function(e) {
        e.preventDefault();
        addfields8()
    });
    //
    //กดลบเจ้าภาพ
    $(".host8").on("click", ".remove_field", function(e) {
        e.preventDefault();
        $(this).parent('div').remove();
        p--;
        x--;
    })
    //
})
var x = 1;
var p = 1;

function addfields8() {
    // x++;
    $(".host8").append(` 

    <div class="mt-2">
    <div class="row">
        <div class="col-2 mt-2">
            <div class="form-group">
                <label for="" style="font-size: 18px;">ลำดับที่</label>
                <input type="text" class="form-control mt-2" placeholder="${p++}" disabled>
            </div>
        </div>
        <div class="col-4 mt-2">
            <div class="form-group">
                <label for="" style="font-size: 18px;">ชื่อ-สกุล</label>
                <input type="text" class="form-control mt-2" placeholder="ชื่อ-สกุล">
            </div>
        </div>
        <div class="col-2 mt-2">
            <div class="form-group">
                <label for="" style="font-size: 18px;">ชั้น</label>
                <input type="text" class="form-control mt-2" placeholder="ชั้น">
            </div>
        </div>
        <div class="col-2 mt-2">
            <div class="form-group">
                <label for="" style="font-size: 18px;">เวลา</label>
                <input type="text" class="form-control mt-2" placeholder="เวลา">
            </div>
        </div>
        <div class="col-4 mt-2">
            <div class="form-group">
                <label for="" style="font-size: 18px;">สถานที่</label>
                <input type="text" class="form-control mt-2" placeholder="สถานที่">
            </div>
        </div>
        <div class="col-4 mt-2">
            <div class="form-group">
                <label for="" style="font-size: 18px;">หมายเหต</label>
                <textarea class="form-control" placeholder="หมายเหต" id="floatingTextarea2"></textarea>
            </div>
        </div>
    </div>
    <div class ="mt-2 text-center">
        <a href="javascript:void(0);" class="btn btn-danger remove_field ">ลบ</a>
    </div>
</div>`);
}




