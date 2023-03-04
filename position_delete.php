<?php 
    include_once 'controller/positioncontroller.php';

    $positioncontroller = new PositionController();
   
   $id = $_POST['pid'];
  
    $result = $positioncontroller->deletePosit($id);

    if($result){
        $output="";
        $results = $positioncontroller->getPositions();
      
        $count=1;
        foreach($results as $result){
            $output.= "<tr>";
            $output.= "<td>".$count."</td>";
            $output.= "<td>".$result['position_name']."</td>";
            $output.= "<td>".$result['dept_name']."</td>";
            $output.= "<td pid=".$result['id']."><a class='btn btn-info' href=positionview.php?id=".$result['id']."><i class='fa-solid fa-eye'></i></a>
                        <a class='btn btn-success' href=positionedit.php?id=".$result['id']."><i class='fa-solid fa-pen'></i></a>
                        <a href='' class='btn btn-danger deleteposit'><i class='fa-solid fa-trash-can'></i></a>
                        ";
            $output.= "</tr>";
            $count++;
        }
         echo $output;
    }

?>