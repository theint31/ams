<?php 
    include_once 'controller/employeecontroller.php';

    $id = $_POST['eid'];
    $empcontroller = new EmployeeController();
    $result = $empcontroller->deleteEmp($id);

    if($result){
        $output="";
        $results = $empcontroller->getEmployees();
      
        $count=1;
        foreach($results as $result){
            $output .=  "<tr>";
            $output .= "<td>".$count."</td>";
            $output .= "<td>".$result['emp_name']."</td>";
            $output .=  "<td>".$result['nrc']."</td>";
            $output .=  "<td>".$result['emp_ph']."</td>";
            $output .=  "<td>".$result['emp_email']."</td>";
            // echo "<td>".$result['dob']."</td>";
            // echo "<td>".$result['gender']."</td>";
            // echo "<td>".$result['address']."</td>";
            $output .=  "<td eid=".$result['id'].">
                    <a class='btn btn-info' href=empview.php?id=".$result['id']."><i class='fa-solid fa-eye'></i></a>
                    <a class='btn btn-success' href=empedit.php?id=".$result['id']."><i class='fa-solid fa-pen'></i></a>
                    <a href='' class='btn btn-danger deleteemp'><i class='fa-solid fa-trash-can'></i></a>
                    <a href='' class='btn btn-secondary'><i class='fa-solid fa-paper-plane'></i></a>
                    
                </td>";
                $output .=  "</tr>";
            $count++;
        }
         echo $output;
    }

?>