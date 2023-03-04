<?php 
    include_once 'model/publicholiday.php';

    class PublicHolidayController extends PublicHoliday{
        public function getPublicholidays(){
            $results = $this->getPublicholidaysList();
            return $results;
        }

        public function insertPublicholidays($date,$day,$name){
            $results = $this->insertPublicholidaysList($date,$day,$name);
            return $results;
        }

        public function viewPublicholidays($id){
            $results = $this->viewPublicholidaysList($id);
            return $results;
        }


        public function editPublicholidays($date,$day,$name,$id){
            $results = $this->editPublicholidaysList($date,$day,$name,$id);
            return $results;
        }
   }
?>