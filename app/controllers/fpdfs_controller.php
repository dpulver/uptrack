<?php
class FpdfsController extends AppController {
        public  $name = 'Fpdfs';     
        public  $uses = null;
         
         public function index(){
                $this->layout='pdf';
         }
 }
?>