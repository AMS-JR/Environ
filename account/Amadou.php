<?php
class Amadou{
   $test = getenv('TEST');
   $API = getenv('API');
public function env(){
 echo $this->test." and ".$this->API;
   }
 }
?>
