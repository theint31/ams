<?php 
    include_once 'controller/shiftViewcontroller.php';

    $positioncontroller = new ShiftViewController();
    $year = $_POST['year'];
    $month = $_POST['month'];
    //  echo $year;
    //  echo $month;
    $results = $positioncontroller->getshiftView($month,$year);

    $output="";
    $c_year = date($year);
    $c_month = date($month);

    //no of days in each month
    $cd;
    

    //group by
    function group_by($key, $data) {
        $result = array();
    
        foreach($data as $val) {
            if(array_key_exists($key, $val)){
                $result[$val[$key]][] = $val;
            }else{
                $result[""][] = $val;
            }
        }
    
        return $result;
    }

    foreach($results as $result){
        //print_r($result);
        
        $data[]=$result;
        //print_r($data);
        $byGroup = group_by("emp_id", $data);

    }
    //print_r($byGroup);
    foreach($byGroup as $group){
        //print_r($group);
        //print_r(end($group));
        //$cdarr=array();
        $no_day = cal_days_in_month(CAL_GREGORIAN, $c_month, $c_year);           
        for($i=1; $i<=$no_day; $i++){ 
            //$cd[] .= $c_year.'-'.$c_month.'-'.$i;
            $cd[]=$i;
        }
       foreach($group as $value){
            //print_r($value);
           
            $startdate = $value['start_date'];
            
            $sepparator = '-';
            $part1 = explode($sepparator, $startdate);
            //$dayForDate = date("l", mktime(0, 0, 0, $parts[1], $parts[2], $parts[0]));
            $day = end($part1);

            if($day=="01" || $day =="02" || $day =="03" || $day == "04" || $day == "05" ||
            $day == "06" || $day == "07" || $day == "08" || $day == "09" ){
                $setoperator = '0';
                $setdate = explode($setoperator,$day);
                $realdate = end($setdate);
                $stdate = $realdate;

           }else{
                $stdate = $day;
           }
            
             //print_r($stdate);
             
            $enddate = $value['end_date'];
             $sepparator2 = '-';
             $part2 = explode($sepparator2,$enddate);
             $day2 = end($part2);
  
              if($day2=="01" || $day2 =="02" || $day2 =="03" || $day2 == "04" || $day2 == "05" ||
              $day2 == "06" || $day2 == "07" || $day2 == "08" || $day2 == "09" ){
              $setoperator2 = '0';
              $setdate2 = explode($setoperator2,$day2);
              $realdate2 = end($setdate2);
              $endate = $realdate2;
  
             }else{
              $endate = $day2;
             }

             for($i=$stdate;$i<=$endate;$i++){
                $cd[$i-1]=$value['shift_name'];
                
            }
            //print_r($cd);
            
          
           
        }
        $output .= "<tr>";
        //$output.="<td>".$value['emp_id']."<td>";
        $output .= "<td>".$value['emp_name']."</td>";  
        for($j=0;$j<sizeof($cd);$j++){
            $output .= "<td>".$cd[$j]."</td>"; 
        }
         
       
        $output .= "</tr>";
        $cd=null;
    }
    echo $output;

        /*$startdate = end($group)['start_date'];
            
        $sepparator = '-';
        $part1 = explode($sepparator, $startdate);
        //$dayForDate = date("l", mktime(0, 0, 0, $parts[1], $parts[2], $parts[0]));
        $day = end($part1);

        if($day=="01" || $day =="02" || $day =="03" || $day == "04" || $day == "05" ||
        $day == "06" || $day == "07" || $day == "08" || $day == "09" ){
            $setoperator = '0';
            $setdate = explode($setoperator,$day);
            $realdate = end($setdate);
            $stdate = $realdate;

        }else{
                $stdate = $day;
        }
        
         //print_r($stdate);
         
        $enddate = end($group)['end_date'];
         $sepparator2 = '-';
         $part2 = explode($sepparator2,$enddate);
         $day2 = end($part2);

          if($day2=="01" || $day2 =="02" || $day2 =="03" || $day2 == "04" || $day2 == "05" ||
          $day2 == "06" || $day2 == "07" || $day2 == "08" || $day2 == "09" ){
          $setoperator2 = '0';
          $setdate2 = explode($setoperator2,$day2);
          $realdate2 = end($setdate2);
          $endate = $realdate2;

         }else{
          $endate = $day2;
         }
            $shift=[];
            for($date=0;$date<$no_day;$date++)
            {
            $shift[$date]=0;
            }

            // for($i = $stdate; $i<=$endate; $i++){
                        
            // $shift[$i-1]=end($group)['shift_name'];
                                        
            // }
            for($i=$stdate;$i<=$endate;$i++){
            $cd[$i-1]=end($group)['shift_name'];
            }
            print_r($cd);
            $output .= "<tr>";
            //$output.="<td>".$value['emp_id']."<td>";
            $output .= "<td>".end($group)['emp_name']."</td>";  
                for($j=0;$j<sizeof($cd);$j++){
                    $output .= "<td>".$cd[$j]."</td>"; 
                }
         
       
            $output .= "</tr>";


}

echo $output;*/

?>