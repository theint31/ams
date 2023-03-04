<?php 
include_once "controller/shfassigncontroller.php";
include_once "controller/shftypecontroller.php";

    $name=$_POST['ename'];
    $start = $_POST['start'];
     $end = $_POST['end'];
   echo $name.$start.$end;
    $shiftcontroller = new ShfassignController();
    $results = $shiftcontroller->selectshift($name,$start,$end);

    $shftypecontroller=new ShftypeController();
    $shifts=$shftypecontroller->getShifttype();

    print_r($results[0]['id']);
    $output="";
     foreach($shifts as $shift)
     {
        //echo "<option value=".if($results[0]['id']==$shift['id']) echo disabled.">";
        // $output .= "<option value=".$shift['id'].">";
        // $output .= $shift['shift_name'];
        // $output .= "</option>";

        //echo "<option value=".if($results[0]['id']==$shift['id']).">";

        $output.="<option value='".
        $shift['id']."'";

        if($results[0]['id']==$shift['id'])
            $output.= "disabled >";
    
            else
            $output.=">";
         $output .= $shift['shift_name']."</option>";
        
    }     
    echo $output;                       
    //echo $start;
   // echo $end;
?>