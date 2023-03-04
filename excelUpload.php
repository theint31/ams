<?php

require('library/php-excel-reader/excel_reader2.php');
require('library/SpreadsheetReader.php');
// require('db_config.php');

include_once 'controller/attendanceController.php';
$attendanceController = new AttendanceController();

if(isset($_POST['Submit'])){

//   $mimes = ['text/xlsx','application/vnd.ms-excel','text/xls','application/vnd.oasis.opendocument.spreadsheet'];
//   if(in_array($_FILES["file"]["type"],$mimes)){
    $allowedFileType = [
        'application/vnd.ms-excel',
        'text/xls',
        'text/xlsx',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
    ];
    if (in_array($_FILES["file"]["type"], $allowedFileType)) {

    $uploadFilePath = 'uploads/'.basename($_FILES['file']['name']);
    move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath);

    $Reader = new SpreadsheetReader($uploadFilePath);

    $totalSheet = count($Reader->sheets());

    echo "You have total ".$totalSheet." sheets".

    $html="<table border='1'>";
    $html.="<tr><th>Emp Name</th><th>Date</th><th>Shift_Type</th></tr>";

    /* For Loop for all sheets */
    for($i=0;$i<$totalSheet;$i++){

      $Reader->ChangeSheet($i);

      foreach ($Reader as $Row)
      {
        $html.="<tr>";
        $emp_id = isset($Row[0]) ? $Row[0] : '';
        $date = isset($Row[1]) ? $Row[1] : '';
        $shift_type_id = isset($Row[2]) ? $Row[2] : '';
        $html.="<td>".$emp_id."</td>";
        $html.="<td>".$date."</td>";
        $html.="<td>".$shift_type_id."</td>";
        $html.="</tr>";

        //$query = "insert into items(title,description) values('".$title."','".$description."')";

        //$mysqli->query($query);
        $result = $attendanceController->addAttendance($emp_id,$date,$shift_type_id);
       }
    }
    $html.="</table>";
    echo $html;
    echo "<br />Data Inserted in dababase";
  }else { 
    die("<br/>Sorry, File type is not allowed. Only Excel file."); 
  }
}
?>