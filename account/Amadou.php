<?php
class Amadou{
   const TEST = getenv('TEST');
   const API = getenv('API');
public function env(){
 echo self::TEST." and ".self::API;
   }
 }
?>
