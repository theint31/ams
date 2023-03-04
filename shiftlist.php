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

    $no_day = cal_days_in_month(CAL_GREGORIAN, $c_month, $c_year);           
    for($i=1; $i<=$no_day; $i++){ 
        //$cd[] .= $c_year.'-'.$c_month.'-'.$i;
        $cd[]=$i;
    }

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
    //print_r($results);
    foreach($results as $result){
        //print_r($result);
        
        $data[]=$result;
        //print_r($data);
        $byGroup = group_by("emp_id", $data);

    }
    //echo "<pre>" . var_export($byGroup, true) . "</pre>";
    //print_r($byGroup);

    foreach($byGroup as $group){
        echo "**************";
        //print_r($group);
        //print_r(count($group)-1);
        //echo "<br>";

        /*for($g=0;$g<count($group);$g++){
            print_r($group[$g]);
        }*/

        $arr=[];
       /* foreach($group as $value){

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
            $shift=[];
            for($date=0;$date<$no_day;$date++)
            {
                $shift[$date]=0;
            }

            for($i = $stdate; $i<=$endate; $i++){
                
                    $shift[$i-1]=$value['shift_name'];
                                 
            }
           // print_r($shift);

            for($i=$stdate;$i<=$endate;$i++){
                $cd[$i-1]=$value['shift_name'];
            }
            print_r($cd);
            $output .= "<tr>";
                            //$output.="<td>".$value['emp_id']."<td>";
                            $output .= "<td>".$value['emp_name']."</td>";  
                            for($j=0;$j<sizeof($cd);$j++){
                                //$output .= "<td>".$cd[$j]."</td>"; 
                            }
                             
                           
                            $output .= "</tr>";
        }
        echo $output;
    }*/
        
    //     $keys = array_keys($group);
    //     $lastKey = $keys[count($keys)-1];
    //     for($i=0;$i<$lastKey;$i++){
    //         echo $group[$lastKey][$i];
    //     }
    // var_dump($lastKey);
    var_dump(end($group));
    echo end($group)['emp_name'];
    $startdate = end($group)['start_date'];
    //print_r($startdate);     
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
                            
                             print_r($stdate);
                             
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
                             print_r($enddate);
             $shift=[];
            for($date=0;$date<$no_day;$date++)
                {
                    $shift[$date]=0;
                }
                 
            // for($i = $stdate; $i<=$endate; $i++){
                                 
            //     $shift[$i-1]=end($group)['shift_name'];
                                                  
            // }
            for($i=$stdate;$i<=$endate;$i++){
                $cd[$i-1]=end($group)['shift_name'];
            }
            //print_r(end($cd));
            $output .= "<tr>";
                            //$output.="<td>".$value['emp_id']."<td>";
                            $output .= "<td>".end($group)['emp_name']."</td>";  
                            for($j=0;$j<sizeof($cd);$j++){
                                $output .= "<td>".$cd[$j]."</td>"; 
                            }
                             
                           
                            $output .= "</tr>";


    }
    
    echo $output;
    
     
        // for($e=1;$e<sizeof($results);$e++){
        //     print_r($results[$e]['emp_id']);
            
        // }
        
            
            
        
        //print_r(array_count_values($results));  
        //print_r($cd);
        //foreach($results as $result){
            //print_r(array_count_values($result));
            //$e = $result['emp_id'];
            //print_r($result);
            //  $array1=array('MgMg','SuSu');
             
             
            //  if(in_array($result['emp_id'],$result)){
            //     echo "false";
            // }
            // else{
            //     echo "true";
            // }
            
            
            // print_r($result['emp_id']);
            // $e=[];
            // $emp=array(1,2,3);
            // array_push($emp);
            // $res=[];
            // for($j=1;$j<sizeof($cd);$j++){
            // if($result['emp_id']==1){
            // $res=array_merge($emp,$emp);
            // print_r($res);
            // }else{
            //     $res[]=0;
            //     print_r($e);
            // }


            // for($r=0;$r<sizeof($res);$r++){
            //     $output.="<td>".$res[$r]."</td>";
            // }
            
             //for($i=$e;$i<$e;$i++){
                //print_r($i);
    //             $startdate = $result['start_date'];
            
    //                         $sepparator = '-';
    //                         $part1 = explode($sepparator, $startdate);
    //                         //$dayForDate = date("l", mktime(0, 0, 0, $parts[1], $parts[2], $parts[0]));
    //                         $day = end($part1);
                
    //                         if($day=="01" || $day =="02" || $day =="03" || $day == "04" || $day == "05" ||
    //                         $day == "06" || $day == "07" || $day == "08" || $day == "09" ){
    //                             $setoperator = '0';
    //                             $setdate = explode($setoperator,$day);
    //                             $realdate = end($setdate);
    //                             $stdate = $realdate;
                
    //                        }else{
    //                             $stdate = $day;
    //                        }
                            
    //                          //print_r($stdate);
                             
    //             $enddate = $result['end_date'];
    //                          $sepparator2 = '-';
    //                          $part2 = explode($sepparator2,$enddate);
    //                          $day2 = end($part2);
                  
    //                           if($day2=="01" || $day2 =="02" || $day2 =="03" || $day2 == "04" || $day2 == "05" ||
    //                           $day2 == "06" || $day2 == "07" || $day2 == "08" || $day2 == "09" ){
    //                           $setoperator2 = '0';
    //                           $setdate2 = explode($setoperator2,$day2);
    //                           $realdate2 = end($setdate2);
    //                           $endate = $realdate2;
                  
    //                          }else{
    //                           $endate = $day2;
    //                          }
    //                          $shift=[];
    //                                          for($date=0;$date<$no_day;$date++)
    //                                          {
    //                                              $shift[$date]=0;
    //                                          }
                             
    //                                          for($i = $stdate; $i<=$endate; $i++){
                                                 
    //                                                  $shift[$i-1]=$result['shift_name'];
                                                                  
    //                                          }
    //                             //$e=array_merge($shift,$shift);
                                            
    //                         //print_r($e);;
    //                         if(in_array($result['emp_name'],$result)){
    //                             print_r("do");
    //                         }
    //                         $output .= "<tr>";
    //                         $output.="<td>".$result['emp_id']."<td>";
    //                         $output .= "<td>".$result['emp_name']."</td>";  
    //                         for($j=0;$j<sizeof($shift);$j++){
    //                             //$output .= "<td>".$shift[$j]."</td>"; 
    //                         }
                             
                           
    //                         $output .= "</tr>";
         
    // }
    //     echo $output;
        
   
