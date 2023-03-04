<?php
include_once "model/shift_type.php";
class ShftypeController extends Shifttype{

    public function getShifttype(){
        $results=$this->getshift();
        return $results;
    }
}

?>