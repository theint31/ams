    
<?php

use Phppot\DataSource;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

require_once ('vendor/autoload.php');

require('library/php-excel-reader/excel_reader2.php');
require('library/SpreadsheetReader.php');

include_once "controller/attendanceController.php";

$attendanceController = new AttendanceController();
$attendanceResult = $attendanceController->getAllAttendances();


if (isset($_POST["import"])) {

    $allowedFileType = [
        'application/vnd.ms-excel',
        'text/xls',
        'text/xlsx',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
    ];

    if (in_array($_FILES["file"]["type"], $allowedFileType)) {

        $targetPath = 'uploads/' . $_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

        $Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

        $spreadSheet = $Reader->load($targetPath);
        $excelSheet = $spreadSheet->getActiveSheet();
        $spreadSheetAry = $excelSheet->toArray();
        $sheetCount = count($spreadSheetAry);
        //var_dump ($spreadSheetAry);

        

        

        foreach ($spreadSheetAry as $Row)
      {
       
        $emp_id = isset($Row[0]) ? $Row[0] : '';
        $date = isset($Row[1]) ? $Row[1] : '';
        $shift_type_id = isset($Row[2]) ? $Row[2] : '';
        $time = strtotime($date);
        $dateFormat = date('Y-m-d',$time);
       // echo $emp_id."<br>";
        //echo $date."<br>";
        

        //$query = "insert into items(title,description) values('".$title."','".$description."')";

        //$mysqli->query($query);
        $result = $attendanceController->addAttendance($emp_id,$dateFormat,$shift_type_id);
       }
    } else {
        $type = "error";
        $message = "Invalid File Type. Upload Excel File.";
    }
}




include_once "layouts/header.php";
//include_once "includes/db.php";

//var_dump($attendanceResult);


?>
<div id="app">
        <?php
         include_once "layouts/sidebar.php";
        ?>
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <h1>Employee Attendance Management System</h1>
        <div class="mt-5">
            <div class="mb-4 row">
                <div class="col-md4">
                    <a href="attendance_create.php" class="btn btn-outline-success">Add New Attendance List</a>
                </div>
            </div>
            <div class="row mb-4">
                <form action="" method="post"
                    name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
                    <div>
                        <label>Choose Excel
                            File</label> <input type="file" name="file"
                            id="file" accept=".xls,.xlsx">
                        <button type="submit" id="submit" name="import"
                            class="btn-submit">Import</button>
                
                    </div>
                
                </form>

            </div>
            <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>
            <div class="row mb-4">
                <div class="col-md-4">
                    <input type="text" name="eName" id="eName" class="form-control">
                </div>
                <div class="col-md-4">
                    <input type="date" name="date" id="date" class="form-control">
                </div>
                <div class="col-md-4">
                    <button class="btn btn-outline-success" id="search">Search</button>
                </div>
            </div>


        <table class="table">
            <thead>
                <tr class = 'text-center'>
                    <th>No</th>
                    <th>Employee Name</th>
                    <th>Date</th>
                    <th>Shift Type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="tbody">
                <?php
                $count = 1;
                foreach($attendanceResult as $attendance){
                    echo "<tr class='text-center'>";
                    echo "<td>".$count."</td>";
                    echo "<td>".$attendance['emp_name']."</td>";
                    echo "<td>".$attendance['date']."</td>";
                    echo "<td>".$attendance['shift_name']."</td>";
                    echo "<td aid=".$attendance['id'].">
                    <a class='me-4 btn btn-outline-success' href=attendance_view.php?id=".$attendance['id']."><i class='fa-solid fa-eye'></i></a>
                    <a class='me-4 btn btn-outline-primary' href=attendance_edit.php?id=".$attendance['id']."><i class='fa-solid fa-pen'></i></a>
                    <button class=' me-2 btn btn-outline-danger attendanceDelete' href='attendance_delete.php'><i class='fa-solid fa-trash-can'></i></button>
                    
                    </td>";
                    echo "</tr>";
                    $count++;
                }
                ?>
            </tbody>
        </table>
        <?php
                // foreach($result as $row){
                //     echo "<tr>";
                //     echo "<td>".$row['emp_name']."</td>";
                //     echo "<td>".$row['date']."</td>";
                //     echo "<td>".$row['shiftName']."</td>";
                //     echo "</tr>";
                // }

            ?>
        </div>

        

        <footer>
            
        </footer>
    </div>
</div>
<?php
include_once "layouts/footer.php";
?>
