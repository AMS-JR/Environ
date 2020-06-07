<?php
class Amadou{
   public $test = getenv('TEST');
   public $API = getenv('API');
public function env(){
 echo $this->test." and ".$this->API;
   }
 }
?>
