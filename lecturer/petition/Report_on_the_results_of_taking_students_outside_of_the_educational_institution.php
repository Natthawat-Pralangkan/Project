<?php include("../../servers/connect.php"); ?>
<?php include("../../header.php"); ?>

<div style="  display: flex;flex-direction: row;">
    <?php include('./../navbar/sidebar.php'); ?>
    <div class="content-wrapper">
        <?php include('./../navbar/navuser.php'); ?>
        <!-- <script src="./js/submit_a_complaint.js"></script> -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <h2 class="m-0">ยื่นคำร้อง</h2>
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="./home.php">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">ยื่นคำร้อง</li>
                    </ol>
                </div>
            </div>
            <a href=""></a>
        </div>
        <div class="container mt-5">
            <h1 class="text-center">เพิ่มคำร้อง</h1>
            <div class="row ">
                <div class="col-4 ">
                    <div class="form-group ">
                        <label for="" style="font-size: 18px;">ชื่อคำร้อง</label>
                        <input type="text" class="form-control mt-2" placeholder="เพิ่มคำร้อง รายงานผลการพานักเรียนไปนอกสถานศึกษา ">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="" style="font-size: 18px;">ชื่อผู้ยื่น</label>
                        <input type="text" class="form-control mt-2" placeholder="ชื่อผู้ยื่น">
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-2">
                    <div class="form-group ">
                        <label for="" style="font-size: 18px;">วันที่</label>
                        <input type="text" class="form-control mt-2" placeholder="วันที่">
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label for="" style="font-size: 18px;">เดือน</label>
                        <input type="text" class="form-control mt-2" placeholder="เดือน">
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label for="" style="font-size: 18px;">พ.ศ.</label>
                        <input type="text" class="form-control mt-2" placeholder="พ.ศ.">
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-8">
                    <div class="form-group">
                        <label for="" style="font-size: 18px;">ชื่อสถานที่</label>
                        <input type="text" class="form-control mt-2" placeholder="ชื่อสถานที่">
                    </div>
                </div>


                <div class="col-4">
                    <div class="form-group">
                        <label for="" style="font-size: 18px;">จำนวนนักเรียน</label>
                        <input type="text" class="form-control mt-2" placeholder="จำนวนนักเรียน">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="" style="font-size: 18px;">จำนวนครูผู้ควบคุม</label>
                        <input type="text" class="form-control mt-2" placeholder="ครูผู้ควบคุม">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="" style="font-size: 18px;">เหตุในการไปควบคุม</label>
                        <textarea name="std_address" required placeholder="เหตุในการไปควบคุม" class="form-control mt-2"></textarea>
                    </div>
                </div>


            </div>
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label for="" style="font-size: 18px;">วันที่เดินทาง</label>
                        <input type="text" class="form-control mt-2" placeholder="วันที่">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="" style="font-size: 18px;">เดือน</label>
                        <input type="text" class="form-control mt-2" placeholder="เดือน">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="" style="font-size: 18px;">พ.ศ.</label>
                        <input type="text" class="form-control mt-2" placeholder="พ.ศ.">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="" style="font-size: 18px;">เวลาเดินทาง</label>
                        <input type="text" class="form-control mt-2" placeholder="เวลาเดินทาง">
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-4">
                    <div class="form-group">
                        <label for="" style="font-size: 18px;">เส้นทางในการเดินทาง</label>
                        <textarea name="std_address" required placeholder="เส้นทางในการเดินทาง" class="form-control mt-2"></textarea>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="" style="font-size: 18px;">พาหนะที่ใช้เดินทาง</label>
                        <input type="text" class="form-control mt-2" placeholder="พาหนะที่ใช้เดินทาง">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label for="" style="font-size: 18px;">วันที่เดินทางกลับ</label>
                        <input type="text" class="form-control mt-2" placeholder="วันที่">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="" style="font-size: 18px;">เดือน</label>
                        <input type="text" class="form-control mt-2" placeholder="เดือน">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="" style="font-size: 18px;">พ.ศ.</label>
                        <input type="text" class="form-control mt-2" placeholder="พ.ศ.">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="" style="font-size: 18px;">เวลา</label>
                        <input type="text" class="form-control mt-2" placeholder="เวลาเดินทาง">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="" style="font-size: 18px;">รายละเอียดการเดินทางครั้งนี้</label>
                        <textarea name="std_address" required placeholder="รายละเอียดการเดินทางครั้งนี้" class="form-control mt-2"></textarea>
                    </div>
                </div>
                <div class="col-4 mt-4">
                    <div class="host"></div>
                    <div class="row justify-content-center form-group ">
                        <!-- <div class="col-12 col-md-4 col-lg-4"> -->
                        <!-- <div class="text-center"> -->
                        <button class="add_fields btn btn-primary" style="font-size: 16px;">เพิ่มชื่อครูผู้ควบคุม</button>
                    </div>
                    <!-- </div> -->
                    <!-- </div> -->
                    <!-- </div> -->
                </div>
                <div class="form-group mb-3">
                    <div class=" text-center">
                        <button type="submit" class="btn "><a href="../submit_a_complaint.php" class="btn" style="background-color:#BB6AFB ; color:#FFFFFF">บันทึกข้อมูล</a></button>
                        <button type="submit" class="btn" style="background-color:#FF0505 ; color:#FFFFFF">ยกเลิก</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                //กดเพิ่มเจ้าภาพ
                $(".add_fields").click(function(e) {
                    e.preventDefault();
                    addfields()
                });
                //
                //กดลบเจ้าภาพ
                $(".host").on("click", ".remove_field", function(e) {
                    e.preventDefault();
                    $(this).parent('div').remove();
                    p--;
                    x--;
                })
                //
            })
            var x = 1;
            var p = 1;

            function addfields() {
                x++;
                $(".host").append(` 
<div class="row  mt-2">
    <div class="col-4">
        <input type="hidden" name="nub_id[]" value = "0" />
        <label >ชื่อครูผู้ควบคุม ${p++} :</label>
        <input type="text" name="input_host_name[]" id="" class="form-control" >
    <div class ="mt-2"></div>
        <a href="javascript:void(0);" class="btn btn-primary remove_field ">ลบ</a>
    </div> 
</div>`);
            }
        </script>
        <?php include("../../footer.php") ?>