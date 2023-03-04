<?php
include_once 'controller/attendanceController.php';
$attendanceController = new AttendanceController();
$id = $_POST['id'];
echo $id;
$result = $attendanceController->attendanceDelete($id);
?>