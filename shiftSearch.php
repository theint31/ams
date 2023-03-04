<?php 
    include_once 'controller/shfassigncontroller.php';

   

    $name = $_POST['eName'];
    $date = $_POST['date'];

    $shfassigncontroller=new ShfassignController();
    $results = $shfassigncontroller->searchAttendance($name,$date);
    print_r($results) ;

    $output="";
    $count = 1;
    foreach($results as $result){
        $output .="<tr>";
        $output .="<td>".$count."</td>";
        $output .="<td>".$result['emp_name']."</td>";
        $output .="<td>".$result['shift_name']."</td>";
        $output .="<td>".$result['start_date']."</td>";
        $output .="<td>".$result['end_date']."</td>";
        $output.= "</tr>";
        $count++;
    }
    echo $output;
?>