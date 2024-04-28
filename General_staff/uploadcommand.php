<?php include("../servers/connect.php"); ?>
<?php include("../header.php"); ?>
<div class="wrapper">
    <?php include('./navbar/sidebar.php'); ?>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <?php include('./navbar/navuser.php'); ?>
        <script src="./js/uploadcommand.js"></script>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <h2 class="m-0">อัพโหลดคำสั่งภายใน - ภายนอก </h2>
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="./home.php">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">อัพโหลดคำสั่งภายใน - ภายนอก</li>
                    </ol>
                </div>
            </div>
            <a href=""></a>
        </div>
        <div class="mx-3 mt-5">
            <div class="d-flex justify-content-end">
                <!-- <div>
                    <a href="#" class="btn btn-success mr-2">เพิ่มคำสั่งภายใน - ภายนอก</a>
                </div> -->
                <div class="mt-5">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        เพิ่มคำสั่งภายใน - ภายนอก
                    </button>
                </div>
            </div>
            <div class="mt-3">
                <table id="uploadcommand" class="table">
                    <thead>
                        <tr>
                            <th>วัน/เดือน/ปี</th>
                            <th>ชื่อคำสั่ง</th>
                            <th>ประเภทคำสั่ง</th>
                            <th>ไฟล์</th>
                            <th>จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        function ConvertToThaiDate($value, $short = '1', $need_time = '1', $need_time_second = '0')
                        {
                            $date_arr = explode(' ', $value);
                            $date = $date_arr[0];
                            if (isset($date_arr[1])) {
                                $time = $date_arr[1];
                            } else {
                                $time = '';
                            }
                            $value = $date;
                            if ($value != "0000-00-00" && $value != '') {
                                $x = explode("-", $value);
                                if ($short == false)
                                    $arrMM = array(1 => "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
                                else
                                    $arrMM = array(1 => "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
                                // return $x[2]." ".$arrMM[(int)$x[1]]." ".($x[0]>2500?$x[0]:$x[0]+543);
                                if ($need_time == '1') {
                                    if ($need_time_second == '1') {
                                        $time_format = $time != '' ? date('H:i:s น.', strtotime($time)) : '';
                                    } else {
                                        $time_format = $time != '' ? date('H:i น.', strtotime($time)) : '';
                                    }
                                } else {
                                    $time_format = '';
                                }

                                return (int)$x[2] . " " . $arrMM[(int)$x[1]] . " " . ($x[0] > 2500 ? $x[0] : $x[0] + 543) . " " . $time_format;
                            } else
                                return "";
                        }
                        $sql = "SELECT * FROM `order_inside` JOIN order_type ON order_inside.order_type = order_type.id_order ORDER BY order_inside.id desc;";

                        $result = $db->query($sql);
                        ?>
                        <?php
                        if ($result->rowCount() > 0) {
                            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                // แปลงวันที่ให้เป็นรูปแบบไทย
                                $newdate = ConvertToThaiDate($row['upload_date'], 0, 0);
                        ?>
                                <tr>
                                    <td> <?php echo $newdate ?> </td>
                                    <td> <?php echo $row['name_order'] ?> </td>
                                    <td> <?php echo $row['order_name'] ?> </td>
                                    <td> <?php echo $row['file'] ?> </td>
                                    <td><button type='button' class='btn btn-primary' onclick="getDataAndShowModal(<?php echo $row['id'] ?>)">เลือก</button></td>
                                </tr>

                        <?php   }
                        } else {
                            echo "0 results";
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">คำสั่งภายใน/ภายนอก</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="exampleModalContent">
                        <!-- ที่นี่จะแสดงไฟล์ PDF -->
                    </div>
                    <!-- <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div> -->
                </div>
            </div>
        </div>
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">เพิ่มคำร้อง</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mt-3 mx-3">
                            <div class="col-12 ">
                                <div class="form-group ">
                                    <label for="" style="font-size: 18px;">ชื่อคำสั่ง</label>
                                    <input type="text" class="form-control mt-2  text-right" placeholder="ชื่อคำสั่ง" id="name_order" name="name_order">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="" style="font-size: 18px;">ประเภทคำสั่ง</label>
                                    <select class="form-select mt-2" id="order_type" name="order_type">
                                        <option value="1">คำสั่งภายใน</option>
                                        <option value="2">คำสั่งภายนอก</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mt-3">
                            <div class=" mt-3">
                                <img id="uploaded_image_edit" src="#" alt="Selected Image" style="display:none; width: 75%; height: 75%;">
                                <label for="">ไฟล์คำสั่ง :</label>
                                <input type="file" id="file" onchange="displayImageEdit(this)" class="form-control">
                            </div>
                        </div>
                        <div class="form-group mb-3 mt-3">
                            <div class=" text-center">
                                <button type="submit" class="btn " id="server_file" style="background-color:#BB6AFB ; color:#FFFFFF">บันทึกข้อมูล</button>
                                <button type="submit" class="btn" style="background-color:#FF0505 ; color:#FFFFFF">ยกเลิก</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script>
         if(localStorage.getItem("id_type") != "4" && localStorage.getItem("user_id") == null){
        localStorage.clear()
        window.location.href ="../"
    }

        function displayImageEdit(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#uploaded_image_edit').attr('src', e.target.result).show();
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function getDataAndShowModal(id) {
            // ดึงข้อมูลจากเซิร์ฟเวอร์โดยใช้ AJAX
            $.ajax({
                url: 'get_file_data',
                method: 'POST',
                data: {
                    id: id
                },
                success: function(response) {
                    // แสดงข้อมูลที่ได้ในโมดัล
                    $('#exampleModalContent').html(response);
                    $('#exampleModal').modal('show');
                }
            });
        }
    </script>
    <?php include("../footer.php") ?>