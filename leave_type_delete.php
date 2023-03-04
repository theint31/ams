    
<?php
include_once "controller/leaveTypeController.php";
$id = $_POST['leaveTypeid'];

$leaveTypeController = new LeaveTypeController();
$result = $leaveTypeController->deleteLeaveTypes($id);
$results = $leaveTypeController->getallLeaveTypes();

// $data= "";
// $count =1;
// foreach($results as $results){
//     $data.="<tr class='text-center'>";
//     $data.="<td>".$count."</td>";
//     $data.="<td>".$results['type']."</td>";
//     $data.="<td>
//                 <a class=' btn btn-outline-success me-4 ' href=leave_type_view.php?id=".$results['id']."><i class='fa-solid fa-eye'></i></a>
//                 <a class='btn btn-outline-primary me-4' href=leave_type_edit.php?id=".$results['id']."><i class='fa-solid fa-pen'></i></a>
//                 <button class='btn btn-outline-danger me-2 submit' name='submit'><i class='fa-solid fa-trash-can'></i></button>
//             </td>";
//     $data.="</tr>";

//     $count++;

// }
// echo $data;

?>