//             $c_year = date($year);
//             $c_month = date($month);
    
//             $no_day = cal_days_in_month(CAL_GREGORIAN, $c_month, $c_year);           
//             for($i=1; $i<=$no_day; $i++){ 
//                 //$cd[] .= $c_year.'-'.$c_month.'-'.$i;
//                 $cd[]=$i;
//             }
//         //print_r($cd);
//        $shiftlist=[];
//     foreach($results as $result){
        
//         $startdate = $result['start_date'];
            
//             $sepparator = '-';
//             $part1 = explode($sepparator, $startdate);
//             //$dayForDate = date("l", mktime(0, 0, 0, $parts[1], $parts[2], $parts[0]));
//             $day = end($part1);

//             if($day=="01" || $day =="02" || $day =="03" || $day == "04" || $day == "05" ||
//             $day == "06" || $day == "07" || $day == "08" || $day == "09" ){
//                 $setoperator = '0';
//                 $setdate = explode($setoperator,$day);
//                 $realdate = end($setdate);
//                 $stdate = $realdate;

//            }else{
//                 $stdate = $day;
//            }
            
//              //print_r($stdate);
             
//              $enddate = $result['end_date'];
//              $sepparator2 = '-';
//              $part2 = explode($sepparator2,$enddate);
//              $day2 = end($part2);
  
//               if($day2=="01" || $day2 =="02" || $day2 =="03" || $day2 == "04" || $day2 == "05" ||
//               $day2 == "06" || $day2 == "07" || $day2 == "08" || $day2 == "09" ){
//               $setoperator2 = '0';
//               $setdate2 = explode($setoperator2,$day2);
//               $realdate2 = end($setdate2);
//               $endate = $realdate2;
  
//              }else{
//               $endate = $day2;
//              }
           
           
//                 $shift=[];
//                 for($date=0;$date<$no_day;$date++)
//                 {
//                     $shift[$date]=0;
//                 }

//                 for($i = $stdate; $i<=$endate; $i++){
                    
//                         $shift[$i-1]=$result['shift_name'];
                                     
//                 }
//                      //$array=$cd;
                  
//                 //  var_dump($shift);
                
                  
                    
//                   $output .= "<tr>";
//                   $output .= "<td>".$result['emp_name']."</td>";
                  
//                   for($j=0;$j<sizeof($shift);$j++){
//                     $shiftlist=$shift[$j];
//                     // print_r($shiftlist);
                    
//                      //$array=$shiftlist;
                    
//                      $output .= "<td>".$shiftlist."</td>";
//                     print_r($shiftlist);
                    
//                   }
//                   $shiftlist=array();
//                   print_r($shiftlist);
                  
                 
                  
//                   $output .= "</tr>";                  
//     }
   

            
// echo $output;
//print_r($group);
//print_r(end($group));
    //echo end($group)['emp_name'];
    /*$startdate = end($group)['start_date'];
    print_r($startdate);     
                            $sepparator = '-';
                            $part1 = explode($sepparator, $startdate);
                            //$dayForDate = date("l", mktime(0, 0, 0, $parts[1], $parts[2], $parts[0]));
                            $day = end($part1);
                            echo "#####";
                            //print_r($day);
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
                             $finalstart[]=$stdate;
                             print_r($finalstart);
                             
                $enddate = end($group)['end_date'];
                //print_r($enddate);
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
                             echo "&&&&";
                             //print_r($endate);
            //  $shift=[];
            // for($date=0;$date<$no_day;$date++)
            //     {
            //         $shift[$date]=0;
            //     }
                 
            //  for($i = $stdate; $i<=$endate; $i++){
                                 
            //      $shift[$i-1]=end($group)['shift_name'];
                                                  
            //  }
             //print_r($shift);
            for($i=$stdate;$i<=$endate;$i++){
                $cd[$i-1]=end($group)['shift_name'];
            }
            print_r($cd);
            $output .= "<tr>";
                            //$output.="<td>".$value['emp_id']."<td>";
                            $output .= "<td>".end($group)['emp_name']."</td>";  
                            // for($j=0;$j<sizeof($cd);$j++){
                            //     $output .= "<td>".$cd[$j]."</td>"; 
                            // }
                             
                           
                            $output .= "</tr>";


    }
    
    echo $output;*/
?>



















 
