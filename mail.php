<?php
 include_once 'controller/employeecontroller.php';

 $id=$_GET['eid'];
echo $id;
$empcontroller = new EmployeeController();
$results = $empcontroller->viewEmployee($id);
print_r($results);
$output = "";
foreach($results as $result){
    $output = $result['emp_email'];
}
echo $output;

?>

