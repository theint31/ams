<?php 
   include_once 'controller/departmentcontroller.php';
   
   $id = $_POST['did'];
   $deptcontroller = new DepartmentController();
   

    
   
    $result = $deptcontroller->deleteDept($id);

    if($result){
        $output="";
        $results = $deptcontroller->getDepartments();
      
        $count=1;
                        foreach($results as $result){
                            $output .= "<tr>";
                            $output .= "<td>".$count."</td>";
                            $output .= "<td>".$result['dept_name']."</td>";
                            $output .= "<td>".$result['dept_ph']."</td>";
                            $output .= "<td>".$result['dept_email']."</td>";
                            $output .= "<td did=".$result['id']."><a class='btn btn-info' href=departmentview.php?id=".$result['id']."><i class='fa-solid fa-eye'></i></a>
                            <a class='btn btn-success' href=departmentedit.php?id=".$result['id']."><i class='fa-solid fa-pen'></i></a>
                           
                            <a href='' class='btn btn-danger deletedept'><i class='fa-solid fa-trash-can'></i></a>";
                            $output .= "</tr>";
                            $count++;
        }
         echo $output;
    }

?>