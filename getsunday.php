<?php 

    function getSunday($startDt, $endDt, $weekNum)
    {
        $startDt = strtotime($startDt);
        $endDt = strtotime($endDt);
    
        $dateSun = array();
    
        do
        {
            if(date("w", $startDt) != $weekNum)
            {
                $startDt += (24 * 3600); // add 1 day
            }
        } while(date("w", $startDt) != $weekNum);
    
    
        while($startDt <= $endDt)
        {
            $dateSun[] = date('d-m-Y', $startDt);
            $startDt += (7 * 24 * 3600); // add 7 days
        }
    
        return($dateSun);
    }
    
    
    //$year   = date($eachyear[$i]);//You can add custom year also like $year=1997 etc.
    $eachyear = ['2020','2021','2022'];
$year[]="";
$count=0;
for($i=0;$i<sizeof($eachyear);$i++){
    $year[$count]=$eachyear[$i];
    $count++;
}
print_r($year);
    // $dateSun = getSunday($year.'-01-01', $year.'-12-31', 0);
    // echo"<pre>slno.     Date<br>";
    // foreach($dateSun as $index => $date)
    // {
    //   echo ($index+1).'       '.$date.'<br>';
    // } 

    for($i=0; $i<count($year);$i++){
        $dateSun = getSunday($year[$i].'-01-01', $year[$i].'-12-31', 0);
        foreach($dateSun as $index => $date)
        {
        echo ($index+1).'       '.$date.'<br>';
        } 
    }
    ?>
