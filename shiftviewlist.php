<?php 
     include_once 'controller/shiftViewcontroller.php';

     $positioncontroller = new ShiftViewController();
     $year = $_POST['year'];
     $month = $_POST['month'];
    //  echo $year;
    //  echo $month;
    $results = $positioncontroller->getshiftView($month,$year);

    $output="";

    // $dateObj = DateTime::createFromFormat('!m', $month);
    // $monthName = $dateObj->format('F');
    // echo $monthName;

            $c_year = date($year);
            $c_month = date($month);
    
            $no_day = cal_days_in_month(CAL_GREGORIAN, $c_month, $c_year);           
                for($i=1; $i<=$no_day; $i++){ 
                //$cd[] .= $c_year.'-'.$c_month.'-'.$i;
                $cd[]=$i;
            }
            //print_r($cd);
            
            //print_r($cd[9]);
            // for($i=0;$i<sizeof($cd);$i++){
            //     //print_r($cd[$i]);
            //     if($cd[$i]==9){
            //         echo $output = "duty";
            //     }else{
            //         echo $output = "off";
            //     }
            // }
           
            //$date_val = json_encode($cd) ;
                //print_r($cd); // date array
    
    
    foreach($results as $result){
        
        $startdate = $result['start_date'];
        
        // $day = getdate(strtotime($startdate));
        // $output = $day;
        // $date = strtotime($startdate);
        // $day =date('D',$date);
        // $output = $date;

        //$date = '2009-10-22';
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
           //$output .= $stdate;

           
                

            
           $enddate = $result['end_date'];
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
           //$output .= $endate;
           
           
            // $realdate = end($setdate);
            // $output = $realdate;
            $output .="<tr>";
            $output .= "<td>".$result['emp_name']."</td>";
           
           for($count=$stdate;$count<=$endate;$count++){
           
            //$output .= "<td>".$count."</td>";
            $find[] = $count;
            $namecount = $count;
            
            $replace = $result['shift_name'];
            $arr = $count;
            $shiftname= str_replace($namecount,$replace,$arr);

            // for($i=0;$i<sizeof($cd);$i++){
            //     //print_r($cd[$i]);
            //     if($cd[$i]==$stdate){
            //         echo $output = "duty";
            //     }else{
            //         echo $output = "off";
            //     }
            // }
            
            //$output .="<td>".$shiftname."</td>";
             
           // $output .= "<td>".$shiftname."</td>";
           }
           print_r($find);
           
            for($i=0;$i<sizeof($cd);$i++){
                //print_r($cd[$i]);

                echo "<br/>***";

                // for($j=0;$j<sizeof($find);$j++){
                //     print_r($find[$j]);
                //     if($find[$j]== $cd[$i]){
                //         $output .= "<td>".$result['shift_name']."</td>";
                //     }else{
                //         // $output.="<td>off</td>";
                //     }
                // }
                
               // $output .= "<td>nn</td>";


            }
            

            



            
           $output .="</tr>";
        
        // $output .= "<tr>";
        // $output .= "<td>".$result['emp_name']."</td>";
        // $output .= "<td>".$result['shift_name']."</td>";
        // $output .= "<td>".$stdate."</td>";
        // $output .= "<td>".$endate."</td>";
        // $output .= "</tr>";
    }
    echo $output;
    //  return $results;
?>



// $testresult = [];
            // foreach ($arrres as $row) {
                
            //      list($key, $value) = $row;
            //      print_r($key);
                // if (!array_key_exists($key, $testresult)) {
                //     $testresult[$key] = [$key];
                // }
                // $testresult[$key][] = $value;
            //}

            //print_r($testresult);
            //  function unique_multidimensional_array($array, $key) {
            //     $temp_array = array();
            //     $i = 0;
            //     $key_array = array();
            
            //     foreach($array as $val) {
            //         if (!in_array($val[$key], $key_array)) {
            //             $key_array[$i] = $val[$key];
            //             $temp_array[$i] = $val;
            //         }
            //         $i++;
            //     }
            //     return $temp_array;
            // }
            // print_r(unique_multidimensional_array($result,$result['emp_id']));
             