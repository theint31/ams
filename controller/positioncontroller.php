<?php 
    include_once 'model/position.php';

    class PositionController extends Position{
        public function getPositions(){
            $results =$this->getPositionList();
            return $results;
        }

        public function insertPosition($position,$dept){
            $results = $this->insertPositionList($position,$dept);
            return $results;
        }

        public function viewPosition($id){
            $results = $this->viewPositionList($id);
            return $results;
        }

        public function editPosition($position,$dept,$id){
            $results = $this->editPositionList($position,$dept,$id);
            return $results;
        }
        public function deletePosit($id){
            $results = $this->deletePosition($id);
            return $results;
        }
    }
?>