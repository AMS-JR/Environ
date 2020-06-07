<?php
class Amadou{
  private $test = getenv('TEST');
  private $API = getenv('API');
public function env(){
 return $this->test." and ".$this->API;
   }
 }
?>
