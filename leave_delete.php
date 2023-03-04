<?php
include_once 'controller/leaveController.php';
$leaveController = new LeaveController();

$id = $_POST['id'];
echo $id;
$result = $leaveController->deleteLeave($id);
?>