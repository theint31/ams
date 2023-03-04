<?php 
    include_once 'model/shiftView.php';

    class ShiftViewController extends ShiftView{
        public function getshiftView($month,$year){
            //echo "shiftViewController";
            $results = $this->retrieveShiftView($month,$year);
            return $results;
        }
    }
?>