<?php
use Phppot\DataSource;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;




require_once ('vendor/autoload.php');

require('library/php-excel-reader/excel_reader2.php');
require('library/SpreadsheetReader.php');
// require('db_config.php');

include_once 'controller/attendanceController.php';
$attendanceController = new AttendanceController();


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
        var_dump ($spreadSheetAry);

        

        /*for ($i = 0; $i <= $sheetCount; $i ++) {

            
            /*$name = "";
            if (isset($spreadSheetAry[$i][0])) {
                $name = mysqli_real_escape_string($conn, $spreadSheetAry[$i][0]);
            }
            $description = "";
            if (isset($spreadSheetAry[$i][1])) {
                $description = mysqli_real_escape_string($conn, $spreadSheetAry[$i][1]);
            }

            if (! empty($name) || ! empty($description)) {
                $query = "insert into tbl_info(name,description) values(?,?)";
                $paramType = "ss";
                $paramArray = array(
                    $name,
                    $description
                );
                $insertId = $db->insert($query, $paramType, $paramArray);
                // $query = "insert into tbl_info(name,description) values('" . $name . "','" . $description . "')";
                // $result = mysqli_query($conn, $query);

                if (! empty($insertId)) {
                    $type = "success";
                    $message = "Excel Data Imported into the Database";
                } else {
                    $type = "error";
                    $message = "Problem in Importing Excel Data";
                }
            }
        }*/
       

        foreach ($spreadSheetAry as $Row)
      {
       
        $emp_id = isset($Row[0]) ? $Row[0] : '';
        $date = isset($Row[1]) ? $Row[1] : '';
        $shift_type_id = isset($Row[2]) ? $Row[2] : '';
        $time = strtotime($date);
        $dateFormat = date('Y-m-d',$time);
        echo $emp_id."<br>";
        echo $date."<br>";
        

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
        

        <h4>Import Excel File into MySQL Database using PHP</h4>
    
    <div class="row mt-5">
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
    
  
 
  
    <!-- <table class="table">
        <thead>
            <tr>
                <th>Emp_Id</th>
                <th>Date</th>
                <th>ShifType_id</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($result as $row){
                    echo "<tr>";
                    echo "<td>".$row['emp_name']."</td>";
                    echo "<td>".$row['date']."</td>";
                    echo "<td>".$row['shiftName']."</td>";
                    echo "</tr>";
                }

            ?>
        </tbody>
    </table> -->



        <footer>
            
        </footer>
    </div>
</div>
<?php
include_once "layouts/footer.php";
?>
