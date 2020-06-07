<?php
class Amadou{
  private $test = getenv('TEST');
  private $API = getenv('API');
public function env(){
 echo $this->test." and ".$this->API;
   }
 }
?>
